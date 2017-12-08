<?php
namespace Website\Controller;
use Think\Controller;

class AttrController extends CommonController{
    //文章属性视图
	public function index () {
		$this->attr = M('attr')->select();
		$this->display();
	}
    //添加文章属性
	public function addAttr () {

		$this->display();
	}
    //添加文章属性表单处理
	public function addAttrHandle () {
		if (M('attr')->add($_POST)){
			$this->success('添加成功',U(MODULE_NAME.'/Attr/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//删除文章属性
	public function delAttr () {
     	$id = I('id','',intval);
     	if (M('attr')->where(array('id' => $id))->delete()){
     		$this->success('删除成功',U(MODULE_NAME.'/Attr/index'));
     	}else{
     		$this->error('删除失败');
     	}
	}

	//修改文章属性
	public function updataAttr () {
		$id = I('id','',intval);
 		$this->attr = M('attr')->where(array('id' => $id))->select();
 		$this->display(addAttr);
	}

	//修改文章属性表单处理
	public function runupdata (){
		$id = I('id','',intval);
		$name = I('name');

		$sql = M('attr')->where(array('id' => $id))->setField('name',$name);

		if ($sql){
			$this->success('修改成功',U(MODULE_NAME.'/Attr/index'));
		}else{

			$this->error('修改失败');
		}

	}
}

?>