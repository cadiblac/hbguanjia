<?php
namespace Website\Controller;
use Think\Controller;
use Lib;


class CateController extends CommonController{
    //栏目列表视图
	public function index () {
		$cate = M('cate')->order('sort ASC')->select();
        $this->cate = Lib\Category::unlimitedForlevel($cate);
		$this->display();
	}
	//添加栏目/子栏目
	public function addCate () {
		$pid = I('pid',0,intval);

        if ($pid == 0){
        	$str = "一级";
        }else{
        	$str = "子";
        }
        $this->pid = $pid;
        $this->str = $str;
		$this->display();
	}
	//添加栏目表单处理
	public function addCateHandle () {
	     if (M('cate')->add($_POST)){
	     	$this->success('添加成功',U(MODULE_NAME.'/Cate/index'));
	     }else{
	     	$this->error('添加失败');
	     }
	}
	//栏目排序处理
	public function sortCate () {
         $db = M('cate');

         foreach ($_POST as $id => $sort) {
         	$db->where(array('id' => $id))->setField('sort',$sort);
         }
         $this->redirect(MODULE_NAME.'/Cate/index');
	}
	//修改栏目
	public function updatacate () {
		$id = I('id','',intval);

		$this->cate = M('cate')->where(array('id' => $id))->select();
		$catec = M('cate')->order('sort ASC')->select();
        $this->catef = Lib\Category::getParentsId($catec,$id);
		$this->catel = Lib\Category::unlimitedForlevel($catec);
		$this->display();
	}
	//修改栏目表单处理
	public function runupdata () {
		$id = I('id','',intval);
		if (M('cate')->where(array('id' => $id))->save($_POST)){
			$this->success('修改成功',U(MODULE_NAME.'/Cate/index'));
		}else{
			$this->error('修改失败');
		}

	}
	//删除栏目处理
	public function delCate () {
		$id = I('id','',intval);

		$cate = M('cate')->select();
		$cate = Lib\Category::getChildsId($cate,$id);
		
		if ($cate){
			$this->error('系统检测到此栏目下有子栏目，要删除此栏目请先删除其下所有子栏目');
		}else{
			if (M('cate')->where(array('id' => $id))->delete()){
				$this->success('删除成功',U(MODULE_NAME.'/Cate/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}

}
?>
