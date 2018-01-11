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
<script src="/Public/js/comments.js"></script>
<script src="/Public/js/fenye.js"></script>
<script src="/Public/js/setfenye.js"></script>
<script>  
    wx.config({  
        debug: false, // 是否开启调试模式  
        appId: '<?php echo $wxconfig["appId"]; ?>', // 必填，微信号AppID  
        timestamp: <?php echo $wxconfig["timestamp"]; ?>, // 必填，生成签名的时间戳  
        nonceStr: '<?php echo $wxconfig["nonceStr"]; ?>', // 必填，生成签名的随机串  
        signature: '<?php echo $wxconfig["signature"]; ?>',// 必填，签名，见附录1  
        jsApiList: ['onMenuShareTimeline', //分享到朋友圈  
        'onMenuShareAppMessage', //分享给朋友  
        'onMenuShareQQ' //分享到QQ  
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2  
    });  
  
    wx.ready(function(){  
        var options = {  
            title: '<?php echo $title; ?>', // 分享标题  
            link: '<?php echo U(/index.php/Index/Article); ?>', // 分享链接，记得使用绝对路径，不能用document.URL
            imgUrl: 'http://yunguanjia.35xg.com<?php echo $timg; ?>', // 分享图标，记得使用绝对路径  
            desc: '<?php echo $description; ?>', // 分享描述  
            success: function () {  
                console.info('分享成功！');  
                // 用户确认分享后执行的回调函数  
            },  
            cancel: function () {  
                console.info('取消分享！');  
                // 用户取消分享后执行的回调函数  
            }  
        }  
        wx.onMenuShareTimeline(options); // 分享到朋友圈  
        wx.onMenuShareAppMessage(options); // 分享给朋友  
        wx.onMenuShareQQ(options); // 分享到QQ  
    });  
</script>
<ul class="news" style="border-top: #eeeded 3px solid;border-bottom: #eee 1px solid;">
<li style="border:0;"><div class="img">
<img <?php if($timg): ?>src="<?php echo ($timg); ?>"<?php else: ?>src="/Public/images/nopic.jpg"<?php endif; ?> /></div>
<div class="zc">
	<h3><a href="<?php echo U('/'.MODULE_NAME.'/Article/shows/',array('id'=>$sid,'spread'=>session('userID')));?>"><?php echo ($title); ?></a></h3>
	<p><?php echo ($description); ?></p>
	<div class="db"><div><?php echo (date('Y-m-d',$time)); ?></div><div>(<script type="text/javascript" src="<?php echo U(MODULE_NAME.'/Article/getclick',array('id'=>$sid));?>"></script>)</div></div>
</div>
</li>
</ul>		
<!-- Tab切换 S -->
	<div class="slideTxtBox">
		<div class="hd">
			<ul>
				<li class="hover" id="one40" onclick="setTab(&#39;one&#39;,40,42)"><a href="#">详情</a></li>
				<li id="one41" onclick="setTab(&#39;one&#39;,41,42)"><a href="#">评论<small style="font-size:12px;">(<?php if($counts): echo ($counts); else: ?>0<?php endif; ?>)</small></a></li>
				<li id="one42" onclick="setTab(&#39;one&#39;,42,42)"><a href="#">相关</a></li>
			</ul>
		</div>
		<div class="bd">
			<ul id="con_one_40">
			<div class="content"><?php if($ym): echo ($content); else: ?><p>您还没有兑换此内容的阅读权限，请点击<a style="margin-left:5px;color:#95c62b;" href="<?php echo U('/Index/Article/jfdh',array('id'=>$sid));?>" onClick="return confirm('确认兑换?');">积分兑换</a></p><?php endif; ?></div>	
			</ul>
			<ul id="con_one_41" style="display: none">
			<div class="panel-heading">
				<h3 class="panel-title">
					评论列表
				</h3>
			</div>
			<div class="panel-body">
				<form id="ping" style="margin-bottom:20px;">
				<input type="hidden" name="fz" value="<?php echo CONTROLLER_NAME;?>_<?php echo ($sid); ?>" id="fz">
				<div><textarea type="textarea" rows="3" placeholder="还可以输入140个字" class="form-control" id="nei"></textarea></div>
				<span class="comment_tip" id="comment_tip" data-top="11" data-foot="36"></span>
				<div style="margin-top: 7px;"><button type="button" class="btn ant-btn" onclick="subcomment()"><i class="glyphicon glyphicon-send"></i><span style="margin-left:10px;">发布评论</span></button></div>
				</form>
				<input type='hidden' id='current_page' />
				<input type='hidden' id='show_per_page' />
				<div id="content">
				<?php if(is_array($ping)): foreach($ping as $k=>$v): ?><div class="story">
				<p class="story_t"><span><img src="<?php echo ($v["photo"]); ?>" width="30" />&nbsp;<?php echo ($v["username"]); ?></span><span class="time"><?php echo (date('Y-m-d H:i:s',$v["time"])); ?></span></p>
				<p class="story_m"><?php echo ($v["neir"]); ?></p> 
				<?php if(is_array($v["hf"])): foreach($v["hf"] as $key=>$h): ?><p class="story_hf">
				<span>回复：</span><?php echo ($h["neir"]); ?></p><?php endforeach; endif; ?>
				</div><?php endforeach; endif; ?>
				</div>
				<div id="page_navigation"></div>
			</div>
			</ul>
			<ul id="con_one_42" style="display: none" class="news">
			<?php if(is_array($xg)): foreach($xg as $key=>$x): ?><li><div class="img">
			<img <?php if($x['pic']): ?>src="<?php echo ($x["pic"]); ?>"<?php else: ?>src="/Public/images/nopic.jpg"<?php endif; ?> /></div>
			<div class="zc">
				<h3><a href="<?php echo U('/'.MODULE_NAME.'/ashow_'.$x['id']);?>"><?php echo (msubstr($x["title"],0,15,'utf-8',false)); ?></a></h3>
				<p><?php echo ($x["description"]); ?></p>
				<div class="db"><div><?php echo (date('Y-m-d',$x["time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo ($x["click"]); ?>)</div><div class="jf"><?php echo ($x["jf"]); ?>积分</div></div>
			</div>
			</li><?php endforeach; endif; ?>				
			</ul>
		</div>
	</div>
	<script language="javascript">
	<!--
	function setTab(name,cursel,n){
	for(i=40;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"hover":"";
	con.style.display=i==cursel?"block":"none";
	}
	}
	//-->
	</script>
	<!-- Tab切换 E -->
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