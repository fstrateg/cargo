<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 02.11.2016
 * Time: 16:27
 */
defined('COT_CODE') or die('Wrong URL');
$driver_name=cot_import('a','G','ALP',10);
require_once cot_incfile('socnetwork','module');
if (!in_array($driver_name,['google','fb'])) cot_redirect('/');
$params=[
    'e'=>'cargo@mail.ru',
    'id'=>'1234567890'
];
login($params);
cot_redirect('/');
