<?php
defined('COT_CODE') or die('Wrong URL');

cot::$db->registerTable('inway');
cot::$db->registerTable('inway_cat');
cot::$db->registerTable('inway_comments');

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
    var $lat=43.2246925;
    var $long=76.8412974;
    var $isnew;
    var $cat;
    var $cat_name;
    var $other;
    var $owner;
    var $stars;
    var $cnt;
    var $req;

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
        $this->cat=$item['cat'];
        $this->stars=$item['stars'];
        $this->cnt=$item['cnt'];
        $this->other=$item['other'];
        $this->isnew=$item['isnew'];
        $this->req=$item['req'];
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
                'cat'=>$this->cat,
                'stars'=>$this->stars,
                'cnt'=>$this->cnt,
                'other'=>$this->other,
            ];
    }

    public static function getList($type=0)
    {
        $usl=empty($type)?'':'cat='.$type;
        return self::getListWhere($usl);
    }

    public static function getListWhere($where='')
    {
        global $db,$db_inway;
        $sql=empty($where)?'':" where $where";

        $rez=array();
        $items=$db->query("Select * from ".$db_inway.$sql." order by dat desc")->fetchAll();
        foreach ($items as $item) {
            $vl=new TbInway();
            $vl->load($item);
            $rez[]=$vl;
        }
        return $rez;
    }

    public static function getCountWhere($where='')
    {
        global $db,$db_inway;
        $sql=empty($where)?'':" where $where";
        return $db->query("select count(*) from $db_inway".$sql)->fetchColumn();
    }

    public static function getItem($id)
    {
        global $db,$db_inway;
        $items=$db->query("Select * from ".$db_inway." where id=$id")->fetchAll();
        if (!$items) cot_die_message(404);
        $item=new TbInway();
        $item->load($items[0]);
        $item->getCatName();
        return $item;
    }

    public function getCatName()
    {
        global $db,$db_inway_cat;
        $item=$db->query('Select name,other from '.$db_inway_cat.' where id='.$this->cat)->fetchAll();
        if ($item)
        {
            $this->cat_name=empty($item[0]['other'])?$item[0]['name']:$this->other;
        }

    }

    public static function getCategory()
    {
        global $db,$db_inway,$db_inway_cat;
        $sql="Select b.id,b.name,count(a.id) cnt
from $db_inway_cat b left join $db_inway a
on (a.cat=b.id)
group by b.id,b.name
order by b.order";
        $rez=$db->query($sql)->fetchAll();
        return $rez;
    }

    public function getTagForm($prefix='')
    {
        $tmp=$this->getTags('');
        $tmp['DSC']=cot_textarea('rdsc',$this->desc,10,70,['class'=>'form-control']);
        $tmp['TITLE']=cot_inputbox('text','rtitle',$this->title,['class'=>'form-control']);
        $tmp['ID']=cot_inputbox('hidden','rid',$this->id);
        $rez=array();
        foreach($tmp as $key=>$vl)
        {
            $rez[$prefix.$key]=$vl;
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
            'ID'=>$this->id,
            'TITLE'=>$this->title,
            'DAT'=>cot_date('d.m.Y',$this->dat),
            'DSC'=>$this->desc,
            'LAT'=>cot_inputbox('hidden','rlat',$this->lat),
            'LONG'=>cot_inputbox('hidden','rlong',$this->long),
            'NAME'=>cot_inputbox('hidden','rname',$this->title),
            'OWNER'=>$this->owner,
            'STARS'=>$this->stars*20,
            'CNT'=>$this->cnt,
            'ISNEW'=>($this->isnew=='Y'),
            'REQ'=>$this->req,
        ];
        if ($this->cat_name)
        {
            $tmp['CAT_NAME']=$this->cat_name;
        }
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
        $vl->id=cot_import('rid','P','INT');
        $vl->title=cot_import('rtitle','P','TXT');
        $vl->cat=cot_import('rcat','P','INT');
        $vl->desc=cot_import('rdsc','P','TXT');
        $vl->lat=cot_import('rlat','P','NUM');
        $vl->long=cot_import('rlong','P','NUM');
        $vl->other=cot_import('rother','P','TXT');
        return $vl;
    }

    public static function refreshReviews($id)
    {
        global $db,$db_inway_comments,$db_inway;
        $rz=$db->query("Select avg(stars) stars,count(stars) cnt from $db_inway_comments where inway_id=$id")->fetchObject();
        $db->query("update $db_inway set stars=".$rz->stars.",cnt=".$rz->cnt." Where id=".$id)->execute();
    }

    public function validate()
    {
        global $L;
        cot_check(empty($this->title),$L['inway_empty_title'],'rtitle');
        cot_check(empty($this->cat),$L['inway_empty_cat'],'rcat');
        if ($this->cat)
        {
            $cat=TbCat::getItem($this->cat);
            if ($cat->other>0) cot_check(empty($this->other),$L['inway_empty_cat'],'rcat');
        }
        cot_check(empty($this->desc),$L['inway_empty_desc'],'rdesc');

        return !cot_error_found();

    }

    public function add()
    {
        global $sys,$db,$usr;
        $this->dat=$sys["now"];
        $this->owner=$usr["id"];
        $db->insert($this->table_name,$this->toArray());
        $this->id=$db->lastInsertId();
    }

    public function edit()
    {
        global $db;
        $db->update($this->table_name,$this->toArray(),'id='.$this->id);

    }

    public function delete()
    {
        global $db;
        try {
            $db->beginTransaction();
            TbComment::deleteAllForId($this->id);
            $db->delete($this->table_name, 'id=' . $this->id);
            $db->commit();
        }
        catch (Exception $e)
        {
            $db->rollBack();
            cot_error($e->getMessage(),$e->getTraceAsString());
        }
    }

    public function newrequest()
    {
        global $db, $usr;
        $db->update($this->table_name,['req'=>$usr['id']],'id='.$this->id);
    }

    public function removerequest()
    {
        global $db, $usr;
        $db->update($this->table_name,['req'=>0],'id='.$this->id);
    }

    public function appr_request()
    {
        global $db, $usr;
        $db->update($this->table_name,['owner'=>$this->req, 'req'=>0],'id='.$this->id);
    }

    public function approval()
    {
        global $db;
        $db->update($this->table_name,['isnew'=>'N'],'id='.$this->id);
    }
}

