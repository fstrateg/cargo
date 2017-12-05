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
            $this->t->assign($item->getTags('IN_'));
            $this->t->parse('MAIN.ROW_INWAY');
        }
    }

    public function addTags()
    {
        $this->t->assign('ADD_URL',cot_url('inway','m=add'));
    }

    public function prepare()
    {
        $this->addTags();
        $this->addRows();
    }
}