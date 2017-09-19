<?php

class EditForm
{
    var $L;
    var $id;
    var $tb_blacklist;

    function __construct()
    {
        cot::$db->registerTable('blacklist');
        global $L,$db_blacklist;
        include_once cot_langfile('blacklist','module');

        $this->L=$L;
        $this->tb_blacklist=$db_blacklist;

    }

    public function import()
    {
        $this->id=cot_import('id','G','NUM');
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
            'DAT'=>cot_date('d.m.Y h:i',$data['dat'])
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
}