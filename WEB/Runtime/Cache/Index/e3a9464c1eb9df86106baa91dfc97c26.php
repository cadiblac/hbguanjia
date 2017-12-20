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
	<a class="fuwu" href="/index.php/goods_3.html">购买服务</a>
</div>
<div style="height:60px;"></div>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css">
<div class="main">
	<div class="m_ctt">
		<div class="newsshow_title">欢迎使用项目进度查询</div>
		<div class="newsshow_sm2"> </div>
		<div class="newsshow_ctt">
			<form id="contact" method="post" name="GBookAdd" action="/index.php/Index/Article/tel" target="_self">
				<input type="text" name="tel" size="30" value="" class="text-input" placeholder="请输入查询手机号"/>
				<p class="contact-button-house">
					<input type="submit" name="submit" class="full-screen-button contactButton button black" id="submit" value="进度查询"/>
				</p>
			</form>
		</div>
	</div>
</div>
<!--end main-->
<div style="height:76px; background:#eee;"></div>
<div class="bottom">
	<div class="fdh">
	<a href="/index.php/Index/index">
	<?php if(CONTROLLER_NAME == 'Index'): ?><img src="/Public/images/sy1.png">
	<p class="hover">首页</p>
	<?php else: ?>
	<img src="/Public/images/sy.png">
	<p>首页</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/alist_2.html">
	<?php if(CONTROLLER_NAME == 'Article' && $cid != 1): ?><img src="/Public/images/kc1.png">
	<p class="hover">资料</p>
	<?php else: ?>
	<img src="/Public/images/kc.png">
	<p>资料</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/goods_3.html">
	<?php if(CONTROLLER_NAME == 'goods'): ?><img src="/Public/images/sc1.png">
	<p class="hover">商城</p>
	<?php else: ?>
	<img src="/Public/images/sc.png">
	<p>商城</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/alist_1.html">
	<?php if($cid == 1): ?><img src="/Public/images/xm1.png">
	<p class="hover">项目</p>
	<?php else: ?>
	<img src="/Public/images/xm.png">
	<p>项目</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/member/">
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