<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=usersverif.accept
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL.');

include_once  cot_incfile('userverif','plug');
include_once  cot_incfile('userverif','plug','info');

$info=new UserVerif();
$info->init($userid);

if ($info->verifed())
{
    cot_verifuser($userid);
}