<?php

defined('COT_CODE') or die('Wrong URL');

$id=cot_import('text','G','NUM');
include_once cot_langfile('blacklist','module');

global $db;

$ur=$db->query("Select * from $db_users where user_id=$id")->fetchAll();

$t=new XTemplate(cot_tplfile('blacklist.find'));
$rzd='MAIN';
if (count($ur)==0) {
    $rzd = 'EMPTY';
    $t->assign('BL_ID',$id);
}
else {
    global $cfg,$L;
    $prjeditor = $cfg['projects']['prjeditor'];
    $t->assign(cot_generate_usertags($id, 'BL_'));
    $t->assign([
        "BL_NOTE" => cot_textarea('rnote', '', 10, 60, 'id="formtext" '),
        "BL_USERID"=>cot_inputbox('hidden','ruserid',$id),
        "BL_POST"=>cot_inputbox('submit','submit',$L['bl_postuser'],'class="btn btn-success"'),
        "BL_SEND"=>cot_url('blacklist','m=add&act=add','',true),
    ]);

}
$t->parse($rzd);
$t->out($rzd);