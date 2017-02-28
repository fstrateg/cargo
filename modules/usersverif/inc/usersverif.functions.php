<?php
defined('COT_CODE') or die('Wrong URL.');

include_once cot_langfile('usersverif','module');

cot::$db->registerTable('userverif'); // таблица создавалась для плагина

function get_usersverif($prefix='')
{
    global $db,$db_userverif,$L,$cfg;
    $temp_data=$db->query("Select * from $db_userverif where pas_status=2 or cert_status=2")->fetchAll();
    $tag_data=array();
    $i=0;
    foreach ($temp_data as $item)
    {
        $tmp_arr=[];
        $tmp_arr['NUM']=$i++;
        $tmp_arr['USERID']=$item['userid'];
        $tmp_arr['FIZ']=$item['fiz']==0?$L['usersverif_fiz']:$L['usersverif_ur'];
        $tmp_arr['DAT']=cot_date('d.m.Y H:i', $item['dat']);
        $tmp_arr['TAXNUMBER']=$item['tax_number'];

        $tmp_arr['AC_PS']=cot_url('admin',['m'=>'usersverif','a'=>'accept','d'=>1,'u'=>$item['userid']],'',true);
        $tmp_arr['RJ_PS']=cot_url('admin',['m'=>'usersverif','a'=>'reject','d'=>1,'u'=>$item['userid']],'',true);
        $tmp_arr['AC_SV']=cot_url('admin',['m'=>'usersverif','a'=>'accept','d'=>2,'u'=>$item['userid']],'',true);
        $tmp_arr['RJ_SV']=cot_url('admin',['m'=>'usersverif','a'=>'reject','d'=>2,'u'=>$item['userid']],'',true);

        $tmp_arr['PAS_STATUS']=$item['pas_status'];
        $tmp_arr['CERT_STATUS']=$item['cert_status'];

        $url=$cfg['photos_dir']."/".$item['userid']."_pass_ver_".$item['salt'].".jpg";
        if (file_exists($url))
            $tmp_arr['PASSURL']=$url;
        else
            $tmp_arr['PASSURL']='';
        $url=$cfg['photos_dir']."/".$item['userid']."_svid_ver_".$item['salt'].".jpg";
        if (file_exists($url))
            $tmp_arr['SVURL']=$url;
        else
            $tmp_arr['PASSURL']='';

        $tag=[];
        foreach($tmp_arr as $key => $vl)
        {
            $tag[$prefix.$key]=$vl;
        }
        $tag_data[]=$tag;
    }

    return $tag_data;
}

function get_userinfo($user_id,$prefix='')
{
    global $db,$db_users;
    $userdata=$db->query("select * from $db_users where user_id=$user_id")->fetchAll();
    $rez=cot_generate_usertags($userdata[0], $prefix);
    return $rez;
}

function cot_uver_accept($u,$d)
{
    cot_uver_update($u,$d,1);
}

function cot_uver_reject($u,$d)
{
    cot_uver_update($u,$d,3);
}

function cot_uver_update($u,$d,$s)
{
    global $db,$db_userverif;
    $q='';
    if ($d==1) $q="pas_status=$s";
    if ($d==2) $q="cert_status=$s";
    if ($q) $db->query("update $db_userverif set $q where user_id=$u")->execute();
}