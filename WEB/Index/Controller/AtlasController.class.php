<?php
namespace Index\Controller;
use Think\Controller;
use \Lib;

class AtlasController extends CommonController{
	
	public function index () {
		$id = I('id','',intval);
		$ch=M('cate')->where(array('pid'=>$id))->select();
		if($ch){
			$ids = array();
			foreach ($ch as $value){
			 $ids[]=$value['id'];
			 }
			$cids=implode(',', $ids);
		$where = "cid in (".$cids.") and del=0";
		}else{
			$where = array('cid'=>$id,'del'=>0);
		}
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
		if ($cate[0]['model'] !== 'Atlas'){
			$this->error('页面不存在');
		}
		$field = array('del','keywords','description','content');		
		$count = M('article')->where($where)->count();
		$Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show=$Page->show();
		$this->article = M('article')->field($field,true)->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->display();
	}

	public function shows () {
		$id = I('id','',intval);
		$db = M('article');		
		$data = $db->where(array('id'=>$id))->select();
		$cid =$data[0]['cid'];
		$this->sid = $id;
		$this->title = $data[0]['title'];
		$this->keywords = $data[0]['keywords'];
		$this->description = $data[0]['description'];
		$this->p = $data[0]['pic'];
		$this->time = $data[0]['time'];
		$this->content = $data[0]['content'];
		$this->tel = $data[0]['tel'];
		$this->address = $data[0]['address'];
		$wxconfig = wx_share_init();		//微信分享jssdk初始化
		$this->assign('wxconfig', $wxconfig); //微信分享参数

		$cate = Lib\Cate::catetkd($cid);
		$this->cid = $cid;
		$this->fid = $cate[0]['pid'];
		$this->cname = $cate[0]['name'];
		$this->pic = $cate[0]['pic'];
		$this->model = $cate[0]['model'];
		$this->img = M('atlas')->where(array('aid'=>$id))->select();

		$last_rs = $db->where(array('id'=>array('GT',$id),'del'=>0,'cid'=>$cid))->order('id ASC')->limit(1)->find(); //GT =>'小于'
		$next_rs = $db->where(array('id'=>array('LT',$id),'del'=>0,'cid'=>$cid))->order('id DESC')->limit(1)->find(); //LT => '大于'
        
        if ( !empty($last_rs) ) 
        {
            $last = "上一篇:<a href=";
            $last .= U('/'.MODULE_NAME.'/pshow_'.$last_rs['id']);
            $last .= "'>{$last_rs['title']}</a>";
        }
        else 
        {
            $last = "上一篇:已是第一篇";
        }
        if ( !empty($next_rs) )
        {
            $next = "下一篇:<a href='";
            $next .= U('/'.MODULE_NAME.'/pshow_'.$next_rs['id']);
            $next .= "'>{$next_rs['title']}</a>";
        }
        else
        {
            $next = "下一篇:已是最后一篇";
        }
        $this->prev = $last;
        $this->next = $next;
		$this->display();
	}
	
	public function ping(){
		$data = array(
			'xmid'=>I('xmid','',intval),
			'sfid'=>I('ar','',intval),
			'jfid'=>I('jr','',intval),
			'sf'=>I('af','',intval),
			'jf'=>I('jf','',intval),
			'spy'=>I('ap','',htmlspecialchars),
			'jpy'=>I('jp','',htmlspecialchars),
			'time'=>time()
		);
		$zh=I('af')+I('jf');
		if(M('pingfen')->add($data)){
			M('article')->where(array('id'=>I('xmid')))->setField('pf','1');
			$this->success('评分成功',U('/Index/Atlas/fx',array('f'=>$zh)));
		}else{
			$this->error('评分失败');
		}
	}
	
	public function fx(){
		$f=I('f');		
		if($f>=8){
			$jg="服务很好，我为他们点赞";
		}else if($f<5){
			$jg="服务很差，我要吐槽一下";
		}else{
			$jg="服务一般，我为他们加油";
		}
		$this->title="黄环环保服务评价";
		$this->description=$jg;
		$this->f=$f;
		$this->jg=$jg;
		$wxconfig = wx_share_init();		//微信分享jssdk初始化
		$this->assign('wxconfig', $wxconfig); //微信分享参数
		$this->display();
	}
}
?>