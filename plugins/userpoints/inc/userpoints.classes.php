<?php
defined('COT_CODE') or die('Wrong URL');

class UserRating
{
    var $userid;
    var $details;
    var $urate;
    var $maxrate;
    var $tb;

    function __construct()
    {
        cot::$db->registerTable('userpoints');
        global $db_userpoints;
        $this->tb=$db_userpoints;
    }

    public function init($userid)
    {
        $this->userid=(int)$userid;
        $this->getData();
        return $this;
    }

    private function getData()
    {
        global $db;
        $tb=$this->tb;
        $this->maxrate =$db->query("select sum(item_point) pp,item_userid from $tb a group by item_userid order by pp desc")->fetchColumn();
        $this->details=$db->query("Select item_type,sum(item_point) points from $tb a where a.item_userid=".$this->userid." group by item_type")->fetchAll();

    }
}