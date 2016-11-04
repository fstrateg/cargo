<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 28.10.2016
 * Time: 17:38
 */
defined('COT_CODE') or die('Wrong URL');
list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');
cot_block($usr['auth_read']);

/* === Hook === */
foreach (cot_getextplugins('transport.first') as $pl)
{
    include $pl;
}
/* ===== */
$t = new XTemplate($mskin);
$t->parse('MAIN');
$module_body = $t->text('MAIN');
echo $module_body;