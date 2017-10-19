<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=module
[END_COT_EXT]
==================== */

/**
 * Home page main code
 *
 * @package Index
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL.');

// Environment
define('COT_INDEX', true);
$env['location'] = 'home';

/* === Hook === */
foreach (cot_getextplugins('index.first') as $pl)
{
	include $pl;
}
/* ===== */

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('index', 'a');
cot_block($usr['auth_read']);

/* === Hook === */
foreach (cot_getextplugins('index.main') as $pl)
{
	include $pl;
}
/* ===== */

if ($_SERVER['REQUEST_URI'] == COT_SITE_URI . 'index.php')
{
	$sys['canonical_url'] = COT_ABSOLUTE_URL;
}
if ($usr['id'] === 0) {
	define('COT_NOMENU',TRUE);
	cot_rc_add_file($cfg['themes_dir'] . '/' . $usr['theme'] . '/css/land.css');
	cot_redirect('/login');
	//сщ
	if (cot_langfile('index','module')) include_once cot_langfile('index','module');
	$mpl=cot_tplfile('index.home','module');
	require_once $cfg['system_dir'] . '/header.php';


	$t = new XTemplate($mpl);
	$t->parse('MAIN');
	$t->out('MAIN');
	require_once $cfg['system_dir'] . '/footer.php';
}
else {
	require_once $cfg['system_dir'] . '/header.php';

	$t = new XTemplate(cot_tplfile('index'));

	/* === Hook === */
	foreach (cot_getextplugins('index.tags') as $pl) {
		include $pl;
	}
	/* ===== */

	$t->parse('MAIN');
	$t->out('MAIN');

	require_once $cfg['system_dir'] . '/footer.php';
}
if ($cache && $usr['id'] === 0 && $cfg['cache_index'])
{
	$cache->page->write();
}
