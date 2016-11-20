<?php
defined('COT_CODE') or die('Wrong URL');

function getparams()
{
    $code=cot_import('code','G','ALP');
    $driver=new vkDriver();

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

class vkDriver extends socDriver
{
    var $client_id = '5737820'; // Client ID
    var $client_secret = 'm3wfugXCpEoMQtQpfMHK'; // Client secret
    var $redirect_uri = null; // Redirect URI
    var $url = 'http://oauth.vk.com/authorize';
    var $url2 = 'https://oauth.vk.com/access_token';
    var $url3='https://api.vk.com/method/users.get';
    var $scope='uid,email,first_name,last_name';

    function __construct()
    {
        global $cfg;
        $this->redirect_uri=$cfg['mainurl'].'/vk';
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
            'code'          => $code
        ];



        $tokenInfo = json_decode(file_get_contents($this->url2 . '?' . urldecode(http_build_query($params))), true);
        if (isset($tokenInfo['access_token'])) {
            $params2=[
                'uids'=>$tokenInfo['user_id'],
                'fields'=>$this->scope
            ];
            $params2['access_token'] = $tokenInfo['access_token'];

            $userInfo = json_decode(file_get_contents($this->url3 . '?' . urldecode(http_build_query($params2))), true);
            $userInfo=$userInfo['response'][0];
            print_r($userInfo);
            if (isset($userInfo['uid'])) {
                $userInfo['driver']='fb';
                $userInfo['id']=$userInfo['uid'];
                $userInfo['email']=null;
                $userInfo['fio']=$userInfo['first_name'].' '.$userInfo['last_name'];
                $userInfo['name']=$userInfo['first_name'];
                $group=cot_import('state','G','ALP');
                if (isset($group)) $userInfo['group']=$group;
                $this->userInfo = $userInfo;
                $result = true;
            }
        }
        return $result;
    }
}