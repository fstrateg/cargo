<?php
/**
 * Created by PhpStorm.
 * User: 734
 * Date: 14.06.2017
 * Time: 14:36
 */


$shortpath = $cfg['plugin']['kursvalut'];
cot_rc_add_file($cfg['plugins_dir'] . '/kursvalut/tpl/kursvalut.css');
$dat=date('d.m.Y');
$arr = array('USD','EUR','RUB','CNY');
$tr = create_tr($arr);
$st = "<div class='table_blur d-none d-xl-block'>
    <table class='table-responsive'>
        <caption>Курс валют на $dat </caption>
        <tr>
            <th>Валюта</th>
            <th>Код</th>
            <th>Курс</th>
            <th>Изменение</th>
        </tr>
        $tr
    </table>
</div>";
$shortpath['ext_kursvalut']=$st;

$ext_kursvalut = $shortpath['ext_kursvalut'];






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