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

    $status=cot_transport_status($item_data['item_state']);
    $verifed=($item_data['item_verifed']==1)?'verifed':'no-verifed';

    if($item_data['item_verifed']==0)
        $verright=cot_rc_link(cot_url('transport','m=verif&id='.$item_data['item_id']),$L['transport_doverifed']);
    elseif ($item_data['item_verifed']==1)
        $verright='';
    elseif ($item_data['item_verifed']==2)
        $verright=$L['transport_status_moderated'];
    else
        $verright='';

    global $type_transp;
    $temp_array = array(
        'ID' => $item_data['item_id'],
        'DATE'=>cot_date('datetime_medium',$item_data['item_date']),
        'TITLE'=>$item_data['item_title'],
        'TEXT'=>$item_data['item_text'],
        'TRANSP'=>$type_transp[$item_data['item_transp']],
        'OFFERS_COUNT'=>$item_data['item_offerscount'],
        'USER_IS_ADMIN' => ($admin_rights || $usr['id'] == $item_data['item_userid']),
        'LOCALSTATUS'=>$status,
        'ITEM'=>print_r('',true),
        'VERIFED'=>'/images/'.$verifed.'.png',
        'VERNAME'=>$L['transport_status_'.$verifed],
        'DOVERIFED'=>$verright,
        'URL'=>cot_url('transport','m=edit&id='.$item_data['item_id']),
    );
    $photo=$cfg['root_dir'].DS.$item_data['item_photo'];
    if (file_exists($photo)&&$item_data['item_photo'])
        $temp_array['PHOTO']=$item_data['item_photo'];
    else
        $temp_array['PHOTO']='/datas/photos/fura_no_photo.png';

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
    global $L;
    $class='info';
    if ($item_state == 1)
    {
        $status='published';
    }
    elseif ($item_state == 2)
    {
        $status='moderated';
    }
    elseif ($item_state == 0) {
        $status = 'hidden';
        $class='warning';
    }
    $status="<span class='badge badge-$class'>".$L['transport_status_'.$status].'</span>';
    return $status;
}

function cot_linkiif($cond,$url,$text,$attrs="")
{
    if ($cond) return cot_rc_link($url,$text,$attrs);
}

function cot_transport_import($source = 'POST', $ritem = array(), $auth = array())
{
    global $sys,$cfg,$usr;

    $ritem['item_driver']= cot_import('rdriver',$source,'TXT');
    $ritem['item_text'] = cot_import('rtext', $source, 'HTM');
    $ritem['item_vol']=cot_import('rvol',$source,'INT');
    $ritem['item_length']=cot_import('rlen',$source,'INT');
    $ritem['item_transp']=cot_import('rtransp',$source,'INT');

    $trailer=cot_import('trailer',$source,'INT');
    if ($trailer) {
        $ritem['trailer_number'] = strtoupper(cot_import('tnumber', $source, 'TXT'));
        $ritem['trailer_number'] = mb_strtoupper($ritem['trailer_number'],"UTF-8");
        $ritem['trailer_vol'] = cot_import('tvol', $source, 'INT');
        $ritem['trailer_len'] = cot_import('tlen', $source, 'INT');
    }
    else
    {
        $ritem['trailer_number'] = '';
        $ritem['trailer_vol'] = '';
        $ritem['trailer_len']='';
    }


    if (isset($_FILES['rphoto'])&&$_FILES['rphoto']['errors']==0)
    {
        $file=$_FILES['rphoto'];
        if (getimagesize($file['tmp_name']))
        {
            $id=$ritem['item_id'];
            if (!$id)
            {
                $id='u_'.$usr['id'];
            }
            $ritem['item_photo']=$cfg['photos_dir']."/${id}_transp.jpg";
            cot_transport_uploadImage($file['tmp_name'],$cfg['root_dir'].DS.$ritem['item_photo'],300);
        }
    }
    if ($ritem['item_verifed']==0)
    {
        $ritem['item_title'] = strtoupper(cot_import('rtitle', $source, 'TXT'));
        $ritem['item_title']=mb_convert_case($ritem['item_title'], MB_CASE_UPPER, "UTF-8");
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
    cot_check(empty($ritem['item_transp']), 'transport_select_cat', 'rtransp');
    cot_check(mb_strlen($ritem['item_title']) < 2, 'transport_empty_title', 'rtitle');
    cot_check(mb_strlen($ritem['item_driver']) < 2, 'transport_empty_driver', 'rdriver');
    cot_check($ritem['item_vol']<=0,'transport_empty_vol','rvol');
    cot_check($ritem['item_length']<=0,'transport_empty_len','rlen');


    if ($ritem['trailer_number']||$ritem['trailer_len']||$ritem['trailer_vol'])
    {
        cot_check(mb_strlen($ritem['trailer_number']) < 2, 'transport_empty_tnumber', 'tnumber');
        cot_check($ritem['trailer_len'] < 1, 'transport_empty_tlen', 'tlen');
        cot_check($ritem['trailer_vol'] < 1, 'transport_empty_tvol', 'tvol');
    }

    return !cot_error_found();
}
function cot_transport_add(&$ritem, $auth = array())
{
    global $db,$db_transports,$usr,$cfg;
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
    if ($ritem['item_photo'])
    {
        $old=$cfg['photos_dir'].'/u_'.$usr[id].'_transp.jpg';
        $new=$cfg['photos_dir'].'/'.$id.'_transp.jpg';
        $ritem['item_photo']=$new;
        if (rename($cfg['root_dir'].DS.$old,$cfg['root_dir'].DS.$new))
            cot_transport_update($id,$ritem);

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

function cot_transport_loaddocs($userid,$id)
{
    global $cfg,$L,$db,$db_transports;
    $files=$_FILES;
    $i=1;
    foreach($files as $file)
    {
        if ($file['error']<>UPLOAD_ERR_OK) continue;
        $ff = getimagesize($file["tmp_name"]);
        if (!$ff) continue;
        $ff=$cfg['root_dir'].DS.$cfg['scan_dir'].DS."${userid}_${id}_scan${i}.jpg";
        if (cot_transport_uploadImage($file['tmp_name'],$ff,800)) {
            cot_message($L['transport_filesending']);
            $i++;
        }
    }
    unset($_FILES);
    $db->query("update $db_transports set item_verifed=2 where item_id=$id")->execute();
}

function cot_transport_uploadImage($fileist,$filename,$max_size)
{
    $rez=getimagesize($fileist);
    $prcarray=[
        1=>'gif',
        2=>'jpeg',
        3=>'png',
        6=>'wbmp',
    ];
    $width=$rez[0];
    $height=$rez[1];
    $k=($width>$height?$width:$height)/$max_size;
    $k=$k<1?1:$k;
    $width = (int)($width / $k);
    $height = (int)($height / $k);
    $image_p = imagecreatetruecolor($width, $height);
    if (!$prcarray[$rez[2]]) return false;
    $prc = 'imagecreatefrom' . $prcarray[$rez[2]];
    $image = $prc($fileist);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0,
        $width, $height, $rez[0], $rez[1]);
    imagejpeg($image_p, $filename);
    return true;
}