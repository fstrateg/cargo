<?php

class EditForm
{
    var $L;
    var $id;
    var $note;
    var $own;
    var $usr;
    var $tb_blacklist;

    function __construct()
    {
        cot::$db->registerTable('blacklist');
        global $L,$db_blacklist;
        include_once cot_langfile('blacklist','module');

        $this->L=$L;
        $this->tb_blacklist=$db_blacklist;

    }

    public function init($id)
    {
        $this->id=$id;
    }

    public function import()
    {
        $this->id=cot_import('id','G','NUM');
    }

    public function load()
    {
        global $db;
        $data=$db->query("select * from {$this->tb_blacklist} where id=".$this->id)->fetchObject();
        if ($data)
        {
            $this->usr=$data->usr;
            $this->own=$data->userid;
            $this->note=$data->note;
        }
        else
        {
            cot_die_message(404, TRUE);
        }
    }

    public function canEdit()
    {
        global $usr;
        return $this->own=$usr['id'];
    }

    public function gettags($prefix='')
    {
        $tag=[];
        $tag['ID']=$this->id;
        $tag['TITLE']=$this->id?$this->L['BL_TITLE_EDIT']:$this->L['BL_TITLE_NEW'];
        return $this->addPrefix($tag,$prefix);
    }

    public function generatetags($data, $prefix='')
    {
        if (!is_array($data)&&is_numeric($data))
        {
            global $db;
            $data=$db->query("select * from from {$this->tb_blacklist} where id=$data")->fetchAll();
            if (count($data)>=1)
                $data=$data[0];
        }
        $rez=[
            'NOTE'=>$data['note'],
            'DAT'=>cot_date('d.m.Y h:i',$data['dat']),
            'EDIT'=>cot_url('blacklist','m=edit&id='.$data['id'],'',true),
            'DELETE'=>cot_url('blacklist','m=edit&act=del&id='.$data['id'],'',true),
        ];
        return $this->addPrefix($rez,$prefix);
    }

    private function addPrefix($data,$prefix)
    {
        if (!$prefix) return $data;
        $rez=[];
        foreach($data as $key=>$vl)
        {
            $rez[$prefix.$key]=$vl;
        }
        return $rez;
    }

    public function getList()
    {
        global $db,$usr;
        $rez=$db->query("select * from {$this->tb_blacklist} where userid={$usr['id']}" )->fetchAll();
        return $rez;
    }

    public function addUser()
    {
        global $sys,$usr,$db;
        $data=[];
        $data['usr']=cot_import('ruserid','P','INT');
        $data['note']=cot_import('rnote','P','TXT');
        $data['dat']=$sys['now'];
        $data['userid']=$usr['id'];
        $this->init($data['usr']);
        $db->insert($this->tb_blacklist,$data);
    }

    public function updateUser()
    {
        global $db;
        $data=[
            'note'=>$this->note,
            ];
        $db->update($this->tb_blacklist,$data,'id='.$this->id);
    }

    public function deleteUser()
    {
        global $db;
        $db->delete($this->tb_blacklist,'id='.$this->id);
    }
}

class BL
{
    var $own;
    var $L;
    var $tb_blacklist;
    var $userid;
    var $note;
    var $dat;
    var $id;

    function BL()
    {
        global $usr;
        $this->own=$usr['id'];
        cot::$db->registerTable('blacklist');
        global $L,$db_blacklist;
        include_once cot_langfile('blacklist','module');

        $this->L=$L;
        $this->tb_blacklist=$db_blacklist;
    }

    public function checkUser($userid)
    {
        global $db;
        $rez=$db->query("select * from ".$this->tb_blacklist." where userid=".$this->own." and usr=$userid")->fetchObject();
        if (!$rez) return false;
        $this->userid=$userid;
        $this->note=$rez->note;
        $this->dat=$rez->dat;
        $this->id=$rez->id;
        return true;
    }

    public function addInfo($data)
    {
        $rez=$this->checkUser($data['ID']);
        if ($rez) {
            $data['BL'] = true;
            $data['BLLABEL']=$this->createLablel();
            $data['BLDAT'] = cot_date('d.m.Y h:i',$this->dat);
            $data['BLNOTE']= $this->note;
        }
        else
        {
            $data['BL']=false;
        }
        return $data;
    }

    private function createLablel()
    {
        $text=sprintf($this->L['bl_label'],cot_date('d.m.Y h:i',$this->dat),$this->note);
        $html="<span class=\"label label-inverse\" data-toggle=\"tooltip\" title=\"$text\">BL</span>";
        return $html;
    }
}