<?php
/**
 * [BEGIN_COT_EXT]
 *   Hooks=tools
 * [END_COT_EXT]
 */

defined ('COT_CODE') or die ('Wrong URL.');

/*
 * Обновляем список
 */
if (isset($_POST['upd_spisok'])) {
    {session_start();
        if (isset($_POST['hot'])) {

            $st = '';
            $url = $_SERVER['HTTP_REFERER'];
            foreach ($_POST['hot'] as $key => $value) {
                $id = $key;
                $hot = $value;
                cot::$db->registerTable('spisok_avtotransport');
                global $db, $db_spisok_transport;
                $res = $db->query("UPDATE $db_spisok_avtotransport SET hot='$hot' WHERE id='$id'");
            }
        }
    }
    header("Location: ".$_SERVER["REQUEST_URI"]);
    cot_message('Данные успешно обновленны');
    exit;
}

/*
 * Удаляем выбраные элементы
 */

if (isset($_POST['del_check'])) {
    {session_start();
        if (isset($_POST['del'])) {

            $st = '';
            $url = $_SERVER['HTTP_REFERER'];
            foreach ($_POST['del'] as $key => $value) {
                $id = $key;

                cot::$db->registerTable('spisok_avtotransport');
                global $db, $db_spisok_avtotransport;
                $res = $db->query("DELETE FROM $db_spisok_avtotransport WHERE id='$id'");
                cot_message("Поле успешно удалено из базы данных");
            }
        }
    }
    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * Добавляем элемент
 */

if (isset($_POST['add_spisok'])) {
    {session_start();

        if (isset($_POST['add_name']))
        {
            if($_POST['add_name']!=''){
            $name = $_POST['add_name'];
            cot::$db->registerTable('spisok_avtotransport');
            global $db, $db_spisok_transport;
            $res = $db->query("SELECT name FROM $db_spisok_avtotransport WHERE name = '$name'")->fetch();
            if (!$res){
            $hot = $_POST['add_hot'];
            $url = $_SERVER['HTTP_REFERER'];
                $db->query("INSERT INTO $db_spisok_avtotransport(id,name, hot) VALUES (null,'$name','$hot')");
                cot_message("Поле $name добавлено в базу данных");
        }
        }
    }
    cot_check($_POST['add_name']=='','Не указанно наименование, сохранение отменено!');
        cot_check($_POST['add_name']==$res['name'],"Элемент $name уже существует!");}
    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

$s = create_admin();
$t = new XTemplate(cot_tplfile('spisok.admin', 'plug', true));
$t->assign(array('TAG_ADMIN'=>$s,
                    'ACTION_ADMIN'=>cot_url('spisok', 'a=send')));



cot_display_messages($t);
$t->parse('MAIN');
$adminmain = $t->text('MAIN');

