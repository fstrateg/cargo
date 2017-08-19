<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=users.details.tags
 * [END_COT_EXT]
 */
defined('COT_CODE') or die('Wrong URL');
require_once cot_incfile('marshrut', 'module');
require_once cot_incfile('marshrut', 'module', 'lib');


$t1=new XTemplate(cot_tplfile(array('marshrut','userdetails'), 'module'));

$where = array();
$order = array();

if($usr['id'] == 0 || $usr['id'] != $urr['user_id'] && !$usr['isadmin'])
{
    $where['state'] = "item_state=1";
}

$state = ($tab=='marshrut') ? cot_import('stat', 'G', 'TXT') : '' ;

$where['owner'] = "item_userid=" . $urr['user_id'];

$order['date'] = "item_db DESC";
$wherecount = $where;
$wherecount = ($wherecount) ? 'WHERE ' . implode(' AND ', $wherecount) : '';

$sql_marshrut = $db->query("SELECT * FROM $db_marshrut as p " . $wherecount . "");

$marsh=new MarshrutProfile();
$marsh->setOwner($urr['user_id']);

$marshrut_count_all = $marsh->getCountAll();

$t1->assign(array(
    "MR_CAT_ROW_TITLE" => $L['All'],
    "MR_CAT_ROW_URL" => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=marshrut'),
    "MR_CAT_ROW_COUNT" => $marshrut_count_all,
    "MR_CAT_ROW_SELECT" => ($state ? '' : 1)
));
$t1->parse("MAIN.ST_ROWS");

if (!$marsh->isGuest())
{
    $t1->assign($marsh->getInWork('MR_CAT_ROW_'));
    $t1->parse("MAIN.ST_ROWS");
    $t1->assign($marsh->getIsDone('MR_CAT_ROW_'));
    $t1->parse("MAIN.ST_ROWS");
}
/*$t1->assign(
    array(
    "MR_CAT_ROW_TITLE" => cot_marshrut_state($value['item_state'],false),
    "MR_CAT_ROW_URL" => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=marshrut&stat='.$value['item_state']),
    "MR_CAT_ROW_COUNT" => $value['stat_count'],
    "MR_CAT_ROW_SELECT" => ($state && $state == $value['item_state']) ? 1 : ''
));
$t1->parse("MAIN.ST_ROWS");

/*
if ($state)
{
    $where['stat'] = 'item_state=' . $state;
    $where = ($where) ? 'WHERE ' . implode(' AND ', $where) : '';
    $sql_marshrut = $db->query("SELECT * FROM $db_marshrut as p " . $where . "");
}
$sql_projects_count_st = $db->query("SELECT item_state, COUNT(item_state) as stat_count FROM $db_marshrut " . $wherecount . " GROUP BY item_state")->fetchAll();

$t1->assign(array(
    "MR_CAT_ROW_TITLE" => $L['All'],
    "MR_CAT_ROW_URL" => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=marshrut'),
    "MR_CAT_ROW_COUNT" => $marshrut_count_all,
    "MR_CAT_ROW_SELECT" => ($state ? '' : 1)
));
$t1->parse("MAIN.ST_ROWS");

foreach ($sql_projects_count_st as $value) {
    $t1->assign(array(
        "MR_CAT_ROW_TITLE" => cot_marshrut_state($value['item_state'],false),
        "MR_CAT_ROW_URL" => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=marshrut&stat='.$value['item_state']),
        "MR_CAT_ROW_COUNT" => $value['stat_count'],
        "MR_CAT_ROW_SELECT" => ($state && $state == $value['item_state']) ? 1 : ''
    ));
    $t1->parse("MAIN.ST_ROWS");
}

$marshrut=$sql_marshrut->fetchAll();
cot_display_messages($t1);
foreach($marshrut as $item)
{
    $t1->assign(cot_generate_marshruttag($item,'MR_'));
    $t1->parse("MAIN.MARSH_ROWS");
}*/
$marsh->getRows($t1);
$t1->assign("MR_SHOW_STATUS",!$marsh->isGuest());
$t1->assign(['MARSHRUT_COUNT'=>$marshrut_count_all]);
$t1->parse("MAIN");

$t->assign([
    'USERS_DETAILS_MARSHRUT_COUNT'=>$marshrut_count_all,
    'USERS_DETAILS_MARSHRUT_URL' => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=marshrut'),
    'MARSHRUT'=>$t1->text()
]);