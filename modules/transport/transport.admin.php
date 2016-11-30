<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

$a=cot_import('a','G','ALP');

if (isset($a))
{
    $a='admin.'.$a;
}
else
{
    $a='admin.main';
}
require_once cot_incfile('transport', 'module');

$out['subtitle']=$L['transport_moderation'];

require_once cot_incfile('transport', 'module', $a);

require_once $cfg['system_dir'].'/header.php';

echo $module_body;
require_once $cfg['system_dir'].'/footer.php';