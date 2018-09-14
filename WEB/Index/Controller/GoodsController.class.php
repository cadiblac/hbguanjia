<?php
namespace Index\Controller;
use Think\Controller;
use \Lib;

class GoodsController extends CommonController{
	
	public function index () {
		$id = I('id','',intval);
		$clas = I('clas','',intval);
		$ch=M('cate')->where(array('pid'=>$id))->select();
		
		$class=M('class')->select();
		$class = Lib\Category::unlimitedForLayer($class);
		$this->clas=$class;
		
		if($ch){
			$ids = array();
			foreach ($ch as $value){
			 $ids[]=$value['id'];
			 }
			$cids=implode(',', $ids);
			$cate = Lib\Cate::catetkd($id);
			$this->cid = $cate[0]['id'];
			$this->fid = $cate[0]['pid'];
			$this->title = $cate[0]['name'];
			$this->keywords = $cate[0]['keywords'];
			$this->description = $cate[0]['description'];
			$this->pic = $cate[0]['pic'];
			$this->model = $cate[0]['model'];
			if ($cate[0]['model'] !== 'Goods'){
				$this->error('页面不存在');
			}
			$field = array('del','keywords','content');
			if($clas){
				$where = "cid in (".$cids.") and del=0 and classid=".$clas;
			}else{
				$where = "cid in (".$cids.") and del=0";
			}			
			$count = M('goods')->where($where)->count();
			$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
			$Page -> setConfig('header','共%TOTAL_ROW%条');
			$Page -> setConfig('first','首页');
			$Page -> setConfig('last','共%TOTAL_PAGE%页');
			$Page -> setConfig('prev','上一页');
			$Page -> setConfig('next','下一页');
			$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
			$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
			$show = $Page->show();
			$this->goods = M('goods')->field($field,true)->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->page = $show;
			$this->display(cateindex);
		}else{
			$cate = Lib\Cate::catetkd($id);
			$this->cid = $cate[0]['id'];
			$fid = $cate[0]['pid'];
			$fcate = Lib\Cate::catetkd($fid);
			$this->fid = $fid;
			$this->fname = $fcate[0]['name'];
			$this->title = $cate[0]['name'];
			$this->keywords = $cate[0]['keywords'];
			$this->description = $cate[0]['description'];
			$this->pic = $cate[0]['pic'];
			$this->model = $cate[0]['model'];
			if ($cate[0]['model'] !== 'Goods'){
				$this->error('页面不存在');
			}
			$field = array('del','keywords','content');
			if($clas){
				$where = array('cid' => $id,'classid'=> $clas,'del' => 0);
			}else{
				$where = array('cid' => $id,'del' => 0);
			}			
			$count = M('goods')->where($where)->count();
			$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
			$Page -> setConfig('header','共%TOTAL_ROW%条');
			$Page -> setConfig('first','首页');
			$Page -> setConfig('last','共%TOTAL_PAGE%页');
			$Page -> setConfig('prev','上一页');
			$Page -> setConfig('next','下一页');
			$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
			$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
			$show = $Page->show();
			$this->goods = M('goods')->field($field,true)->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->page = $show;
			if($id==5){
				$this->display(lipin);
			}else{
				$this->display();
			}		
			
		}
	
	}

