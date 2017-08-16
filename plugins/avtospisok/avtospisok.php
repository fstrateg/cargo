<?php

/**
 * [BEGIN_COT_EXT]
 *   Hooks=standalone
 *
 * [END_COT_EXT]
 */

defined ('COT_CODE') or die ('Wrong URL.');

$t= new XTemplate(cot_tplfile('avtospisok', 'plug'));
$str = create_avtospisok_selectbox('test',null);
$t->assign('SPISOK_TRAN',$str);