<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=projects.tags
 * [END_COT_EXT]
 */

/**
 * simprojects plugin
 *
 * @package simprojects
 * @version 1.0.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

if ($item['item_userid']!=$usr['id']) return;

require_once cot_incfile('marshrut', 'module');
require_once cot_langfile('simmarsh');

$sp_t = new XTemplate(cot_tplfile(array('simmarsh'), 'plug'));

$simmr_where = array();
$simmr_order = array();

$test=print_r($item,true);

$simmr_where['state']="item_state=1";
/*
 *
 * SELECT item_city='2029' c1,
		item_region='2021' c2,
 		item_country='kz' c3,
 		item_cityto='2000' t1,
		item_regionto='1994' t2,
		item_countryto='kz' t3,

	p.*,u.* FROM cg_marshrut AS p
	LEFT JOIN cg_users AS u ON u.user_id=p.item_userid
	WHERE item_state=1
	 AND ( item_city='2029' OR item_region='2021' OR item_country='kz' )
	 AND (item_cityto='2000' OR item_regionto='1994' OR item_countryto='kz')
	ORDER BY item_city DESC, item_region DESC, item_country DESC, item_cityto DESC, item_regionto DESC, item_countryto DESC, item_db
	LIMIT 5
 * */


/* === Hook === */
foreach (cot_getextplugins('simmarsh.query') as $pl)
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

$simmr_order['date']="item_db";

$simmr_order = ($simmr_order) ? 'ORDER BY ' . implode(', ', $simmr_order) : '';

$add['city']="item_city='${item['item_city']}'";
$add['region']="item_region='${item['item_region']}'";
$add['country']="item_country='${item['item_country']}'";

$addto['city']="item_cityto='${item['item_cityto']}'";
$addto['region']="item_regionto='${item['item_regionto']}'";
$addto['country']="item_countryto='${item['item_countryto']}'";

$simmr_add=" AND ( ".implode(" OR ", $add)." ) AND (".implode(" OR ", $addto).")";

$tt="(${add['city']})*10+(${add['region']})*5+(${addto['city']})*10+(${addto['region']})";
$sqlsim = $db->query("SELECT a.* FROM ("
    . "SELECT $tt AS tt,u.*,p.* FROM $db_marshrut AS p
	LEFT JOIN $db_users AS u ON u.user_id=p.item_userid 
	" . $simmr_where . "
	" . $simmr_add . "
	" . $simmr_order . "
	) a WHERE tt>=15 LIMIT " . $cfg['plugin']['simmarsh']['limit'])->fetchAll();

if (count($sqlsim)==0) return;

foreach ($sqlsim as $simmr)
{
	$jj++;
	$sp_t->assign(cot_generate_usertags($simmr, 'SIMMR_ROW_OWNER_'));
    $sp_t->assign(cot_generate_marshruttag($simmr, 'SIMMR_ROW_'));
	//$sp_t->assign(cot_generate_projecttags($simmr, 'SIMMR_ROW_', $cfg['projects']['shorttextlen'], $usr['isadmin'], $cfg['homebreadcrumb']));
	$sp_t->assign(array(
		"SIMMR_ROW_ODDEVEN" => cot_build_oddeven($jj),
	));

	/* === Hook === */
	foreach (cot_getextplugins('simmarsh.loop') as $pl)
	{
		include $pl;
	}
	/* ===== */

	$sp_t->parse("MAIN.SIMMR_ROW");
}

/* === Hook === */
foreach (cot_getextplugins('simmarsh.tags') as $pl)
{
	include $pl;
}
/* ===== */

$sp_t->parse('MAIN');
$t->assign('SIMMARSH', $sp_t->text('MAIN'));