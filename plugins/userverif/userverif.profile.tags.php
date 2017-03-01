<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=users.profile.tags
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL.');

include_once  cot_incfile('userverif','plug');
include_once  cot_incfile('userverif','plug','info');

$fl=cot_tplfile(['userverif','profile'],'plug');

$t1=new XTemplate($fl);

$info=new UserVerif();

if ($info->verifed())
{
    $t1->parse('MAIN.VERIFED');
    $rez=$t1->text('MAIN.VERIFED');
}
else {
    $t1->assign('USERVERIF_TEXT',
        sprintf($L['userverif_not_verif'],
            cot_rc_link(cot_url('userverif', 'e=userverif', '', true), $L['userverif_verif']))
    );
    $t1->parse('MAIN.NOT_VERIF');
    $rez=$t1->text('MAIN.NOT_VERIF');
}


$t->assign('USER_VERIF',$rez);