<?php
defined('COT_CODE') or die('Wrong URL');

cot::$db->registerTable('inway');
cot::$db->registerTable('inway_cat');

class InwayBase
{
    /**
     * @var XTemplate $t
     */
    var $t;
    function __construct($tmpl)
    {
        $this->t=new XTemplate(cot_tplfile($tmpl));
    }

    public function addTags()
    {

    }

    public function prepare()
    {
        $this->addTags();
    }

    public function createPage()
    {
        $this->prepare();
        $this->t->parse();
        return $this->t->text();
    }
}

class TbInway
{
    var $id;
    var $title;
    var $desc;
    var $dat;
    var $cat;
    /**
     * @param array $item
     */
    public function load($item)
    {
        $this->id=$item['id'];
        $this->title=$item['title'];
        $this->dat=$item['dat'];

    }

    public static function getList()
    {
        global $db,$db_inway;
        $rez=array();
        $items=$db->query("Select * from ".$db_inway." order by dat desc")->fetchAll();
        foreach ($items as $item) {
            $vl=new TbInway();
            $vl->load($item);
            $rez[]=$vl;
        }
        return $rez;
    }

    /**
     * @param TbInway $item
     * @param string $prefix
     * @return array
     */
    public function getTags($prefix='')
    {
        $tmp=[
            'TITLE'=>$this->title,
            'DAT'=>cot_date('d.m.Y',$this->dat),
        ];
        $rez=array();
        foreach($tmp as $key=>$vl)
        {
            $rez[$prefix.$key]=$vl;
        }
        return $rez;

    }
}