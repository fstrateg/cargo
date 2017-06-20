<?php
/**
 * Created by PhpStorm.
 * User: 734
 * Date: 14.06.2017
 * Time: 14:36
 */
function create_tr($arr)
{
    cot::$db->registerTable('grab_kurs');
    global $db, $db_grab_kurs;
    $str = "";
    foreach ($arr as $item) {
        $res = $db->query("SELECT * FROM $db_grab_kurs WHERE Kod = '$item'")->fetch();
        $name = $res['Kod'];
        $kod = $res['valName'];
        $kurs = $res['Kurs'];
        $ch = $res['Chan'];
        $font = $res['Font'];
        $str= $str . "<tr>
        <td><font color=black>$kod</font></td>
        <td><font color=black>$name</font></td>
        <td><font color=black>$kurs</font></td>
        <td><font color=$font>$ch</font></td>
    </tr>";

    }
    return $str;
}