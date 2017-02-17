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

    private function init()
    {
        global $db,$db_userverif,$usr;
        $this->userid=$usr['id'];
        $item=$db->query("select * from $db_userverif where userid=${usr['id']}")->fetchAll();
        if (count($item)>0)
        {
            $item=$item[0];
            $this->fiz=$item['fiz'];
            $this->pas_status=$item['pas_status'];
            $this->cert_status=$item['cert_status'];
            $this->salt=$item['salt'];
            $this->dat=$item['dat'];
            $this->new=(($this->pas_status+$this->cert_status)==0);
        }
        else
        {
            global $sys;
            $this->salt=uniqid('verif_');
            $this->dat=$sys['now'];
            $db->insert($db_userverif,$this->getDbData());
        }
    }

    private function getDbData()
    {
        return ['fiz'=>$this->fiz,
            'pas_status'=>$this->pas_status,
            'cert_status'=>$this->cert_status,
            'userid'=>$this->userid,
            'salt'=>$this->salt,
            'dat'=>$this->dat,
        ];
    }

    public function importForm()
    {
        global $cfg,$sys,$db;
        include_once $cfg['system_dir'].'/uploads.php';

        $this->fiz=cot_import('rfizlico','P','NUM');
        if (isset($_FILES['ridcart'])&&$_FILES['ridcart']['errors']==0) {
            $file = $_FILES['ridcart'];
            $filename=$cfg['root_dir'].'/'.$cfg['photos_dir']."/".$this->userid."_pass_".$this->salt.".jpg";
            if (cot_uploadImage($file['tmp_name'],$filename,800)) {
                $this->pas_status = 2;
                $this->dat=$sys['now'];
            }
        }
        $this->update();
    }

    private function update()
    {
        global  $db,$db_userverif;
        $db->update($db_userverif,$this->getDbData());
    }

    public function getPaspBlock()
    {
        if ($this->pas_status==0||$this->pas_status==null)
        {
            return cot_inputbox('file','ridcart');
        }
        if ($this->pas_status==3)
        {
            return cot_inputbox('file','ridcart');
        }
        if ($this->pas_status==2)
        {
            return $this->L['userverif_wait'];
        }
    }

    public function getFizBlock()
    {
        $html="";

        if ($this->new)
        {
            $html="<p>".$this->L['userverif_getid'].'</p>';
            $html.='<p>'.cot_radiobox($this->fiz,'rfizlico',['1','0'],[$this->L['userverif_fiz'],$this->L['userverif_ur']]).'</p>';
        }
        else
        {
            $html="<p>".$this->L['userverif_iddone'].'</p>';
            $html.=sprintf('<p>'.$this->L['userverif_registred'].'</p>', $this->fiz=='1' ? $this->L['userverif_fiz'] : $this->L['userverif_ur'] );
        }
        return $html;
    }

    public function getData()
    {
        return [
            'USRVER_FIZ'=>$this->getFizBlock(),
            'USRVER_UDOS'=>$this->getPaspBlock(),
            'USRVER_NUMBER'=>cot_inputbox('text','rnumber'),
            'USRVER_SVIDET'=>cot_inputbox('file','rsvidet'),
            'USRVER_URL'=>cot_url('userverif','a=verif'),
            'USRVER_SUBMIT'=>cot_inputbox('submit','submit',$this->L['userverif_submit'],'class="btn btn-success"'),
        ];

    }
}