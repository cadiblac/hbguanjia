<?php
namespace Website\Controller;
use Think\Controller;
//会员管理控制器
class MemberController extends CommonController{
	//会员管理视图
	public function index () {
		/*$where=array('del'=>0);
		$count = M('member')->where($where)->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->member = M('member')->where($where)->order('state DESC,logintime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
 		$this->page = $show;*/
		$this->display();
	}
	
	public function daochu (){
		//导出Excel
        $xlsName  = "User";
        $xlsCell  = array(
        array('id','序列'),
        array('username','昵称'),        
        array('realname','姓名'),
		array('sex','性别'),
        array('company','公司'),
        array('position','职务'),
        array('birthday','生日'),
        array('tel','电话'),
        array('address','地址'),
        array('QQ','QQ'),
        array('email','邮箱'),
        array('remark','备注')    
        );
        $xlsModel = M('member');
    
        $xlsData  = $xlsModel->Field('id,username,realname,sex,company,position,birthday,tel,address,qq,email,remark')->select();
        foreach ($xlsData as $k => $v)
        {
            $xlsData[$k]['sex']=$v['sex']==1?'男':'女';
        }
        exportExcel($xlsName,$xlsCell,$xlsData); 
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
		$this->staff=M('staff')->field('id,name')->select();
		$this->jf= M('jf')->where(array('mid'=>$id))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->display();		
	}

	public function runUpdata () {
		$id = I('id','',intval);
		$data=array('remark'=>I('remark'),'kf'=>I('kf'));
		if(M('member')->where(array('id'=>$id))->save($data)){
			$this->success('保存成功',U(MODULE_NAME.'/Member/updata',array('id'=>$id)));
		}else{
			$this->error('保存失败');
		}

	}
	
