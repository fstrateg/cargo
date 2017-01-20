<?php
defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('projects', 'any', 'RWA');
cot_block($usr['auth_write']);

if ($a=='add')
{
    cot_shield_protect();
    $ritem = cot_marshrut_import($usr);

    /* === Hook === */
    foreach (cot_getextplugins('projects.add.add.import') as $pl)
    {
        include $pl;
    }
    /* ===== */

    cot_marshrut_validate($ritem);
    if (!cot_error_found())
    {
        $id = cot_marshrut_add($ritem);
        cot_redirect(cot_url('marshrut','m=preview&id='.$id,'',true));
        exit;
    }
}

$pt=cot_tplfile('marshrut.add');
$t=new XTemplate($pt);

cot_display_messages($t);

$t->assign([
        'MR_FORM_SEND'=>cot_url('marshrut','m=add&a=add'),
        'MR_FORM_DB'=>cot_inputbox('text','mrdb',cot_date('d.m.Y',$ritem['item_db']),['id'=>'mrdb']),
        'MR_FORM_DE'=>cot_inputbox('text','mrde',cot_date('d.m.Y',$ritem['item_de']),['id'=>'mrde']),
        'MR_FORM_PRICE'=>cot_inputbox('text','mrprice',$ritem['item_price']),
        'TEST'=> print_r($ritem,true),
    ]);

/* === Hook === */
foreach (cot_getextplugins('projects.add.tags') as $pl)
{
    include $pl;
}
/* ===== */

Resources::addFile('js/jquery-ui.min.js');
Resources::addFile('js/jquery-ui.min.css');
$t->parse();
$module_body=$t->text();