<?php
namespace Index\Controller;
use Think\Controller;
use \Lib;
/**
* 会员登录控制器
*/
class MemberController extends CommonController{
	
	
	
	public function index () {
		//会员视图
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->find();
		$this->orders=M('orders')->field('id,sumprice,pname,order,price,num,buytime,status')->where(array('uid'=>session('userID'),'status'=>array('EGT',2)))->order('id desc')->limit(6)->select();
		$this->firend=M('member')->field('username,photo')->where(array('yqrid'=>session('userID')))->order('id desc')->select();
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
			$where=array('openid'=>session('userOpenid'));
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
				$rzjf=$conf['rz'];
			}else{$rzjf=0;}
			$date=array(
			'id'=>$member['id'],
			'realname'=>I('realname'),
			'tel'=>I('tel'),
			'address'=>I('address'),
			'QQ'=>I('QQ'),
			'email'=>I('email'),
			'integral'=>array('exp', 'integral+'.$rzjf),
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
		$num = I('num');
		$db=M('orders');
		if($num){
			$c =$db->where(array('uid'=>session('userID'),'status'=>array('ELT',1)))->field('state,integral')->count();
			if($c) echo "<span>".$c."</span>";
		}else{
			$this->member=M('member')->where(array('openid'=>session('userOpenid')))->find();
			$this->cert=$db->where(array('uid'=>session('userID'),'status'=>array('ELT',1)))->select();
			$this->display();
		}
		
	}
	
	public function myorder(){
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->field('state,integral')->find();
		$where = array('uid'=>session('userID'),'status'=>array('EGT',2));
		$count = M('orders')->where($where)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();
		$this->orders = M('orders')->where($where)->order('paytime DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->display();
	}
	
	public function fenx(){
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->field('state,fx,integral')->find();
		$where = array('mid'=>session('userID'),'gid'=>array('neq',''));
		$count = M('jf')->where($where)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();
		$this->jf = M('jf')->where($where)->order('time DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->display();
	}
	
	public function jf(){
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->field('state,integral')->find();
		$where = array('mid'=>session('userID'),'gid'=>array('exp','is null'));
		$count = M('jf')->where($where)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();
		$this->jf = M('jf')->where($where)->order('time DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->display();
	}
	
	public function ping(){
		$this->member=M('member')->where(array('openid'=>session('userOpenid')))->field('state,integral')->find();
		$where = array('mid'=>session('userID'));
		$count = M('ping')->where($where)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();
		$ping = M('ping')->where('mid='.session('userID').' or mid=0')->order('time DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->ping = Lib\Category::unlimitedForping($ping);
		$this->display();
	}
	
	public function ewm(){
		$userid=session('userID');
		$member=M('member')->where(array('id'=>$userid))->field('state,integral,ewm')->find();
		if(!$member['ewm']){
			$url=U(MODULE_NAME.'/member/index',array('spread'=>$userid),'',true);
			$fx=qrcode($url);
			M('member')-> where(array('id'=>$userid))->setField('ewm',$fx);
		}else{
			$fx=$member['ewm'];
		}
		$this->member=$member;
		$this->fxewm=$fx;
		$this->display();
	}
	
}
?>