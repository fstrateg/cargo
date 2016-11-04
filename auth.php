<?php
/**
 * Created by PhpStorm.
 * User: 142
 * Date: 01.11.2016
 * Time: 16:38
 */
$client_id = '1062882741496-f84q8icr9hrqe98ghcvid79d79mk7j5i.apps.googleusercontent.com'; // Client ID
$client_secret = 'ET8gHrr5K8K_lPUb_JPyGkJY'; // Client secret
$redirect_uri = 'http://mycargo.kz'; // Redirect URI
$url = 'https://accounts.google.com/o/oauth2/auth';

$params = array(
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'client_id'     => $client_id,
    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
);
$query=http_build_query($params);
echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Google</a></p>';

// code=4/5o-taXa23S0r_aynN1xpQLn6iKMx94g00G1ZyFwGyjI#


    $result = false;

    $params = array(
        'client_id'     => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri'  => $redirect_uri,
        'grant_type'    => 'authorization_code',
        'code'          => '4/5o-taXa23S0r_aynN1xpQLn6iKMx94g00G1ZyFwGyjI#'
    );

    $url = 'https://accounts.google.com/o/oauth2/token';


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
curl_close($curl);

$tokenInfo = json_decode($result, true);
print_r($tokenInfo);
echo $tokenInfo['access_token'];
if (isset($tokenInfo['access_token'])) {
    $params2['access_token'] = $tokenInfo['access_token'];

    $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params2))), true);
    if (isset($userInfo['id'])) {
        $userInfo = $userInfo;
        $result = true;
    }

    print_r($userInfo);
}