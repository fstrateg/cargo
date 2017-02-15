<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=projects.copy.tags
 * [END_COT_EXT]
 */
/**
 * Location Selector for Cotonti
 *
 * @package locationselector
 * @version 2.0.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru, littledev.ru
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL.');

// ==============================================

$t->assign(array(
"PRJADD_FORM_LOCATION" => cot_select_location($ritem['item_country'], $ritem['item_region'], $ritem['item_city'])
));

$t->assign(array(
"PRJADD_FORM_LOCATIONTO" => cot_select_locationto($ritem['item_countryto'], $ritem['item_regionto'], $ritem['item_cityto'])
));