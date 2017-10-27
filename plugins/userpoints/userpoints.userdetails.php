<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=users.details.tags
 * [END_COT_EXT]
 */
defined('COT_CODE') or die('Wrong URL');
if ($usr['id']==0) return;

require_once cot_incfile('userpoints','plug','classes');
/*
$marsh->getRows($t1,$state);
$t1->assign("MR_SHOW_STATUS",!$marsh->isGuest());
$t1->assign(['MARSHRUT_COUNT'=>$marshrut_count_all]);
$t1->parse("MAIN");
*/

$cl=new UserRating();
$cl->init($usr['id']);

$t1=new XTemplate(cot_tplfile('userpoints.userdetails','plug'));
$t1->assign([
        'RATING_INFO_URL'=>cot_url('page',['c'=>'info','al'=>'rating']),
        'RATING_POINTS'=>$cl->urate,
        'RATING_MAXPOINTS'=>$cl->maxrate,
    ]);
$t1->parse();

$t->assign([
    'USERS_DETAILS_RATING_URL'=>cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=rating'),
    'RATING'=>$t1->text()
]);