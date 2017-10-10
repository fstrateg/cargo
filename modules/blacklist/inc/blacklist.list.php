<?php
defined('COT_CODE') or die('Wrong URL');

global $usr,$user;
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}

$t=new XTemplate(cot_tplfile('blacklist.list'));
cot_display_messages($t);

$t->assign('BL_ADDNEWUSER',cot_url('blacklist','m=add','',true));
$bl=new EditForm();
$items=$bl->getList();
foreach($items as $item)
{
    $t->assign(cot_generate_usertags($item['usr'],'BL_'));
    $t->assign($bl->generatetags($item,'BL_'));
    $t->parse('MAIN.USR_ROW');
}

$t->parse();

$module_body=$t->text();