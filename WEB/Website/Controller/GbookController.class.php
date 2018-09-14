<?php
namespace Website\Controller;
use Think\Controller;

class GbookController extends CommonController{

	public function index () {
		$id = I('id','',intval);
		$this->cate=M('cate')->where(array('id'=>$id))->field('name')->find();
		$where = array('cid'=>$id);
		$count = M('gbook')->where($where)->count();
		$Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->gbook = M('gbook')->where($where)->order('id DESC')->select();
		$this->page = $show;
		$this->display();
	}
	//查看回复留言
	public function replay () {
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		$this->cid=$cid;
		$this->cate=M('cate')->where(array('id'=>$cid))->field('name')->find();
		$this->gbook = M('gbook')->where(array('id'=>$id))->select();
		$this->display();
	}

	public function runUpdata () {
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		$gb=M('gbook')->where('id ='.$id)->find();
		if($cid==8 && $gb['retime']>0){
			$this->error('已处理无需重复处理');
		}else if($cid==8){
			$jf=array(
				'mid'=>$gb['ip'],
				'stutas'=>0,
				'jf'=>$gb['jine'],
				'beizhu'=>"提现消费",
				'gid'=>3,
				'time'=>time()
				);
			M('jf')->data($jf)->add();
			M('member')->where('id='.$gb['ip'])->setDec('fx',$gb['jine']);
			$data = array(
			'retime' => time(),
			'reuser' => session('username'),
			'reply' => '提现已通过'
			);
		}else{
			$data = array(
			'retime' => time(),
			'reuser' => session('username'),
			'reply' => I('reply')
			);
		}		
		if (M('gbook')->where('id ='.$id)->save($data)){
			$this->success('回复成功',U(MODULE_NAME.'/Gbook/index',array('id'=>$cid)));
		}else{
			$this->error('回复失败');
		}
	}

	public function delete () {
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		if (M('gbook')->where('id ='.$id)->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/Gbook/index',array('id'=>$cid)));
		}else{
			$this->error('删除失败');
		}
	}
}
?>