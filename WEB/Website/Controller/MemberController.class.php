<?php
namespace Website\Controller;
use Think\Controller;
//会员管理控制器
class MemberController extends CommonController{
	//会员管理视图
	public function index () {
		$count = M('member')->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->member = M('member')->order('state DESC,logintime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
 		$this->page = $show;
		$this->display();
	}

	public function updata () {
		$id = I('id','',intval);
		$this->member = M('member')->where(array('id'=>$id))->select();
		$count= M('jf')->where(array('mid'=>$id))->order('time desc')->count();
		$Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->jf= M('jf')->where(array('mid'=>$id))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->display();		
	}

	public function runUpdata () {
		$id = I('id','',intval);
		$state = I('state','',intval);

		if (M('member')->where(array('id'=>$id))->setField('state',$state)){
			$this->success('保存成功',U(MODULE_NAME.'/Member/index'));
		}else{
			$this->error('保存失败');
		}

	}
	
	public function message () {
		$count = M('member')->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->member = M('member')->field('openid,username,photo,realname')->order('state DESC,logintime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
 		$this->page = $show;
		$this->p=I('p',0,intval);
		$this->display();
	}
	
	public function sendmail (){
		$title=I('title');
		$keyword1=I('keyword1');
		$keyword2=I('keyword2');
		$remark=I('remark');
		$openid=I('openid');
		$url=I('url','http://yunguanjia.35xg.com/');
		
		$data=array(  
		   'first'=>array('value'=>urlencode($title),'color'=>"#00CD00"),  
		   'keyword1'=>array('value'=>urlencode($keyword1),'color'=>'#00CD00'),  
		   'keyword2'=>array('value'=>urlencode($keyword2),'color'=>'#EE5C42'),     
		   'remark'=>array('value'=>urlencode($remark),'color'=>'#030303'),  
		);
		if($title&&$keyword1&&$keyword2&&$remark){
			if($openid <> 0){
			doSend($openid,'mOgaC2cz2c6qNqlT9wDH3_qW-jp4DiexCOUy5S3BkWU',$url,$data);
			}else{
				$m=M('member')->field('openid')->select();
				foreach ($m as $v) {
					doSend($v['openid'],'mOgaC2cz2c6qNqlT9wDH3_qW-jp4DiexCOUy5S3BkWU',$url,$data);
				}
			}
			$this->success('信息已发送',U(MODULE_NAME.'/Member/message'));
		}else{
			$this->error('信息内容不能为空');
		}
	}

}
?>