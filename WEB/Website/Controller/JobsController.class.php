<?php
namespace Website\Controller;
use Think\Controller;

class JobsController extends CommonController{

	public function index () {
		  $id = I('id','',intval);
		  $this->cate=M('cate')->where(array('id'=>$id))->field('name')->find();
		  $where = array('cid'=>$id);
		  $count = M('jobs')->where($where)->count();
	      $Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
	      $Page -> setConfig('header','共%TOTAL_ROW%条');
	      $Page -> setConfig('first','首页');
	      $Page -> setConfig('last','共%TOTAL_PAGE%页');
	      $Page -> setConfig('prev','上一页');
	      $Page -> setConfig('next','下一页');
	      $Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
	      $Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
	      $show = $Page->show();
		  $this->jobs = M('jobs')->where($where)->order('id DESC')->select();
		  $this->id = $id;
		  $this->page = $show;
		  $this->display();
	}

	public function add () {
		$cid = I('cid','',intval);
		$this->cate=M('cate')->where(array('id'=>$cid))->field('name')->find();
		$this->cid = $cid;
		$this->display();
	}

	public function runAdd () {
		$data = array(
			'title' => $_POST['title'],
    		'jobname' => $_POST['jobname'],
    		'jobadd' => $_POST['jobadd'],
    		'qty' => $_POST['qty'],
    		'salary' =>$_POST['salary'],
    		'time' => time(),
    		'cid' => (int) $_POST['cid'],
    		'useful' => $_POST['useful'],
    		'jobdut' => $_POST['jobdut'],
    		'jobrequire' => $_POST['jobrequire']
			);
		if (M('jobs')->add($data)){
			$this->success('发布成功',U(MODULE_NAME.'/Jobs/index',array('id'=>$data['cid'])));
		}else{
			$this->error('发布失败');
		}
	}

	public function updata () {
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		$this->cate=M('cate')->where(array('id'=>$cid))->field('name')->find();
		$this->jobs = M('jobs')->where(array('id'=>$id))->select();
		$this->display(add);
	}

	public function runUpdata () {
		if (M('jobs')->save($_POST)){
			$this->success('修改成功',U(MODULE_NAME.'/Jobs/updata',array('id'=>$_POST['id'])));
		}else{
			$this->error('修改失败');
		}
	}

	public function delete () {
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		if (M('jobs')->where(array('id'=>$id))->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/Jobs/index',array('id'=>$cid)));
		}else{
			$this->error('删除失败');
		}
	}
}
?>