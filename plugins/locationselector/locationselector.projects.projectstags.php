<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=projectstags.main
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

$location_info = cot_getlocation($item_data['item_country'], $item_data['item_region'], $item_data['item_city']);
$temp_array['COUNTRY'] = $location_info['country'];
$temp_array['REGION'] = $location_info['region'];
$temp_array['CITY'] = $location_info['city'];

$location_info = cot_getlocation($item_data['item_countryto'], $item_data['item_regionto'], $item_data['item_cityto']);
$temp_array['COUNTRYTO'] = $location_info['country'];
$temp_array['REGIONTO'] = $location_info['region'];
$temp_array['CITYTO'] = $location_info['city'];
