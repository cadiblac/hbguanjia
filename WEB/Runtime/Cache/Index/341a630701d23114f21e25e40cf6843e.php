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
<script src="/Public/js/TouchSlide.1.0.js"></script>
<script src="/Public/js/comments.js"></script>
<script src="/Public/js/fenye.js"></script>
<script src="/Public/js/setfenye.js"></script>
<!-- banner -->
<div id="focus">
	<div class="bd">
		<ul>			
			<?php if(is_array($img)): foreach($img as $key=>$v): ?><li><a class="pic" href="javascript:;"><img src="<?php echo ($v["img"]); ?>"/></a></li><?php endforeach; endif; ?>
			<li><a class="pic" href="javascript:;"><img src="<?php echo ($timg); ?>"/></a></li>
		</ul>
	</div>
	<div class="hd">
		<ul></ul>
	</div>
</div>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#focus",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
</script>
<!-- banner end-->
<div class="shangp">
	<div class="sku-name"><?php echo ($title); ?></div>
	<?php if($g[isdis]): ?><div class="dt">单价&nbsp;&nbsp;￥<span style="text-decoration:line-through;"><?php echo ($g["price"]); ?></span></div>
	<div class="dtt">优惠价&nbsp;&nbsp;￥<span><?php echo ($g["memprice"]); ?></span></div>
	<?php else: ?>
	<div class="dt">单价&nbsp;&nbsp;￥<span><?php echo ($g["price"]); ?></span></div><?php endif; ?>
	<div class="shuliang"><div>数量</div>
	<div><input class="addBtn min" type="button" value="-" /><input class="join-money" type="text" value="1" readonly><input class="addBtn add" type="button" value="+" />
	<input type="hidden" name="gid" id="gid" value="<?php echo ($sid); ?>">
	</div>
	</div>
</div>
<!-- Tab切换 S -->
	<div class="slideTxtBox">
		<div class="hd">
			<ul>
				<li class="hover" id="one40" onclick="setTab(&#39;one&#39;,40,42)"><a href="#">详情</a></li>
				<li id="one41" onclick="setTab(&#39;one&#39;,41,42)"><a href="#">评论<small style="font-size:12px;">(<?php if($counts): echo ($counts); else: ?>0<?php endif; ?>)</small></a></li>
				<li id="one42" onclick="setTab(&#39;one&#39;,42,42)"><a href="#">已购买<small style="font-size:12px;">(<?php if($gmc): echo ($gmc); else: ?>0<?php endif; ?>)</small></a></li>
			</ul>
		</div>
		<div class="bd">
			<ul id="con_one_40">
			<div class="content"><?php echo ($content); ?></div>	
			</ul>
			<ul id="con_one_41" style="display: none">
			<div class="panel-heading">
				<h3 class="panel-title">
					评论列表
				</h3>
			</div>
			<div class="panel-body">
				<form id="ping" style="margin-bottom:20px;">
				<input type="hidden" name="fz" value="<?php echo ACTION_NAME;?>_<?php echo ($sid); ?>" id="fz">
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
			<ul id="con_one_42" style="display: none" class="gmjl">
			<?php if(is_array($gmjl)): foreach($gmjl as $key=>$g): ?><li><div class="img">
			<img src="<?php echo ($g["photo"]); ?>" /></div>
			<div class="zc">
				<h3><?php echo (cut_name($g["uname"])); ?></h3>
				<p>购买时间:<?php echo (date('Y-m-d H:i:s',$g["paytime"])); ?></p>
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
<div style="height:56px;">
<p style="display:none;">
<script type="text/javascript" src="<?php echo U(MODULE_NAME.'/Goods/getclick',array('id'=>$sid));?>"></script></p>
</div>
<div class="bottom" style="height:50px;border:0;">
	<div class="gw jia">
	<a href="javascript:addcart();">
	加入购物车
	</a>
	</div>
	<div class="gw">
	<a href="javascript:buy();">
	<p>立即购买</p>
	</a>
	</div>
</div>
<script src="/Public/js/addshop.js"></script>
</body>
</html>