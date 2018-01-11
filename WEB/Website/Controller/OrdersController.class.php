<?php
namespace Website\Controller;
use Think\Controller;
//会员管理控制器
class OrdersController extends CommonController{
	//会员管理视图
	public function index () {
		$id = I('id','',intval);
		switch ($id){
			case 1:
			  $msg="待付款订单";
			  break;
			case 2:
			  $msg="已付款订单";
			  break;
			case 3:
			  $msg="已发货订单";
			  break;
			case 4:
			  $msg="已收货订单";
			  break;
		}
		$this->orders = M('orders')->where(array(status=>$id))->select();
		$this->msg=$msg;
		$this->display();
	}

	public function updata () {
		$id = I('id','',intval);
		$this->id = $id;
		$orders = M('orders')->where(array('id'=>$id))->find();
		$uid=$orders['uid'];
		$pid=$orders['pid'];
		
		$this->u=M('member')->where(array('id'=>$uid))->find();
		$this->p=M('goods')->where(array('id'=>$pid))->find();
		$this->orders = $orders;
		$this->display();		
	}

	public function runUpdata () {
		$id = I('id','',intval);
		$price=$_POST['price'];
		$orders=M('orders')->where(array('id'=>$id))->field('order,price,num')->find();
		if($orders['price'] == $price){$sumprice=$_POST['sumprice'];}else{$sumprice=$price*$orders['num'];}
		$data = array(
			'id'=>$id,
			'order'=>$orders['order'],
			'price'=>$price,
			'status'=>$_POST['status'],
			'sumprice'=>$sumprice,
			'remark'=>$_POST['remark']
		);

		if (M('orders')->save($data)){
			$this->success('保存成功',U(MODULE_NAME.'/Orders/index'));
		}else{
			$this->error('数据未改动或者修改失败');
		}

	}
	
	public function status (){
		$id = I('id','',intval);
		if (M('orders')->where(array('id'=>$id))->setField('status',3)){
			$this->success('设置已发货成功',U(MODULE_NAME.'/Orders/index'));
		}else{
			$this->error('设置发货失败');
		}
	}

}
?>