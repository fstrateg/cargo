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
        cot_display_messages($this->t);
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
    var $lat;
    var $long;
    var $cat;
    var $other;
    var $owner;

    var $table_name;

    function TbInway()
    {
        global $db_inway;
        $this->table_name=$db_inway;
    }
    /**
     * @param array $item
     */
    public function load($item)
    {
        $this->id=$item['id'];
        $this->title=$item['title'];
        $this->dat=$item['dat'];
        $this->owner=$item['owner'];
        $this->lat=$item['lat'];
        $this->long=$item['long'];
        $this->desc=$item['desc'];

    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
                'id'=>$this->id,
                'title'=>$this->title,
                'dat'=>$this->dat,
                'owner'=>$this->owner,
                'lat'=>$this->lat,
                'long'=>$this->long,
                'desc'=>$this->desc,
            ];
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

    public static function getItem($id)
    {
        global $db,$db_inway;
        $items=$db->query("Select * from ".$db_inway." where id=$id")->fetchAll();
        if (!$items) cot_die_message(404);
        $item=new TbInway();
        $item->load($items[0]);
        return $item;
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
            'OTHERS'=>cot_inputbox('text','rother','','id="val_other"').cot_inputbox('hidden','rothers',$this->other,'id="list_other"'),
            'DSC'=>cot_textarea('rdsc',$this->desc,10,70),
            'LAT'=>cot_inputbox('hidden','rlat',$this->lat),
            'LONG'=>cot_inputbox('hidden','rlong',$this->long),
        ];
        $rez=array();
        foreach($tmp as $key=>$vl)
        {
            $rez[$prefix.$key]=$vl;
        }
        return $rez;

    }

    public static function loadPost()
    {
        $vl=new TbInway();
        $vl->title=cot_import('rtitle','P','TXT');
        $vl->cat=cot_import('rcat','P','INT');
        $vl->desc=cot_import('rdsc','P','TXT');
        $vl->lat=cot_import('rlat','P','NUM');
        $vl->long=cot_import('rlong','P','NUM');
        return $vl;
    }

    public function validate()
    {
        global $L;
        cot_check(empty($this->title),$L['inway_empty_title'],'rtitle');
        cot_check(empty($this->cat),$L['inway_empty_cat'],'rcat');
        //TODO добавить проверку на дополнительное поле
        cot_check(empty($this->desc),$L['inway_empty_desc'],'rdesc');

        return !cot_error_found();

    }

    public function add()
    {
        global $sys,$db,$usr;
        $this->dat=$sys["now"];
        $this->owner=$usr["id"];
        $db->insert($this->table_name,$this->toArray());
    }

    public function edit()
    {
        global $db;
        $db->update($this->table_name,$this->toArray(),'id='.$this->id);

    }

    public function delete()
    {
        global $db;
        $db->delete($this->table_name,'id='.$this->id);
    }
}