<?php

defined('COT_CODE') or die('Wrong URL');

$id = cot_import('id', 'G', 'INT');
$userid = cot_import('userid', 'G', 'INT');
$a = cot_import('a', 'G', 'ALP');
$item=[];

if (isset($a)) {
    if ($a == 'add') {
        $item=cot_setperformer_import($item);
        cot_setperformer_validate($item);
        /*if (!cot_error_found())
        {
            cot_setperformer_save();
            cot_redirect(cot_url('projects',"id=$id",'',true));
        }*/
        cot_redirect(cot_url('projects',"m=setperformer&id=$id&userid=$userid",'',true));
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
    "PRJ_TEXT" => cot_textarea('rtext', $item['item_text'], 10, 60, 'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
    'PRJADD_FORM_ACTION'=>cot_url('projects',"m=setperformer&id=$id&userid=$userid&a=add",'',true),
    'PRJ_CANCEL_URL'=>cot_url('projects',"m=addperformer&id=$id",'',true),
    'TEST'=>print_r($item,true),
]);

Resources::addFile('js/jquery-ui.min.css');

$t->parse();

$module_body=$t->text();