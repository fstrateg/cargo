<?php
defined('COT_CODE') or die('Wrong URL');


require_once cot_incfile('marshrut', 'module', $m);

require_once $cfg['system_dir'].'/header.php';
echo $module_body;
require_once $cfg['system_dir'].'/footer.php';