<?php
    /* ====================
      [BEGIN_COT_EXT]
     * Hooks=projects.edit.delete.done
      [END_COT_EXT]
      ==================== */
defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('projectviews','plug');

$db->delete($db_projectviews, "areaid = ?", $id);