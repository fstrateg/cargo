<?php

defined('COT_CODE') or die('Wrong URL.');
global $L;
/*
 * null не верифицирован
 * 0 не верифицирован
 * 1 верфицирован
 * 2 идет процесс верификации
 * 3 не прошел верификацию
 */

class UserVerif
{
    var $pas_status=null;
    var $cert_status=null;
    var $new=true;
    var $fiz='1';
    var $tax_number;
    var $userid;
    var $salt;
    var $dat;
    var $L=array();

    function __construct()
    {
        global $L;
        $this->L=$L;
        $this->init();
    }

    public function init($uid = 0)
    {
        global $db,$db_userverif,$usr;
        if (!$uid)
            $this->userid=$usr['id'];
        else
            $this->userid=$uid;
        $item=$db->query("select * from $db_userverif where userid=".$this->userid)->fetchAll();
        if (count($item)>0)
        {
            $item=$item[0];
            $this->fiz=$item['fiz'];
            $this->pas_status=$item['pas_status'];
            $this->cert_status=$item['cert_status'];
            $this->salt=$item['salt'];
            $this->dat=$item['dat'];
            $this->tax_number=$item['tax_number'];
            $this->new=(($this->pas_status+$this->cert_status)==0);
        }
        else
        {
            global $sys;
            $this->salt=uniqid();
            $this->dat=$sys['now'];
            $db->insert($db_userverif,$this->getDbData());
        }
    }

    private function getDbData()
    {
        return ['fiz'=>$this->fiz,
            'pas_status'=>$this->pas_status,
            'cert_status'=>$this->cert_status,
            'tax_number'=>$this->tax_number,
            'userid'=>$this->userid,
            'salt'=>$this->salt,
            'dat'=>$this->dat,
        ];
    }

    public function importForm()
    {
        global $cfg,$sys,$db;
        include_once $cfg['system_dir'].'/uploads.php';

        if ($this->new)
            $this->fiz=(string)cot_import('rfizlico','P','NUM');

        if ($this->pas_status==0||$this->pas_status==3)
        {
            if (isset($_FILES['ridcart'])&&$_FILES['ridcart']['errors']==0&&$_FILES['ridcart']['size']>0) {
                $file = $_FILES['ridcart'];
                $filename=$cfg['root_dir'].'/'.$cfg['photos_dir']."/".$this->userid."_pass_ver_".$this->salt.".jpg";
                if (cot_uploadImage($file['tmp_name'],$filename,800)) {
                    $this->pas_status = 2;
                    $this->dat=$sys['now'];
                }
            }
        }

        $this->tax_number=cot_import('rnumber','P','NUM');
        if ($this->cert_status==0||$this->cert_status==3)
        {
            if (isset($_FILES['rsvidet'])&&$_FILES['rsvidet']['errors']==0&&$_FILES['rsvidet']['size']>0) {
                $file = $_FILES['rsvidet'];
                $filename=$cfg['root_dir'].'/'.$cfg['photos_dir']."/".$this->userid."_svid_ver_".$this->salt.".jpg";
                if (cot_uploadImage($file['tmp_name'],$filename,800)) {
                    $this->cert_status = 2;
                    $this->dat=$sys['now'];
                }
            }
        }
        if ($this->validateForm())
                $this->update();
    }

    public function validateForm()
    {
        return true;
    }

    private function update()
    {
        global  $db,$db_userverif;
        $db->update($db_userverif,$this->getDbData(),'userid='.$this->userid);
    }

