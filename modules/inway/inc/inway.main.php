<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayMain('inway.main');

$module_body=$cls->createPage();


class InwayMain extends InwayBase
{
    var $type;

    function InwayMain($tmpl)
    {
        $this->type=cot_import('type','G','INT');
        parent::__construct($tmpl);
    }
    public function addRows()
    {
        $list=TbInway::getCategory();
        foreach($list as $item) {
            $this->t->assign([
                'ITYPE_ROW_TITLE'=>$item['name'].' ('.$item['cnt'].')',
                'ITYPE_ROW_ACT'=>($item['id']==$this->type),
                'ITYPE_ROW_URL'=>cot_url('inway',['type'=>$item['id']]),
            ]);
            $this->t->parse('MAIN.ITYPES.ITYPES_ROWS');
        }
        $this->t->assign('ITYPE_ALL_ACT',empty($this->type));
        $this->t->assign('ITYPE_ALL_URL',cot_url('inway'));
        $this->t->parse('MAIN.ITYPES');

        $list=TbInway::getList($this->type);
        foreach($list as $item)
        {
            $item->getCatName();
            $this->t->assign($item->getTags('IN_'));
            $this->t->assign('IN_DETAILS',cot_url('inway','m=details&id='.$item->id,'',true));
            $this->t->assign('IN_ONMAP',cot_url('inway',['m'=>'map','id'=>$item->id],'',true));
            $this->t->parse('MAIN.ROW_INWAY');
        }
        $list=TbComment::getListTop(5,$this->type);
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
        parent::prepare();
    }
}