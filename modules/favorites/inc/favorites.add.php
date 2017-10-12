<?php
defined('COT_CODE') or die('Wrong URL');
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}

$act=cot_import('act','G','TXT');
$t=new XTemplate(cot_tplfile('favorites.add'));
$ls=new FavorClass();
if ($act)
{
    $ls->addUser();
    cot_message($L['fv_ok']);
    cot_redirect(cot_url('favorites'));
}

$t->assign($ls->gettags('FV_'));
$t->assign('FV_FIND',cot_inputbox('number','ridfind','','id="idfind"'));
$t->assign('FV_FIND_URL',cot_url('favorites','m=find','',true));

$t->parse();
$module_body=$t->text();