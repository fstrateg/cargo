<?php
defined('COT_CODE') or die('Wrong URL');

function getparams()
{
    $code=cot_import('code','G','ALP');
    $driver=new fbDriver();

    if (!isset($code)) {
        $url=$driver->query();
        header('Location: '.$url);
        exit;
    }

    if ($driver->getInfo($code))
    {
        return $driver->userInfo;
    }

    exit();
}

class fbDriver extends socDriver
{
    var $client_id = '1600803566611967'; // Client ID
    var $client_secret = '2178f87c2c3cfc0838f4914c514030a9'; // Client secret
    var $redirect_uri = null; // Redirect URI
    var $url = 'https://www.facebook.com/dialog/oauth';
    var $url2 = 'https://graph.facebook.com/oauth/access_token';
    var $url3='https://graph.facebook.com/me';
    var $scope='id,email,name';

    function __construct()
    {
        global $cfg;
        $this->redirect_uri=$cfg['mainurl'].'/fb';
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
        $result = curl_exec($curl);
        curl_close($curl);
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