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

$attr=['style'=>'text-transform:uppercase;','class'=>'form-control'];

$t->assign(array(
    "TRNSADD_FORM_SEND" => cot_url('transport', "m=add&a=add",'',true),
    "TRNSADD_FORM_CAT" => create_avtospisok_selectbox('rtransp', $item['item_transp'],'class="form-control"'),
    "TRNSADD_FORM_REGNUMBER" => cot_inputbox('text','rtitle',$item['item_title'],$attr),
    "TRNSADD_FORM_DRIVER" => cot_inputbox('text','rdriver',$item['item_driver'],['size'=>'75','class'=>'form-control','max-length'=>'255']),
    "TRNSADD_FORM_VOL" => cot_inputbox('text','rvol',$item['item_vol'],['class'=>'form-control']),
    "TRNSADD_FORM_LEN" => cot_inputbox('text','rlen',$item['item_len'],['class'=>'form-control']),
    "TRNSADD_FORM_PHOTO"=> cot_inputbox('file','rphoto'),
    "TRNSADD_FORM_TEXT" => cot_textarea('rtext', $item['item_text'], 10, 60,'id="formtext"', ($prjeditor) ? 'input_textarea_'.$prjeditor : ''),
    "TEST" =>  print_r($item,true),
));

/* triler */
$t->assign([
    'TRAILER_NUMBER'=>cot_inputbox('text','tnumber',$item['trailer_number'],$attr),
    'TRAILER_VOL'=>cot_inputbox('number','tvol',$item['trailer_vol'],'class="form-control"'),
    'TRAILER_LEN'=>cot_inputbox('number','tlen',$item['trailer_len'],'class="form-control"'),
    'TRAILER'=>cot_inputbox('hidden','trailer',$item['trailer_number']||$item['trailer_vol']||$item['trailer_len']?'1':'0'),
]);

/* === Hook === */
foreach (cot_getextplugins('transport.add.tags') as $pl)
{
    include $pl;
}
/* ===== */

$t->parse('MAIN');
$module_body = $t->text('MAIN');