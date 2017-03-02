<?php
defined('COT_CODE') or die('Wrong URL.');

include_once cot_langfile('userverif','plug');
cot::$db->registerTable('userverif');

function cot_userverif_verifed()
{
    global $usr,$db,$db_userverif;
    /*
     * null не верифицирован
     * 0 не верифицирован
     * 1 верфицирован
     * 2 идет процесс верификации
     * 3 не прошел верификацию
     */
    $item=$db->query("select * from $db_userverif where userid=${usr['id']}")->fetchAll();
    // если физ лицо
    // если юр лицо

}

function cot_verifuser($userid)
{
    global $db,$db_users,$usr;
    $db->query("update $db_users set user_verif=1 where user_id=$userid")->execute();
}