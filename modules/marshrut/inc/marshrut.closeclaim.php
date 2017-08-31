<?php
defined('COT_CODE') or die('Wrong URL');

$act=cot_import('act','G','TXT');

//-----------/ Контроль /-----------
require_once cot_incfile('marshrut','module','lib');
$perf=new MarshrutPerf();

if (!$perf->getAccessFeedback()) return;
if ($act=='close')
{
    $ritem=$perf->importFeedback();
    $perf->validateFeedback($ritem);
    if (!cot_error_found())
    {
        $perf->saveFeedback($ritem);
        cot_redirect(cot_url('users',['m'=>'details','tab'=>'marshrut','id'=>$perf->id_usr,'stat'=>'inwork'],'',true));
    }
}

$item = $db->query("SELECT p.*, u.* FROM $db_projects AS p LEFT JOIN $db_users AS u ON u.user_id=p.item_userid WHERE item_id=" . (int)$perf->getClaimId())->fetch();

$t=new XTemplate(cot_tplfile('marshrut.closeclaim'));

cot_display_messages($t);
global $cfg;
Resources::addFile("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");

$t->assign(cot_generate_usertags($item, 'PRJ_OWNER_'));
$t->assign(cot_generate_projecttags($item, 'PRJ_', $cfg['projects']['shorttextlen'], $usr['isadmin'], $cfg['homebreadcrumb']));

$t->assign([
    'MR_FORM_SEND'=>cot_url('marshrut',['m'=>'closeclaim','id'=>$perf->id_perf,'act'=>'close']),
    'MR_PERFORMED_STARS'=>$ritem['item_trstars'],
    'MR_PERFORMED_NOTES'=>cot_textarea('rnotes',$ritem['item_trfeedback'],15,80,'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
]);
$t->parse();
$module_body=$t->text();