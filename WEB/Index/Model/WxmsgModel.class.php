<?php  
namespace Index\Model;  
//  微信消息处理类  
class WxmsgModel {  
    protected $appid;  
    protected $secrect;  
    protected $accessToken;  
    function  __construct()  
    {  
        $this->appid = C('_APPID_');  
        $this->secrect = C('_APPSECRET_');  
        $this->accessToken = $this->getToken($this->appid, $this->secrect);  
    }  
    /** 
     * 发送post请求 
     * @param string $url 
     * @param string $param 
     * @return bool|mixed 
     */  
    function request_post($url = '', $param = '')  
    {  
        if (empty($url) || empty($param)) {  
            return false;  
        }  
        $postUrl = $url;  
        $curlPost = $param;  
        $ch = curl_init(); //初始化curl  
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页  
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);  
        $data = curl_exec($ch); //运行curl  
        curl_close($ch);  
        return $data;  
    }  
    /** 
     * 发送get请求 
     * @param string $url 
     * @return bool|mixed 
     */  
    function request_get($url = '')  
    {  
        if (empty($url)) {  
            return false;  
        }  
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 500);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        $data = curl_exec($ch);  
        curl_close($ch);  
        return $data;  
    }  
    /** 
     * @param $appid 
     * @param $appsecret 
     * @return mixed 
     * 获取token 
     */  
    protected function getToken($appid, $appsecret)  
    {  
        if (S($appid)) {  
            $access_token = S($appid);  
        } else {  
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $appsecret;  
            $token = $this->request_get($url);  
            $token = json_decode(stripslashes($token));  
            $arr = json_decode(json_encode($token), true);  
            $access_token = $arr['access_token'];  
            S($appid, $access_token, 720);  
        }  
        return $access_token;  
    }  
    /** 
     * 发送自定义的模板消息 
     * @param $touser 
     * @param $template_id 
     * @param $url 
     * @param $data 
     * @param string $topcolor 
     * @return bool 
     */  
    public function doSend($touser, $template_id, $url, $data, $topcolor = '#7B68EE')  
    {  
        $template = array(  
            'touser' => $touser,  
            'template_id' => $template_id,  
            'url' => $url,  
            'topcolor' => $topcolor,  
            'data' => $data  
        );  
        $json_template = json_encode($template);  
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $this->accessToken;  
        $dataRes = $this->request_post($url, urldecode($json_template));
		echo $dataRes;die;
        if ($dataRes['errcode'] == 0) {  
            return true;  
        } else {  
            return false;  
        }  
    }  
}  