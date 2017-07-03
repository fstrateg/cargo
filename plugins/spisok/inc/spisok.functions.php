<?php

function create_option()
{
    cot::$db->registerTable('spisok_transport');
    global $db, $db_spisok_transport;
    $str = '<select name="rcat">
<optgroup label="">';
        $res = $db->query("SELECT id,name FROM $db_spisok_transport WHERE hot = TRUE ORDER BY name")->fetchall();
        foreach ($res as $item)
        {
            $id=$item['id'];
            $name=$item['name'];
            $str=$str . "<option value=$id>$name</option>";
        }
    $str = $str . '</optgroup>
<optgroup label="--------">';
    $res = $db->query("SELECT id,name FROM $db_spisok_transport WHERE hot = FALSE  ORDER BY name")->fetchall();
    foreach ($res as $item)
    {
        $id=$item['id'];
        $name=$item['name'];
        $str=$str . "<option value=$id>$name</option>";
    }
    $str = $str . '</optgroup></select>';
    return $str;
}


function create_admin()
{
    cot::$db->registerTable('spisok_transport');
    global $db, $db_spisok_transport;
    $str = "";
    $res = $db->query("SELECT * FROM $db_spisok_transport")->fetchall();
    foreach ($res as $item)
    {
        $str=$str . '<tr>';
        $id=$item['id'];
        $name=$item['name'];
        $str = $str . "<td class='name'>$name</td>";
        $hot = $item['hot'];
        if($hot)
        {$ch='selected';}
        else{$ch='';}
        $str=$str . "<td class='hot'><select name='hot[$id]'>
        <option value='0' $ch>0</option><option value='1' $ch>1</option>
        </select></td><td><input name='del[$id]' type='checkbox'></td>";

        $str=$str . "</tr>";
    }
    return $str;
}