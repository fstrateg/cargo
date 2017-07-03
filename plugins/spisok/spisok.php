<?php

/**
 * [BEGIN_COT_EXT]
 *   Hooks=standalone
 * [END_COT_EXT]
 */
require_once cot_incfile('spisok','plug');
defined ('COT_CODE') or die ('Wrong URL.');




$t= new XTemplate(cot_tplfile('spisok', 'plug'));
$str = create_option();
$t->assign('SPIS',$str);
