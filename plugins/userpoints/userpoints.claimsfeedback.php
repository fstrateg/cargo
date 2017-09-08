<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=marshrut.feedback.save
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('userpoints', 'plug');

if($ritem['item_trstars'] > 0)
{
    switch($ritem['item_trstars'])
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
    $claim=$this->getClaim();
    cot_setuserpoints($points, 'claims',$claim->item_userid, $claim->item_id);
}

?>