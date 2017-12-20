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
	<a class="fuwu" href="/index.php/Index/member/cart">购物车</a>
</div>
<div style="height:60px;"></div>
<link href="/Public/css/fdj.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Public/css/fancybox.css" />
<script src="/Public/js/fdj.js"></script>
<script src="/Public/js/check.js"></script>
<script type="text/javascript" src="/Public/js/jquery.fancybox-1.3.1.pack.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	  var showproduct = {
		  "boxid":"showbox",
		  "sumid":"showsum",
		  "boxw":456,//宽度,该版本中请把宽高填写成一样
		  "boxh":456,//高度,该版本中请把宽高填写成一样
		  "sumw":60,//列表每个宽度,该版本中请把宽高填写成一样
		  "sumh":60,//列表每个高度,该版本中请把宽高填写成一样
		  "sumi":7,//列表间隔
		  "sums":5,//列表显示个数
		  "sumsel":"sel",
		  "sumborder":1,//列表边框，没有边框填写0，边框在css中修改
		  "lastid":"showlast",
		  "nextid":"shownext"
		  };//参数定义	  
	 $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行
  });

$(function(){
  $("#showdiv").fancybox({'centerOnScroll':true});
  });
</script>  
<?php echo W('bann/banner');?> 

<div class="main">
    <ul class="crub"><li>当前位置:</li>	<li><a href='/index.php'>首页</a></li><?php
 $_crumb_cate = M('cate')->select(); $_crumb_cate = Lib\Category::getParents($_crumb_cate,$cid); foreach ($_crumb_cate as $_crumb_v){ extract($_crumb_v); switch ($_crumb_v['model']){ case 'Article' : $url = U("/".MODULE_NAME."/alist_".$id); break; case 'Info' : $url = U("/".MODULE_NAME."/info_".$id); break; case 'Atlas' : $url = U("/".MODULE_NAME."/plist_".$id); break; case 'Gbook' : $url = U("/".MODULE_NAME."/gbook_".$id); break; case 'Slink' : $url = $_crumb_v['link']; break; case 'Jobs' : $url = U("/".MODULE_NAME."/jobs_".$id); break; case 'Goods' : $url = U("/".MODULE_NAME."/goods_".$id); break; } echo "<li>&gt;&gt;&nbsp;<a href='".$url."'>"; echo $name; echo "</a></li>"; } ?></ul>	
	<div class="readcon">
	<div class="poto">
	<div id="showbox">
	  <img src="<?php echo ($timg); ?>" width="249" height="185">	  
	  <?php if(is_array($img)): foreach($img as $key=>$v): ?><img src="<?php echo ($v["img"]); ?>" width="249" height="185"/><?php endforeach; endif; ?>
	  <img src="<?php echo ($timg); ?>" width="249" height="185">
	</div><!--展示图片盒子-->
	<div id="showsum"></div><!--展示图片里边-->
	<p class="showpage">
	  <a href="javascript:void(0);" id="showlast"> < </a>
	  <a href="javascript:void(0);" id="shownext"> > </a>
	</p>	
	</div>	
	<div class="cans">
	<div class="sku-name"><?php echo ($title); ?></div>
	<div class="price">
	价&nbsp;&nbsp;格<div class="dt">￥<span><?php echo ($g["price"]); ?></span></div><br />	
	促&nbsp;&nbsp;销<div class="dtt"><?php if($g[isdis]): ?><em class="hl_red_bg">政府补贴</em>购买后可以到当地农机局申领补贴<?php else: ?>暂无<?php endif; ?></div>
	</div>
	<p><span>类&nbsp;&nbsp;别:</span><strong><?php echo ($clas["classname"]); ?></strong></p>
	<p><span>品&nbsp;&nbsp;牌:</span><strong><?php echo ($g["brand"]); ?></strong></p>
	<p><span>重&nbsp;&nbsp;量:</span><?php echo ($g["weight"]); ?>kg</p>
	<p><span>库&nbsp;&nbsp;存:</span><?php echo ($g["stock"]); echo ($g["unit"]); ?></p>
	<p><span>人&nbsp;&nbsp;气:</span><script type="text/javascript" src="<?php echo U(MODULE_NAME.'/Goods/getclick',array('id'=>$sid));?>"></script></p>
	<div class="yuding"><a id="showdiv" href="#inline">在线预订</a></div>
	</div>
	<div class="clear"></div><!--form-->
	<div style="display:none">
     <div id="inline" style="width:600px; height:650px; overflow:auto">
        <form class="basic-grey" onsubmit="return checkForm();" action="<?php echo U(MODULE_NAME.'/Goods/reser','','');?>" method="post">
		<h1>在线商品预订单
		<span>请认真填写所有的文本框.</span>
		</h1>
			<label>
				<span>商品名称</span>			     
				<input type="text" class="form-control" name="pname" id="pname" readonly value="<?php echo ($title); ?>">
				<input type="hidden" class="form-control" name="pid" value="<?php echo ($g["id"]); ?>">
			</label>
			<label>
				<span>姓名</span>			     
				<input type="text" class="form-control" name="uname" id="isEmpty" placeholder="请输入姓名">
				<input type="hidden" class="form-control" name="uid" value="0">
			</label>
			<label>
				<span>联系地址</span>
					 <input type="text" class="form-control" name="address" id="isLess"	placeholder="请输入家庭住址">
			</label>
			<label>
				<span>联系电话</span>
					 <input type="text" class="form-control" name="tel" id="isRange" placeholder="请输入联系电话">
			</label>

			<label>
				<span>订购数量</span>
					 <input type="text" class="form-control" name="num" id="isRangeNum" value="1">
			</label>
			<label>
				<span>备注信息</span>
				 <textarea class="form-control" name="remark" rows="3"></textarea>
				 <input type="hidden" name="cid" value="13" >
			</label>
			<label>
			<span>&nbsp;&nbsp;</span>
				 <input type="submit" class="yuding" value="提交预订">
		   </label>
		</form>
     </div>
	</div><!--form-->
	<div class="tab-main"><span>商品详细介绍</span><div class="clear"></div></div>
        <div class="content">
           <?php echo ($content); ?>
           <p><br /><br /></p> 
        <p><?php echo ($prev); ?></p>
        <p><?php echo ($next); ?></p>
        </div>
        <!--end content-->
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