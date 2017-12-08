<?php
namespace Website\Controller;
use Think\Controller;

class CollectController extends CommonController{
	public function index(){		
		$count = M('collect')->count();
		$Page = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header','共%TOTAL_ROW%条');
		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show = $Page->show();
		$this->collect = M('collect')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;
		$this->display();
	}
	
    public function add(){
        $this->display();
    }

    public function runAdd(){
        $data = array(
            'name' => $_POST['name'],
            'site' => $_POST['site'],
            'url' => $_POST['url'],
            'charset' => $_POST['charset'],
            'aid' => (int) $_POST['aid'],
            'list' => $_POST['list'],
            'title' => $_POST['title'],
            'img' => $_POST['img'],
            'liurl' => $_POST['liurl'],
            'author' => $_POST['author'],
            'date' => $_POST['date'],
            'hits' => $_POST['hits'],
            'ntitle' => $_POST['ntitle'],
            'content' => $_POST['content']
        );

        if(M('collect')->add($data)){
            $this->success('添加成功',U(MODULE_NAME.'/Collect/index'));
        }else{
            $this->error('添加失败');
        }
    }

    public function updata(){
        $id = I('id','',intval);
        $this->collect = D('collect')->where(array('id'=>$id))->select();
        $this->display(add);
    }

    public function runUpdata(){
        $data = array(
            'id' => (int) $_POST['id'],
            'name' => $_POST['name'],
            'site' => $_POST['site'],
            'url' => $_POST['url'],
            'charset' => $_POST['charset'],
            'aid' => (int) $_POST['aid'],
            'list' => $_POST['list'],
            'title' => $_POST['title'],
            'img' => $_POST['img'],
            'liurl' => $_POST['liurl'],
            'author' => $_POST['author'],
            'date' => $_POST['date'],
            'hits' => $_POST['hits'],
            'ntitle' => $_POST['ntitle'],
            'content' => $_POST['content']
        );
        if(M('collect')->save($data)){
            $this->success('修改成功',U(MODULE_NAME.'/Collect/index'));
        }else{
            $this->error('修改失败');
        }
    }

    public function del(){
        $id = (int) $_GET['id'];
        if(M('Collect')->where(array('id'=>$id))->delete()){
            $this->success('删除成功',U(MODULE_NAME.'/Collect/index'));
        }else{
            $this->error('删除失败');
        }
    }

    public function test(){
        import('Vendor.phpQuery.QueryList');
        //测试采集列表页，标题 链接 作者 点击量 题图 发布日期
        $id = (int) $_GET['id'];
        $data = M('Collect')->where(array('id'=>$id))->find();
        $url = $data['url'];
        $reg = array("title"=>array($data['title'],"text"),"url"=>array($data['liurl'],"href"));
        if($data['img']){$reg2=array("img"=>array($data['img'],"src"));$reg=array_merge($reg,$reg2);}
        if($data['author']){$reg2=array("author"=>array($data['author'],"text"));$reg=array_merge($reg,$reg2);}
        if($data['date']){$reg2=array("date"=>array($data['date'],"text"));$reg=array_merge($reg,$reg2);}
        if($data['hits']){$reg2=array("hits"=>array($data['hits'],"text"));$reg=array_merge($reg,$reg2);}   
        $rang = $data['list'];
        $hj = new \QueryList($url,$reg,$rang,'curl');
        $arr = $hj->jsonArr;
        foreach ($arr as $k => $v) {
            if(substr($v['url'],0,7) != 'http://'){
                $arr[$k]['url'] = $data['site'].$v['url'];
            }
            unset($v); // 最后取消掉引用
        }
        $this->assign('arr',$arr);
        $this->display();
    }

