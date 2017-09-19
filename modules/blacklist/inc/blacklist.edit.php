<?php
defined('COT_CODE') or die('Wrong URL');

$t=new XTemplate(cot_tplfile('blacklist.edit'));

$bl=new EditForm();

$t->assign($bl->gettags('BL_'));


$t->parse();
$module_body=$t->text();