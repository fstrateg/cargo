<?php
defined('COT_CODE') or die('Wrong URL');
require_once cot_incfile('projects','module','performers');

$pid=cot_import('pid','G','INT');
$a=cot_import('a','G','ALP');
cot_die(!$pid,true);

$perf=new Performers();
$claim=$perf->load($pid);
cot_die(!$claim,true);

if ($a='add')
{
    $ritem=$perf->importFeedback();
    $perf->validateFeedback($ritem);
    if (cot_error_found())
    {
        $perf->saveFeedback($ritem);
        cot_redirect(cot_url('projects',"id=".$claim['item_claim'],'',true));
    }
    //
}


$t=new XTemplate(cot_tplfile('projects.setperformed'));

$t->assign(cot_generate_usertags($claim['item_performer'],'PRJ_PERF_'));
$t->assign($perf->generatetags($claim,'PRJ_'));
$t->assign([
    'PRJ_PERFORMED_STARS'=>$ritem['item_fstars'],
    'PRJ_PERFORMED_NOTES'=>cot_textarea('rnotes',$ritem['item_feedback'],15,80,'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
    'PRJ_SEND_FROM'=>cot_url('projects','m=setperformed&pid='.$pid.'&a=add'),
]);

global $cfg;
Resources::addFile("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");

$t->parse();

$module_body=$t->text();