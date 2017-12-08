<?php
namespace Website\Controller;
use Think\Controller;

Class LinkController extends CommonController{
	//友情链接视图
	public function index () {
		$this->link = M('link')->select();
		$this->display();
	}
	//添加友链
	public function addLink () {
		$this->display();
	}
	//添加友链表单处理
	public function runAdd () {
		if (M('link')->add($_POST)){
			$this->success('添加成功',U(MODULE_NAME.'/Link/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//友链锁定/解锁
	public function lock () {
		$id = I('id','',intval);
		$type = I('type',0,intval);
		$msg = $type ? '不显示' : '显示';
		if (M('link')->where(array('id'=>$id))->setField('stauts',$type)){
			$this->success('该友链已设置为'.$msg,U(MODULE_NAME.'/Link/index'));
		}else{
			$this->error('设置失败');
		}
		
	}
	//修改友情链接
	public function updata () {
		$id = I('id','',intval);
		$this->link = M('link')->where(array('id'=>$id))->select();
		$this->display(addLink);
	}
	//修改友情链接表单处理
	public function runUpdata (){
		$id = I('id','',intval);
		if (M('link')->where(array('id'=>$id))->save($_POST)){
			$this->success('修改成功',U(MODULE_NAME.'/Link/index'));
		}else{
			$this->error('修改失败');
		}
	}

	//删除友链
	public function delete () {
		$id = I('id','',intval);
		$data = array('id'=>$id);
		if (M('link')->where($data)->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/Link/index'));
		}else{
			$this->error('删除失败');
		}
	}
}
?>