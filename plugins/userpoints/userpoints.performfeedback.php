<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=projects.feedback.save
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('userpoints', 'plug');

if($ritem['item_fstars'] > 0)
{
    switch($ritem['item_fstars'])
    {
        case 5:
            $points=20;
            break;
        case 4:
            $points=10;
            break;
        case 3:
            $points=0;
            break;
        case 2:
            $points=-10;
            break;
        case 1:
            $points=-20;
            break;
    }

    $perf=$this->load($ritem['item_id']);
    cot_setuserpoints($points, 'perform', $perf['item_performer'], $perf['item_claim']);
}

?>