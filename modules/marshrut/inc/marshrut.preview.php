<?php
defined('COT_CODE') or die('Wrong URL');

$id = cot_import('id', 'G', 'INT');
$stat=cot_import('stat','G','INT');
$stat=$stat?'&stat='.$stat:'';

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('projects', 'any', 'RWA');
cot_block($usr['auth_write']);

$item = $db->query("SELECT a.*, u.* FROM $db_marshrut AS a LEFT JOIN $db_users AS u ON u.user_id=a.item_userid WHERE item_id=" . (int)$id)->fetch();

if ($item['item_id'] != (int)$id)
{
    cot_die_message(404, TRUE);
}

if ($item['item_state'] != 0 && !$usr['isadmin'] && $usr['id'] != $item['item_userid'])
{
    cot_log("Attempt to directly access an un-validated", 'sec');
    cot_redirect(cot_url('message', "msg=930", '', true));
    exit;
}

$t=new XTemplate(cot_tplfile('marshrut.preview'));

$t->assign(cot_generate_usertags($item, 'MR_OWNER_'));
$t->assign(cot_generate_marshruttag($item,'MR_'));
$t->assign([
    'MR_PUBLISH_URL'=>cot_url('marshrut','m=edit&a=state&v=1'.$stat,"&id=$id",true),
    'MR_HIDE_URL'=>cot_url('marshrut','m=edit&a=state&v=2'.$stat,"&id=$id",true),
    'MR_ARCHIVE_URL'=>cot_url('marshrut','m=edit&a=state&v=3'.$stat,"&id=$id",true),
    'MR_DELETE_URL'=>cot_url('marshrut','m=edit&a=del'.$stat,"&id=$id",true),
    'MR_EDIT_URL'=>cot_url('marshrut','m=edit',"&id=$id".$stat,true),
    ]);

$t->parse();
$module_body=$t->text();
