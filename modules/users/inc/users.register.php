<?php

/**
 * User Registration Script
 *
 * @package Cotonti
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL');

$mskin = cot_tplfile('users.register', 'module');

$out['subtitle'] = $L['aut_registertitle'];
$out['head'] .= $R['code_noindex'];
define('COT_NOMENU',TRUE);
require_once $cfg['system_dir'] . '/header.php';

$t = new XTemplate($mskin);

$t->parse('MAIN');
$t->out('MAIN');

require_once cot::$cfg['system_dir'] . '/footer.php';
