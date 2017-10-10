<?php
defined('COT_CODE') or die('Wrong URL');
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}

$act=cot_import('act','G','TXT');
$t=new XTemplate(cot_tplfile('blacklist.add'));
$bl=new EditForm();
if ($act)
{
    $bl->addUser();
    cot_message($L['bl_ok']);
    cot_redirect(cot_url('blacklist'));
}

$t->assign($bl->gettags('BL_'));
$t->assign('BL_FIND',cot_inputbox('number','ridfind','','id="idfind"'));
$t->assign('BL_FIND_URL',cot_url('blacklist','m=find','',true));

$t->parse();
$module_body=$t->text();