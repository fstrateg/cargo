<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL.');
global $cfg;

$module_body='test';

require_once $cfg['system_dir'].'/header.php';

echo $module_body;
require_once $cfg['system_dir'].'/footer.php';