	public function doNote(){
		import('Vendor.phpQuery.QueryList');
        //测试采集列表页，标题 链接 作者 点击量 题图 发布日期
        $id = (int) $_GET['id'];
        $data = M('Collect')->where(array('id'=>$id))->find();

        $url = $data['url'];
        $reg = array("title"=>array($data['title'],"text"),"url"=>array($data['liurl'],"href"));
        if($data['img']){$reg2=array("img"=>array($data['img'],"src"));$reg=array_merge($reg,$reg2);}
        if($data['author']){$reg2=array("author"=>array($data['author'],"text"));$reg=array_merge($reg,$reg2);}
        if($data['date']){$reg2=array("date"=>array($data['date'],"text"));$reg=array_merge($reg,$reg2);}
        if($data['hits']){$reg2=array("hits"=>array($data['hits'],"text"));$reg=array_merge($reg,$reg2);}   
        $rang = $data['list'];
        $hj = new \QueryList($url,$reg,$rang,'curl');
        $arr = $hj->jsonArr;
		$jl=array();
        foreach ($arr as $k => $v){
            if(substr($v['url'],0,7) != 'http://'){$html=$data['site'].$v['url'];}else{$html=$v['url'];}
            if(!M('Collect_list')->where(array('url'=>$html))->find()){
                $note=array('title' => $v['title'],'url'=>$html,'charset' =>$data['charset'],'ntitle'=>$data['ntitle'],'content'=>$data['content'],'cid'=>$id,'aid'=>$data['aid']);
                    
                $note=array_merge($note,$reg2);
                if($v['img']){$reg2=array('img'=>$v['img']);}else{$reg2=array('img'=>$data['img']);}
                $note=array_merge($note,$reg2);
                if($v['author']){$reg2=array('author'=>$v['author']);}else{$reg2=array('author'=>$data['author']);}
                $note=array_merge($note,$reg2);
                if($v['date']){$reg2=array('date'=>strtotime($v['date']));}else{$reg2=array('date'=>$data['date']);}
                $note=array_merge($note,$reg2);
                if($v['hits']){$reg2=array('hits'=>$v['hits']);}else{$reg2=array('hits'=>$data['hits']);}
                $note=array_merge($note,$reg2);
                if($n=M('Collect_list')->add($note)){
					$jl[]="第".$n."条记录添加成功!<br />";
                }else{
                    $jl[]= "第".$n."条记录添加失败!<br />";
                } 
            }
        }
		$this->jl=$jl;
        $this->msg = $id."号规则采集完毕！点击查看<a class='btn btn-xs btn-success' href=".U(MODULE_NAME.'/Collect/note').">采集结果</a>";
		$this->display(test);
	}
	
    public function note(){
        $count = M('collect_list')->count();
        $Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page -> setConfig('header','共%TOTAL_ROW%条');
        $Page -> setConfig('first','首页');
        $Page -> setConfig('last','共%TOTAL_PAGE%页');
        $Page -> setConfig('prev','上一页');
        $Page -> setConfig('next','下一页');
        $Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
        $Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();
        $this->collect = M('collect_list')->limit($Page->firstRow.','.$Page->listRows)->order('state asc')->select();
        $this->page = $show;
        $this->display();
    }

