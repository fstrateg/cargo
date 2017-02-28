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

include_once cot_incfile('userverif','plug','info');

$a=cot_import('a','G','ALP');

$info=new UserVerif();
if ($a=='verif')
{
    $info->importForm();
}

$t=new XTemplate(cot_tplfile('userverif','plug'));

$t->assign($info->getData());

$t->parse('MAIN');

$plugin_body =$t->text('MAIN');