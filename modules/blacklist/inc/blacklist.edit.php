<?php
defined('COT_CODE') or die('Wrong URL');
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}
$act=cot_import('act','G','TXT');
$bl=new EditForm();
if ($act=='edit')
{
    $id=cot_import('ritem','P','INT');
    $bl->init($id);
    $bl->note=cot_import('rnote','P','TXT');
    $bl->updateUser();
    cot_message($L['bl_ok']);
    cot_redirect(cot_url('blacklist'));
}

$bl->import();
$bl->load();
if (!$bl->canEdit()) cot_die_message(404, TRUE);

if($act=='del')
{
    $bl->deleteUser();
    cot_message($L['bl_ok']);
    cot_redirect(cot_url('blacklist'));
}



$t=new XTemplate(cot_tplfile('blacklist.edit'));
$t->assign($bl->gettags('BL_'));
$t->assign(cot_generate_usertags($bl->usr, 'BL_'));
$t->assign([
    'BL_SEND'=>cot_url('blacklist','m=edit&act=edit','',true),
    'BL_NOTE'=>cot_textarea('rnote', $bl->note, 10, 60, 'id="formtext" '),
    'BL_POST'=>cot_inputbox('submit','submit',$L['bl_postuser'],'class="btn btn-success"'),
    'BL_ITEMID'=>cot_inputbox('hidden','ritem',$bl->id)
]);
$t->parse();
$module_body=$t->text();