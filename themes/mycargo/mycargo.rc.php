<?php
/**
 * JavaScript and CSS loader for bootlance theme
 *
 * @package Cotonti
 * @version 0.9.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru, littledev.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');


cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap.min.css');
Resources::addFile($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/icons.css');
Resources::addFile($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/js/popper.min.js');
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap.old.css');
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap-responsive.old.css');

cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/modalbox.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/style.css');

cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/js.js');

require_once cot_rc($cfg['themes_dir'].'/'.$usr['theme'].'/'.$usr['theme'].'.resources.php');

?>