	public function del (){
		$id = I('id','',intval);
		$qx = I('qx','',intval);
		if($qx){
			if(M('member')->where(array('id'=>$qx))->setField('del',0)){
				$this->success('取消成功',U('Member/black'));
			}else{
				$this->error('取消失败');
			}
		}else{
			if(M('member')->where(array('id'=>$id))->setField('del',1)){
				$this->success('删除成功',U('Member/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}
	
	public function black (){
		$where=array('del'=>1);
		$count = M('member')->where($where)->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->member = M('member')->where($where)->order('state DESC,logintime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
 		$this->page = $show;
		$this->display();
	}
	
	public function message () {
		$this->display();
	}
	
	public function fpage (){
		$c=$_GET['iDisplayLength'];
		$s=$_GET['sSearch'];
		$p=$_GET['iDisplayStart']/$c+1;
		$px=$_GET['sSortDir_0'];
		$col=$_GET['iSortCol_0'];
		switch ($col){ 
		case 0 : $order="a.id ".$px; break; 
		case 1 : $order="a.id ".$px; break; 
		case 5 : $order="a.yqrid ".$px; break; 
		case 6 : $order="a.logintime ".$px; break; 
		case 7 : $order="a.state ".$px; break; 
		case 9 : $order="a.integral ".$px; break; 
		case 10 : $order="a.usertype ".$px; break; 
		} 		
		if($s){
			$where = "a.del=0 and (a.username like '%".$s."%' or a.company like '%".$s."%' or a.realname like '%".$s."%' or a.tel like '%".$s."%')";
			$where2 = "del=0 and (username like '%".$s."%' or company like '%".$s."%' or realname like '%".$s."%' or tel like '%".$s."%')";
		}else{
			$where=array('a.del'=>0);
			$where2=array('del'=>0);
		}
		if($c>0){
			$article = M('member')->alias('a')->join('lj_member m ON a.yqrid = m.id','LEFT')->where($where)->field('a.id,a.username,a.photo,a.company,a.realname,FROM_UNIXTIME(a.logintime,"%Y-%m-%d %H:%i") as logintimes,m.username as uname,a.yqrid,a.state,a.tel,a.usertype,a.integral,a.remark')->order($order)->page($p,$c)->select();
		}else{
			$article = M('member')->alias('a')->join('lj_member m ON a.yqrid = m.id','LEFT')->where($where)->field('a.id,a.username,a.photo,a.company,a.realname,FROM_UNIXTIME(a.logintime,"%Y-%m-%d %H:%i") as logintimes,m.username as uname,a.yqrid,a.state,a.tel,a.usertype,a.integral,a.remark')->order($order)->select();
		}
		$count = M('member')->where($where2)->count();
		$Page = new \Think\Page($count,$c);// 实例化分页类 传入总记录数和每页显示的记录数
 		$data=array('iTotalRecords'=>$count,"iTotalDisplayRecords"=>$count,"aaData"=>$article);
		$this->ajaxReturn($data);
	}

	public function sendmail (){
		if(I('openid2')!=''){
			$name=I('name');
			$bh=I('bh');
			$time=I('time');
			$zt=I('zt');
			if($zt==1){
				$title="您好，您有个项目已启动";
				$remark="我们将尽快完成委托，感谢您的支持！";
			}else if($zt==2){
				$title="您好，您有个项目进行中";
				$remark="如有问题随时与我们联系，感谢您的支持！";
			}else{
				$title="您好，您有个项目已完成";
				$remark="您可以登录云管家下载检测报告，感谢您的支持！";
			}
			$openid=I('openid2');
			$url="http://yunguanjia.35xg.com/index.php/alist_1.html";
			$data=array(  
			   'first'=>array('value'=>urlencode($title),'color'=>"#cd1800"),  
			   'keyword1'=>array('value'=>urlencode($bh),'color'=>'#333'),  
			   'keyword2'=>array('value'=>urlencode($name),'color'=>'#333'),  
			   'keyword3'=>array('value'=>urlencode($time),'color'=>'#333'),     
			   'remark'=>array('value'=>urlencode($remark),'color'=>'#666'),  
			);
		}else{
			$title=I('title');
			$keyword1=I('keyword1');
			$keyword2=date("Y-m-d H:i",time());
			$remark=I('remark');
			$openid=I('openid');
			$url=I('url') ? I('url') : "http://yunguanjia.35xg.com/";
			
			$data=array(  
			   'first'=>array('value'=>urlencode($title),'color'=>"#cd1800"),  
			   'keyword1'=>array('value'=>urlencode("查看".$keyword1),'color'=>'#666'),  
			   'keyword2'=>array('value'=>urlencode($keyword2),'color'=>'#666'),  
			   'keyword3'=>array('value'=>urlencode("公众号内查看"),'color'=>'#666'),     
			   'remark'=>array('value'=>urlencode($remark),'color'=>'#030303'),  
			);
		}
		$result=array();
		
		//$data=array('content'=>urlencode("标题：".$title)."\n".urlencode("时间：").date("Y-m-d H:i",time())."\n".urlencode("描述：".$remark)."\n<a href='".urlencode($url."'>查看详情>></a>"));

		if($title&&$remark){
			$m=M('member')->where('id in ('.$openid.')')->field('id,username,openid')->select();
			foreach ($m as $v) {
				if(I('openid2')){
				$jg=doSend($v['openid'],'w-B_E-M8Vh7amoPRQe6KRaaDfjQzZ3GdOfy8SvvFJyY',$url,$data);	
				}else{
				$jg=doSend($v['openid'],'zJ3zwVzMUmTL5s6zWcQ5XcxH2jzulDFCOU1ABrK86jQ',$url,$data);
				}
				if($jg){
					$result[]="用户[id-".$v['id']."]:".$v['username']."发送成功！";
				}else{
					$result[]="用户[id-".$v['id']."]:".$v['username']."发送失败！";
				}
			}
			$this->result=$result;
			$this->display();
		}else{
			$this->error('信息内容不能为空');
		}
	}

}
?>