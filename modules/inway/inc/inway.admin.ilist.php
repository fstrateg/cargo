<?
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$tpl=cot_tplfile('inway','module',true);

$cls=new InwayIList('inway.admin.ilist');

$adminmain=$cls->createPage();

class InwayIList extends InwayBase
{
    function __construct($tmpl)
    {
        parent::__construct($tmpl);
    }

    public function addTags()
    {
        global $cfg;
        Resources::addFile("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");
        /** @var TbInway $item */
        $ss=TbInway::getList();
        foreach($ss as $item)
        {
            $this->t->assign($item->getTags('IN_'));
            $this->t->assign('IN_DETAILS',cot_url('inway','m=details&id='.$item->id,'',true));
            $this->t->assign('IN_ONMAP',cot_url('inway',['m'=>'map','id'=>$item->id],'',true));
            $this->t->parse('MAIN.SRV');
        }
    }
}