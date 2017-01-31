<?php
/* ====================
  [BEGIN_COT_EXT]
 * Hooks=ncron.h2
  [END_COT_EXT]
  ==================== */
defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL');

cot_incfile('marshrut','module');

// Отправляем просроченные заявки в архив
$db->query("update $db_marshrut set item_state=3 where item_de < ${sys['now']}")->execute();