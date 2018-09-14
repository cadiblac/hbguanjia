<?php
namespace Index\Controller;
use Think\Controller;
use Aliyun\Core\Config;  
use Aliyun\Core\Profile\DefaultProfile;  
use Aliyun\Core\DefaultAcsClient;  
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest; 

class DxinController extends Controller {
	
	public function sendMsg(){
    require_once '/Api/alidy/vendor/autoload.php'; //此处为你放置API的路径
    Config::load(); //加载区域结点配置
	$mobile = $_POST['mobile'];
	$length=6;
	$code=str_pad(mt_rand(0, pow(10, $length) - 1),$length, '0', STR_PAD_LEFT); //生成6位随机数
	$date=M('conf')->where(array('id'=>0))->getField('confing');
	$conf=unserialize($date);
	$dart=array('tel'=>$mobile,'code'=>$code,'time'=>time());
	$rs=M('yzm');
	$ji=$rs->where(array("tel"=>$mobile))->find();	
	if($ji){
		$rs->where(array("tel"=>$mobile))->save($dart);
	}else{  
		$rs->add($dart);		   
	}
	
	$st=M('member')->where(array('openid'=>session('userOpenid')))->getField('state');
    $accessKeyId = $conf['alid'];
    $accessKeySecret = $conf['aliSecret'];
	
    $templateCode = '82565004';   //短信模板ID
    //短信API产品名（短信产品名固定，无需修改）
    $product = "Dysmsapi";
    //短信API产品域名（接口地址固定，无需修改）
    $domain = "dysmsapi.aliyuncs.com";
    //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
    $region = "cn-hangzhou";
    // 初始化用户Profile实例
    $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
    // 增加服务结点
    DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
    // 初始化AcsClient用于发起请求
    $acsClient = new DefaultAcsClient($profile);
    // 初始化SendSmsRequest实例用于设置发送短信的参数
    $request = new SendSmsRequest();
    // 必填，设置短信接收号码
    $request->setPhoneNumbers($mobile);    //$moblie是我前台传入的电话
    // 必填，设置签名名称
    $request->setSignName("hb云管家");      //此处需要填写你在阿里上创建的签名
    // 必填，设置模板CODE
	if($st){
		$request->setTemplateCode("SMS_117521106");    //短信模板编号
	}else{
		$request->setTemplateCode("SMS_140120786");    //短信模板编号
	}    
	$smsData = array('code'=>$code);    //所使用的模板若有变量 在这里填入变量的值  我的变量名为username此处也为username
    $request->setTemplateParam(json_encode($smsData));   
    //发起访问请求
    $acsResponse = $acsClient->getAcsResponse($request);
    //返回请求结果
    $result = json_decode(json_encode($acsResponse), true);
    if($result){$this->ajaxReturn("验证码已发送");}else{$this->ajaxReturn("发送失败请重试");}
	}
	
}
?>