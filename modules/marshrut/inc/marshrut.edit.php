<?php
defined('COT_CODE') or die('Wrong URL');

$id = cot_import('id', 'G', 'INT');
$stat=cot_import('stat','G','INT');
$stat=$stat?'&stat='.$stat:'';

if (!$id || $id < 0)
{
    cot_die_message(404);
}

$item=cot_get_marshrut_fromdb();

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('projects', 'any', 'RWA');
cot_block($usr['isadmin'] || $usr['auth_write'] && $usr['id'] == $item['item_userid']);

$params=['m'=>'details',
    'id'=>$usr['id'],
    'tab'=>'marshrut',
];
$r_url=cot_url('users',$params,'' ,true).$stat;

if ($a=='save')
{
    $ritem=cot_marshrut_import();
    /* === Hook === */
    foreach (cot_getextplugins('projects.edit.update.import') as $pl)
    {
        include $pl;
    }
    /* ===== */
    cot_marshrut_validate($ritem);
    if (!cot_error_found())
    {
        $id = cot_marshrut_edit($ritem,$id);

        cot_redirect($r_url);
    }
    else
    {
        $item=$ritem;
    }
}
elseif ($a=='del')
{
    cot_marshrut_del($id);
    cot_redirect($r_url);
}
elseif ($a=='state')
{
    cot_marshrut_changestate($id);
    cot_redirect($r_url);
}

$t=new XTemplate(cot_tplfile('marshrut.edit'));

cot_display_messages($t);

$t->assign([
    'MR_FORM_SEND'=>cot_url('marshrut','m=edit&a=save&id='.$id),
    'MR_FORM_DB'=>cot_inputbox('text','mrdb',cot_date('d.m.Y',$item['item_db']),['id'=>'mrdb','class'=>'form-control']),
    'MR_FORM_DE'=>cot_inputbox('text','mrde',cot_date('d.m.Y',$item['item_de']),['id'=>'mrde','class'=>'form-control']),
    'MR_FORM_PRICE'=>cot_inputbox('number','mrprice',$item['item_price'],'class="form-control"'),
    'MR_FORM_TTYPE'=>create_avtospisok_selectbox('mrttype',$item['item_ttype'],'class="form-control"'),
    'MR_FORM_FRT'=>cot_getfrt4($item['item_frt'],'mr'),
    ]);
// Цепляем пункты отправки и т.п.
/* === Hook === */
foreach (cot_getextplugins('projects.edit.tags') as $pl)
{
    include $pl;
}
/* ===== */
Resources::addFile('js/jquery-ui.min.js');
Resources::addFile('js/jquery-ui.min.css');

$t->parse();
$module_body=$t->text();