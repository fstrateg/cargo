<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 02.11.2016
 * Time: 12:15
 */
defined('COT_CODE') or die('Wrong URL');
require_once cot_langfile('transport', 'module');

cot::$db->registerTable('transports');

function cot_generate_transport_row($item_data,$tag_prefix)
{
    global $usr,$L,$cfg;
    $extp_main = cot_getextplugins('projectstags.main');
    $admin_rights = cot_auth('transports', $item_data['item_cat'], 'A');

    $item_data['status']=cot_transport_status($item_data['item_status']);
    $verifed=($item_data['item_verifed']==1)?'verifed':'no-verifed';
    $temp_array = array(
        'ID' => $item_data['item_id'],
        'DATE'=>cot_date('datetime_medium',$item_data['item_date']),
        'TITLE'=>$item_data['item_title'],
        'TEXT'=>$item_data['item_text'],
        'OFFERS_COUNT'=>$item_data['item_offerscount'],
        'USER_IS_ADMIN' => ($admin_rights || $usr['id'] == $item_data['item_userid']),
        'LOCALSTATUS'=>$L['transport_status_'.$item_data['status']],
        'ITEM'=>print_r('',true),
        'VERIFED'=>'/images/'.$verifed.'.png',
        'VERNAME'=>$L['transport_status_'.$verifed],
        'DOVERIFED'=>cot_linkiif($item_data['item_verifed']<>1,'test',$L['transport_doverifed']),
        'URL'=>cot_url('transport','m=edit&id='.$item_data['item_id']),
    );
    $photo=$cfg['root_dir'].$item_data['item_photo'];
    if (file_exists($photo)&&$item_data['item_photo'])
        $temp_array['PHOTO']=$item_data['item_photo'];
    else
        $temp_array['PHOTO']='/datas/photos/no-image.png';

    /* === Hook === */
    foreach ($extp_main as $pl)
    {
        include $pl;
    }
    /* ===== */
    $return_array=[];
    foreach ($temp_array as $key => $val)
    {
        $return_array[$tag_prefix . $key] = $val;
    }

    return $return_array;
}

function cot_transport_status($item_state)
{
    if ($item_state == 0)
    {
        return 'published';
    }
    elseif ($item_state == 2)
    {
        return 'moderated';
    }
    return 'hidden';
}

function cot_linkiif($cond,$url,$text,$attrs="")
{
    if ($cond) return cot_rc_link($url,$text,$attrs);
}

function cot_transport_import($source = 'POST', $ritem = array(), $auth = array())
{
    global $sys;

    $ritem['item_cat'] = cot_import('rcat', $source, 'TXT');

    $ritem['item_text'] = cot_import('rtext', $source, 'HTM');
    if ($ritem['item_verifed']==1)
    {
        $ritem['item_title'] = $ritem['item_title'];
    }
    else
    {
        $ritem['item_title'] = cot_import('rtitle', $source, 'TXT');
    }

    if(empty($ritem['item_date']))
    {
        $ritem['item_date'] = (int)$sys['now'];
    }
    else
    {
        $ritem['item_update'] = (int)$sys['now'];
    }
    if ($auth['isadmin'] && isset($ritem['item_userid']))
    {
        $ritem['item_userid']   = $ritem['item_userid'];
    }
    else
    {
        $ritem['item_userid'] = $usr['id'];
    }
    return $ritem;
}

function cot_transport_validate($ritem)
{
    cot_check(empty($ritem['item_cat']), 'transport_select_cat', 'rcat');
    cot_check(mb_strlen($ritem['item_title']) < 2, 'transport_empty_title', 'rtitle');
    return !cot_error_found();
}
function cot_transport_add(&$ritem, $auth = array())
{
    global $db,$db_transports,$usr;
    $id='';
    if (cot_error_found())
    {
        return false;
    }
    $ritem['item_userid'] = $usr['id'];
    $ritem['item_state']=1;
    if ($db->insert($db_transports, $ritem)) {
        $id = $db->lastInsertId();
    }
    return $id;
}

function cot_transport_update($id, &$ritem, $auth = array())
{
    global $db,$db_transports;
    if (cot_error_found())
    {
        return false;
    }
    if (!$db->update($db_transports, $ritem, 'item_id = ?', $id))
    {
        return false;
    }
    return true;
}

function cot_transport_delete($id, $ritem = array())
{

}