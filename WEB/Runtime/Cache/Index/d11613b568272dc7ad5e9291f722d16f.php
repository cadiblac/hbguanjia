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
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<body>
<div class="top">
	<div class="userinfo"><a href="/index.php/Index/member/"><img src="<?php echo (session('userHeadimgurl')); ?>"></a><?php echo (msubstr(session('userNickname'),0,6,'utf-8',false)); if(session('state')): ?><span class="yrz">已认证</span><?php else: ?><span class="wrz">未认证</span><?php endif; ?></div>
	<a class="fuwu" href="/index.php/Index/member/cart">购物车<div id="dgm"></div></a>
</div>
<div style="height:60px;"></div>
<script>
$("#dgm").load('/index.php/Index/member/cart/num/1');
</script>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css">
<div class="main">
	<div class="menu"><i></i><span>确认订单</span></div>
	<div class="piclist">
		<form action="<?php echo U(MODULE_NAME.'/weixinpay/pay/','','',true);?>" method="get">
		<div class="fl"><img src="<?php echo ($p["pic"]); ?>" /></div>
		<div class="fr"><input type="hidden" name="pname" value="<?php echo ($p["title"]); ?>" /><input type="hidden" name="pid" value="<?php echo ($p["id"]); ?>" />
		<h3><?php echo ($p["title"]); ?></h3><?php echo ($p["description"]); ?>
		<div>单价：<?php echo ($p["price"]); ?>元<p><?php if($p['isdis']): ?>优惠价：<?php echo ($p["memprice"]); ?>元<?php endif; ?></p></div></div>
		<div class="cl">购买数量:X<?php echo ($v["num"]); ?></div>
		<div class="cl">商品金额:<span class="rad"><?php echo ($v["sumprice"]); ?>元</span><input type="hidden" name="sumprice" value="<?php echo ($v["sumprice"]); ?>"/></div>
		<div class="cl">分销提成:<span class="green">-<?php if($u['fx']): echo ($u["fx"]); else: ?>0.00<?php endif; ?>元</span>
		<input type="hidden" name="out_trade_no" value="<?php echo ($v["order"]); ?>"/>
		<input type="hidden" name="fx" value="<?php echo ($u["fx"]); ?>"/>
		</div>
		<div class="input">联系人:<input type="text" name="uname" value="<?php echo ($u["realname"]); ?>" /></div>
		<div class="input">联系电话:<input type="text" name="tel" value="<?php echo ($u["tel"]); ?>" /></div>
		<div class="input">联系地址:<input type="text" name="adress" value="<?php echo ($u["address"]); ?>" /></div>
		<div>备注:</div>
		<div class="input"><textarea name="remark"></textarea></div>
		<div class="fkje">实付金额:<?php if($u['fx'] < $v['sumprice']): echo ($v['sumprice']-$u['fx']); else: ?>0.00<?php endif; ?>元
		<input type="hidden" name="total_fee" <?php if($u['fx'] < $v['sumprice']): ?>value="<?php echo ($v['sumprice']-$u['fx']); ?>"<?php else: ?>value="0.00"<?php endif; ?>/></div>
		<input type="submit" class="wxzf" value="微信支付"/>
		</form>
	</div>
</div>
<!--end main-->
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