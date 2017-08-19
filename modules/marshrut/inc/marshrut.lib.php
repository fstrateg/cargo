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
        global $db,$L,$usr,$db_marshrut,$db_projects_perform;
        $this->db=$db;
        $this->L=$L;
        $this->tb_marhrut=$db_marshrut;
        $this->tb_performer=$db_projects_perform;
        $this->user=$usr;
        $tab=cot_import('tab','G','TXT');
        $this->state=($tab=='marshrut') ? cot_import('stat', 'G', 'TXT') : '' ;

    }

    function getCountAll()
    {
        $sql="select count(*) from ".$this->tb_marhrut." where item_userid=".$this->owner;

        if ($this->isGuest()) return $this->db->query($sql.' and item_state=1')->fetchColumn();

        $rez=$this->db->query($sql)->fetchColumn();
        $rez+=$this->db->query("select count(*) from ".$this->tb_performer." where item_performer=".$this->owner)->fetchColumn();
        return $rez;
    }

    private function getCountInWork()
    {
        if ($this->isGuest()) return 0;
        return $this->db->query("select count(*) from ".$this->tb_performer." where item_performer=".$this->owner)->fetchColumn();
    }

    private function getCountIsDone()
    {
        if ($this->isGuest()) return 0;
        return $this->db->query("select count(*) from ".$this->tb_performer." where item_performer=".$this->owner)->fetchColumn();
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
     * @return array
     */
    public function getRows($t)
    {
        $rez=array();
        $mr=$this->marshruts();
        foreach($mr as $item)
        {
            $t->assign(cot_generate_marshruttag($item,'MR_'));
            $t->parse('MAIN.MARSH_ROWS');
        }
    }
}