	public function details () {
		$id = I('id','',intval);		
		$db = M('goods');
		$data = $db->where(array('id'=>$id))->find();
		$cid = $data['cid'];
		$clas = $data['classid'];
		$this->title = $data['title'];
		$this->keywords = $data['keywords'];
		$this->descriptions = $data['description'];
		$this->time = $data['time'];
		$this->content = $data['content'];
		$this->timg = $data['pic'];
		$this->g = $data;

		$this->clas = M('class')->where(array('id'=>$clas))->find();
		$fz="details_".$id;
		$this->counts=M('ping')->where(array('fz'=>$fz,'dis'=>1))->count();
		$ping=M('ping')->where(array('fz'=>$fz,'_string'=>'dis=1 or hfid <>0'))->join('LEFT JOIN lj_member ON lj_ping.mid = lj_member.id')->field('lj_ping.*,lj_member.photo,lj_member.username')->order('lj_ping.id DESC')->select();
		$this->ping = Lib\Category::unlimitedForping($ping);
		$this->fz=$fz;
		
		$cate = Lib\Cate::catetkd($cid);
		$this->sid = $id;
		$this->cid = $cid;
		$this->fid = $cate[0]['pid'];
		$this->name = $cate[0]['name'];
		$this->pic = $cate[0]['pic'];
		$this->model = $cate[0]['model'];
		$this->img = M('atlas')->where(array('gid'=>$id))->select();

		$this->gmc=M('orders')->where('pid ='.$id.' and status >=2')->count();
		$this->gmjl=M('orders')->where('pid ='.$id.' and status >=2')->join('LEFT JOIN lj_member ON lj_orders.uid = lj_member.id')->field('lj_orders.uname,lj_orders.paytime,lj_member.photo')->order('lj_orders.paytime DESC')->limit('20')->select();
		$wxconfig = wx_share_init();  
		$this->assign('wxconfig', $wxconfig);
		if($cid==5){
		$this->display(dh);	
		}else{
		$this->display();
		}
	}

	public function getclick () {
		$id = (int) $_GET['id'];
		$where = array('id'=>$id);
		M('goods')->where($where)->setInc('click');
		$click = M('goods')->where($where)->getField('click');		
		echo 'document.write('.$click.')';
	}
	
	//放入购物车页面
	public function cart (){
		$spread=cookie('spread');
		if($spread&&$spread<>session('userID')){$trade=$spread;}
		$uid=session('userID');
		$pid=I('id','',intval);
		$num=I('num','',intval);
		$gata=M('goods')->where(array('id'=>$pid))->field('title,price,memprice,isdis')->find();
		if($gata['isdis']){$price=$gata['memprice'];}else{$price=$gata['price'];}
		$h=time();
		$dh="A".date("y",time()).substr($h, -8).date("md",time());
		$data = array(
			'uid' => $uid,
			'pid' => $pid,
			'pcid'=> I('cid'),
			'pname' => $gata['title'],
			'order' => $dh,
			'price' => $price,
			'num' => $num,
			'sumprice' => $price*$num,
			'buytime' => $h,
			'trade'=>$trade,
			'status' => 0
		);
		if(M('orders')->data($data)->add()){
			$this->ajaxReturn(1);
		}else{
			$this->ajaxReturn(0);
		}

	}
		
	//下单页面
	public function buy (){		
		$h=time();
		$dh="B".date("y",time()).substr($h, -8).date("md",time());
		$spread=cookie('spread');
		if($spread&&$spread<>session('userID')){$trade=$spread;}
		$uid=session('userID');
		$pid=I('id','',intval);
		$num=I('num','',intval);
		//if($pid !== (int) $_POST['pid']){$this->error('参数错误');}
		$gata=M('goods')->where(array('id'=>$pid))->field('title,price,memprice,stock,isdis')->find();
		if(I('cid')==5){
			$jf=M('member')->where('id='.session('userID'))->getField('integral');
			if($jf<$_POST['num']*$gata['price']){$this->ajaxReturn(array('code'=>0,'msg'=>'您的积分不足！'));}
			if($gata['stock']<$_POST['num']){$this->ajaxReturn(array('code'=>0,'msg'=>'购买数量大于库存！'));}
		}
		if($gata['isdis']){$price=$gata['memprice'];}else{$price=$gata['price'];}
		$data = array(
			'uid' => $uid,
			'pid' => $pid,
			'pcid'=> I('cid'),
			'pname' => $gata['title'],
			'order' => $dh,
			'price' => $price,
			'num' => $num,
			'sumprice' => $price*$num,
			'buytime' => $h,
			'trade'=>$trade,
			'status' => 1
		);
		if($rs=M('orders')->add($data)){
			$this->ajaxReturn(array('code'=>1,'rs'=>$rs));
		}else{
			$this->ajaxReturn(array('code'=>0,'msg'=>'下单失败！'));
		}
	}
	
}
?>