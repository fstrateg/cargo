<?php
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['auth_read']);

$id = cot_import('id', 'G', 'INT');

$userid=cot_import('text','G','INT');

$users=[];
if ($userid)
{
    $sql=cot::$db->query("select * from $db_users where user_maingrp=4 and user_id like '$userid%'");
    $users=$sql->fetchAll();
}

$t=new XTemplate(cot_tplfile('projects.addperformer'));
if (count($users)>0)
{
    foreach($users as $item)
    {
        $t->assign(cot_generate_usertags($item,'CAR_'));
        $t->assign([
            'CAR_SETURL'=>cot_url('projects',[
                'm'=>'setperformer',
                'id'=>$id,
                'userid'=>$item['user_id'],
                ]),
        ]);

        $t->parse('MAIN.SEARCHCAR');

    }
    $module_body = $t->text('MAIN.SEARCHCAR');
}

