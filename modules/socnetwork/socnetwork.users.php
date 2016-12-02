<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.tags
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

$c=cot_import('m','G','ALP');

$t1=new XTemplate(cot_tplfile(['socnetwork','users']));
$t1->assign([
    'FBURL'=>cot_url('socnetwork',"a=fb&c=$c",'',true),
    'VKURL'=>cot_url('socnetwork',"a=vk&c=$c",'',true),
    'MAILURL'=>cot_url('socnetwork',"a=mail&c=$c",'',true),
    ]);
$t1->parse();

$t->assign('USERS_SOCBUTTONS',$t1->text());