<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=users.details.tags
 * [END_COT_EXT]
 */
defined('COT_CODE') or die('Wrong URL');
require_once cot_incfile('marshrut', 'module');

$t1=new XTemplate(cot_tplfile(array('marshrut','userdetails'), 'module'));

$where = array();
$order = array();

if($usr['id'] == 0 || $usr['id'] != $urr['user_id'] && !$usr['isadmin'])
{
    $where['state'] = "item_state=1";
}
$where['owner'] = "item_userid=" . $urr['user_id'];

$order['date'] = "item_db DESC";
$wherecount = $where;
$wherecount = ($wherecount) ? 'WHERE ' . implode(' AND ', $wherecount) : '';

$sql_marshrut = $db->query("SELECT * FROM $db_marshrut as p " . $wherecount . "");
$marshrut_count_all = $sql_marshrut->rowCount();
$marshrut=$sql_marshrut->fetchAll();
cot_display_messages($t1);
foreach($marshrut as $item)
{
    $t1->assign(cot_generate_marshruttag($item,'MR_'));
    $t1->parse("MAIN.MARSH_ROWS");
}

$t1->assign(['MARSHRUT_COUNT'=>$marshrut_count_all]);
$t1->parse("MAIN");

$t->assign([
    'USERS_DETAILS_MARSHRUT_COUNT'=>$marshrut_count_all,
    'USERS_DETAILS_MARSHRUT_URL' => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=marshrut'),
    'MARSHRUT'=>$t1->text()
]);