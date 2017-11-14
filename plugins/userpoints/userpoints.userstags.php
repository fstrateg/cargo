<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=usertags.main
 * [END_COT_EXT]
 */
/**
 * UserPoints plugin
 *
 * @package userpoints
 * @version 2.0.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru, littledev.ru
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL.');

if(is_array($user_data)){
    $p=(int)$user_data['user_userpoints'];
	$temp_array['USERPOINTS'] = number_format($p, '1', '.', ' ');
    $img='stars1.png';
    if ($p<=50)
    {
        $temp_array['USERSTARS']='';
        return;
    }
    if ($p>50) $img='11';
    if ($p>99) $img='12';
    if ($p>199) $img='13';
    if ($p>299) $img='14';
    if ($p>399) $img='15';
    if ($p>499) $img='21';
    if ($p>499) $img='21';
    if ($p>999) $img='22';
    if ($p>1999) $img='23';
    if ($p>4999) $img='24';
    if ($p>9999) $img='25';
    if ($p>19999) $img='31';
    $temp_array['USERSTARS']='<img src="/images/rating/'.$img.'-s.gif" />';
}