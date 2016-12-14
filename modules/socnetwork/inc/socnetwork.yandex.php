<?php
defined('COT_CODE') or die('Wrong URL');

function getparams()
{
    $code=cot_import('code','G','ALP');
    $driver=new yandexDriver();

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

class yandexDriver extends socDriver
{
    var $client_id = '2494e3cc1d2d410b923376b00b54d42b'; // Client ID
    var $client_secret = '6392a89a6bc94b8a9a2779fa3eec2afd'; // Client secret
    var $redirect_uri = null; // Redirect URI
    var $url = 'https://oauth.yandex.ru/authorize';
    var $url2 = 'https://oauth.yandex.ru/token';
    var $url3='https://login.yandex.ru/info';
    var $scope='id,email,name';

    function __construct()
    {
        global $cfg;
        $this->redirect_uri=$cfg['mainurl'].'/yandex';
    }

    public function query()
    {
        $c=cot_import('c','G','ALP');
        $params = array(
            'display'  => 'popup',
            'response_type' => 'code',
            'client_id'     => $this->client_id,
        );
        if (isset($c))
            $params['state']=$c;

        $query=http_build_query($params);
        return $this->url.'?'.urldecode($query);
    }

    public function getInfo($code)
    {
        $params = [
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
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
        $tokenInfo=json_decode($result,true);
        if (isset($tokenInfo['access_token'])) {
            $params2=['format'       => 'json'];
            $params2['oauth_token'] = $tokenInfo['access_token'];

            $userInfo0 = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            if (isset($userInfo0['id'])) {
                $userInfo=[
                    'id'=>$userInfo0['id'],
                    'driver'=>'yandex',
                    'fio'=>$userInfo0['real_name'],
                    'email'=>$userInfo0['default_email'],
                    'name'=>$userInfo0['display_name'],
                    'birthday'=>$userInfo0['birthday'],
                ];
                $group=cot_import('state','G','ALP');
                if (isset($group)) $userInfo['group']=$group;
                $this->userInfo = $userInfo;
                $result = true;
            }
        }
        return $result;
    }
}