<?
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$tpl=cot_tplfile('inway','module',true);

$cls=new InwayIList('inway.admin.ilist');

$p=cot_import('p','G','TXT');
if ($p=='del')
{
    $id=cot_import('id','G','INT');
    $item=TbInway::getItem($id);
    $item->delete();
    cot_redirect(cot_url('admin',['m'=>'inway','a'=>'ilist'],'',true));
}

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
            $this->t->assign(cot_generate_usertags($item->owner,'IN_'));
            $this->t->assign('IN_DETAILS',cot_url('inway','m=details&id='.$item->id,'',true));
            $this->t->assign('IN_ONMAP',cot_url('inway',['m'=>'map','id'=>$item->id],'',true));
            $this->t->parse('MAIN.SRV');
        }
        $this->t->assign('DEL_URL',cot_url('admin',['m'=>'inway','a'=>'ilist','p'=>'del'],'',true));
        $this->t->assign([
            'IN_PAGE_ALL'=>true,
            'IN_URL_ALL'=>cot_url('admin',['m'=>'inway','a'=>'ilist']),
            'IN_URL_MOD'=>cot_url('admin',['m'=>'inway','a'=>'ilist','flt'=>'mod']),

        ]);
    }
}