<?php

defined('COT_CODE') or die('Wrong URL');

$id=cot_import('text','G','NUM');
include_once cot_langfile('favorites','module');

global $db;

$ur=$db->query("Select * from $db_users where user_id=$id")->fetchAll();

$t=new XTemplate(cot_tplfile('favorites.find'));
$rzd='MAIN';
if (count($ur)==0) {
    $rzd = 'EMPTY';
    $t->assign('_FV',$id);
}
else {
    global $cfg,$L;
    $t->assign(cot_generate_usertags($id, 'FV_'));
    $t->assign([
        "FV_NOTE" => cot_textarea('rnote', '', 10, 60, 'id="formtext" '),
        "FV_USERID"=>cot_inputbox('hidden','ruserid',$id),
        "FV_POST"=>cot_inputbox('submit','submit',$L['fv_postuser'],'class="btn btn-success"'),
        "FV_SEND"=>cot_url('favorites','m=add&act=add','',true),
    ]);

}
$t->parse($rzd);
$t->out($rzd);