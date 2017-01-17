<?php
defined('COT_CODE') or die('Wrong URL');
$pt=cot_tplfile('marshrut.add');

$t=new XTemplate($pt);
$t->parse();
$module_body=$t->text();