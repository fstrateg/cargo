<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=standalone
Order=10
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');
$out['subtitle'] = $L['title'];
$out['head_head'] .= '<script type="text/javascript" src="//vk.com/js/api/openapi.js?132"></script>';
$t = new XTemplate(cot_tplfile('reporterror.chat', 'plug'));
$t->assign([
    'ERRBODY' => $L['err_body'],
    'ERRTITLE' => $L['err_title'],
  ]);