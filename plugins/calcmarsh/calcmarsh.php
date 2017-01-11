<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=standalone
Order=10
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL.');

$env['location'] = 'calcmarsh';

include_once cot_langfile('calcmarsh');
cot_rc_add_file($cfg['plugins_dir'].'/calcmarsh/js/calcmarsh.js');
cot_rc_add_file($cfg['plugins_dir'].'/calcmarsh/js/googleplace.js');
cot_rc_add_file($cfg['plugins_dir'].'/calcmarsh/css/calcmarsh.css');
cot_rc_add_file('http://maps.googleapis.com/maps/api/js?key=AIzaSyCwrTqZZepbfT_JwP5GJKaZH1MfR2afYR0&amp;libraries=places');

$f=cot_tplfile('calcmarsh','plug');
$t=new XTemplate($f);

$t->assign('CALC_TITLE',$L['calc_title']);

$plugin_body=$t->text();
