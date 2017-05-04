<?php
defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');

cot_block($usr['auth_read']);

$id = cot_import('id', 'G', 'INT');

if (!$id || $id < 0)
{
    cot_die_message(404);
}

$sql = $db->query("SELECT * FROM $db_transports WHERE item_id='$id' LIMIT 1");
cot_die($sql->rowCount() == 0);
$item = $sql->fetch();


cot_block($usr['isadmin'] || $usr['id'] == $item['item_userid']);

$redir=cot_url('transport', "m=edit&id=$id", '', true);

if ($a == 'update')
{
    $ritem = cot_transport_import('POST', $item, $usr);
    /* === Hook === */
    foreach (cot_getextplugins('transport.edit.update.import') as $pl)
    {
        include $pl;
    }
    /* ===== */
    cot_transport_validate($ritem);
    if (!cot_error_found()) {

        cot_transport_update($id, $ritem, $usr);
        $params=['m'=>'details',
                'id'=>$usr['id'],
                'tab'=>'transport',
        ];
        $r_url=cot_url('users',$params,'' ,true);
        cot_redirect($r_url);
    }
    else
    {
        cot_redirect($redir);
    }
}
elseif ($a=='imgdel')
{
    transport_delphoto($item);
    cot_redirect($redir);
}

$out['subtitle'] = $L['transport_edit_project_title'];
$out['head'] .= $R['code_noindex'];

$module_body =transpedit_view($item);


function transpedit_view($item)
{
    global $prjeditor, $L;
    $id=$item['item_id'];
    $mskin = cot_tplfile(array('transport', 'edit'));
    $t=new XTemplate($mskin);
    cot_display_messages($t);

    $attr=['style'=>'text-transform:uppercase;'];
    if ($item['item_verifed']>0)
    {
        $attr['disabled']='true';
    }

    if ($item['item_state']==1)
        $publish=cot_rc_link(cot_url('transport','m=publish&id='.$id.'&state=0'),$L['Hide'],'class="btn btn-warning"');
    else
        $publish=cot_rc_link(cot_url('transport','m=publish&id='.$id.'&state=1'),$L['Publish'],'class="btn btn-success"');

    $t->assign(array(
        "TRNSEDIT_FORM_SEND" => cot_url('transport', "m=edit&a=update&id=" . $item['item_id']),
        "TRNSEDIT_FORM_ID" => $item['item_id'],
        "TRNSEDIT_FORM_CAT" => cot_selectbox_structure('projects', $item['item_cat'], 'rcat', '', false),
        "TRNSEDIT_FORM_REGNUMBER" => cot_inputbox('text','rtitle',$item['item_title'],$attr),
        "TRNSEDIT_FORM_DRIVER" => cot_inputbox('text','rdriver',$item['item_driver'],['size'=>'75','max-length'=>'255']),
        "TRNSEDIT_FORM_PHOTO"=> transpedit_getphoto($item['item_photo'],$id),
        "TRNSEDIT_FORM_TEXT" => cot_textarea('rtext', $item['item_text'], 10, 60,'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
        "TRNSEDIT_FORM_DELETE"=> cot_rc_link('javascript:void(0)',$L['Delete'],'class="btn btn-danger" id="del"'),
        "TRNSEDIT_FORM_DELURL"=> cot_url('transport','m=delete&id='.$id,'',true),
        "TRNSEDIT_FORM_UNPUBLISH" => $publish,
    ));


    /* === Hook === */
    foreach (cot_getextplugins('transport.edit.tags') as $pl)
    {
        include $pl;
    }
    /* ===== */

    $t->parse('MAIN');
    return $t->text('MAIN');
}

function transpedit_getphoto($filename,$id)
{
    global $cfg, $L;
    if ($filename&&file_exists($cfg['root_dir'].DS.$filename))
        return "<img src='$filename'/> ".cot_rc_link(cot_url('transport','m=edit&a=imgdel&id='.$id,'',true),$L['Delete']);
    return cot_inputbox('file','rphoto');
}

function transport_delphoto($item)
{
    global $cfg, $db, $db_transports;
    $filename=$item['item_photo'];
    if ($filename&&file_exists($cfg['root_dir'].DS.$filename))
    {
        unlink($filename);
        $db->query("update $db_transports set item_photo = ''")->execute();
    }
}