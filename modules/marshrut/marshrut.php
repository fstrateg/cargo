<?php
defined('COT_CODE') or die('Wrong URL');

/*print_r($_GET);
exit();*/
//$m=cot_import()
require_once cot_incfile('marshrut', 'module');

if (!in_array($m,['add','edit','preview']))
{
    die('Wrong URL');
}

require_once cot_incfile('marshrut', 'module', $m);

require_once $cfg['system_dir'].'/header.php';
echo $module_body;
require_once $cfg['system_dir'].'/footer.php';