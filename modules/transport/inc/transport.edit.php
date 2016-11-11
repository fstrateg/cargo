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
        cot_redirect(cot_url('transport', "m=edit&id=$id", '', true));
    }
}

$out['subtitle'] = $L['transport_edit_project_title'];
$out['head'] .= $R['code_noindex'];

$mskin = cot_tplfile(array('transport', 'edit'));
$t=new XTemplate($mskin);
cot_display_messages($t);

$disabled=$item['item_verifed']==1?' disabled':'';

$t->assign(array(
    "TRNSEDIT_FORM_SEND" => cot_url('transport', "m=edit&a=update&id=" . $item['item_id']),
    "TRNSEDIT_FORM_ID" => $item['item_id'],
    "TRNSEDIT_FORM_CAT" => cot_selectbox_structure('projects', $item['item_cat'], 'rcat', '', false),
    "TRNSEDIT_FORM_REGNUMBER" => cot_inputbox('text','rtitle',$item['item_title'],$disabled),
    "TRNSEDIT_FORM_PHOTO"=> 'test',
    "TRNSEDIT_FORM_TEXT" => cot_textarea('rtext', $item['item_text'], 10, 60,'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : '')
));

/* === Hook === */
foreach (cot_getextplugins('transport.edit.tags') as $pl)
{
    include $pl;
}
/* ===== */

$t->parse('MAIN');
$module_body = $t->text('MAIN');