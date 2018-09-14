<?php
namespace Index\Controller;
use Think\Controller;

class OrdersController extends CommonController{
	
	public function index (){
		$id = I('id','',intval);
		$data = M('orders')->where(array('id'=>$id,'uid'=>session('userID')))->find();
		if($data){
			$this->u = M('member')->field('realname,tel,address,fx')->where(array('id'=>$data['uid']))->find();
			$p = M('goods')->field('stock,content,click',true)->where(array('id'=>$data['pid']))->find();
			$this->p=$p;
			$this->v=$data;
			if($p){
				$this->display();
			}else{
				$this->error('该商品已下架！');
			}			
		}else{
			$this->error('无订单');
		}
	}
	
	public function del (){
		$id = I('id','',intval);
		if(M('orders')->where(array('id'=>$id,'uid'=>session('userID')))->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/member/index'));
		}else{
			$this->error('删除失败！');
		}
	}
	
	public function updata (){
		$id = I('id','',intval);
		if(M('orders')->where(array('id'=>$id,'uid'=>session('userID')))->setField('status',4)){
			$this->success('已收货',U(MODULE_NAME.'/member/index'));
		}else{
			$this->error('更改失败！');
		}
	}
	
	public function pay (){
		if(empty($_GET['uname']) || empty($_GET['tel']) || empty($_GET['adress'])){
			$this->error('请把联系人信息填写完整！');
		}
		$order=I('out_trade_no');
		$or=M('orders')->where(array('order'=>$order))->find();		
		$jj=array(
			'uname'=>I('uname'),
			'tel'=>I('tel'),
			'adress'=>I('adress'),
			'remark'=>I('remark'),
			'paytime'=>time(),
			'status'=>2
		);
		$rs=M('orders')->where(array('order'=>$order,'status'=>array('LT',2)))->save($jj);
		$conf=M('conf')->where(array('id' => 0))->getField('confing');
		if($rs){
			$jf=array('mid'=>$or['uid'],'stutas'=>0,'jf'=>$or['sumprice'],'beizhu'=>"兑换礼品：".$or['pname'],'time'=>time());
			M('jf')->data($jf)->add();
			M('member')->where('id='.session('userID'))->setDec('integral',$or['sumprice']);
			$data2=array(  
			   'first'=>array('value'=>urlencode("您有新订单需处理"),'color'=>"#EE5C42"),  
			   'keyword1'=>array('value'=>urlencode("环保云管家商城有用户兑换了礼品"),'color'=>'#030303'),  
			   'keyword2'=>array('value'=>urlencode(date("Y-m-d h:i",time())),'color'=>'#030303'),     
			   'keyword3'=>array('value'=>urlencode("单号:".$order),'color'=>'#00CD00'),     
			   'remark'=>array('value'=>urlencode("请尽快登录网站后台处理！"),'color'=>'#030303'),  
			);
			doSend($conf['openid1'],'zJ3zwVzMUmTL5s6zWcQ5XcxH2jzulDFCOU1ABrK86jQ','http://yunguanjia.35xg.com/',$data2);
			$this->success('兑换成功！',U(MODULE_NAME.'/member/orders'));
		}else{
			$this->error('兑换失败！');
		}
		
	}
	
}
?>