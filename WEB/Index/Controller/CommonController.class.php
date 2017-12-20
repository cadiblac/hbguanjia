<?php
namespace Index\Controller;
use Think\Controller;

/**
* 公用控制器
*/
class CommonController extends Controller{

	/*自动验证
	public function _initialize (){
		cookie('spread',I('spread'));
		if (strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger') == false) { 
		//判断打开方式，不是微信内就跳转
        $this->redirect(MODULE_NAME.'/Redirect/index');
		}
		//判断是否验证过
		if(!(session("?userOpenid")&&session("?userSex"))&&!(session("?userOpenid")&&session("?userNickname"))){
		//进入验证
			if(!$_GET['gz']){
				Check();
			}else{
				//跳转到关注页面
				redirect('https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzU4NjM0Mzc2MQ==&scene=124#wechat_redirect',0);
			}
		}
	}*/
	
}
?>