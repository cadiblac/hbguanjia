<?php
namespace Website\Controller;
use Think\Controller;

Class InfoController extends CommonController{

	public function index () {
		$id = I('id','',intval);
		$cate = D('CateView')->where(array('id'=>$id))->select();
		if (!$cate){
			$cate = M('cate')->where(array('id'=>$id))->select();
		}
		$this->cate = $cate;
		$this->display();
	}

	public function updata (){
		$title = I('title');
		$content = I('content');
		$id = I('cid','',intval);
		$date = array(
			'id' => $id,
			'keywords' => $_POST['keywords'],
			'description' => $_POST['description']
			);
		$res = M('cate')->save($date);
        $where = array('cid'=>$id);
        $info = array('title'=>$title,'content'=>$content,'cid'=>$id);
		if (M('info')->where($where)->select()){
			$rest = M('info')->where($where)->save($info);
		}else{
			$rest = M('info')->add($info);
		}

		if ($res || $rest){
			$this->success('修改成功',U(MODULE_NAME.'/Info/index',array('id'=>$id)));
		}else{
			$this->error('修改失败或者内容无更新');
		}

	}
}
?>