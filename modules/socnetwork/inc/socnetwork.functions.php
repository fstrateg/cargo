<?php
defined('COT_CODE') or die('Wrong URL');

function login($cred)
{
    global $db, $db_users, $sys, $cfg;
    $rows=$db->query("SELECT * FROM $db_users WHERE user_email = '" . $cred['e']. "'");
    if ($row = $rows->fetch())
    {
        session_start();
        $ruserid = $row['user_id'];
        $sid = hash_hmac('sha256', $row['user_password'] . $row['user_sidtime'], $cfg['secret_key']);
        if (empty($row['user_sid']) || $row['user_sid'] != $sid
            || $row['user_sidtime'] + $cfg['cookielifetime'] < $sys['now'])
        {
            // Generate new session identifier
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
    }
}