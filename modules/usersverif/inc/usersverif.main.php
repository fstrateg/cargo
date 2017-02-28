<?php
defined('COT_CODE') or die('Wrong URL.');

$t=new XTemplate(cot_tplfile('usersverif.admin'));

$items=get_usersverif('UVER_');
foreach($items as $item) {
    $t->assign($item);
    $t->assign(get_userinfo($item['UVER_USERID'],'UVER_'));
    $t->parse('MAIN.ROW');
}
$module_body=$t->parse()->text();