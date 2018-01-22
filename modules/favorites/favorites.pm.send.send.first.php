<?php defined('COT_CODE') or die('Wrong URL');
/* ====================
[BEGIN_COT_EXT]
Hooks=pm.send.send.first
[END_COT_EXT]
==================== */
echo  $newpmrecipient;
echo '<br>';
$userid=$usr['id'];
//-- Проверяем получателей в ЧС, отправитель сам поместил пользователя в ЧС /--
$arr=explode(',',$newpmrecipient);
global $db;
$tousersql=[];
foreach($arr as $i)
{
    $user_name=trim(cot_import($i, 'D', 'TXT'));
    if(!empty($user_name))
        $tousersql[] = "'".$db->prep($user_name)."'";
}
$tousersql = '('.implode(',', $tousersql).')';
$rez = $db->query("SELECT user_id FROM $db_users WHERE user_name IN $tousersql");
$pm_users_id=[];
while ($rw=$rez->fetch())
{
    $pm_users_id[]=(int)$rw['user_id'];
}
$tousersql = '('.implode(',', $pm_users_id).')';

cot::$db->registerTable('blacklist');
global $db_blacklist;

$rez=$db->query("select count(*) from $db_blacklist where userid=$userid and usr IN $tousersql")->fetchColumn();
if ($rez) cot_error('bl_recipientinbl');
//-- Проверяем отправителя в ЧС (получатель добавил отправителя в ЧС) /--
$rez=$db->query("select count(*) from $db_blacklist where usr=$userid and userid IN $tousersql")->fetchColumn();
if ($rez) cot_error('bl_youinbl');