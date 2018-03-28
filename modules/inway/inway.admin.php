<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=admin
 * [END_COT_EXT]
 */

defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$a=cot_import('a','G','ALP');
if (!in_array($a,array('clist','cvalid','cdel','reqs')))
    $a='ilist';

include_once cot_langfile('inway','module');
include_once cot_incfile('inway','modile');
require_once cot_incfile('inway','module','admin.'.$a);