    public function getPaspBlock()
    {
        $html='';
        if ($this->pas_status==0||$this->pas_status==null)
        {
            $html='<p>'.$this->L['userverif_getid'];
            $html.='</p><p>'.cot_inputbox('file','ridcart').'</p><p class="small" style="color: #999">'.$this->L['userverif_doc_types'].'</p>';
        }
        if ($this->pas_status==3)
        {
            $html='<p class="text-warning">'.$this->L['userverif_doc_rejected'].'</p><p>'.$this->L['userverif_getid'];
            $html.='</p><p>'.cot_inputbox('file','ridcart').'</p><p class="small" style="color: #999">'.$this->L['userverif_doc_types'].'</p>';
        }
        if ($this->pas_status==2)
        {
            $html='<p>'.$this->L['userverif_getid'];
            $html.='</p><p class="text-info">'.$this->L['userverif_wait'].'</p>';
        }
        if ($this->pas_status==1)
        {
            $html='<p>'.$this->L['userverif_getid'].'</p>';
            $html.='<p class="text-success">'.$this->L['userverif_doc_verifed'].'</p>';
        }
        return $html;
    }

    public function getCertBlock()
    {
        $html='';
        if ($this->cert_status==0||$this->cert_status==null)
        {
            $html.=vsprintf('<p>%s</p><p>%s</p><hr /><p>%s</p><p>%s</p>',
                [
                    $this->L['userverif_number'],
                    cot_inputbox('text','rnumber',$this->tax_number,'class="number"'),
                    $this->L['userverif_svidetel'],
                    cot_inputbox('file','rsvidet')
                ]);
            $html.='<p class="small" style="color: #999">'.$this->L['userverif_doc_types'].'</p>';
        }
        if ($this->cert_status==1)
        {
            $html=vsprintf('<p>%s</p><p>%s</p><hr />',
                        [
                            $this->L['userverif_number'],
                            cot_inputbox('text','rnumber',$this->tax_number,'class="number" disabled'),
                        ]
            );
            $html.=vsprintf('<p>%s</p><p class="text-success">%s</p>',
                [
                    $this->L['userverif_svidetel'],
                    $this->L['userverif_doc_verifed']
                ]);
        }
        if ($this->cert_status==2)
        {
            $html.=vsprintf('<p>%s</p><p>%s</p><hr /><p>%s</p><p class="text-info">%s</p>',
                [
                    $this->L['userverif_number'],
                    cot_inputbox('text','rnumber',$this->tax_number,'class="number" disabled'),
                    $this->L['userverif_svidetel'],
                    $this->L['userverif_wait']
                ]);
        }
        if ($this->cert_status==3)
        {
            $html.=vsprintf('<p>%s</p><p>%s</p><hr /><p>%s</p>
                <p class="text-warning">%s</p>
                <p>%s</p>',
                [
                    $this->L['userverif_number'],
                    cot_inputbox('text','rnumber',$this->tax_number,'class="number"'),
                    $this->L['userverif_svidetel'],
                    $this->L['userverif_doc_rejected'],
                    cot_inputbox('file','rsvidet')
                ]);
            $html.='<p class="small" style="color: #999">'.$this->L['userverif_doc_types'].'</p>';
        }
        return $html;
    }

    public function getFizBlock()
    {
        $html="";

        if ($this->new)
        {
            $html="<p>".$this->L['userverif_reg'].':</p>';
            $html.='<p>'.cot_radiobox($this->fiz,'rfizlico',['1','0'],[$this->L['userverif_fiz'],$this->L['userverif_ur']]).'</p>';
        }
        else
        {
            $html.=sprintf('<p>'.$this->L['userverif_registred'].'</p>', $this->fiz=='1' ? $this->L['userverif_fiz'] : $this->L['userverif_ur'] );
            $html.=cot_inputbox('hidden','hfizlico',$this->fiz);
        }
        return $html;
    }

    public function getData()
    {
        return [
            'USRVER_FIZ'=>$this->getFizBlock(),
            'USRVER_UDOS'=>$this->getPaspBlock(),
            'USRVER_SVIDET'=>$this->getCertBlock(),
            'USRVER_URL'=>cot_url('userverif','a=verif'),
            'USRVER_SUBMIT'=>cot_inputbox('submit','submit',$this->L['userverif_submit'],'class="btn btn-success"'),
        ];

    }

    public function verifed()
    {
        // если физ лицо
        if (((int)$this->fiz)==1) return ($this->pas_status==1);
        // если юр лицо
        else
            return ($this->pas_status==1&&$this->cert_status==1);
    }
}