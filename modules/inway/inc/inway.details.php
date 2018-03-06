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
        cot_rc_add_file("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");
        cot_rc_add_file('js/jquery-ui.min.js');
        cot_rc_add_file('js/jquery-ui.min.css');
        cot_rc_add_file('http://maps.googleapis.com/maps/api/js?key=AIzaSyCwrTqZZepbfT_JwP5GJKaZH1MfR2afYR0&amp;libraries=places');
        parent::prepare();
    }

    public function addTags()
    {
        global $usr,$L;
        $this->t->assign($this->value->getTags('FRM_IN_'));
        $btn=array();
        if ($usr['id']==$this->value->owner)
        {
            // edit
            $btn['FRM_IN_RTITLE']=$L['Edit'];
            $btn['FRM_IN_RURL']=cot_url('inway',['m'=>'add','id'=>$this->value->id],'',true);
        }
        else
        {
            // claim
            $btn['FRM_IN_RTITLE']=$L['inway_claim'];
            $btn['FRM_IN_RURL']=cot_url('inway',['m'=>'claim','id'=>$this->value->id],'',true);
        }
        $this->t->assign($btn);
        $this->t->assign('FRM_IN_COMURL',cot_url('inway',['m'=>'comment','a'=>'form','id'=>$this->value->id],'',true));
        $this->outComments();
    }

    private function outComments()
    {
        $cm=TbComment::getListForID($this->value->id);
        foreach($cm as $item)
        {
            $rp=TbComment::getListForComment($item->id);
            foreach($rp as $ritem)
            {
                $this->t->assign(cot_generate_usertags($ritem->userid, 'FRM_'));
                $this->t->assign($ritem->getTags('FRM_'));
                $this->t->parse('MAIN.COMMENT.REPLY');
            }
            $this->t->assign('FRM_NUM',$item->id);
            $this->t->assign('FRM_REPURL',cot_url('inway',['m'=>'comment','a'=>'reply','id'=>$this->value->id,'rep'=>$item->id],'',true));
            $this->t->assign($item->getTags('FRM_'));
            $this->t->assign(cot_generate_usertags($item->userid, 'FRM_'));
            $this->t->parse('MAIN.COMMENT');

        }

    }

}