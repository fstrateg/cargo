<?php
defined('COT_CODE') or die('Wrong URL');

$id = cot_import('id', 'G', 'INT');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('projects', 'any', 'RWA');
cot_block($usr['auth_write']);
if ($a=='save')
{
    $ritem=cot_marshrut_import();

}
else
{
    $item=cot_get_marshrut_fromdb();
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

$t->parse();
$module_body=$t->text();