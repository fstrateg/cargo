<?php
defined('COT_CODE') or die('Wrong URL');


function login($cred)
{
    global $db, $db_users, $sys, $cfg,$usr;
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
        $token=cot_unique(16);

        $db->query("UPDATE $db_users SET user_lastip='{$usr['ip']}', user_lastlog = {$sys['now']}, user_logcount = user_logcount + 1, user_auth=null, user_token = '$token' $update_sid WHERE user_id={$row['user_id']}");

        /* === Hook === */
        foreach (cot_getextplugins('users.auth.check.done') as $pl)
        {
            include $pl;
        }
        /* ===== */

    return true;
}

function gettestparams()
{
    $params=[
        'e'=>'trans@mail.ru',
        'login'=>'Alexey',
        'fio'=>'Alexey Mun',
        'id'=>'362441637424820',
        'driver'=>'fb',
        'group'=>'regcargo'
    ];
    return $params;
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
    $field='user_'.$params['driver'].'id';

    $usl="WHERE $field = '".$params['id']."'";
    return $usl;
}

function register($params)
{
    global $db, $db_users, $db_groups_users, $cfg,$L;

    $pass=cot_randomstring();
    $ruser=[
        'user_name'=>$params['login'],
        'user_fiofirm'=>$params['fio'],
        'user_email'=>$params['e'],
        'user_timezone'=>'GMT',
        'user_gender'=>'U',
        'user_maingrp'=>$params['group']=='regcargo'? 7 : 4,
        'user_password'=>$pass,
    ];
    $field='user_'.$params['driver'].'id';
    $ruser[$field]=$params['id'];
    $ruser['user_usergroup']=$ruser['user_maingrp'];
    $ruser['user_passsalt'] = cot_unique(16);
    $ruser['user_passfunc'] = empty(cot::$cfg['hashfunc']) ? 'sha256' : cot::$cfg['hashfunc'];
    $ruser['user_password'] = cot_hash($ruser['user_password'], $ruser['user_passsalt'], $ruser['user_passfunc']);
    $sql="SELECT user_id FROM $db_users WHERE $field = '".$ruser[$field]."' LIMIT 1";
    $user_exists = $db->query($sql)->fetch();
    if ($user_exists)
    {
        login($params);
        return false;
    }
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
    $ruser['user_auth']='';
    $ruser['user_token'] = cot_unique(16);


    if (!$db->insert($db_users, $ruser)) return false;
    $userid = $db->lastInsertId();
    $ruser['user_name']='id'.$userid;

    $db->query("update $db_users set user_name='${ruser['user_name']}' where user_id=$userid")->execute();

    $db->insert($db_groups_users, array('gru_userid' => (int)$userid, 'gru_groupid' => (int)$ruser['user_maingrp']));

    if ($ruser['user_email']) {
        $subject = sprintf($L['socnetwork_email_title'], $cfg['mainurl']);
        $body = sprintf($L['socnetwork_email_body'], $ruser['user_fiofirm'], $cfg['mainurl'], $ruser['user_name'], $pass, $cfg['mainurl']);

        cot_mail($ruser['user_email'], $subject, $body);
    }

    login($params);
    return true;
}

class socDriver
{
    var $userInfo=null;

    public function getName()
    {
        return $this->userInfo["name"];
    }

    public function getId()
    {
        return $this->userInfo["id"];
    }

    public function getEmail()
    {
        return $this->userInfo["email"];
    }

    public function query()
    {
        $params = array(
            'redirect_uri'  => $this->redirect_uri,
            'response_type' => 'code',
            'client_id'     => $this->client_id,
        );
        $query=http_build_query($params);
        return $this->url.'?'.urldecode($query);
    }

}
