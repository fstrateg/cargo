<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=users.profile.tags
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL.');

include_once  cot_incfile('userverif','plug');

$fl=cot_tplfile(['userverif','profile'],'plug');

$t1=new XTemplate($fl);
$t1->assign('USERVERIF_TEXT',
    sprintf($L['userverif_not_verif'],
        cot_rc_link(cot_url('userverif','e=userverif','',true),$L['userverif_verif']))
);

$t1->parse('MAIN.NOT_VERIF');

$t->assign('USER_NOT_VERIF', $t1->text('MAIN.NOT_VERIF'));