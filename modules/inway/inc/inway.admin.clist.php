<?php
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$cls=new InwayCList('inway.admin.clist');

$adminmain=$cls->createPage();

class InwayCList extends InwayBase
{
    public function addTags()
    {
        global $cfg;
        Resources::addFile("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");
        $flt=cot_import('flt','G','ALP');
        if (empty($flt))
        {
            $this->t->assign('IN_PAGE_ALL',true);
            $ss=TbComment::getListWhere("");
            $this->t->assign('IN_ALL_COUNT',count($ss));
            $this->t->assign('IN_MOD_COUNT',TbComment::getCountWhere("isnew='Y'"));
        }
        if ($flt=='mod')
        {
            $this->t->assign('IN_PAGE_MOD',true);
            $ss=TbComment::getListWhere("isnew='Y'");
            $this->t->assign('IN_ALL_COUNT',TbComment::getCountWhere());
            $this->t->assign('IN_MOD_COUNT',count($ss));
        }
        $this->t->assign([
            'IN_URL_ALL'=>cot_url('admin',['m'=>'inway','a'=>'clist'],'',true),
            'IN_URL_MOD'=>cot_url('admin',['m'=>'inway','a'=>'clist','flt'=>'mod'],'',true),
        ]);
        /**
         * @var $item TbComment
         */
        foreach($ss as $item)
        {
            $this->t->assign($item->getTags('IN_'));
            $this->t->assign('IN_REPLY',$item->reply);
            $this->t->assign(cot_generate_usertags($item->userid,'IN_USR_'));
            $this->t->parse('MAIN.COMMENT');
        }
    }

}