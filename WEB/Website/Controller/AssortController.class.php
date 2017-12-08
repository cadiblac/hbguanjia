<?php
namespace Website\Controller;
use Think\Controller;
use Lib;


class AssortController extends CommonController{
    //商品分类列表视图
	public function index () {
		$cate = M('class')->order('sort ASC')->select();
        $this->cate = Lib\Category::unlimitedForlevel($cate);
		$this->display();
	}
	//添加商品分类/子商品分类
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
	//添加商品分类表单处理
	public function addCateHandle () {
	     if (M('class')->add($_POST)){
	     	$this->success('添加成功',U(MODULE_NAME.'/Assort/index'));
	     }else{
	     	$this->error('添加失败');
	     }
	}
	//商品分类排序处理
	public function sortCate () {
         $db = M('class');

         foreach ($_POST as $id => $sort) {
         	$db->where(array('id' => $id))->setField('sort',$sort);
         }
         $this->redirect(MODULE_NAME.'/Assort/index');
	}
	//修改商品分类
	public function updataCate () {
		$id = I('id','',intval);

		$this->cate = M('class')->where(array('id' => $id))->select();
		$catec = M('class')->order('sort ASC')->select();
        $this->catef = Lib\Category::getParentsId($catec,$id);
		$this->catel = Lib\Category::unlimitedForlevel($catec);
		$this->display();
	}
	//修改商品分类表单处理
	public function runupdata () {
		$id = I('id','',intval);
		if (M('class')->where(array('id' => $id))->save($_POST)){
			$this->success('修改成功',U(MODULE_NAME.'/Assort/index'));
		}else{
			$this->error('修改失败');
		}

	}
	//删除商品分类处理
	public function delCate () {
		$id = I('id','',intval);

		$cate = M('class')->select();
		$cate = Lib\Category::getChildsId($cate,$id);
		
		if ($cate){
			$this->error('系统检测到此商品分类下有子商品分类，要删除此商品分类请先删除其下所有子商品分类');
		}else{
			if (M('class')->where(array('id' => $id))->delete()){
				$this->success('删除成功',U(MODULE_NAME.'/Assort/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}

}
?>
