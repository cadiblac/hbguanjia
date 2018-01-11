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

                <p class="masthead-setting"><?php if(!$member['state']): ?><span style="color:red;">认证送积分</span>&nbsp;-->&nbsp;<?php endif; ?><a href="/index.php/Index/member/person/">修改资料<i class="icon icon-right"></i></a></p>
            </div>
        </div>
    </section>

    <section class="masthead-footerSection normal-layer no-padding-layer i-border-image">
        <div class="clearfix">
            <a class="item" href="mqqwpa://im/chat?chat_type=wpa&uin=QQ号码&version=1&src_type=web&web_src=oicqzone.com">
                <div class="sl-item">
                    <span class="iconWrap">
                        <i class="advance-icon icon icon-xiaoxi" style="color:#8ad51e;"></i>
                    
                    </span>
                    <span class="text">联系客服</span>
                </div>
            </a>
            <a class="item" href="/index.php/Index/member/cart/">
                <div class="sl-item">
                        <span class="iconWrap">
                            <i class="advance-icon icon icon-gouwuche" style="color:#ffa201;"></i>
                        </span>
                    <span class="text">购物车<span id="cart_num"></span></span>
                </div>
            </a>
        </div>
    </section>

    <section class="service-section normal-layer no-padding-layer i-border-image">
        <ul class="feature-list interaction-list">
            <li class="feature-item">                
                <p class="inner-bar"><span class="order-text">我的订单<em id="orderInfo"></em></span><span class="tip-right text-gray"><a href="/index.php/Index/member/myorder/" id="isRetailOrder">查看全部订单<i class="icon icon-right"></i></a></span></p>
            </li>
			<?php if(is_array($orders)): foreach($orders as $key=>$v): ?><li>
				<div class="padding5">
				<div class="space-b"><p>订单号：<?php echo ($v["order"]); ?></p>
				<p>状态：<span class="red">
				<?php switch($v["status"]): case "1": ?>待支付<?php break;?>
				<?php case "4": ?>已完成<?php break;?>
				<?php default: ?>已支付<?php endswitch;?></span></p></div>
				<p><?php echo ($v["pname"]); ?></p>
				<div class="space-b"><p><?php echo (date('Y-m-d',$v["buytime"])); ?></p><p>价格：<?php echo ($v["price"]); ?>X<?php echo ($v["num"]); ?>=<?php echo ($v["sumprice"]); ?>元</p></div>
				<p><?php if($v['status'] == 1): ?><a href="<?php echo U('/Index/orders/del',array('id'=>$v['id']));?>">删除</a><a class="zd" href="<?php echo U('/Index/Orders/index',array('id'=>$v['id']));?>">去支付</a><?php endif; ?>
				<?php if($v['status'] == 2 or $v['status'] == 3): ?><a class="zd" href="<?php echo U('/Index/orders/updata',array('id'=>$v['id']));?>">完成订单</a><?php endif; ?></p>
				</div>
			</li><?php endforeach; endif; ?>
        </ul>        
    </section>

    <section class="advance-section normal-layer no-padding-layer no-border-layer">
        <div class="advance-slider" id="advanceSlider">
            <div class="swiper-wrapper clearfix">
                <ul class="swiper-slide advance-list clearfix">
                    <li class="advance-item">
                        <a href="/index.php/Index/member/ewm">
                            <div class="advance-cell">
                                <i class="advance-icon icon icon-vip" style="color:#ffa201;"></i>
                                <h4 class="advance-text">分享给好友</h4>

                                <p class="advance-tip line-ellipsis">&nbsp;</p>
                            </div>
                        </a>
                    </li>
                    <li class="advance-item">
                        <a href="/index.php/Index/member/fenx">
                            <div class="advance-cell">
                                <i class="advance-icon icon icon-yuan2" style="color:#f1624f;"></i>
                                <h4 class="advance-text">分销提成</h4>

                                <p class="advance-tip line-ellipsis">&nbsp;</p>
                            </div>
                        </a>
                    </li>
                    <li class="advance-item">
                        <a href="/index.php/Index/member/jf">
                            <div class="advance-cell">
                                <i class="advance-icon icon icon-youhui" style="color:#33c8b0;"></i>
                                <h4 class="advance-text">积分记录</h4>

                                <p class="advance-tip line-ellipsis" id="couponInfo">&nbsp;</p>
                            </div>
                        </a>
                    </li>
                    <li class="advance-item">
                        <a href="/index.php/Index/member/ping">
                            <div class="advance-cell">
                                <i class="advance-icon icon icon-bofang" style="color:#32bbe5;"></i>
                                <h4 class="advance-text">我的评论</h4>

                                <p class="advance-tip line-ellipsis" id="sdsp">&nbsp;</p>
                            </div>
                        </a>
                    </li>                   
                    
                </ul>
            </div>
        </div>
        <div class="slider-pagination i-border-image"></div>
    </section>

    <section class="recommend-section normal-layer no-padding-layer no-border-layer">
        <div class="recommend-header">
            <h3 class="recommend-title">我的好友</h3>
        </div>
        <div style="padding:10px;display:flex;justify-content:space-around;flex-wrap:wrap;background:#fff;">
			<?php if(is_array($firend)): foreach($firend as $key=>$v): ?><img class="masthead-figure" src="<?php echo ($v["photo"]); ?>" alt="<?php echo ($v["username"]); ?>"/><?php endforeach; endif; ?>
		</div>
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
</body>
</html>