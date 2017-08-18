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

    }

    function getCountAll()
    {
        $sql="select count(*) from ".$this->tb_marhrut." where item_userid=".$this->owner;

        if ($this->isGuest()) return $this->db->query($sql.' and item_state=1')->fetchColumn();

        $rez=$this->db->query($sql)->fetchColumn();
        $rez+=$this->db->query("select count(*) from ".$this->tb_performer." where item_performer=".$this->owner)->fetchColumn();
        return $rez;
    }

    function getCountInWork()
    {
        if ($this->isGuest()) return 0;
        return 1;
    }

    function getCountIsDone()
    {
        if ($this->isGuest()) return 0;
        return 2;
    }
}