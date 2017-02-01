<?php

/* ====================
  [BEGIN_COT_EXT]
 * Hooks=standalone
  [END_COT_EXT]
  ==================== */

defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL');

/* === Hook === */
$h=cot_date('H',$sys['now']+6*3600);
$extp = cot_getextplugins('ncron.h');

foreach ($extp as $pl)
{
    include $pl;
}
/* ===== */
exit();