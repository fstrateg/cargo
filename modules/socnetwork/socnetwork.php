<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 02.11.2016
 * Time: 16:27
 */
defined('COT_CODE') or die('Wrong URL');
$driver_name=cot_import('a','G','ALP',10);
$cat=cot_import('c','G','ALP',10);
require_once cot_incfile('socnetwork','module');
require_once cot_langfile('socnetwork','module');

if (!in_array($driver_name,['google','fb','vk','mail','ok'])) cot_redirect('/');


/*$params=gettestparams();
login($params);*/

require_once cot_incfile('socnetwork','modules',$driver_name);

$params=getparams();

if ($params)
{
    if (!isset($params['group']))
        login($params);
    else {
        if (register($params))
            cot_redirect(cot_url('users','m=profile', '', true));
    }
}

cot_redirect('/');
