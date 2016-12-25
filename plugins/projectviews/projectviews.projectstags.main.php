<?php
/* ====================
[BEGIN_COT_EXT]
* Hooks=projectstags.main
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('projectviews','plug');

if (isset($temp_array['ID']))
{
    global $db_projectviews;
    $id=$temp_array['ID'];
    $sql=$db->query("select count(*) from $db_projectviews where areaid=?",$id);
    $rz=$sql->fetchColumn();
    $temp_array['VIEWS']=$rz;

}