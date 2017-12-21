<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo ($title); ?></title>
<meta content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<link rel="stylesheet" type="text/css" href="/Public/css/css.css">
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.SuperSlide.2.1.1.js"></script>
</head>
<body>
<div class="top">
	<div class="userinfo"><img src="<?php echo (session('userHeadimgurl')); ?>"><?php echo (msubstr(session('userNickname'),0,6,'utf-8',false)); if(session('state')): ?><span class="yrz">已认证</span><?php else: ?><span class="wrz">未认证</span><?php endif; ?></div>
	<a class="fuwu" href="/index.php/Index/member/cart">购物车<div id="dgm"></div></a>
</div>
<div style="height:60px;"></div>
<script>
$("#dgm").load('/index.php/Index/member/cart/num/1');
</script>
<?php echo W('bann/banner');?>
<div class="one">
<?php
 $_fav_cate = M('cate')->where(array('stauts'=>0,'pid'=>3))->order('sort ASC,id ASC')->limit("4")->select(); foreach ($_fav_cate as $_fav_v) : extract($_fav_v); switch ($_fav_v['model']){ case Article : $url = U("/".MODULE_NAME."/article/index",array('id'=>$id,'spread'=>session('userID'))); break; case Info : $url = U("/".MODULE_NAME."/info/index",array('id'=>$id,'spread'=>session('userID'))); break; case Atlas : $url = U("/".MODULE_NAME."/atlas",array('id'=>$id,'spread'=>session('userID'))); break; case Gbook : $url = U("/".MODULE_NAME."/gbook/index",array('id'=>$id,'spread'=>session('userID'))); break; case Slink : $url = $_fav_v['link']; break; case Jobs : $url = U("/".MODULE_NAME."/jobs/index",array('id'=>$id,'spread'=>session('userID'))); break; case Goods : $url = U("/".MODULE_NAME."/goods/index",array('id'=>$id,'spread'=>session('userID'))); break; } ?><div><a href="<?php echo ($url); ?>"><img src="<?php echo ($pic); ?>" /><p><?php echo ($name); ?></p></a></div><?php endforeach;?>	
</div>
<div class="two">
	<?php $field=array("id","title","description","jf","pic","time","click");$_list_news=M("article")->join("lj_article_attr ON lj_article.id = lj_article_attr.artid")->where("cid in (2) and del=0 and pic<>''")->field($field)->limit("3")->order("time desc")->select();foreach ($_list_news as $k=>$_list_value) : extract($_list_value);$url=U("/".MODULE_NAME."/article/shows",array("id"=>$id,"spread"=>session("userID"))); ?><div class="pw">
	<a href="<?php echo ($url); ?>"><img src="<?php echo ($pic); ?>" /><p><?php echo (msubstr($title,0,15,'utf-8',false)); ?></p></a>
	</div><?php endforeach; ?>
</div>
<div class="three">
	<div class="menu"><i></i><span>在线学习</span></div>
	<ul>
	<?php $field=array("id","title","description","jf","pic","time","click");$_list_news=D("article")->field($field)->where("cid in (2) and del=0 and pic<>''")->relation(true)->limit("8")->order("time desc")->select();foreach ($_list_news as $k=>$_list_value) : extract($_list_value);$url=U("/".MODULE_NAME."/article/shows",array("id"=>$id,"spread"=>session("userID"))); ?><li><div class="img">
	<img src="<?php echo ($pic); ?>" /></div>
	<div class="zc">
		<h3><a href="<?php echo ($url); ?>"><?php echo (msubstr($title,0,15,'utf-8',false)); ?></a></h3>
		<p><?php echo ($description); ?></p>
		<div class="db"><div><span>★★★★★</span>(<?php echo ($click); ?>)</div><div class="jf"><?php echo ($jf); ?>积分</div></div>
	</div>
	</li><?php endforeach; ?>
	</ul>
</div>
<div style="height:76px; background:#eee;"></div>
<div class="bottom">
	<div class="fdh">
	<a href="/index.php/Index/index/index/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'Index'): ?><img src="/Public/images/sy1.png">
	<p class="hover">首页</p>
	<?php else: ?>
	<img src="/Public/images/sy.png">
	<p>首页</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/article/index/id/2/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'Article' && $cid != 1): ?><img src="/Public/images/kc1.png">
	<p class="hover">资料</p>
	<?php else: ?>
	<img src="/Public/images/kc.png">
	<p>资料</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/goods/index/id/3/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'goods'): ?><img src="/Public/images/sc1.png">
	<p class="hover">商城</p>
	<?php else: ?>
	<img src="/Public/images/sc.png">
	<p>商城</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/article/index/id/1/spread/<?php echo (session('userID')); ?>">
	<?php if($cid == 1): ?><img src="/Public/images/xm1.png">
	<p class="hover">项目</p>
	<?php else: ?>
	<img src="/Public/images/xm.png">
	<p>项目</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/member/index/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'Member'): ?><img src="/Public/images/me1.png">
	<p class="hover">我的</p>
	<?php else: ?>
	<img src="/Public/images/me.png">
	<p>我的</p><?php endif; ?>
	</a>
	</div>
</div>
</body>
</html>