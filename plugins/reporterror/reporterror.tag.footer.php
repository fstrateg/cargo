<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=footer.last
Order=10
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');
if ($env['location']=='home'&&$usr['id']===0) return;
if (cot_langfile('reporterror','plug')) include_once cot_langfile('reporterror','plug');
$t=new XTemplate(cot_tplfile('reporterror.tag','plug'));
$t->assign([
    'ERR_LINK'=>$L['err_errors'],
    'ERR_URL'=>cot_url('reporterror'),
]);
$t->parse()->out();