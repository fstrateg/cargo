<?php
defined('COT_CODE') or die('Wrong URL');

class MarshrutProfile
{
    /**
     * @var CotDB
     */
    var $db;
    var $L;
    var $owner;
    var $user;
    var $state;

    var $tb_marhrut;
    var $tb_performer;
    var $tb_projects;
    var $tb_users;

    /**
     * @id int
     * @return int
     */
    function setOwner($id)
    {
        $this->owner=$id;
    }

    /**
     * @return boolean;
     */
    function isGuest()
    {
        return $this->owner!=$this->user['id'];
    }

    function __construct()
    {
        global $db,$L,$usr,$db_marshrut,$db_projects_perform,$db_projects,$db_users;
        $this->db=$db;
        $this->L=$L;
        $this->tb_marhrut=$db_marshrut;
        $this->tb_performer=$db_projects_perform;
        $this->tb_projects=$db_projects;
        $this->tb_users=$db_users;
        $this->user=$usr;
        $tab=cot_import('tab','G','TXT');
        $this->state=($tab=='marshrut') ? cot_import('stat', 'G', 'TXT') : '' ;

    }

    function getCountAll()
    {
        $sql="select count(*) from ".$this->tb_marhrut." where item_userid=".$this->owner;

        if ($this->isGuest()) return $this->db->query($sql.' and item_state=1')->fetchColumn();

        $rez=$this->db->query($sql)->fetchColumn();
        return $rez;
    }

    private function getCountInWork()
    {
        if ($this->isGuest()) return 0;
        return $this->db->query("select count(*) from ".$this->tb_performer." where item_performer=".$this->owner." and item_done=0")->fetchColumn();
    }

    private function getCountIsDone()
    {
        if ($this->isGuest()) return 0;
        return $this->db->query("select count(*) from ".$this->tb_performer." where item_performer=".$this->owner." and item_done=1")->fetchColumn();
    }

    public function getInWork($prefix='')
    {
        $rez=array();
        $rez[$prefix.'TITLE']=$this->L['marshrut_inwork'];
        $rez[$prefix.'COUNT']=$this->getCountInWork();
        $rez[$prefix.'URL']=cot_url('users', 'm=details&id=' . $this->owner . '&tab=marshrut&stat=inwork');
        $rez[$prefix.'SELECT']=($this->state=='inwork');
        return $rez;
    }

    public function getIsDone($prefix)
    {
        $rez=array();
        $rez[$prefix.'TITLE']=$this->L['marshrut_isdone'];
        $rez[$prefix.'COUNT']=$this->getCountIsDone();
        $rez[$prefix.'URL']=cot_url('users', 'm=details&id=' . $this->owner . '&tab=marshrut&stat=isdone');
        $rez[$prefix.'SELECT']=($this->state=='isdone');
        return $rez;
    }

    private function marshruts()
    {
        $sql="select * from ".$this->tb_marhrut." where item_userid=".$this->owner;

        if ($this->isGuest()) $sql.=' and item_state=1';
        return $this->db->query($sql)->fetchAll();
    }

    /**
     * @param $t XTemplate
     */
    public function getRows($t,$flt)
    {
        $mr=array();
        $tmpl='MARSH';
        if (empty($flt))
        {
            $mr=$this->marshruts();
            $tmpl='CLAIM';
        }
        if ($flt=='inwork') {
            $mr = $this->inwork();
        }
        if ($flt=='isdone'){
            $mr = $this->done();
        }
        foreach($mr as $item)
        {
            if ($tmpl=='MARSH')
                $t->assign($this->generate_claim($item,'MR_'));

            $t->assign(cot_generate_marshruttag($item,'MR_'));
            $t->parse('MAIN.'.$tmpl.'_ROWS');
        }
    }

    private function generate_claim($data,$prefix)
    {
        $temp=cot_generate_usertags($data);
        $temp['SUMM']=$data['item_summ'];
        $temp['CLAIM']=cot_rc_link(cot_url('projects','id='.$data['item_id']),$data['item_title']);
        $temp['CONFIRM']=$data['item_confirm'];
        $temp['URLCONF']=cot_url('marshrut',['m'=>'perform','id'=>$data['pid'],'act'=>'conf'],'',true);
        $temp['URLREJT']=cot_url('marshrut',['m'=>'perform','id'=>$data['pid'],'act'=>'rejt'],'',true);
        $temp['URLCLOSE']=cot_url('marshrut',['m'=>'closeclaim','id'=>$data['pid']]);
        $temp['TRSTARS']=$data['item_trstars'];

        $rez=array();
        foreach($temp as $item=>$vl) $rez[$prefix.$item]=$vl;
        return $rez;
    }

    private function inwork()
    {
        $sql="select b.*,u.*,p.item_summ,p.item_confirm,p.item_id pid,item_trstars,item_trfeedback from ".$this->tb_performer." p, "
            .$this->tb_users." u, "
            .$this->tb_projects." b where b.item_userid=u.user_id and p.item_performer=".$this->owner
            ." and p.item_done=0 and b.item_id=p.item_claim order by p.item_db desc";
        return $this->db->query($sql)->fetchAll();
    }

    private function done()
    {
        $sql="select b.*,u.*,p.item_summ,p.item_confirm,item_trstars,item_trfeedback from ".$this->tb_performer." p, "
            .$this->tb_users." u, "
            .$this->tb_projects." b where b.item_userid=u.user_id and p.item_performer=".$this->owner
            ." and p.item_done=1 and b.item_id=p.item_claim order by p.item_db desc";
        return $this->db->query($sql)->fetchAll();
    }
}

class MarshrutPerf
{
    var $id_perf;
    var $id_usr;
    var $tb_perform;

    function __construct()
    {
        global $usr,$db_projects_perform;
        $this->id_perf=cot_import('id','G','NUM');
        $this->id_usr=$usr['id'];
        $this->tb_perform=$db_projects_perform;

    }

    public function getAccess()
    {
        $perf=$this->getPerform();
        if ($perf->item_performer!=$this->id_usr)
        {
            cot_die_message(404, TRUE);
        }
        return true;
    }

    public function getAccessFeedback()
    {
        if (!$this->getAccess()) return false;
        $perf=$this->getPerform();
        if ($perf->item_trstars>0)
        {
            cot_die_message(404, TRUE);
        }
        return true;
    }

    private function getPerform()
    {
        global $db;
        return $db->query("select * from ".$this->tb_perform." where item_id=".$this->id_perf)->fetchObject();
    }

    public function getClaimId()
    {
        $item=$this->getPerform();
        return $item->item_claim;
    }

    public function importFeedback()
    {
        $ritem=[
            'item_trstars'=>cot_import('reviewStars','POST','INT'),
            'item_trfeedback'=>cot_import('rnotes','POST','HTM'),
            'item_id'=>$this->id_perf,
        ];
        return $ritem;
    }

    public function validateFeedback($ritem)
    {
        global $L;
        cot_check(empty($ritem['item_trstars']),$L['claims_rating_emptystars'],'reviewStars');
        if ($ritem['item_trstars']&&((int)$ritem['item_trstars'])<3) {
            cot_check(empty($ritem['item_trfeedback']), $L['claims_rating_emptynotes'], 'rnotes');
        }
    }

    public function saveFeedback($ritem)
    {
        global $db;
        $db->update($this->tb_perform,$ritem,'item_id='.$ritem['item_id']);
        $db->query("update {$this->tb_perform} set item_done=1 where item_id={$ritem['item_id']} and item_fstars>0");
    }
}