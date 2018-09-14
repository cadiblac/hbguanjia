<?php
namespace Website\Controller;
use Think\Controller;

//员工管理控制器
class StaffController extends CommonController{
	
	public function index(){
		$count = M('staff')->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->staff = M('staff')->order('time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
 		$this->page = $show;
		$this->display();
	}
	
	public function add (){
		$this->action="添加";
		$this->display();
	}
	
	public function runadd(){
		$lei = array(//自动验证
	     array('name','require','姓名必填'), 
	     array('tel','require','联系电话必填'),
	     array('QQ','require','QQ必填'),
	     array('wxh','require','微信号必填')
		);
		$db=M('staff');
		$data=array(
		'name' => I('name'),
		'bm' => I('bm'),
		'gs' => I('gs'),
		'photo' => I('photo'),
		'tel' => I('tel'),
		'QQ' => I('qq'),
		'email' => I('email'),
		'wxh' => I('wxh'),
		'wxm' => I('wxm'),
		'time'=>time()
		);
		if (!$db->validate($lei)->create($data)){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     $this->error($db->getError());
		}
		if(I('id')){
			$rs=$db->where(array('id'=>I('id')))->save($data);
		}else{
			$rs=$db->add($data);			
		}
		if($rs){
			$this->success('保存成功',U('Staff/index'));
		}else{
			$this->error('保存失败');
		}
	}
	
	public function updata(){
		$id=I('id');
		$this->action="修改";
		$this->v=M('staff')->where(array('id'=>$id))->find();
		$this->display(add);
	}
	
}