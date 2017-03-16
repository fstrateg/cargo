<?php

defined('COT_CODE') or die('Wrong URL');

$id = cot_import('id', 'G', 'INT');
$userid = cot_import('userid', 'G', 'INT');
$r = cot_import('r', 'G', 'ALP');

$item=[];

$t=new XTemplate(cot_tplfile('projects.setperformer'));

$t->assign(cot_generate_usertags($userid,'PRJ_PERF_'));
$t->assign([
    'PRJ_ID'=>$id,
    'PRJ_NUMBER'=>cot_inputbox('text','rnumber',$item['number']),
]);

$t->parse();

$module_body=$t->text();