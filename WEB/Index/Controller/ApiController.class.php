<?php
namespace Index\Controller;
use Think\Controller;
use \Lib;

class ApiController extends Controller{
	
	public function xmjd(){
		if (!IS_POST) $this->ajaxReturn(array('code'=>300,'error'=>'拒绝非法访问！'),'JSON');
		$tel=I('tel');
		$del=I('leim',0,intval);
		if($del){
			$data=array('cid'=>14,'tel'=>$tel,'del'=>0);
		}else{
			$data=array('cid'=>1,'tel'=>$tel,'del'=>0);
		}
		$db = M('article');
		$data = $db->where($data)->order('time desc')->select();
		if($data){
			$this->ajaxReturn(array('code'=>200,'msg'=>'查询成功','data'=>$data),'JSON');
		}else{
			$this->ajaxReturn(array('code'=>201,'msg'=>'查无数据'),'JSON');
		}
		
	}
	
}
?>