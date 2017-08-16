<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=marshrut.preview.tags
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL.');
if ($item['item_userid']!=$usr['id']) return;
//require_once cot_incfile('marshrut', 'module');
require_once cot_langfile('simcargo');

$sp_t = new XTemplate(cot_tplfile(array('simcargo'), 'plug'));

$simmr_where = array();
$simmr_order = array();

$test=print_r($item,true);

$simmr_where['state']="item_inwork=1";

/* === Hook === */
foreach (cot_getextplugins('simcargo.query') as $pl)
{
	include $pl;
}
/* ===== */

$simmr_where = ($simmr_where) ? 'WHERE ' . implode(' AND ', $simmr_where) : '';

$simmr_order['city']="item_city DESC";
$simmr_order['region']="item_region DESC";
$simmr_order['country']="item_country DESC";
$simmr_order['cityto']="item_cityto DESC";
$simmr_order['regionto']="item_regionto DESC";
$simmr_order['countryto']="item_countryto DESC";

$simmr_order['date']="item_datefrom";

$simmr_order = ($simmr_order) ? 'ORDER BY ' . implode(', ', $simmr_order) : '';

$add['city']="item_city='${item['item_city']}'";
$add['region']="item_region='${item['item_region']}'";
$add['country']="item_country='${item['item_country']}'";


$addto['city']=$item['item_cityto']==0?'1/10':"item_cityto='${item['item_cityto']}'";
$addto['region']="item_regionto='${item['item_regionto']}'";
$addto['country']="item_countryto='${item['item_countryto']}'";

$simmr_add=" AND ( ".implode(" OR ", $add)." ) AND (".implode(" OR ", $addto).")";

$tt="(${add['city']})*10+(${add['region']})*5+(${addto['city']})*10+(${addto['region']})";
$sql="SELECT a.* FROM ("
	. "SELECT $tt AS tt,u.*,p.* FROM $db_projects AS p
	LEFT JOIN $db_users AS u ON u.user_id=p.item_userid
	" . $simmr_where . "
	" . $simmr_add . "
	" . $simmr_order . "
	) a WHERE tt>16 LIMIT " . $cfg['plugin']['simcargo']['limit'];

$sqlsim = $db->query($sql)->fetchAll();


if (count($sqlsim)==0) return;

foreach ($sqlsim as $simmr)
{
	$jj++;
	$sp_t->assign(cot_generate_usertags($simmr, 'PRJ_ROW_OWNER_'));
	//$it=cot_generate_projecttags($simmr, 'SIMMR_ROW_');
    $sp_t->assign(cot_generate_projecttags($simmr, 'PRJ_ROW_'));
	$sp_t->assign(array(
		"SIMMR_ROW_ODDEVEN" => cot_build_oddeven($jj),
	));

	/* === Hook ===
	foreach (cot_getextplugins('simmarsh.loop') as $pl)
	{
		include $pl;
	}
	/* ===== */

	$sp_t->parse("MAIN.SIMMR_ROW");
}

/* === Hook ===
foreach (cot_getextplugins('simmarsh.tags') as $pl)
{
	include $pl;
}
/* ===== */

$sp_t->parse('MAIN');
$t->assign('SIMCARGO', $sp_t->text('MAIN'));