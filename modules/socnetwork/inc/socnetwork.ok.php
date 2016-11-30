<?php
defined('COT_CODE') or die('Wrong URL');

function getparams()
{
    $code=cot_import('code','G','ALP');
    $driver=new okDriver();

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

class okDriver extends socDriver
{
    var $client_id = '1248889088'; // Client ID
    var $public_secret= 'CBAKIBHLEBABABABA';
    var $client_secret = '3D5DE7DB92F26591275237A1'; // Client secret
    var $redirect_uri = null; // Redirect URI
    var $url = 'http://www.odnoklassniki.ru/oauth/authorize';
    var $url2 = 'http://api.odnoklassniki.ru/oauth/token.do';
    var $url3='https://graph.facebook.com/me';
    var $scope='id,email,name';

    function __construct()
    {
        global $cfg;
        $this->redirect_uri=$cfg['mainurl'].'/ok';
    }

    public function query()
    {
        $c=cot_import('c','G','ALP');
        $params = array(
            'redirect_uri'  => $this->redirect_uri,
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
        $result = json_decode(curl_exec($curl));
        curl_close($curl);
        print_r($result);
        exit();

        parse_str($result,$tokenInfo);
        if (isset($tokenInfo['access_token'])) {
            $params2=[];
            $params2['access_token'] = $tokenInfo['access_token'];
            $params2['fields']=$this->scope;
            $userInfo = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            if (isset($userInfo['id'])) {
                $userInfo['driver']='fb';
                $userInfo['fio']=$userInfo['name'];
                $arr = explode(' ',$userInfo['name']);
                $userInfo['name']=$arr[0];
                $group=cot_import('state','G','ALP');
                if (isset($group)) $userInfo['group']=$group;
                $this->userInfo = $userInfo;
                $result = true;
            }
        }
        return $result;
    }
}