    public function article(){
        import('Vendor.phpQuery.QueryList');
        $ids = I('ids','',intval);
        $id = I('id','',intval);
		
        if($id){
          $data = M('Collect_list')->where(array('id'=>$id))->find();
          $url = $data['url'];
          $reg = array("ntitle"=>array($data['ntitle'],"text"),"content"=>array($data['content'],"html"));
          if($data['img'] && (substr($data['img'],0,1) != '/' || substr($data['img'],0,1) != 'h')){$reg2=array("img"=>array($data['img'],"src"));$reg=array_merge($reg,$reg2);}
          if(substr($data['author'],0,1) == '.' || substr($data['author'],0,1) == '#'){$reg2=array("author"=>array($data['author'],"text"));$reg=array_merge($reg,$reg2);}
          if(substr($data['date'],0,1) != '1'){$reg2=array("date"=>array($data['date'],"text"));$reg=array_merge($reg,$reg2);}
          if($data['hits'] && !is_numeric($data['hits'])){$reg2=array("hits"=>array($data['hits'],"text"));$reg=array_merge($reg,$reg2);}

          $hj = new \QueryList($url,$reg);
          $arr = $hj->jsonArr;
		  
          foreach ($arr as $k => $v){
            if($data['charset'] != 'UTF-8'){
                $content = iconv("GB2312","UTF-8",$v['content']);
            }else{$content = $v['content'];}
            $collect = array('cid'=>$data['aid'],'title' => $v['ntitle'],'content' => $content);
			
            if($v['img']){$collect = array_merge($collect,array('pic' => $v['img']));}else{$collect = array_merge($collect,array('pic' => $data['img']));}
            if($v['author']){$collect = array_merge($collect,array('author' => $v['author']));}else{$collect = array_merge($collect,array('author' => $data['author']));}
            if($v['date']){$collect = array_merge($collect,array('time' => strtotime($v['date'])));}else{$collect = array_merge($collect,array('time' => $data['date']));}
            if($v['hits']){$collect = array_merge($collect,array('click' => $v['hits']));}else{$collect = array_merge($collect,array('click' => $data['hits']));}
            if(M('article')->add($collect)){
                 M('collect_list')->where(array('id'=>$id))->setField('state','1');
                 $this->success('文章入库发布成功',U(MODULE_NAME.'/Collect/note'));
            }else{
                M('collect_list')->where(array('id'=>$id))->setField('state','2');
                $this->error('文章入库发布失败...');
            }
          }
        }

        /*ids start*/ 
        if ($ids){
            foreach ($ids as $key => $value) {
              $data = M('Collect_list')->where(array('id'=>$value))->find();
              $url = $data['url'];
              $reg = array("ntitle"=>array($data['ntitle'],"text"),"content"=>array($data['content'],"html"));
              if($data['img'] && (substr($data['img'],0,1) != '/' || substr($data['img'],0,1) != 'h')){$reg2=array("img"=>array($data['img'],"src"));$reg=array_merge($reg,$reg2);}
              if(substr($data['author'],0,1) == '.' || substr($data['author'],0,1) == '#'){$reg2=array("author"=>array($data['author'],"text"));$reg=array_merge($reg,$reg2);}
              if(substr($data['date'],0,1) != '1'){$reg2=array("date"=>array($data['date'],"text"));$reg=array_merge($reg,$reg2);}
              if($data['hits'] && !is_numeric($data['hits'])){$reg2=array("hits"=>array($data['hits'],"text"));$reg=array_merge($reg,$reg2);}

              $hj = new \QueryList($url,$reg);
              $arr = $hj->jsonArr;
              foreach ($arr as $k => $v){
                if($data['charset'] != 'UTF-8'){
                    $content = iconv("GB2312","UTF-8",$v['content']);
                }else{$content = $v['content'];}
                $collect = array('cid'=>$data['aid'],'title' => $v['ntitle'],'content' => $content);
                if($v['img']){$collect = array_merge($collect,array('pic' => $v['img']));}else{$collect = array_merge($collect,array('pic' => $data['img']));}
                if($v['author']){$collect = array_merge($collect,array('author' => $v['author']));}else{$collect = array_merge($collect,array('author' => $data['author']));}
                if($v['date']){$collect = array_merge($collect,array('time' => strtotime($v['date'])));}else{$collect = array_merge($collect,array('time' => $data['date']));}
                if($v['hits']){$collect = array_merge($collect,array('click' => $v['hits']));}else{$collect = array_merge($collect,array('click' => $data['hits']));}
                if(M('article')->add($collect)){
                     M('collect_list')->where(array('id'=>$value))->setField('state','1');
                     $this->success('文章入库发布成功');
                }else{
                    M('collect_list')->where(array('id'=>$value))->setField('state','2');
                    $this->error('文章入库发布失败...');
                }
              }
            }
        $this->redirect('/Website/Collect/note');
        }
    }

    public function delete() {
        $id = (int) $_GET['id'];
        if(M('collect_list')->where(array('id'=>$id))->delete()){
            $this->success('删除成功',U(MODULE_NAME.'/Collect/note'));
        }else{
            $this->error('删除失败...');
        }
    }

}