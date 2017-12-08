<?php
namespace Website\Controller;
use Think\Controller;

/**
* 商品控制器
*/
class GoodsController extends CommonController{
	//商品首页视图
	public function index () {
		$id = I('id','',intval);
		$this->id = $id;
		$this->cate=M('cate')->where(array('id'=>$id))->field('name')->find();
		$where = array('cid'=>$id,'del'=>0);
		$count = M('goods')->where($where)->count();
		$Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->goods = M('goods')->where($where)->select();
 		$this->page = $show;
		$this->display();
	}
	//添加商品
	public function add () {
		$cid = I('cid','',intval);
		$this->cid=$cid;
		$this->cate=M('cate')->where(array('id'=>$cid))->field('name')->find();
		$this->attr = M('class')->select();
		$this->display();
	}
	//商品表单入库处理
	public function runAdd () {
		if(!$_POST['price']) $this->error('单价不能为空，请填写价格！');
		$data = array(
			'title' => $_POST['title'],
    		'keywords' => $_POST['keywords'],
    		'description' => $_POST['description'],
    		'content' =>$_POST['content'],
			'price' => $_POST['price'],
			'memprice' => $_POST['memprice'],
			'stock' => $_POST['stock'],
			'classid' => $_POST['aid'],
			'brand' => $_POST['brand'],
			'unit' => $_POST['unit'],
			'weight' => $_POST['weight'],
			'isref' => $_POST['isref'],
			'ishot' => $_POST['ishot'],
			'isdis' => $_POST['isdis'],
    		'time' => strtotime($_POST['time']),
    		'cid' => (int) $_POST['cid'],
    		'pic' => $_POST['pic']
			);

		if ($bid = M('goods')->add($data)){
			if (isset($_POST['pics'])){
				foreach ($_POST['pics'] as $v) {
					$dta['img'] = $v;
					$dta['gid'] = $bid;
					$rest = M('atlas')->data($dta)->add();
				}
			}

		$this->success('添加成功',U(MODULE_NAME.'/Goods/index',array('id'=>$data['cid'])));
		}else{
			$this->error('添加失败');
		}

	}
	//更新商品视图
	public function updata () {
		$id = I('id','',intval);
    	$cid = I('cid','',intval);
		$this->cid = $cid;
		$this->cates=M('cate')->where(array('id'=>$cid))->field('name')->find();
    	$this->attr = M('class')->select();
    	$this->cate = M('cate')->where(array('model'=>"Goods"))->select();
    	$this->goods = M('goods')->where(array('id'=>$id))->select();
    	$this->atlas = M('atlas')->where(array('gid'=>$id))->select();
    	$this->display();
	}
	//异步处理商品
	public function deli () {
		$id = I('id','',intval);
		if (M('atlas')->where(array('id'=>$id))->delete()){
			$data['status'] = 1;
            $this->ajaxReturn($data,'json');
		}
	}
	//商品更新表单处理
	public function runUpdata () {
		$id = I('id','',intval);
    	$data = array(
			'id' => $id,
    		'title' => $_POST['title'],
    		'keywords' => $_POST['keywords'],
    		'description' => $_POST['description'],
    		'content' =>$_POST['content'],
			'price' => $_POST['price'],
			'memprice' => $_POST['memprice'],
			'stock' => $_POST['stock'],
			'classid' => $_POST['aid'],
			'brand' => $_POST['brand'],
			'unit' => $_POST['unit'],
			'weight' => $_POST['weight'],
			'isref' => $_POST['isref'],
			'ishot' => $_POST['ishot'],
			'isdis' => $_POST['isdis'],
    		'time' => strtotime($_POST['time']),
    		'cid' => (int) $_POST['cid'],
    		'pic' => $_POST['pic']
    		);
    	$res = M('goods')->save($data);
		

			if (isset($_POST['pics'])){
				foreach ($_POST['pics'] as $v) {
					$dta['img'] = $v;
					$dta['gid'] = $id;
					$resp = M('atlas')->data($dta)->add();
				}
			}

			if ($res || $resp){
				$this->success('更新成功',U(MODULE_NAME.'/Goods/index',array('id'=>$data['cid'])));
			}else{
				$this->error('更新失败或者数据无改动');
			}

	}
	
	//放入回收站
	public function toTrash(){
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		$type = I('type',1,intval);
		$msg = $type ? '删除到回收站' : '还原';
		if (M('goods')->where(array('id'=>$id))->setField('del',$type)){
			$this->success($msg.'成功',U(MODULE_NAME.'/Goods/index',array('id'=>$cid)));
		}else{
			$this->error($msg.'失败！');
		}
	}

	//彻底删除
	public function delete () {
		$id = I('id','',intval);
		$data = array('id'=>$id);
		if (M('goods')->where($data)->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/Article/trash'));
		}else{
			$this->error('删除失败');
		}
	}
}

?>