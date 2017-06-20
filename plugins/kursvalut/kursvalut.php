<?php
/*=========
[BEGIN_COT_EXT]
Hooks=index.tags
Tags=index.tpl:{INDEX_KURS}
[END_COT_EXT]
*/

defined ('COT_CODE') or die ('Wrong URL.');
cot_rc_add_file($cfg['plugins_dir'] . '/kursvalut/js/kursvalut.js');
cot_rc_add_file($cfg['plugins_dir'] . '/kursvalut/tpl/kursvalut.css');
$t->assign('INDEX_KURS',"<div id='kurs'></div>");
?>