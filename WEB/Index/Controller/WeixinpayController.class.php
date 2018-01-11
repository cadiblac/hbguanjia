<?php
namespace Index\Controller;
use Think\Controller;

class WeixinpayController extends Controller{
	/**
	 * 公众号支付 必须以get形式传递 out_trade_no 参数
	 * 示例请看 /Application/Home/Controller/IndexController.class.php
	 * 中的wexinpay_js方法
	 */
	public function pay(){
		if(empty($_GET['uname']) || empty($_GET['tel']) || empty($_GET['adress'])){
			$this->error('请把联系人信息填写完整！');
		}
		// 导入微信支付sdk
		Vendor('Weixinpay.Weixinpay');
		$wxpay=new \Weixinpay();
		// 获取jssdk需要用到的数据
		$data=$wxpay->getParameters(I('out_trade_no'));
		if(I('sumprice')<I('fx')){
			$dd= array(
			'sumprice'=>0,
			'dk'=>I('sumprice'),
			'paytime'=>time(),
			'status'=>2,
			'total_fee'=>0,
			'uname'=>I('uname'),
			'tel'=>$tel,
			'adress'=>I('adress'),
			'remark'=>I('remark')
			);
			if(M('orders')->where(array('order'=>I('out_trade_no')))->save($dd)){
				M('member')->where('id='.session('userID'))->setDec('fx',I('sumprice'));
				$jf=array('mid'=>session('userID'),'stutas'=>0,'jf'=>I('sumprice'),'gid'=>I('pid'),'beizhu'=>"购买商品：".I('pname')."抵扣",'time'=>time());
				M('jf')->data($jf)->add();
				redirect(MODULE_NAME.'/member/orders');
			}else{
				$this->error('交易失败');
			}
		}else{
			$dd=array(
			'uname'=>I('uname'),
			'tel'=>$tel,
			'adress'=>I('adress'),
			'remark'=>I('remark'),
			'dk'=> I('fx'),
			'total_fee'=>I('total_fee')
			);
			M('orders')->where(array('order'=>I('out_trade_no')))->save($dd);
			// 将数据分配到前台页面
			$assign=array(
				'data'=>json_encode($data)
				);
			$this->assign($assign);
			$this->display();
		}
	}
	
	/**
	 * notify_url接收页面
	 */
	public function notify(){
		Vendor('Weixinpay.Weixinpay');
		$wxpay=new \Weixinpay();
		$result=$wxpay->notify();
		if ($result) {
			// 验证成功 修改数据库的订单状态等 $result['out_trade_no']为订单id
			$dh=$result['out_trade_no'];
			$jj=array(
			'paytime'=>time(),
			'status'=>2,
			);
			$c=M('orders')->where(array('order'=>$dh,'status'=>array('LT',2)))->save($jj);			
		}
		if($c){
			$or=M('orders')->where(array('order'=>$dh))->find();
			if($or['dk']>0){//分销提成抵扣
				M('member')->where('id='.$or['uid'])->setDec('fx',$or['dk']);
				$jf=array('mid'=>$or['uid'],'stutas'=>0,'jf'=>$or['dk'],'gid'=>$or['pid'],'beizhu'=>"购买商品：".$or['pname']."抵扣",'time'=>time());
				M('jf')->data($jf)->add();
			}
			$spread=cookie('spread');
			if($spread&&$spread<>session('userID')){//分销提成计算
				$conf=F('Site','',APP_PATH.'/Data/');
				$fx=$or['total_fee']*$conf['fx'];
				M('member')->where('id='.$spread)->setInc('fx',$fx);
				$jf=array('mid'=>$spread,'stutas'=>1,'jf'=>$fx,'gid'=>$or['pid'],'beizhu'=>"推荐用户id:".$or['uid'].",购买商品：".$or['pname'],'time'=>time());
				M('jf')->data($jf)->add();
			}
		}
	}
}
?>