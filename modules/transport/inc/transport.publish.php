<?php

defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');

cot_block($usr['auth_read']);

global $L,$db;

$id=cot_import('id','G','INT');
$state=cot_import('state','G','INT');
$userid=$usr['id'];

$wherecount="WHERE item_id=$id AND item_userid=$userid";
$sql_transp = $db->query("SELECT * FROM $db_transports as p " . $wherecount);
$tr=$sql_transp->fetch();

if ($tr)
    $db->query("update $db_transports set item_state=$state where item_id=$id");

cot_redirect(cot_url('transport','m=edit&id='.$id,'',true));