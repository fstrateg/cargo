<?php
defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');

cot_block($usr['auth_read']);

$id = cot_import('id', 'G', 'INT');

if (!$id || $id < 0)
{
    cot_die_message(404);
}
$sql = $db->query("SELECT * FROM $db_transports WHERE item_id='$id' and item_userid='${usr['id']}' LIMIT 1");
cot_die($sql->rowCount() == 0);
$item = $sql->fetch();
if ($item['item_photo'])
    if (file_exists($cfg['root_dir'].DS.$item['item_photo']))
        unlink($cfg['root_dir'].DS.$item['item_photo']);

$scan=$cfg['root_dir'].DS."${cfg['scan_dir']}/${usr['id']}_${id}_scan1.jpg";
if (file_exists($scan)) unlink($scan);

$scan=$cfg['root_dir'].DS."${cfg['scan_dir']}/${usr['id']}_${id}_scan2.jpg";
if (file_exists($scan)) unlink($scan);

$sql = $db->query("delete from $db_transports WHERE item_id='$id'")->execute();
cot_message(sprintf($L['transport_deleted'],$item['item_title']));
cot_redirect(cot_url('users',"m=details&id=${usr['id']}&tab=transport",'',true));