<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 02.11.2016
 * Time: 12:15
 */
defined('COT_CODE') or die('Wrong URL');
require_once cot_langfile('transport', 'module');

cot::$db->registerTable('transports');