<?php

$driver_name=cot_import('a','G','ALP',10);
$code=cot_import('code','G','ALP');
if (!in_array($driver_name,['google','fb'])) cot_redirect('/');
$driver=$driver_name.'Driver';
$driver=new $driver;

if (!isset($code)) {
    $url=$driver->query();
    header('Location: '.$url);
    exit;
}

if ($driver->getInfo($code))
{
    echo $driver->getEmail();
}
exit();

//----- получили код идем дальше /----------------


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
            'scope'=>$this->scope,
        );
        $query=http_build_query($params);
        return $this->url.'?'.$query;
    }

}

class googleDriver extends socDriver
{
    var $client_id = '1062882741496-f84q8icr9hrqe98ghcvid79d79mk7j5i.apps.googleusercontent.com'; // Client ID
    var $client_secret = 'ET8gHrr5K8K_lPUb_JPyGkJY'; // Client secret
    var $redirect_uri = 'http://mycargo.kz/index.php?e=socnetwork&a=google'; // Redirect URI
    var $url = 'https://accounts.google.com/o/oauth2/auth';
    var $url2 = 'https://accounts.google.com/o/oauth2/token';
    var $url3='https://www.googleapis.com/oauth2/v1/userinfo';
    var $scope='https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';

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
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        parse_str($result,$tokenInfo);
        if (isset($tokenInfo['access_token'])) {
            $params2['access_token'] = $tokenInfo['access_token'];
            $params2['fields']=$this->scope;
            $userInfo = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            if (isset($userInfo['id'])) {
                $this->userInfo = $userInfo;
                $result = true;
            }
        }
        return $result;
    }
}

class fbDriver extends socDriver
{
    var $client_id = '1600803566611967'; // Client ID
    var $client_secret = '2178f87c2c3cfc0838f4914c514030a9'; // Client secret
    var $redirect_uri = 'http://mycargo.kz/index.php?e=socnetwork&a=fb'; // Redirect URI
    var $url = 'https://www.facebook.com/dialog/oauth';
    var $url2 = 'https://graph.facebook.com/oauth/access_token';
    var $url3='https://graph.facebook.com/me';
    var $scope='id,email,name';

    function __construct()
    {
        $this->scope=urlencode($this->scope);
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
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        parse_str($result,$tokenInfo);
        if (isset($tokenInfo['access_token'])) {
            $params2['access_token'] = $tokenInfo['access_token'];
            $params2['fields']=$this->scope;
            $userInfo = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            if (isset($userInfo['id'])) {
                $this->userInfo = $userInfo;
                $result = true;
            }
        }
        return $result;
    }
}