<?php defined('COT_CODE') or die('Wrong URL');
/* ====================
[BEGIN_COT_EXT]
Hooks=usertags.main
[END_COT_EXT]
==================== */
if ($usr['id']<0) return;

include_once cot_incfile('favorites','module','classes');

$fv=new Favorites();
$temp_array=$fv->addInfo($temp_array);