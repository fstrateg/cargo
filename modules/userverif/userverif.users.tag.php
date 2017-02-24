<?php
/**
 * [BEGIN_COT_EXT1]
 * Hooks=usertags.main
 * [END_COT_EXT1]
 */
defined('COT_CODE') or die('Wrong URL.');

$t1=new XTemplate(cot_tplfile('userverif','plug'));
$t1->parse('MAIN.NOTVERIF');

$t->assign('USER_NOT_VERIF', 'verifed'); //$t1->text('MAIN.NOTVERIF'));
