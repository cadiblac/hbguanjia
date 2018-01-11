<?php
namespace Index\Controller;
use Think\Controller;

class OrdersController extends CommonController{
	
	public function index (){
		$id = I('id','',intval);
		$data = M('orders')->where(array('id'=>$id,'uid'=>session('userID')))->find();
		if($data){
			$this->u = M('member')->where(array('id'=>$data['uid']))->field('realname,tel,address')->find();
			$p = M('goods')->where(array('id'=>$data['pid']))->field('stock,content,click',true)->find();
			if($p){
				$this->p=$p;
				$this->v=$data;
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
	
	
}
?>