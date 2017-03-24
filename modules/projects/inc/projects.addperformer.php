<?php
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['auth_read']);

$id = cot_import('id', 'G', 'INT');

if ($id > 0 || !empty($al))
{
    $where = (!empty($al)) ? "item_alias='".$al."'" : 'item_id='.$id;
    $sql = $db->query("SELECT p.*, u.* FROM $db_projects AS p LEFT JOIN $db_users AS u ON u.user_id=p.item_userid WHERE $where LIMIT 1");
}

if (!$id && empty($al) || !$sql || $sql->rowCount() == 0)
{
    cot_die_message(404, TRUE);
}

$item = $sql->fetch();

$mskin = cot_tplfile(array('projects', 'addperformer'));
$t = new XTemplate($mskin);

$t->assign(cot_generate_usertags($item, 'PRJ_OWNER_'));
$t->assign(cot_generate_projecttags($item, 'PRJ_', $cfg['projects']['shorttextlen'], $usr['isadmin'], $cfg['homebreadcrumb']));
$t->assign([
    'PRJ_FINDCARRIER'=>cot_inputbox('number','idcarrier','','id="idcarrier"'),
    'PRJ_FIND_URL'=>cot_url('projects',"m=searchcarrier","",true),
]);

$t->parse();
$module_body = $t->text('MAIN');
