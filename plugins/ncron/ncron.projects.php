<?php
/* ====================
  [BEGIN_COT_EXT]
 * Hooks=ncron.h1
  [END_COT_EXT]
  ==================== */
defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL');

cot_incfile('projects','module');

// Отправляем просроченные заявки в архив
$db->query("update $db_projects set item_state=1 where item_dateto < ${sys['now']}")->execute();