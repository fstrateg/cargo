<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayMap('inway.map');

$module_body=$cls->createPage();


class InwayMap extends InwayBase
{
    /**
     * @var TbInway $value
     */
    var $value=null;
    var $id=0;
    public function __construct($tmpl)
    {
        $this->id=cot_import('id','G','INT');
        if ($this->id)
            $this->value=TbInway::getItem($this->id);
        parent::__construct($tmpl);
    }

    public function addTags()
    {
        if ($this->id)
            $this->t->assign($this->value->getTags('FRM_'));
        $this->t->assign('FRM_URL_DATA',cot_url('inway',['m'=>'data','id'=>$this->id],'',true));
         parent::addTags();
    }

    public function prepare()
    {
        global $cfg;
        Resources::addFile($cfg['modules_dir'].'/inway/js/inway.show.js');
        Resources::addFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyCwrTqZZepbfT_JwP5GJKaZH1MfR2afYR0&amp;libraries=places');
        parent::prepare();
    }
}