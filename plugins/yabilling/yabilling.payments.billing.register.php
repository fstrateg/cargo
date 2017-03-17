<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=payments.billing.register
 * [END_COT_EXT]
 */
/**
 * Yandex money billing Plugin
 *
 * @package yabilling
 * @version 1.0
 * @author devkont (Yusupov)
 * @copyright (c) CMSWorks Team 2013
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('yabilling', 'plug');

$cot_billings['yandex'] = array(
	'plug' => 'yabilling',
	'title' => $L['yabilling_title'],
	'icon' => $cfg['plugins_dir'] . '/yabilling/images/ya.png'
);

?>