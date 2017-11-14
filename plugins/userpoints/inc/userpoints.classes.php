<?php
defined('COT_CODE') or die('Wrong URL');

class UserRating
{
    var $userid;
    var $details;
    var $urate=0;
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
        $details=$db->query("Select item_type,sum(item_point) points from $tb a where a.item_userid=".$this->userid." group by item_type")->fetchAll();
        $this->urate=0;
        $this->details=[
            'auth'=>0,
            'review'=>0,
            'verif'=>(int)0,
            'other'=>0,
        ];
        foreach ($details as $vl)
        {
            $this->urate+=(int)$vl['points'];
            switch($vl['item_type'])
            {
                case 'auth':
                    $this->details['auth']+=(int)$vl['points'];
                break;
                case 'reviewplus':
                case 'reviewminus':
                    $this->details['review']+=(int)$vl['points'];
                    break;
                case 'verif':
                    $this->details['vrif']+=(int)$vl['points'];
                    break;
                default:
                    $this->details['other']+=(int)$vl['points'];
                    break;
            }
        }
    }
}