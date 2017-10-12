<?php
defined('COT_CODE') or die('Wrong URL');

global $usr,$user;
if ($usr['id']==0)
{
    cot_die_message(404, TRUE);
}

$t=new XTemplate(cot_tplfile('favorites.list'));
cot_display_messages($t);

$t->assign('FV_ADDNEWUSER',cot_url('favorites','m=add','',true));
$bl=new FavorClass();
$items=$bl->getList();
foreach($items as $item)
{
    $t->assign(cot_generate_usertags($item['usr'],'FV_'));
    $t->assign($bl->generatetags($item,'FV_'));
    $t->parse('MAIN.USR_ROW');
}

$t->parse();

$module_body=$t->text();