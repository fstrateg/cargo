<?php
defined('COT_CODE') or die('Wrong URL');

function getparams()
{
    $code=cot_import('code','G','ALP');
    $driver=new mailDriver();

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

class mailDriver extends socDriver
{
    var $client_id = '750146'; // Client ID
    var $public_secret= '77818c39804088e9b3ce895e232b842f';
    var $client_secret = 'a4cdef6773d62c00a4554a2d233ce489'; // Client secret
    var $redirect_uri = null; // Redirect URI
    var $url  = 'https://connect.mail.ru/oauth/authorize';
    var $url2 = 'https://connect.mail.ru/oauth/token';
    var $url3 = 'http://www.appsmail.ru/platform/api';
    var $scope='id,email,name';

    function __construct()
    {
        global $cfg;
        $this->redirect_uri=$cfg['mainurl'].'/mail';
    }

    public function query()
    {
        $c=cot_import('c','G','ALP');
        $params = array(
            'redirect_uri'  => $this->redirect_uri,
            'response_type' => 'code',
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
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
        $tokenInfo = json_decode(curl_exec($curl),true);
        curl_close($curl);
        if (isset($tokenInfo['access_token'])) {
                $sign = md5("app_id={$this->client_id}method=users.getInfosecure=1session_key={$tokenInfo['access_token']}{$this->client_secret}");

                $params2 = array(
                    'method'       => 'users.getInfo',
                    'secure'       => '1',
                    'app_id'       => $this->client_id,
                    'session_key'  => $tokenInfo['access_token'],
                    'sig'          => $sign
                );
            $userInfo0 = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            $userInfo0=$userInfo0[0];
            if (isset($userInfo0['uid'])) {
                $userInfo=[
                    'id'=>$userInfo0['uid'],
                    'driver'=>'mail',
                    'fio'=>$userInfo0['nick'],
                    'name'=>$userInfo0['first_name'],
                    'photo'=>$userInfo0['pic_180'],
                    'email'=>$userInfo0['email'],
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