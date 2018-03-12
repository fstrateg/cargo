<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin.home.sidepanel
Order=2
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL');

$c=new InwayAdminHome();

$line=$c->getRezult();

class InwayAdminHome
{
    var $l=[];
    var $L;

    function __construct()
    {
        global $L,$db;
        $db->registerTable('inway');
        $db->registerTable('inway_comments');
        $lg=cot_langfile('inway','module');
        require_once $lg;
        $this->L=$L;
    }

    function setTitle()
    {
        $this->pushString('<h3>'.$this->L['inway_usefull'].'</h3>');
    }

    private function getBody()
    {
        global $db_inway,$db_inway_comments;
        $this->pushString('<ul class="follow">');

        $cnt=$this->getCount($db_inway);
        $a=cot_rc_link(cot_url('admin',['m'=>'inway','a'=>'ilist'],'',true),"Сервисов: $cnt");
        $this->pushString("<li>$a</li>");

        $cnt=$this->getCount($db_inway_comments);
        $a=cot_rc_link(cot_url('admin',['m'=>'inway','a'=>'clist'],'',true),"Коментариев: $cnt");
        $this->pushString("<li>$a</li>");

        $cnt=$this->getCount($db_inway,"req>0");
        $this->pushString("<li>Запросов на владение: $cnt</li>");

        $cnt=$this->getCount($db_inway,"isnew='Y'");
        $a=cot_rc_link(cot_url('admin',['m'=>'inway','a'=>'ilist','flt'=>'mod'],'',true),"Севисов на модерацию: $cnt");
        $this->pushString("<li>$a</li>");

        $cnt=$this->getCount($db_inway_comments,"isnew='Y'");
        $a=cot_rc_link(cot_url('admin',['m'=>'inway','a'=>'clist','flt'=>'mod'],'',true),"Коментариев на модерацию: $cnt");
        $this->pushString("<li>$a</li>");
        $this->pushString('</ul>');

    }

    private function pushString($s)
    {
        $this->l[]=$s;
    }
    function getRezult()
    {
        $this->setTitle();
        $this->getBody();
        return implode($this->l);
    }

    function getCount($tb,$usl='')
    {
        global $db;
        $usl=empty($usl)?'':"where $usl";

        return $db->query("select count(*) from $tb $usl")->fetchColumn();
    }
}