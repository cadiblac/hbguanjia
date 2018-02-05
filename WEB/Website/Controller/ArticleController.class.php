<?php
namespace Website\Controller;
use Think\Controller;

/**
 * 文章管理控制器
 */
class ArticleController extends CommonController {

	/*文章列表视图*/
	public function index (){
		$id = I('id','',intval);		
		$this->id = $id;
		$this->cate=M('cate')->where(array('id'=>$id))->field('name')->find();
		$where = array('cid'=>$id,'del'=>0);
		$count = M('article')->where($where)->count();
		$Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->article = D('article')->getArticle($where)->select();
 		$this->page = $show;
		$this->display();
	}
    
    /*添加文章*/
    public function add () {
    	//文章属性
    	$id = I('cid','',intval);
		$this->cate=M('cate')->where(array('id'=>$id))->field('name')->find();
		$this->cid = $id;
    	$this->attr = M('attr')->select();
    	$this->display();
    }

    /*添加文章表单处理*/
    public function runAdd () {
    	$data = array(
    		'title' => $_POST['title'],
    		'keywords' => $_POST['keywords'],
    		'description' => $_POST['description'],
    		'content' =>$_POST['content'],
			'author' =>$_POST['author'],
    		'time' => strtotime($_POST['time']),
    		'cid' => (int) $_POST['cid'],
    		'pic' => $_POST['pic'],
			'tel' => I('tel'),
			'del' => I('del','',intval),
			'jf' => I('jf','',intval)
    		);
    	//p($data); die;
		if ($bid = M('article')->add($data)){

			if (isset($_POST['aid'])){
				$sql = "INSERT INTO `".C('DB_PREFIX')."article_attr` (artid,attrid) VALUES";
				foreach ($_POST['aid'] as $v){
					$sql .= "(".$bid.",".$v."),";
				}
				$sql = rtrim($sql,',');				
				M('article_attr')->execute($sql);
			}
			$this->success('添加成功',U(MODULE_NAME.'/Article/index',array('id'=>$data['cid'])));
		}else{
			$this->error('添加失败');
		}

    }

    //更新文章
    public function updata () {
    	$id = I('id','',intval);
		$cid = I('cid','',intval);
		$this->cates=M('cate')->where(array('id'=>$cid))->field('name')->find();
    	$this->cid=$cid;
    	$this->attr = M('attr')->select();
    	$this->cate = M('cate')->where(array('model'=>"Article"))->select();
    	$this->article = D('article')->where(array('id'=>$id))->relation(true)->select();
    	$this->display();
    }
    //更新文章表单处理
    public function runUpdata () {
    	$id = I('id','',intval);
    	$data = array(
    		'id' => $id,
    		'title' => $_POST['title'],
    		'keywords' => $_POST['keywords'],
    		'description' => $_POST['description'],
			'author' => $_POST['author'],
			'time' => strtotime($_POST['time']),
    		'content' =>$_POST['content'],
    		'cid' => (int) $_POST['cid'],
    		'pic' => $_POST['pic'],
			'tel' => I('tel'),
			'del' => I('del','',intval),
			'jf' => I('jf','',intval)
    		);
    	$res = M('article')->save($data);
		$resj = M('article_attr')->where(array('artid'=>$id))->delete();

			if (isset($_POST['aid'])){

				M('article_attr')->where(array('artid'=>$id))->delete();
					$sql = "INSERT INTO `".C('DB_PREFIX')."article_attr` (artid,attrid) VALUES";
				foreach ($_POST['aid'] as $v){
					$sql .= "(".$id.",".$v."),";
				}
				$sql = rtrim($sql,',');				
				$rest = M('article_attr')->execute($sql);
				
			}

			if ($res || $resj || $rest){
				$this->success('修改成功',U(MODULE_NAME.'/Article/index',array('id'=>$data['cid'])));

			}else{
				$this->error('文章内容无改动或者修改失败');
			}
				
    }

    /*文章还原/放入回收站*/
	public function toTrash(){
		$id = I('id','',intval);
		$cid = I('cid','',intval);
		$type = I('type',1,intval);
		$msg = $type ? '删除到回收站' : '还原';
		if (M('article')->where(array('id'=>$id))->setField('del',$type)){
			$this->success($msg.'成功',U(MODULE_NAME.'/Article/index',array('id'=>$cid)));
		}else{
			$this->error($msg.'失败！');
		}
	}

	//文章回收站
	public function trash () {
		$where = array('del'=>1);
		$Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();
		$this->article = D('article')->getArticle($where)->select();
		$this->goods = M('goods')->where($where)->select();
		$this->assign('page',$show);
		$this->display();
	}

	//彻底删除
	public function delete () {
		$id = I('id','',intval);
		$data = array('id'=>$id);
		if (M('article')->where($data)->delete()){
			M('article_attr')->where(array('artid'=>$id))->delete();
			$this->success('删除成功',U(MODULE_NAME.'/Article/trash'));
		}else{
			$this->error('删除失败');
		}
	}

}
?>