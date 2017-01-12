<?php
defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('transport', 'any', 'RWA');

cot_block($usr['auth_write']);

$t=new XTemplate(cot_tplfile(array('transport','admin','main'),'module',true));

cot_display_messages($t);

$rws=$db->query("select * from $db_transports where item_verifed=2")->fetchAll();

foreach($rws as $rw)
{
    $arr=cot_generate_transport_row($rw,"TRANSP_ROW_");
    $t->assign($arr);

    $btn=cot_rc_link(cot_url('admin','m=transport&a=verif&id='.$rw['item_id'],'',true),$L['transport_moderation'] , ['class'=>'btn btn-success']);
    $t->assign("TRNSP_ROWS_MODERATE",$btn);
    $t->parse('MAIN.TRANS_ROWS');
}
$list=$t->text();

$t->assign([
    'TRNSP_LIST' => $list,
]);
$t->parse();

$module_body=$t->text();