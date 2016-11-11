<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=users.details.tags
 * [END_COT_EXT]
 */
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 02.11.2016
 * Time: 11:45
 */
defined('COT_CODE') or die('Wrong URL');
require_once cot_incfile('transport', 'module');
$t1=new XTemplate(cot_tplfile(array('transport','userdetails'), 'module'));

$where = array();
$order = array();
if($usr['id'] == 0 || $usr['id'] != $urr['user_id'] && !$usr['isadmin'])
{
    $where['state'] = "item_state=0";
}
$where['owner'] = "item_userid=" . $urr['user_id'];

$order['date'] = "item_date DESC";
$wherecount = $where;
$wherecount = ($wherecount) ? 'WHERE ' . implode(' AND ', $wherecount) : '';

$sql_transp = $db->query("SELECT * FROM $db_transports as p " . $wherecount . "");
$transport_count_all = $projects_count = $sql_transp->rowCount();
$transport=$sql_transp->fetchAll();

foreach($transport as $item)
{
    $row=print_r($item,true);
    $t1->assign(cot_generate_transport_row($item,'TRANSP_ROW_'));
    $t1->parse("MAIN.TRANS_ROWS");
}

$t1->assign(['TRANSPORT_COUNT'=>$transport_count_all,
]);
$t1->parse("MAIN");
$transport=$t1->text();
$t->assign([
        'USERS_DETAILS_TRANSPORT_COUNT'=>$transport_count_all,
        'USERS_DETAILS_TRANSPORT_URL' => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=transport'),
        'TRANSPORT'=>$transport
        ]);