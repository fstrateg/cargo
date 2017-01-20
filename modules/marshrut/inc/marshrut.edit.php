<?php
defined('COT_CODE') or die('Wrong URL');

$id = cot_import('id', 'G', 'INT');

if (!$id || $id < 0)
{
    cot_die_message(404);
}

$item=cot_get_marshrut_fromdb();

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('projects', 'any', 'RWA');
cot_block($usr['isadmin'] || $usr['auth_write'] && $usr['id'] == $item['item_userid']);

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
        $params=['m'=>'details',
            'id'=>$usr['id'],
            'tab'=>'marshrut',
        ];
        $r_url=cot_url('users',$params,'' ,true);
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
}

$t=new XTemplate(cot_tplfile('marshrut.edit'));
$t->assign([
    'MR_FORM_SEND'=>cot_url('marshrut','m=edit&a=save&id='.$id),
    'MR_FORM_DB'=>cot_inputbox('text','mrdb',cot_date('d.m.Y',$item['item_db']),['id'=>'mrdb']),
    'MR_FORM_DE'=>cot_inputbox('text','mrde',cot_date('d.m.Y',$item['item_de']),['id'=>'mrde']),
    'MR_FORM_PRICE'=>cot_inputbox('text','mrprice',$item['item_price']),
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