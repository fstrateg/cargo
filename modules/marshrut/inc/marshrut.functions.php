<?php
defined('COT_CODE') or die('Wrong URL');

require_once cot_langfile('marshrut','module');
cot::$db->registerTable('marshrut');

function cot_marshrut_import()
{
    $rez=[];
    $rez['item_db']=cot_date2stamp(cot_import('mrdb','POST','TXT'),'d.m.Y');
    $rez['item_de']=cot_date2stamp(cot_import('mrde','POST','TXT'),'d.m.Y');
    $rez['item_price']=cot_import('mrprice','POST','NUM');
    return $rez;
}

function cot_marshrut_validate($ritem)
{
    cot_check(empty($ritem['item_db']), 'marshrut_empty_db', 'mrdb');
    cot_check(empty($ritem['item_de']), 'marshrut_empty_de', 'mrde');
    return !cot_error_found();
}

function cot_marshrut_add($ritem)
{
    global $db,$usr,$db_marshrut;
    $ritem['item_state']=1;
    $ritem['item_usr']=$usr['id'];
    if ($db->insert($db_marshrut, $ritem)) {
        $id = $db->lastInsertId();
    }
    return $id;
}

function cot_generate_marshruttag($item_data,$prefix='')
{
    $temp_array=array();
    $temp_array['DB']=cot_date('d.m.Y',$item_data['item_db']);
    $temp_array['DE']=cot_date('d.m.Y',$item_data['item_de']);
    $temp_array['COST']=$item_data['item_price'];

    foreach (cot_getextplugins('projectstags.main') as $pl)
    {
        include $pl;
    }

    $return_array=[];
    foreach ($temp_array as $key => $val)
    {
        $return_array[$prefix . $key] = $val;
    }
    return $return_array;
}

function cot_get_marshrut_fromdb()
{
    global $db,$db_marshrut,$db_users;

    $id = cot_import('id', 'G', 'INT');
    $item = $db->query("SELECT a.*, u.* FROM $db_marshrut AS a LEFT JOIN $db_users AS u ON u.user_id=a.item_usr WHERE item_id=" . (int)$id)->fetch();

    if ($item['item_id'] != (int)$id)
    {
        cot_die_message(404, TRUE);
    }
    return $item;
}