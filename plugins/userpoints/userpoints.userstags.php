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
    if ($p>10) $img='stars2.png';
    if ($p>20) $img='stars3.png';
    if ($p>40) $img='stars4.png';
    $temp_array['USERSTARS']='<img src="/images/icons/default/'.$img.'" />';
}