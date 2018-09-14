<?php
namespace Index\Controller;
use Think\Controller;
use \Lib;

class ArticleController extends CommonController{
	
	public function index () {
		$id = I('id','',intval);
		$ch=M('cate')->where(array('pid'=>$id))->select();
		
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
			if ($cate[0]['model'] !== 'Article' && $cate[0]['model'] !== 'Atlas'){
				$this->error('页面不存在');
			}
			$field = array('del','keywords','content');
			$where = "cid in (".$id.",".$cids.") and del=0";
			$count = M('article')->where($where)->count();
			$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
			$Page -> setConfig('header','共%TOTAL_ROW%条');
			$Page -> setConfig('first','首页');
			$Page -> setConfig('last','共%TOTAL_PAGE%页');
			$Page -> setConfig('prev','上一页');
			$Page -> setConfig('next','下一页');
			$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
			$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
			$show = $Page->show();
			$this->article = M('article')->field($field,true)->where($where)->order('time DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
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
			if ($cate[0]['model'] !== 'Article' && $cate[0]['model'] !== 'Atlas'){
				$this->error('页面不存在');
			}
			$field = array('del','keywords','content');
			$where = array('cid' => $id,'del' => 0);
			$count = M('article')->where($where)->count();
			$Page = new \Think\Page($count,C('PAGE_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
			$Page -> setConfig('header','共%TOTAL_ROW%条');
			$Page -> setConfig('first','首页');
			$Page -> setConfig('last','共%TOTAL_PAGE%页');
			$Page -> setConfig('prev','上一页');
			$Page -> setConfig('next','下一页');
			$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
			$Page -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
			$show = $Page->show();
			$this->article = M('article')->field($field,true)->where($where)->order('time DESC,id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->page = $show;
			if($id == 1){
				$this->display(index_cx);
			}else{
				$this->display();
			}

		}
	
	}

	public function shows () {
		$id = I('id','',intval);		
		$db = M('article');
		$data = $db->where(array('id'=>$id,'cid'=>array('neq',1)))->select();
		//查看是否已购买
		if($data[0]['jf']==0){
			$ym=1;
		}else{
			$ym=M('jf')->where(array('aid'=>$id,'mid'=>session('userID')))->find();
		}
		if(!$data){$this->error('无文章内容！');}
		$cid = $data[0]['cid'];
		$this->title = $data[0]['title'];
		$this->keywords = $data[0]['keywords'];
		$this->description = $data[0]['description'];
		$this->time = $data[0]['time'];
		$this->content = $data[0]['content'];
		$this->timg = $data[0]['pic'];
		$this->video = $data[0]['video'];
		$this->author=$data[0]['author'];		

		$fz="Article_".$id;
		$this->counts=M('ping')->where(array('fz'=>$fz,'dis'=>1))->count();
		$ping=M('ping')->where(array('fz'=>$fz,'_string'=>'dis=1 or hfid <>0'))->join('LEFT JOIN lj_member ON lj_ping.mid = lj_member.id')->field('lj_ping.*,lj_member.photo,lj_member.username')->order('lj_ping.id DESC')->select();
		$this->ping = Lib\Category::unlimitedForping($ping);
		$this->fz=$fz;
		
		$cate = Lib\Cate::catetkd($cid);
		$this->sid = $id;
		$this->ym = $ym;
		$this->cid = $cid;
		$this->fid = $cate[0]['pid'];
		$this->name = $cate[0]['name'];
		$this->pic = $cate[0]['pic'];
		//相关新闻
		$this->xg=$db->field('id,title,description,time,click,pic,jf')->where(array('cid'=>$cid,'del'=>0,'id'=>array('neq',$id)))->limit(5)->order("rand()")->select();
		$last_rs = $db->where(array('id' => array('GT',$id), 'del' => 0, 'cid' =>$cid))->order(array('id'=>'ASC'))->limit(1)->find(); //GT =>'小于'
		$next_rs = $db->where(array('id' => array('LT',$id), 'del' => 0, 'cid' =>$cid))->order(array('id'=>'DESC'))->limit(1)->find(); //LT => '大于'
        
        if ( !empty($last_rs) ) 
        {
            $last = "上一篇:<a href='";
            $last .= U(MODULE_NAME.'/ashow_'.$last_rs['id']);
            $last .= "'>{$last_rs['title']}</a>";
        }
        else 
        {
            $last = "上一篇:已是第一篇";
        }
        if ( !empty($next_rs) )
        {
            $next = "下一篇:<a href='";
            $next .= U(MODULE_NAME.'/ashow_'.$next_rs['id']);
            $next .= "'>{$next_rs['title']}</a>";
        }
        else
        {
            $next = "下一篇:已是最后一篇";
        }
        $this->prev = $last;
        $this->next = $next;
		$wxconfig = wx_share_init();  
		$this->assign('wxconfig', $wxconfig);
		$this->display();
	}

	public function getclick () {
		$id = (int) $_GET['id'];
		$where = array('id'=>$id);
		M('article')->where($where)->setInc('click');
		$click = M('article')->where($where)->getField('click');		
		echo 'document.write('.$click.')';
	}
	
	public function tel (){
		if (!IS_POST) $this->error('请输入查询手机号！');
		$tel=I('tel');
		$del=I('leim');
		if($del){
			$data=array('cid'=>14,'tel'=>$tel,'del'=>0);
		}else{
			$data=array('cid'=>1,'tel'=>$tel,'del'=>0);
		}
		$db = M('article');
		$data = $db->where($data)->order('time desc')->select();
		if($data){
			$this->tel=$tel;
			$this->data=$data;
			$this->display();
		}else{
			$this->error('查询手机号错误或无数据！');
		}
		
	}
	
	public function jieg (){
		$tel=I('tel');
		$id=I('id');
		$db = M('article');
		$data = $db->where(array('tel'=>$tel,'id'=>$id))->find();
		$this->pics = M('atlas')->where(array('aid'=>$id))->select();
		$this->pic = M('atlas')->where(array('gid'=>$id))->select();
		if($data){
			$this->cid=$data['cid'];
			$this->data=$data;
			$this->c=json_decode(stripslashes($data['content']),true);
			if($data['cid']==1){
				$this->display(jd);
			}else{
				$this->display();
			}
		}else{
			$this->error('查询手机号错误或无数据！');
		}
		
	}
	
	public function jfdh (){
		$id=I('id',intval);
		$res=M('jf')->where(array('mid'=>session('userID'),'aid'=>$id))->find();
		if($res){$this->error('您已兑换过，请勿重复兑换！');}
		$integral=M('member')->field('integral')->where(array('id'=>session('userID')))->find();
		$jf=M('article')->field('title,jf')->where(array('id'=>$id))->find();
		if($integral['integral']>=$jf['jf']){
			$data=array(
			'mid'=>session('userID'),
			'stutas'=>0,
			'jf'=>$jf['jf'],
			'aid'=>$id,
			'beizhu'=>"兑换文章id:".$id.",标题:".$jf['title'],
			'time'=>time()
			);
			M('jf')->add($data);
			if(M('member')->where(array('id'=>session('userID')))->setDec('integral',$jf['jf'])){
				$this->success('兑换成功', U('/Index/ashow_'.$id.'.html'));
			}else{
				$this->error('兑换失败');
			}
		}else{
			$this->error('您的积分不足,您可以去认证或者邀请好友来获得积分。');
		}		
	}
	
	public function kf(){
		$id=I('id',intval);
		$rs=M('staff')->where(array('id'=>$id))->find();
		if($rs){
			$this->v=$rs;
			$this->display();
		}else{
			$this->error('您还没有专属客服');
		}
	}
	
}
?>