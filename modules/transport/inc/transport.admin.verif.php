<?php
defined('COT_CODE') or die('Wrong URL');

$id=cot_import('id','G','INT');
$verif=cot_import('verif','G','INT');


if (isset($verif)) {
    $db->query("update $db_transports set item_verifed=$verif where item_id=$id")->execute();

    $item=$db->query("select * from $db_transports where item_id=".$id)->fetch();
    $status=$item['item_verifed']==1?$L['transport_status_verifed']:$L['transport_status_declane'];
    cot_message(sprintf($L['transport_verif_msg'],$item['item_title'],$status));
    cot_redirect(cot_url('admin','m=transport'));
}
$item=$db->query("select * from $db_transports where item_id=".$id)->fetch();

$t=new XTemplate(cot_tplfile(array('transport','admin','verif')));

$dir=$cfg['root_dir'].DS;
$file=$cfg['scan_dir'].DS.$item['item_userid'].'_'.$item['item_id'].'_scan1.jpg';
if (file_exists($dir.$file))
{
    $t->assign('TRANSPORT_PHOTO1','<img src="'.$file.'">');
}

$file=$cfg['scan_dir'].DS.$item['item_userid'].'_'.$item['item_id'].'_scan2.jpg';
if (file_exists($dir.$file))
{
    $t->assign('TRANSPORT_PHOTO2','<img src="'.$file.'">');
}

$t->assign(
    [
        'TRANSPORT_TITLE'=>$item['item_title'],
        'TRANSPORT_BUTTON_VERIF'=>cot_rc_link(cot_url('admin','&m=transport&a=verif&verif=1&id='.$id,'',true),$L['transport_verife'],['class'=>'btn btn-success']),
        'TRANSPORT_BUTTON_DECLANE'=>cot_rc_link(cot_url('admin','&m=transport&a=verif&verif=0&id='.$id,'',true),$L['transport_verif_declane'],['class'=>'btn btn-danger']),
        'TEST'=>$photo1,
    ]);
$t->parse();

$module_body=$t->text();