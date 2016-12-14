<?php
defined('COT_CODE') or die('Wrong URL');

function getparams()
{
    $code=cot_import('code','G','ALP');
    $driver=new googleDriver();

    if (!isset($code)) {
        $url=$driver->query();
        header('Location: '.$url);
        exit;
    }

    if ($driver->getInfo($code))
    {
        echo $driver->getEmail();
        print_r($driver->userInfo);
    }
    exit();

    $params=[
        'e'=>'transport@mail.ru',
        'name'=>'test',
        'id'=>'1234567890',
        'driver'=>'google',
        'group'=>'loads'

    ];
    return $params;
}

class googleDriver extends socDriver
{
    var $client_id = '1062882741496-f84q8icr9hrqe98ghcvid79d79mk7j5i.apps.googleusercontent.com'; // Client ID
    var $client_secret = 'ET8gHrr5K8K_lPUb_JPyGkJY'; // Client secret
    var $redirect_uri = null; // Redirect URI
    var $url = 'https://accounts.google.com/o/oauth2/auth';
    var $url2 = 'https://accounts.google.com/o/oauth2/token';
    var $url3='https://www.googleapis.com/oauth2/v1/userinfo';
    var $scope='https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';

    function __construct()
    {
        global $cfg;
        $this->redirect_uri=$cfg['mainurl'].'/google';
    }
    public function getInfo($code)
    {
        $params = [
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
            'redirect_uri'  => $this->redirect_uri,
            'grant_type'    => 'authorization_code',
            'code'          => $code
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url2);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        echo 'params:';
        print_r(urldecode(http_build_query($params)));
        echo 'rezult:';
        print_r($result);
        parse_str($result,$tokenInfo);
        if (isset($tokenInfo['access_token'])) {
            $params2=[];
            $params2['access_token'] = $tokenInfo['access_token'];
            $params2['fields']=$this->scope;
            $userInfo = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            echo 'userInfo:';
            print_r($userInfo);
            if (isset($userInfo['id'])) {
                $this->userInfo = $userInfo;
                $result = true;
            }
        }
        return $result;
    }
}