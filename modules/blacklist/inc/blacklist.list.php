<?php
defined('COT_CODE') or die('Wrong URL');

global $usr,$user;
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}

$t=new XTemplate(cot_tplfile('blacklist.list'));

$t->assign('BL_ADDNEWUSER',cot_url('blacklsit','m=edit&id=-1','',true));
$bl=new EditForm();
$items=$bl->getList();
foreach($items as $item)
{
    $t->assign(cot_generate_usertags($item['userid'],'BL_'));
    $t->assign($bl->generatetags($item,'BL_'));
    $t->parse('MAIN.USR_ROW');
}

$t->parse();

$module_body=$t->text();