<?php defined('COT_CODE') or die('Wrong URL');
/* ====================
[BEGIN_COT_EXT]
Hooks=usertags.main
[END_COT_EXT]
==================== */
if ($usr['id']<0) return;

include_once cot_incfile('blacklist','module','classes');

$bl=new BL();
$temp_array=$bl->addInfo($temp_array);