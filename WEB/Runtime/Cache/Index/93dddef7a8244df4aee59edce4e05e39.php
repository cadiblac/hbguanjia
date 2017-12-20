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
                <p class="inner-bar"><span class="order-text">实名认证<em id="orderInfo"></em></span><span class="tip-right text-gray"><span style="color:red;">*</span>为必填项</span></p>
            </li>
			<form class="form">
			<li class="padding5"><label><span style="color:red;">*</span>姓名:</label><input name="realname" type="text" id="inpt1" value="<?php echo ($member["realname"]); ?>" /></li>
			<li class="padding5"><label><span style="color:red;">*</span>手机:</label><input name="tel" type="text" id="inpt2" value="<?php echo ($member["tel"]); ?>" /><span id="label6"></span>
			<input type="button" class="hqyzm" id="hq" value="获取验证码" onclick="yzm()" /></li>
			<li class="padding5"><label><span style="color:red;">*</span>验证码:</label><input name="code" type="text" id="inpt3" value="" /><span id="label7"></span></li>
			<li class="padding5"><label>地址:</label><input name="address" class="l80" type="text" id="inpt4" value="<?php echo ($member["address"]); ?>" /></li>
			<li class="padding5"><label>QQ:</label><input name="QQ" class="l80" type="text" id="inpt5" value="<?php echo ($member["QQ"]); ?>" /></li>
			<li class="padding5"><label>email:</label><input name="email" class="l80" type="text" id="inpt6" value="<?php echo ($member["email"]); ?>" /></li>			
			<li class="padding5"><input type="button" class="mfsj"  onclick="send()" value="保存"></li>
			</form>			
        </ul>        
    </section>

</main>
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
<script type="text/javascript" src="/Public/JS/check.js"></script>
</body>
</html>