class TbComment
{
    var $id;
    var $dat;
    var $created;
    var $stars;
    var $note;
    var $userid;
    var $reply;
    var $inway_id;
    var $isnew;

    public static function getListForID($id)
    {
        global $db,$db_inway_comments;
        $rz=$db->query("select * from $db_inway_comments where inway_id=$id and reply=0 order by created desc");
        return TbComment::cursorToList($rz);
    }

    public static function getListWhere($where='')
    {
        global $db,$db_inway_comments;
        $sql=empty($where)?'':" where $where";
        $rz=$db->query("select * from $db_inway_comments $sql order by created desc");
        return TbComment::cursorToList($rz);
    }

    public static function getCountWhere($where='')
    {
        global $db,$db_inway_comments;
        $sql=empty($where)?'':" where $where";
        return $db->query("select count(*) from $db_inway_comments $sql order by created desc")->fetchColumn();
    }

    public static function getListForComment($id)
    {
        global $db,$db_inway_comments;
        $rz=$db->query("select * from $db_inway_comments where reply=$id order by created desc");
        return TbComment::cursorToList($rz);
    }

    public static function getListTop($top,$type=0)
    {
        global $db,$db_inway_comments,$db_inway;
        $sql="select * from $db_inway_comments order by created DESC limit $top";
        if (!empty($type))
            $sql="select a.*,b.cat from $db_inway_comments a, $db_inway b where b.id=a.inway_id and b.cat=$type order by a.created DESC limit $top";

        $rz=$db->query($sql);
        return TbComment::cursorToList($rz);
    }

    public static function deleteAllForId($id)
    {
        global  $db,$db_inway_comments;
        $sql="delete from $db_inway_comments where inway_id=$id";
        $db->query($sql)->execute();
    }

    private static function cursorToList($c)
    {
        $rez=array();
        while ($arr=$c->fetch())
        {
            $item=new TbComment();
            $item->loadFromArray($arr);
            $rez[]=$item;
        }
        return $rez;
    }

    public static function moderate($id)
    {
        global  $db,$db_inway_comments;
        $sql="update $db_inway_comments set isnew='N' where id=$id";
        $db->query($sql)->execute();
    }

    public static function delete($id)
    {
        global  $db,$db_inway_comments;
        $sql="delete from $db_inway_comments where id=$id";
        $db->query($sql)->execute();
    }

    public function getTags($pref='')
    {
        $tmp=[
            'STARS'=>$this->stars*20,
            'DAT'=>$this->dat,
            'NOTE'=>$this->note,
            'CREATED'=>cot_date('d.m.y h:i',$this->created),
            'ISNEW'=>$this->isnew,
            'ID'=>$this->id,
        ];
        if (!$pref) return $tmp;
        $rez=array();
        foreach($tmp as $key=>$vl)
            $rez[$pref.$key]=$vl;
        return $rez;
    }
    public function loadFromArray($arr)
    {
        $this->id=$arr['id'];
        $this->dat=$arr['dat'];
        $this->stars=$arr['stars'];
        $this->note=$arr['note'];
        $this->created=$arr['created'];
        $this->userid=$arr['userid'];
        $this->reply=$arr['reply'];
        $this->isnew=$arr['isnew'];
    }

    public function loadFromPost()
    {
        global $usr,$sys;
        $this->id=cot_import('rid','P','INT');
        $this->dat=cot_import('rdat','P','TXT');
        $this->note=cot_import('rnote','P','TXT');
        $this->stars=cot_import('rstars','P','INT');
        $this->userid=$usr['id'];
        $this->created=$sys['now'];
        $this->inway_id=1; cot_import('rinway_id','P','INT');
    }

    private function toArray()
    {
        return [
            'ID'=>$this->id,
            'DAT'=>$this->dat,
            'STARS'=>$this->stars,
            'NOTE'=>$this->note,
            'USERID'=>$this->userid,
            'CREATED'=>$this->created,
            'INWAY_ID'=>$this->inway_id,
            'REPLY'=>$this->reply

        ];
    }

    public function add()
    {
        global $db_inway_comments;
        cot::$db->insert($db_inway_comments,$this->toArray());
        TbInway::refreshReviews($this->inway_id);
    }

}

class TbCat{
    var $id;
    var $name;
    var $other;
    var $order;

    public function load($item)
    {
        $this->id=$item['id'];
        $this->name=$item['name'];
        $this->other=$item['other'];
        $this->order=$item['order'];
    }

    public static function getItem($id)
    {
        global $db,$db_inway_cat;
        $items=$db->query("Select * from ".$db_inway_cat." where id=$id")->fetchAll();
        $rez=new TbCat();
        $rez->load($items[0]);
        return $rez;
    }
}