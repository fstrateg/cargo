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
    'PRJ_NUMBER'=>cot_inputbox('text','rnumber',$item['item_number']),
    'PRJ_FIO'=>cot_inputbox('text','rfio',$item['item_fio']),
    'PRJ_SUMM'=>cot_inputbox('number','rsumm',$item['item_summ']),
    'PRJ_DB'=>cot_inputbox('text','rdb',$item['item_db'],'id="date_from"'),
    'PRJ_DE'=>cot_inputbox('text','rde',$item['item_de'],'id="date_to"'),
]);

Resources::addFile('js/jquery-ui.min.css');

$t->parse();

$module_body=$t->text();