<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=ajax
[END_COT_EXT]
==================== */

require_once cot_incfile('kursvalut','plug');

defined('COT_CODE') or die('Wrong URL');

$t= new XTemplate(cot_tplfile('kursvalut', 'plug'));

$str = array('USD','EUR','RUB','CNY');
$t->assign(array('TR_CREATE'=> create_tr($str),
'CAPT'=>'Курс валют на ' . date('d.m.Y')));
?>