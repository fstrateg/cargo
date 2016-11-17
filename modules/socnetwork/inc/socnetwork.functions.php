<?php
defined('COT_CODE') or die('Wrong URL');


function login($cred)
{
    global $db, $db_users, $sys, $cfg;
    $rows=$db->query("SELECT * FROM $db_users ".createusl($cred));
    if (!$row = $rows->fetch())
    {
        return false;
    }
        session_start();
        $ruserid = $row['user_id'];
        $sid = hash_hmac('sha256', $row['user_password'] . $row['user_sidtime'], $cfg['secret_key']);
        if (empty($row['user_sid']) || $row['user_sid'] != $sid
            || $row['user_sidtime'] + $cfg['cookielifetime'] < $sys['now'])
        {
            // Generate new session identifier
            $rmdpass = $row['user_password'];
            $sid = hash_hmac('sha256', $rmdpass . $sys['now'], $cfg['secret_key']);
            $update_sid = ", user_sid = " . $db->quote($sid) . ", user_sidtime = " . $sys['now'];
        }
        else
        {
            $update_sid = '';
        }
        $sid = hash_hmac('sha1', $sid, $cfg['secret_key']);
        $u = base64_encode($ruserid.':'.$sid);
        $_SESSION[$sys['site_id']] = $u;

        $db->query("UPDATE $db_users SET user_lastip='{$usr['ip']}', user_lastlog = {$sys['now']}, user_logcount = user_logcount + 1, user_token = '$token' $update_sid WHERE user_id={$row['user_id']}");

    return true;
}

function finduser($params)
{
    global $db, $db_users;
    $rows=$db->query("SELECT * FROM $db_users ".createusl($params));
    if (!$row = $rows->fetch())
    {
        return false;
    }
    return $row;
}

function userbanned($params)
{
    $usr=finduser($params);
    return in_array($usr['user_maingroup'],[3,2]);
}

function createusl($params)
{
    $usl="WHERE user_email = '" . $params['e']. "'";
    return $usl;
}

function register($params)
{
    global $db, $db_users, $db_groups_users, $cfg,$L;
    $params=[
        'e'=>'transport@mail.ru',
        'login'=>'Alexey',
        'name'=>'Alexey Mun',
        'id'=>'1234567890',
        'driver'=>'google',
        'group'=>'loads'
    ];
    $pass=cot_randomstring();
    $ruser=[
        'user_name'=>$params['login'],
        'user_email'=>$params['e'],
        'user_timezone'=>'GMT',
        'user_gender'=>'U',
        'user_maingrp'=>$params['group']=='loads'? 7 : 4,
        'user_password'=>$pass,
    ];
    $ruser['user_'.$params['driver'].'id']=$params['id'];
    $ruser['user_usergroup']=$ruser['user_maingrp'];
    $ruser['user_passsalt'] = cot_unique(16);
    $ruser['user_passfunc'] = empty(cot::$cfg['hashfunc']) ? 'sha256' : cot::$cfg['hashfunc'];
    $ruser['user_password'] = cot_hash($ruser['user_password'], $ruser['user_passsalt'], $ruser['user_passfunc']);

    $user_exists = (bool)$db->query("SELECT user_id FROM $db_users WHERE user_name = ? LIMIT 1", array($ruser['user_name']))->fetch();
    $email_exists = (bool)$db->query("SELECT user_id FROM $db_users WHERE user_email = ? LIMIT 1", array($ruser['user_email']))->fetch();
    if ($email_exists)
        cot_redirect(cot_url('message','msg=158'));

    $ruser['user_lostpass'] = md5(microtime());
    cot_shield_update(20, "Registration");

    $ruser['user_hideemail'] = 1;
    $ruser['user_theme'] = cot::$cfg['defaulttheme'];
    $ruser['user_scheme'] = cot::$cfg['defaultscheme'];
    $ruser['user_lang'] = empty($ruser['user_lang']) ? cot::$cfg['defaultlang'] : $ruser['user_lang'];
    $ruser['user_regdate'] = (int)cot::$sys['now'];
    $ruser['user_logcount'] = 0;
    $ruser['user_lastip'] = empty($ruser['user_lastip']) ? cot::$usr['ip'] : $ruser['user_lastip'];
    $ruser['user_token'] = cot_unique(16);

    if (!$db->insert($db_users, $ruser)) return false;
    $userid = $db->lastInsertId();

    $db->insert($db_groups_users, array('gru_userid' => (int)$userid, 'gru_groupid' => (int)$ruser['user_maingrp']));
    //TODO: mail

    $subject=sprintf($L['socnetwork_email_title'],$cfg['mainurl']);
    $body=sprintf($L['socnetwork_email_body'],$params['name'],$cfg['mainurl'],$params['login'],$pass,$cfg['mainurl']);

    cot_mail($ruser['user_email'], $subject, $body);
    login($params);
}
