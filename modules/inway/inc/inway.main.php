<?php
defined('COT_CODE') or die('Wrong URL');

$t=new XTemplate(cot_tplfile('inway.main'));
$t->assign('ADD_URL',cot_url('inway','m=add'));
$t->parse();
$module_body=$t->text();