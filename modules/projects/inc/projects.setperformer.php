<?php

defined('COT_CODE') or die('Wrong URL');
require_once cot_incfile('projects','module','performers');

$id = cot_import('id', 'G', 'INT');
$userid = cot_import('userid', 'G', 'INT');
$a = cot_import('a', 'G', 'ALP');
$pid=cot_import('pid','G','INT');

$perf=new Performers();

$item=[];
if (isset($a)) {
    if ($a == 'add') {
        $item=$perf->import($item);
        $perf->validate($item);
        if (!cot_error_found())
        {
            $perf->add($item);
            cot_redirect(cot_url('projects',"id=$id",'',true));
        }
        cot_redirect(cot_url('projects',"m=setperformer&id=$id&userid=$userid",'',true));
    }

    if ($a=='update'){
        $item=$perf->import($item);
        $perf->validate($item);
        if (!cot_error_found())
        {
            $perf->edit($item,$pid);
            $item=$perf->load($pid);
            cot_redirect(cot_url('projects',"id={$item['item_claim']}",'',true));
        }
        else{
            $id=$perf->getclaim($pid);
        }
        //cot_redirect(cot_url('projects',"m=setperformer&userid=$userid&pid=$pid",'',true));
    }
    if ($a=='del'){
        $perf->del($pid);
        cot_redirect(cot_url('projects',"id=$id",'',true));
    }
    if ($a=='edit'){
        $item=$perf->load($pid);
        $userid=$item['item_performer'];
        $id=$item['item_claim'];
    }
}

if (empty($item['item_db'])) $item['item_db']=$sys['now'];
if (empty($item['item_de'])) $item['item_de']=$sys['now'];


$t=new XTemplate(cot_tplfile('projects.setperformer'));

cot_display_messages($t);

$t->assign(cot_generate_usertags($userid,'PRJ_PERF_'));
$t->assign([
    'PRJ_ID'=>$id,
    'PRJ_NUMBER'=>cot_inputbox('text','rnumber',$item['item_number']),
    'PRJ_FIO'=>cot_inputbox('text','rfio',$item['item_fio']),
    'PRJ_SUMM'=>cot_inputbox('number','rsumm',$item['item_summ']),
    'PRJ_DB'=>cot_inputbox('text','rdb',cot_date('d.m.Y',$item['item_db']),'id="date_from"'),
    'PRJ_DE'=>cot_inputbox('text','rde',cot_date('d.m.Y',$item['item_de']),'id="date_to"'),
    'PRJ_PERFORMER'=>cot_inputbox('hidden','rperformer',$userid),
    'PRJ_CLAIM'=>cot_inputbox('hidden','rclaim',$id),
    "PRJ_TEXT" => cot_textarea('rnote', $item['item_note'], 10, 60, 'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
    //'TEST'=>print_r($item,true),
]);
if(isset($pid)){
    $t->assign('PRJ_FORM_ACTION',cot_url('projects',"m=setperformer&pid=$pid&userid=$userid&a=update",'',true));
    $t->assign('PRJ_CANCEL_URL',cot_url('projects',"id=$id",'',true));
}
else{
    $t->assign('PRJ_FORM_ACTION',cot_url('projects',"m=setperformer&id=$id&userid=$userid&a=add",'',true));
    $t->assign('PRJ_CANCEL_URL',cot_url('projects',"m=addperformer&id=$id",'',true));
}

Resources::addFile('js/jquery-ui.min.css');

$t->parse();

$module_body=$t->text();