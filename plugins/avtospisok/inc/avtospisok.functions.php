<?php
function create_avtospisok_selectbox($optname,$sel){
    if (!$sel){
        $sel=cot_import_buffered($optname,$sel);}
    cot::$db->registerTable('spisok_avtotransport');
    global $db, $db_spisok_avtotransport;
    $result = "<select name=$optname>
<optgroup label=''>";
    $res = $db->query("SELECT id,name FROM $db_spisok_avtotransport WHERE hot = TRUE")->fetchall();
    foreach ($res as $item)
    {
        $id=$item['id'];
        $name=$item['name'];
        if($sel==$id){
            $result=$result . "<option value=$id selected>$name</option>";}
        else{$result=$result . "<option value=$id>$name</option>";}
    }
    $result = $result . '</optgroup>
<optgroup label="---------------">';
    $res = $db->query("SELECT id,name FROM $db_spisok_avtotransport WHERE hot = FALSE  ORDER BY name")->fetchall();
    foreach ($res as $item)
    {
        $id=$item['id'];
        $name=$item['name'];
        if($sel==$id){
            $result=$result . "<option value=$id selected>$name</option>";}
        else{$result=$result . "<option value=$id>$name</option>";}
    }
    $result = $result . '</optgroup></select>';
    return $result;
}


function get_avtospisok_value($id){
    cot::$db->registerTable('spisok_avtotransport');
    global $db, $db_spisok_avtotransport;
    $res = $db->query("SELECT name FROM $db_spisok_avtotransport WHERE id = $id")->fetch();
    $result = $res['name'];
    return $result;
}

function create_avtospisok_list()
{
    global $type_transp;
    if (isset($type_transp)) return;
    cot::$db->registerTable('spisok_avtotransport');
    global $db, $db_spisok_avtotransport;
    $res = $db->query("SELECT id,name FROM $db_spisok_avtotransport");
    $type_transp=[];
    while ($rw=$res->fetch())
    {
        $type_transp[$rw['id']]=$rw['name'];
    }
    $res->closeCursor();
}


function create_avtospisok_admin()
{
    cot::$db->registerTable('spisok_avtotransport');
    global $db, $db_spisok_avtotransport;
    $result = "";
    $res = $db->query("SELECT * FROM $db_spisok_avtotransport")->fetchall();
    foreach ($res as $item)
    {
        $result=$result . '<tr>';
        $id=$item['id'];
        $name=$item['name'];
        $result = $result . "<td class='name'>$name</td>";
        $hot = $item['hot'];
        if($hot)
        {$ch='selected';}
        else{$ch='';}
        $result=$result . "<td class='hot'><select name='hot[$id]'>
        <option value='0' $ch>0</option><option value='1' $ch>1</option>
        </select></td><td><input name='del[$id]' type='checkbox'></td>";

        $result=$result . "</tr>";
    }
    return $result;
}