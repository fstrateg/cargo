<?php

defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');

cot_block($usr['auth_read']);

global $L,$db;

$mskin = cot_tplfile(array('transport', 'verif'));

$out['subtitle'] = $L['transport_verif'];

$id=cot_import('id','G','INT');
$userid=$usr['id'];

$wherecount="WHERE item_id=$id AND item_userid=$userid";
$sql_transp = $db->query("SELECT * FROM $db_transports as p " . $wherecount);
$tr=$sql_transp->fetch();
if (isset($_FILES["photo1"])|isset($_FILES["photo2"]))
{
    if ($_FILES['photo1']['size']>0|$_FILES['photo2']['size']>0)
    {
        cot_transport_loaddocs($userid,$id);
        cot_redirect(cot_url('users',['m'=>'details','id'=>$userid,'tab'=>'transport'],'',true));
    }
}


$verifed=($tr['item_verifed']==1)?'verifed':'no-verifed';

$t=new XTemplate($mskin);
cot_display_messages($t);
$t->assign(
    [
        'TRANSP_ITEM_TITLE'=>$tr['item_title'],
        'TRANSP_VERNAME'=>$L['transport_status_'.$verifed],
        'TRANSP_VERIFED'=>'/images/'.$verifed.'.png',
        'TRANSP_PHOTO1'=>cot_inputbox('file','photo1'),
        'TRANSP_PHOTO2'=>cot_inputbox('file','photo2'),
        'TRANSP_ACTION_URL'=>cot_url('transport','m=verif&id='.$id),
        'TRANSP_FILESIZE_LIMIT'=>cot_inputbox('hidden','MAX_FILE_SIZE','3140000'),
        'TEST'=>print_r($_FILES,true),
        'TEST2'=>'',
    ]
);
$t->parse();
$module_body = $t->text();