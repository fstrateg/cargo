<?php
/* ====================
  [BEGIN_COT_EXT]
 * Hooks=projects.main
  [END_COT_EXT]
  ==================== */
defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('projectviews','plug');

if ($item['item_userid']!=$usr['id'])
{
    $db->insert($db_projectviews,
        [
        'userid'=>$usr['id'],
        'areaid'=>$item['item_id'],
        'dat'=>$sys['now']
        ]);
}