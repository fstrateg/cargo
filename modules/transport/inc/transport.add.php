<?php
defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');

cot_block($usr['auth_read']);


if ($a == 'add') {
    cot_shield_protect();

    $ritem = cot_transport_import('POST', array(), $usr);
    /* === Hook === */
    foreach (cot_getextplugins('transport.add.add.import') as $pl)
    {
        include $pl;
    }
    /* ===== */
    cot_transport_validate($ritem);
    if (!cot_error_found()) {

        cot_transport_add($ritem, $usr);
        $params=['m'=>'details',
            'id'=>$usr['id'],
            'tab'=>'transport',
        ];
        $r_url=cot_url('users',$params,'' ,true);
        cot_redirect($r_url);
    }
    else
    {
        cot_redirect(cot_url('transport', "m=add", '', true));
    }

}

$out['subtitle'] = $L['transport_add_project_title'];
$out['head'] .= $R['code_noindex'];

$mskin = cot_tplfile(array('transport', 'add'));
$t=new XTemplate($mskin);
cot_display_messages($t);

$t->assign(array(
    "TRNSADD_FORM_SEND" => cot_url('transport', "m=add&a=add",'',true),
    "TRNSADD_FORM_CAT" => cot_selectbox_structure('projects', $item['item_cat'], 'rcat', '', false),
    "TRNSADD_FORM_REGNUMBER" => cot_inputbox('text','rtitle',$item['item_title'],$disabled),
    "TRNSADD_FORM_PHOTO"=> cot_inputbox('file','rphoto'),
    "TRNSADD_FORM_TEXT" => cot_textarea('rtext', $item['item_text'], 10, 60,'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
    "TEST" =>  print_r($item,true),
));
/* === Hook === */
foreach (cot_getextplugins('transport.add.tags') as $pl)
{
    include $pl;
}
/* ===== */

$t->parse('MAIN');
$module_body = $t->text('MAIN');