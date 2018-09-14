<?php
namespace Website\Controller;
use Think\Controller;
use Lib;
/**
 *后台首页控制器
 */
class CommentController extends CommonController {
	/**
	 * 后台首页视图
	 * @return [type] [description]
	 */
    public function index (){
		$this->clist=M('ping')->field('fz,count(fz) as c,sum(dis) as s')->group('fz')->where(array('hfid'=>0))->select();
        $this->display();
    }
	
	public function lists (){
		$fz=I('fz');
		$ping=M('ping')->where(array('fz'=>$fz))->join('LEFT JOIN lj_member ON lj_ping.mid = lj_member.id')->field('lj_ping.*,lj_member.photo,lj_member.username')->order('lj_ping.id DESC')->select();
		$this->ping = Lib\Category::unlimitedForping($ping);
		$this->fz=$fz;
		$this->display();
	}
	
	public function shen (){
		$id=I('id',intval);
		$fz=I('fz');
		$rs=M('ping')->where(array('id'=>$id))->setField('dis',1);
		if($rs){
			$this->success('审核成功',U(MODULE_NAME.'/Comment/lists',array('fz'=>$fz)));
		}else{
			$this->error('审核失败');
		}
	}
	
	public function huif (){
		$fz=I('fz');
		$data=array(
			'fz'=>$fz,
			'hfid'=>I('hfid',intval),
			'time'=>time(),
			'dis'=>0,
			'ip'=>get_client_ip(),
			'neir'=>I('neir'),
		);
		if(M("ping")->add($data)){
			$this->success('回复成功',U(MODULE_NAME.'/Comment/lists',array('fz'=>$fz)));
		}else{
			$this->error('回复失败');
		}
	}
	
	public function delte (){
		$fz=I('fz');
		if(M("ping")->where('id='.I('id'))->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/Comment/lists',array('fz'=>$fz)));
		}else{
			$this->error('删除失败');
		}
	}
	
	public function xm(){
		$count = M('pingfen')->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->pingf = M('pingfen')->JOIN('lj_article on lj_pingfen.xmid=lj_article.id')
		->field('lj_article.title,lj_pingfen.*')->order('lj_pingfen.id desc')
		->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->st=M('staff')->field('id,name')->select();
 		$this->page = $show;
		$this->display();
	}
   
}