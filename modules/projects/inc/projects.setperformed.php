<?php
defined('COT_CODE') or die('Wrong URL');
require_once cot_incfile('projects','module','performers');

$pid=cot_import('pid','G','INT');
cot_die(!$pid,true);

$perf=new Performers();
$claim=$perf->load($pid);
cot_die(!$claim,true);



$t=new XTemplate(cot_tplfile('projects.setperformed'));

$t->assign(cot_generate_usertags($claim['item_performer'],'PRJ_PERF_'));
$t->assign($perf->generatetags($claim));

$t->parse();

$module_body=$t->text();