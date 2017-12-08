<?php
defined('COT_CODE') or die('Wrong URL');

global $usr;
cot_block($usr['id']);

$cls=new InwayAdd('inway.add');

if ($a!=null)
{
    $cls->loadFromPost();
    if ($cls->validate())
    {
        $cls->save();
        cot_redirect(cot_url('inway'));
    }
}

$module_body=$cls->createPage();

class InwayAdd extends InwayBase
{
    /**
     * @var TbInway
     */
    var $value;
    var $others;

    public function addTags()
    {
        $this->t->assign($this->value->getTags('FRM'));
        $this->t->assign(
            [
                'FRM_CAT'=>$this->createCat(),
                'FRM_ADDURL'=>cot_url('inway','m=add&a=add','',true),
            ]);
    }

    public function prepare()
    {
        global $cfg;
        cot_rc_add_file($cfg['modules_dir'].'/inway/js/inway.js');
        cot_rc_add_file('http://maps.googleapis.com/maps/api/js?key=AIzaSyCwrTqZZepbfT_JwP5GJKaZH1MfR2afYR0&amp;libraries=places');
        parent::prepare();
    }

    private function createCat()
    {
        global $db,$db_inway_cat;
        $rez=$db->query("select a.id,a.name,a.other from $db_inway_cat a order by a.order");
        $values=array();
        $titles=array();
        $others=array();
        while($item=$rez->fetch())
        {
            $values[]=$item['id'];
            $titles[]=$item['name'];
            if ($item['other'])
            {
                $others[]=$item['id'];
            }
        }
        $this->others=implode(',',$others);
        $html=cot_selectbox($this->value->cat,'rcat',$values,$titles);
        return $html;
    }
    public function loadFromPost()
    {
        $this->value=TbInway::loadPost();
    }

    public function validate()
    {
        return $this->value->validate();
    }

    public function save()
    {
        $this->value->add();
    }
}