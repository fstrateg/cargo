<?php
defined('COT_CODE') or die('Wrong URL');

$maxrowsperpage=10;

list($pn, $d, $d_url) = cot_import_pagenav('d', $maxrowsperpage);
$where="where item_state=1";

$totalitems=$db->query("select count(*) from $db_marshrut $where")->fetchColumn();

$claims=$db->query("select p.*,u.* from $db_marshrut p LEFT JOIN $db_users AS u ON u.user_id=p.item_userid $where LIMIT $d , $maxrowsperpage"
)->fetchAll();

$list_url_path=$d_url;
$pagenav = cot_pagenav('marshrut', $list_url_path, $d, $totalitems, $maxrowsperpage);


$t=new XTemplate(cot_tplfile('marshrut'));

$i=0;
foreach($claims as $claim)
{
    $t->assign(cot_generate_marshruttag($claim,'MR_'));
    $t->assign(cot_generate_usertags($claim, 'MR_USER_'));
    $t->parse("MAIN.MARSH_ROWS");
    $i++;
}
$t->assign([
    'MARSHRUT_COUNT'=>$i,
    "PAGENAV_PAGES" => $pagenav['main'],
    "PAGENAV_PREV" => $pagenav['prev'],
    "PAGENAV_NEXT" => $pagenav['next'],
    "PAGENAV_COUNT" => $totalitems,
]);
$t->parse();
$module_body=$t->text();