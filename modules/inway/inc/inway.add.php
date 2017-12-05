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

    public function addTags()
    {
        $this->t->assign('ADD_TITLE',cot_inputbox('text','rtitle',$this->value->title));
        $this->t->assign('ADD_CAT',$this->createCat());
        $this->t->assign('ADD_DSC',cot_textarea('rdsc',$this->value,10,70));
    }

    private function createCat()
    {
        global $db,$db_inway_cat;
        $rez=$db->query("select a.id,a.name from $db_inway_cat a order by a.order");
        $values=array();
        $titles=array();
        while($item=$rez->fetch())
        {
            $values[]=$item['id'];
            $titles[]=$item['name'];
        }
        $html=cot_selectbox($this->value->cat,'rtype',$values,$titles);
        return $html;
    }

}