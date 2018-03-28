<?
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$cls=new InwayIList('inway.admin.ilist');

$p=cot_import('p','G','TXT');
if ($p=='del')
{
    $id=cot_import('id','G','INT');
    $item=TbInway::getItem($id);
    $item->delete();
    cot_redirect(cot_url('admin',['m'=>'inway','a'=>'ilist'],'',true));
}
if ($p=='mod')
{
    $id=cot_import('id','G','INT');
    $item=TbInway::getItem($id);
    $item->approval();
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

        $flt=cot_import('flt','G','ALP');
        if (empty($flt))
        {
            $this->t->assign('IN_PAGE_ALL',true);
            $ss=TbInway::getListWhere("");
            $this->t->assign('IN_ALL_COUNT',count($ss));
            $this->t->assign('IN_MOD_COUNT',TbInway::getCountWhere("isnew='Y'"));
            $this->t->assign('IN_REQ_COUNT',TbInway::getCountWhere("req>0"));
        }
        elseif($flt=='mod')
        {
            $this->t->assign('IN_PAGE_MOD',true);
            $ss=TbInway::getListWhere("isnew='Y'");
            $this->t->assign('IN_ALL_COUNT',TbInway::getCountWhere());
            $this->t->assign('IN_MOD_COUNT',count($ss));
            $this->t->assign('IN_REQ_COUNT',TbInway::getCountWhere("req>0"));
        }
        elseif($flt=='req')
        {
            $this->t->assign('IN_PAGE_REQ',true);
            $ss=TbInway::getListWhere("req>0");
            $this->t->assign('IN_ALL_COUNT',TbInway::getCountWhere());
            $this->t->assign('IN_MOD_COUNT',TbInway::getCountWhere("isnew='Y'"));
            $this->t->assign('IN_REQ_COUNT',count($ss));
        }
        /** @var TbInway $item */

        foreach($ss as $item)
        {
            $this->t->assign($item->getTags('IN_'));
            $this->t->assign(cot_generate_usertags($item->owner,'IN_USR_'));
            $this->t->assign('IN_DETAILS',cot_url('inway','m=details&id='.$item->id,'',true));
            $this->t->assign('IN_ONMAP',cot_url('inway',['m'=>'map','id'=>$item->id],'',true));
            $this->t->assign('REQ_URL',cot_url('admin',['m'=>'inway','a'=>'reqs','id'=>$item->id],'',true));
            $this->t->parse('MAIN.SRV');
        }
        $this->t->assign('DEL_URL',cot_url('admin',['m'=>'inway','a'=>'ilist','p'=>'del'],'',true));
        $this->t->assign('MOD_URL',cot_url('admin',['m'=>'inway','a'=>'ilist','p'=>'mod'],'',true));
        $this->t->assign([
            'IN_URL_ALL'=>cot_url('admin',['m'=>'inway','a'=>'ilist']),
            'IN_URL_MOD'=>cot_url('admin',['m'=>'inway','a'=>'ilist','flt'=>'mod']),
            'IN_URL_REQ'=>cot_url('admin',['m'=>'inway','a'=>'ilist','flt'=>'req']),
        ]);
    }
}