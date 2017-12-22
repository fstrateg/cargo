<?php
defined('COT_CODE') or die('Wrong URL');

global $usr;
cot_block($usr['id']);

$id=cot_import('id','G','INT');

$cls=new InwayAdd('inway.add');

if ($a!=null)
{
    $cls->loadFromPost();
    if ($cls->validate())
    {
        $cls->save($a);
        cot_redirect(cot_url('inway','m=details&id='.$cls->value->id,'',true));
    }
}
if ($id)
{
    $cls->load($id);
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
        if (!$this->value) $this->value=new TbInway();
        $oper=$this->value->id?'edit':'add';
        $this->t->assign($this->value->getTagForm('FRM_'));
        $this->t->assign(
            [
                'FRM_CAT'=>$this->createCat(),
                'FRM_ADDURL'=>cot_url('inway','m=add&a='.$oper,'',true),
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
        $html.=cot_inputbox('text','rother',$this->value->other,'id="val_other"');
        $html.=cot_inputbox('hidden','rothers',$this->others,'id="list_other"');

        return $html;
    }

    public function load($id)
    {
        global $usr;
        $this->value=TbInway::getItem($id);
        if ($this->value->owner!=$usr['id']) cot_die_message(404);
    }

    public function loadFromPost()
    {
        $this->value=TbInway::loadPost();
    }

    public function validate()
    {
        return $this->value->validate();
    }

    public function save($act)
    {
        if ($act=='add')  $this->value->add();
        if ($act=='edit') $this->value->edit();
    }
}