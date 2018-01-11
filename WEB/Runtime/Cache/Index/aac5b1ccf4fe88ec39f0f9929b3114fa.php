<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>会员个人中心</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width,initial-scale= 1.0, minimum-scale=1.0, maximum-scale=1.0"/>
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<link type="text/css" rel="stylesheet" href="/Public/member/css/head.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css">
<link type="text/css" rel="stylesheet" href="/Public/member/css/styles.min.css"/>
</head>
<body>
<!-- html code start -->
<main class="jumbotron-main">
    <section class="masthead-section no-padding-layer no-border-layer">
        <input type="hidden" value="0" id="fromzdh"/>

        <div class="masthead-login">
            <figure class="masthead-figure">
				<img src="<?php echo (session('userHeadimgurl')); ?>" width="64"/>
            </figure>
            <div class="masthead-caption">
                <h3 class="masthead-caption-title line-ellipsis">
                <?php echo (session('userNickname')); ?>
                                </h3>

                <p class="masthead-wallet" data-space="&nbsp;" id="underName">会员积分:<?php echo ($member["integral"]); ?></p>

                <p class="masthead-setting"></p>
            </div>
        </div>
    </section>

  
    <section class="service-section normal-layer no-padding-layer i-border-image">
        <ul class="feature-list interaction-list">
            <li class="feature-item">                
                <p class="inner-bar"><span class="order-text">我的二维码<em id="orderInfo"></em></span></p>
            </li>
			<li>
				<div class="padding5">
				<p style="text-align:center;margin:10px 0;"><img src="<?php echo ($fxewm); ?>" /></p>
				<p>您可以把上面的二维码保存到手机，分享到朋友圈或者发给好友，您的朋友扫码二维码访问环保云管家，您就可以获得一定的积分奖励。</p>
				</div>
			</li>			
        </ul>        
    </section>

</main>
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
<script type="text/javascript" src="/Public/JS/check.js"></script>
</body>
</html>