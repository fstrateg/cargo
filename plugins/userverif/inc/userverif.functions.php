<?php
defined('COT_CODE') or die('Wrong URL.');

include_once cot_langfile('userverif','plug');
cot::$db->registerTable('userverif');

function cot_userverif_uploadpass()
{
    return true;
}

function cot_userverif_getinfo()
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
}