<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayAdd('inway.add');
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
        $this->t->assign(
            [
                'ADD_TITLE'=>cot_inputbox('text','rtitle',$this->value->title),
                'ADD_CAT'=>$this->createCat(),
                'ADD_OTHERS'=>cot_inputbox('text','rother','','id="val_other"').cot_inputbox('hidden','rothers',$this->others,'id="list_other"'),
                'ADD_DSC'=>cot_textarea('rdsc',$this->value,10,70),
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
        $html=cot_selectbox($this->value->cat,'rtype',$values,$titles);
        return $html;
    }

}