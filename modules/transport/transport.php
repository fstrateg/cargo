<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 28.10.2016
 * Time: 17:29
 */
defined('COT_CODE') or die('Wrong URL');

if (!in_array($m, array('add', 'edit', 'preview', 'useroffers')))
{
    if (isset($_GET['id']) || isset($_GET['al']))
    {
        $m = 'main';
    }
    else
    {
        $m = 'list';
    }
}
require_once cot_incfile('transport', 'module', $m);

require_once $cfg['system_dir'].'/header.php';
echo $module_body;
require_once $cfg['system_dir'].'/footer.php';