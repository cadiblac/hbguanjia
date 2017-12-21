<?php
namespace Index\Controller;
use Think\Controller;

class OrdersController extends CommonController{
	
	public function index (){
		$id = I('id','',intval);
		$data = M('orders')->where(array('id'=>$id,'uid'=>session('userID')))->find();
		if($data){
			$this->u = M('member')->where(array('id'=>$data['uid']))->field('realname,tel,address')->find();
			$this->p = M('goods')->where(array('id'=>$data['pid']))->field('stock,content,click',true)->find();
			$this->v=$data;
			$this->display();
		}else{
			$this->error('нч╤╘╣╔');
		}
	}
	
}
?>