<?php
namespace Index\Controller;
use Think\Controller;

/**
* 会员登录控制器
*/
class MemberController extends CommonController{
	
	
	
	public function index () {
		//会员视图
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->find();
		$this->orders=M('orders')->field('id,sumprice,pname,order,price,num,buytime,status')->where(array('uid'=>session('stuID'),'status'=>array('neq',0)))->order('id desc')->limit(6)->select();
		$this->firend=M('member')->field('username,photo')->where(array('yqrid'=>session('stuID')))->order('id desc')->select();
		$this->display();
	}

    /*会员绑定手机*/
	public function person(){
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->find();
		$this->display();
	}
	
    public function yanz(){
		$tel = $_POST['tel'];
		$code = $_POST['code'];
		$time=time();
		$date=M('yzm')->where(array('tel'=>$tel,'code'=>$code))->find();
		if($date){
			if(($time-$date['time'])>1800){$this->ajaxReturn("1");}else{$this->ajaxReturn("2");}
		}else{
			$this->ajaxReturn("0");
		}
	}
	
	public function fab(){
		if (IS_POST){
			$conf=F('Site','',APP_PATH.'/Data/');
			$where=array('openid'=>'oUUPD1aBExeZcIVPIpldP9YqJSwA');
			$member=M('member')->field('id,state')->where($where)->find();
			if($member['state']==0){
				$jf=array(
				'mid'=>$member['id'],
				'stutas'=>1,
				'jf'=>$conf['rz'],
				'beizhu'=>"首次认证",
				'time'=>time()
				);
				M('jf')->data($jf)->add();
			}
			$date=array(
			'id'=>$member['id'],
			'realname'=>I('realname'),
			'tel'=>I('tel'),
			'address'=>I('address'),
			'QQ'=>I('QQ'),
			'email'=>I('email'),
			'integral'=>array('exp', 'integral+'.$conf['rz']),
			'state'=>1
			);
			$rs=M('member')->save($date);			
			if($rs){
				$msg="恭喜您,认证成功!";
			}else{
				$msg="Sorry,认证失败,请重试";
			}
			$this->ajaxReturn($msg);
		}else{
			$this->error("页面不存在");
		}
	}
	
	//用户购物车
	public function cart(){
		
	}
	
	//用户订单
	public function myorder (){
		$type = I('ordtype');
		if(!session('memberid')) $this->redirect(MODULE_NAME.'/Index/index');
		if($type=='payed'){
			$where=array('uid'=>session('memberid'),'paytime'=>array('neq',''));
		}else{
			$where=array('status'=>1,'paytime'=>array('neq',''));
		}
		$count = M('orders')->where($where)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->orders = M('orders')->field('trade,buyer_alipay',true)->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->display();
	}
	
}
?>