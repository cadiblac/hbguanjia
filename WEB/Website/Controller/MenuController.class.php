<?php
namespace Website\Controller;
use Think\Controller;
use Lib;
/**
 *内容管理控制器
 */
class MenuController extends CommonController {
	/**
	 * 内容管理视图
	 * @return [type] [description]
	 */
    public function index (){
		$this->works = M('Article')->where(array('del'=>0))->limit(15)->order('time desc')->field('id,cid,title,time')->select();
		$this->goods = M('Goods')->where(array('del'=>0))->limit(15)->order('time desc')->field('id,cid,title,time')->select();
        $this->display();
    }
	
}