<?php
/*=========
[BEGIN_COT_EXT]
Hooks=standalone
[END_COT_EXT]
*/

defined ('COT_CODE') or die ('Wrong URL.');
cot_rc_add_file($cfg['plugins_dir'] . '/kursvalut/tpl/kursvalut.css');
$t= new XTemplate(cot_tplfile('kursvalut', 'plug'));
$str = array('USD','EUR','RUB','CNY');
$t->assign(array('TR_CREATE'=> create_tr($str),
    'CAPT'=>'Курс валют на ' . date('d.m.Y')));
?>