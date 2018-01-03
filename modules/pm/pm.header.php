<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=header.main
Tags=header.tpl:{HEADER_USER_PMS},{HEADER_USER_PMREMINDER}
[END_COT_EXT]
==================== */

/**
 * PM header notices
 *
 * @package PM
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL.');

if ($usr['id'] > 0)
{
	$out['pms'] = cot_rc_link(cot_url('pm'), $L['Private_Messages'], 'class="nav-link"');

	require_once cot_incfile('pm', 'module');
	if ($usr['newpm'])
	{
		$usr['messages'] = $db->query("SELECT COUNT(*) FROM $db_pm WHERE pm_touserid='".$usr['id']."' AND pm_tostate=0")->fetchColumn();
	}
	$out['pmtext'] = ($usr['messages'] > 0) ? cot_declension($usr['messages'], $Ls['Privatemessages']) : $L['hea_noprivatemessages'];

	$t->assign(array(
		'HEADER_USER_PM_URL' => cot_url('pm'),
		'HEADER_USER_PMS' => $out['pms'],
		'HEADER_USER_PMREMINDER' => cot_rc_link(cot_url('pm'),$out['pmtext']),
		'HEADER_USER_PMTEXT' => $out['pmtext'],
	));
}

if ($cfg['pm']['css'] && $env['ext'] == 'pm')
{
	Resources::linkFile($cfg['modules_dir'] . '/pm/tpl/pm.css');
}
