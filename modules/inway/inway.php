<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=module
 * [END_COT_EXT]
 */
defined('COT_CODE') or die('Wrong URL');

include_once cot_langfile('inway','module');

if (!in_array($m,array('add'))) {
    $m = 'main';
}

require_once cot_incfile('inway', 'module', $m);

require_once $cfg['system_dir'].'/header.php';
echo $module_body;
require_once $cfg['system_dir'].'/footer.php';