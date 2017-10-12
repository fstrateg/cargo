<?php
defined('COT_CODE') or die('Wrong URL');
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}
$act=cot_import('act','G','TXT');
$fv=new FavorClass();
if ($act=='edit')
{
    $id=cot_import('ritem','P','INT');
    $fv->init($id);
    $fv->note=cot_import('rnote','P','TXT');
    $fv->updateUser();
    cot_message($L['fv_ok']);
    cot_redirect(cot_url('favorites'));
}

$fv->import();
$fv->load();
if (!$fv->canEdit()) cot_die_message(404, TRUE);

if($act=='del')
{
    $fv->deleteUser();
    cot_message($L['fv_ok']);
    cot_redirect(cot_url('favorites'));
}



$t=new XTemplate(cot_tplfile('favorites.edit'));
$t->assign($fv->gettags('FV_'));
$t->assign(cot_generate_usertags($fv->usr, 'FV_'));
$t->assign([
    'FV_SEND'=>cot_url('favorites','m=edit&act=edit','',true),
    'FV_NOTE'=>cot_textarea('rnote', $fv->note, 10, 60, 'id="formtext" '),
    'FV_POST'=>cot_inputbox('submit','submit',$L['fv_postuser'],'class="btn btn-success"'),
    'FV_ITEMID'=>cot_inputbox('hidden','ritem',$fv->id)
]);
$t->parse();
$module_body=$t->text();