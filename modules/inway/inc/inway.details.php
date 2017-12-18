<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayDetails('inway.details');
$cls->init();
$module_body=$cls->createPage();

class InwayDetails extends InwayBase
{
    /**
     * @var TbInway
     */
    var $value;
    public function init()
    {
        $id=cot_import('id','G','INT');
        $this->value=TbInway::getItem($id);
    }

    public function prepare()
    {
        global $cfg;
        cot_rc_add_file($cfg['modules_dir'].'/inway/js/inway.show.js');
        cot_rc_add_file('http://maps.googleapis.com/maps/api/js?key=AIzaSyCwrTqZZepbfT_JwP5GJKaZH1MfR2afYR0&amp;libraries=places');
        parent::prepare();
    }

    public function addTags()
    {
        global $usr,$L;
        $this->t->assign($this->value->getTags('FRM_'));
        $btn=array();
        if ($usr['id']==$this->value->owner)
        {
            // edit
            $btn['FRM_RTITLE']=$L['Edit'];
            $btn['FRM_RURL']=cot_url('inway',['m'=>'add','id'=>$this->value->id],'',true);
        }
        else
        {
            // claim
            $btn['FRM_RTITLE']=$L['inway_claim'];
            $btn['FRM_RURL']=cot_url('inway',['m'=>'claim','id'=>$this->value->id],'',true);
        }
        $this->t->assign($btn);
    }

}