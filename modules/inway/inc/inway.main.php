<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayMain('inway.main');

$module_body=$cls->createPage();


class InwayMain extends InwayBase
{

    public function addRows()
    {
        $list=TbInway::getList();
        foreach($list as $item)
        {
            $item->getCatName();
            $this->t->assign($item->getTags('IN_'));
            $this->t->assign('IN_DETAILS',cot_url('inway','m=details&id='.$item->id,'',true));
            $this->t->parse('MAIN.ROW_INWAY');
        }
        $list=TbComment::getListTop(5);
        foreach($list as $item)
        {
            $this->t->assign($item->getTags('IN_'));
            $this->t->assign(cot_generate_usertags($item->userid, 'IN_'));
            $this->t->parse('MAIN.ROW_COMMENT');
        }
    }

    public function addTags()
    {
        global $cfg;
        Resources::addFile("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");
        $this->t->assign('ADD_URL',cot_url('inway','m=add'));
    }

    public function prepare()
    {
        $this->addTags();
        $this->addRows();
    }
}