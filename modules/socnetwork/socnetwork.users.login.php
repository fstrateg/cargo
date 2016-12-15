<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.auth.tags
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');


$t1=new XTemplate(cot_tplfile(['socnetwork','users']));

require_once cot_langfile('socnetwork','module');
$t1->assign([
    'SOCNETWORK_TITLE'=>$L['socnetwork_title_login'],
    'FBURL'=>cot_url('socnetwork',"a=fb",'',true),
    'VKURL'=>cot_url('socnetwork',"a=vk",'',true),
    'MAILURL'=>cot_url('socnetwork',"a=mail",'',true),
]);
$t1->parse();

$t->assign('USERS_SOCBUTTONS',$t1->text());