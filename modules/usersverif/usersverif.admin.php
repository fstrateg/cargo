<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL.');

global $cfg;
include_once cot_incfile('usersverif','module');

$a=cot_import('a','G','ALP');
$u=cot_import('u','G','INT');
$d=cot_import('d','G','INT');

if ($a=='accept')
{
    cot_uver_accept($u,$d);
}
elseif($a=='reject')
{
    cot_uver_reject($u,$d);
}

$part='main';

include_once cot_incfile('usersverif','module',$part);

require_once $cfg['system_dir'].'/header.php';
echo $module_body;
require_once $cfg['system_dir'].'/footer.php';