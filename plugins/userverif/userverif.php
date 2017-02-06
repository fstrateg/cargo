<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=standalone
Order=10
[END_COT_EXT]
==================== */
/*
 * У физ лиц - только паспорт. У ЮР - паспорт, налоговый номер, свидетельство
этого достаточно
паспорт и свидетельсво сканы будут
номер только поле
свидетельсво
и номер налого плательца
разные вещи

 */
defined('COT_CODE') or die('Wrong URL.');

include_once  cot_incfile('userverif','plug');

$t=new XTemplate(cot_tplfile('userverif','plug'));

$t->assign([
    'USRVER_FIZ'=>cot_radiobox('1','rfizlico',['1','0'],[$L['userverif_fiz'],$L['userverif_ur']]),
    'USRVER_UDOS'=>cot_inputbox('file','ridcart'),
    'USRVER_NUMBER'=>cot_inputbox('text','rnumber'),
    'USRVER_SVIDET'=>cot_inputbox('file','rsvidet'),
    'USRVER_URL'=>cot_url('userverif','a=verif'),
    'USRVER_SUBMIT'=>cot_inputbox('submit','submit',$L['userverif_submit'],'class="btn btn-success"'),
]);

$t->parse('MAIN');

$plugin_body =$t->text('MAIN');