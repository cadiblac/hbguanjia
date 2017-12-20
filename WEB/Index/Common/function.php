<?php
//检测用户信息
	function Check(){
		if(!session("?userOpenid")){
			$data=getOpenid();
			session('userOpenid',$data);
		}else{
			$data=session('userOpenid');
		}
		if($rst=M('member')->where(array('openid'=>$data))->find()){
			//设置SESSION
			$t=time();
			M('member')->where(array('openid'=>$data))->setField('logintime',$t);
			setSession($rst);
			return true;
		}else{
			//设置临时变量
			if(!session("?status")){
				unset($_GET['code']);
				session("status","1");				
			}
			//获取用户所以信息
			getUserInfo();
		}
	}

	//获取用户openid
	function getOpenid(){
		if(!$_GET['code']){
			//获取当前的url地址
			$rUrl=_URL_.__ACTION__.'/id/'.I('id').'.html';
			$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid="._APPID_."&redirect_uri=".$rUrl."&response_type=code&scope=snsapi_base&state=123456#wechat_redirect";
			//跳转页面
			redirect($url,0);
		}else{
			$aUrl="https://api.weixin.qq.com/sns/oauth2/access_token?appid="._APPID_."&secret="._APPSECRET_."&code=".$_GET['code']."&grant_type=authorization_code";
			//获取网页授权access_token和openid等
			$data=getHttp($aUrl);
			return $data['openid'];
		}
	}

	//获取用户详细信息
	function getUserInfo(){
		if(!$_GET['code']){
			//获取当前的url地址
			$rUrl=_URL_.__ACTION__.'/id/'.I('id').'.html';
			$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid="._APPID_."&redirect_uri=".$rUrl."&response_type=code&scope=snsapi_userinfo&state=123456#wechat_redirect";
			//跳转页面
			redirect($url,0);
		}else{
			$getOpenidUrl="https://api.weixin.qq.com/sns/oauth2/access_token?appid="._APPID_."&secret="._APPSECRET_."&code=".$_GET['code']."&grant_type=authorization_code";
			//获取网页授权access_token和openid等
			$data=file_get_contents($getOpenidUrl);
			$arr = json_decode($data,true);
			$getUserInfoUrl="https://api.weixin.qq.com/sns/userinfo?access_token=".$arr['access_token']."&openid=".$arr['openid']."&lang=zh_CN";
			//获取用户数据
			$json=file_get_contents($getUserInfoUrl);
			$userInfo=json_decode($json,true);
			//默认设置头像是132*132的
			$userInfo['headimgurl']=substr($userInfo['headimgurl'],0,strlen($userInfo['headimgurl'])-1);
			$userInfo['headimgurl']=$userInfo['headimgurl'].'132';
			// 将信息插入数据库
			$mode=M('member');$spread=cookie('spread');
			if($stu=$mode->field('id')->where(array('openid'=>$userInfo['openid']))->find()){
				$sj=array('openid'=>$userInfo['openid'],'username'=>$userInfo['nickname'],'sex'=>$userInfo['sex'],'photo'=>$userInfo['headimgurl'],'logintime'=>time());
				$mode->save($sj);
				$mid=$stu['id'];
			}else{
				$sj=array('openid'=>$userInfo['openid'],'username'=>$userInfo['nickname'],'sex'=>$userInfo['sex'],'photo'=>$userInfo['headimgurl'],'yqrid'=>$spread,'regtime'=>time());
				$mid=$mode->data($sj)->add();
				$conf=F('Site','',APP_PATH.'/Data/');
				if($spread){
				$jf=array(
				'mid'=>$spread,
				'stutas'=>1,
				'jf'=>$conf['jf'],
				'beizhu'=>"邀请用户id：".$mid,
				'time'=>time()
				);
				M('jf')->data($jf)->add();
				$mode->where(array('id'=>$spread))->setInc('integral',$conf['jf']);
				}
			}
			if($mid){
			$userInfo['stuID'] = $mid;
			setSession($userInfo);
			session("status",null);
			}else{
				echo "验证错误";
			}
		}
	}

	//设置SESSION
	function setSession($data){
		session('userOpenid',$data['openid']);		
		session('userSex',$data['sex']);
		session('state',$data['state']);
		if($data['nickname']){session('userNickname',$data['nickname']);}else{session('userNickname',$data['username']);}
		if($data['headimgurl']){session('userHeadimgurl',$data['headimgurl']);}else{session('userHeadimgurl',$data['photo']);}
		if($data['stuID']){session('userID',$data['stuID']);}else{session('userID',$data['id']);}		
	}

	//获取access_token
	function getAccess_token(){
		//URL
		$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid="._APPID_."&secret="._APPSECRET_;
		//get请求
		$data=getHttp($url);
		//缓存access_token
		S('access_token',$data['access_token'],7000);
		return $data['access_token'];
	}

	//get请求
	function getHttp($url){
		$ch=curl_init();
		//设置传输地址
		curl_setopt($ch, CURLOPT_URL, $url);
		//设置以文件流形式输出
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//接收返回数据
		$data=curl_exec($ch);
		curl_close($ch);
		$jsonInfo=json_decode($data,true);
		return $jsonInfo;
	}
	
	//post请求
	function postHttp($url,$json){
		$ch=curl_init();
		//设置传输地址
		curl_setopt($ch, CURLOPT_URL, $url);
		//设置以文件流形式输出
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//设置已post方式请求
	 	curl_setopt($ch, CURLOPT_POST, 1);
	 	//设置post文件
 	 	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$data=curl_exec($ch);
		curl_close($ch);
		$jsonInfo=json_decode($data,true);
		return $jsonInfo;
	}

function orderhandle($parameter){
	if($parameter['trade_status']){
		$data=array(
		'order' => $parameter['out_trade_no'],
		'trade' => $parameter['trade_no'],
		'buyer_alipay' => $parameter['buyer_email'],
		'total_fee' => $parameter['total_fee'],
		'trade_status' => $parameter['trade_status'],
		'status' => 2,
		'paytime' => $parameter['notify_time']
		);
	}	
	
	M('orders')->where(array('order'=>$parameter['out_trade_no']))->save($data);
} 
?>