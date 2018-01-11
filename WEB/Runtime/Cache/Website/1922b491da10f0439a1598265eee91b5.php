<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />


  <link href="/WEB/Website/public/css/style.css" rel="stylesheet">
  <link href="/WEB/Website/public/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/WEB/Website/public/js/html5shiv.js"></script>
  <script src="/WEB/Website/public/js/respond.min.js"></script>
  <![endif]-->

<title>订单管理</title>
<link rel="stylesheet" type="text/css" href="/WEB/Website/public/css/userdefind.css" />
</head>

<body class="sticky-header">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/index');?>"><img src="/WEB/Website/public/images/logo2.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/index');?>"><img src="/WEB/Website/public/images/logo_icon1.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="/WEB/Website/public/images/photos/Admin.png" class="media-object">
                    <div class="media-body">
                        <h4><a target="_parent" href="#"><?php echo (session('name')); ?></a></h4>
                        <span>"欢迎使用..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">帐户信息</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/userpwd');?>"><i class="fa fa-cog"></i> <span>修改密码</span></a></li>
                  <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/logout');?>"><i class="fa fa-sign-out"></i> <span>退出系统</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/index');?>"><i class="fa fa-home"></i> <span>首页</span></a></li>
				
                <li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(System,Cate,Assort,Attr,Link))): ?>nav-active<?php endif; ?>"><a target="_parent" href=""><i class="fa fa-laptop"></i> <span>网站参数</span></a>
					<ul class="sub-menu-list">
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/index');?>"> 基本参数</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/meter');?>"> 扩展参数</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Cate/index');?>"> 栏目管理</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Assort/index');?>"> 产品分类</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Attr/index');?>"> 文章属性</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/banner');?>"> 轮播管理</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Link/index');?>"> 友链管理</a></li>
                    </ul>
				</li>
				<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Menu/index');?>"><i class="fa fa-th-list"></i> <span>内容管理</span></a></li>
				<li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(Rbac,Member)) && ACTION_NAME == index): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-users"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/index');?>"> 系统用户</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Member/index');?>"> 会员管理</a></li>
                    </ul>
                </li>
                <li class="menu-list <?php if(CONTROLLER_NAME == Orders): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-book"></i> <span>订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>1));?>"> 待付款订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>2));?>"> 已付款订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>3));?>"> 已发货订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>4));?>"> 已完成订单</a></li>
                    </ul>
                </li>
				<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Comment/index');?>"><i class="fa fa-comment"></i> <span>评论管理</span></a></li>                

                <li class="menu-list <?php if(CONTROLLER_NAME == Rbac && ACTION_NAME != index): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-sort-amount-asc"></i> <span>权限管理</span></a>
					<ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/role');?>"> 角色列表</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/node');?>"> 节点列表</a></li>
                    </ul>
				</li>
                        
                <li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(Collect,Bak))): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-cogs"></i> <span>系统工具</span></a>
					<ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Collect/index');?>"> 采集设置</a></li>
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Collect/note');?>"> 采集记录</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Bak/index');?>"> 数据备份</a></li>
                    </ul>
				</li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
        <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
            <form class="searchform" action="<?php echo U(MODULE_NAME.'/Index/search');?>" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="搜索关键字" />
            </form>
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">                  
					<li>
                        <a href="<?php echo U('Index/Index/index');?>" target="_blank" class="btn btn-default dropdown-toggle info-number">
                            <i class="fa fa-mail-reply" title="前台首页"></i>
                        </a>                        
                    </li>
					
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-gear"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">清除缓存</h5>
                            <ul class="dropdown-list normal-list">
                                <li class="new">
                                    <a href="<?php echo U(MODULE_NAME.'/Cache/index');?>" >
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">清除首页缓存</span>
                                    </a>
                                </li>
                                <li class="new">
                                    <a href="<?php echo U(MODULE_NAME.'/Cache/all');?>" >
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">清除所有缓存</span>
                                    </a>
                                </li>
                                <li class="new">
                                    <a href="<?php echo U(MODULE_NAME.'/Cache/temp');?>" >
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">重载模板 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
					
                    <li>
                        <a target="_parent" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="/WEB/Website/public/images/photos/Admin.png" alt="" />
                            <?php echo (session('name')); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/userpwd');?>"><i class="fa fa-keyboard-o"></i> <span>修改密码</span></a></li>
                            <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/logout');?>"><i class="fa fa-sign-out"></i> 退出系统</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->            
        <!-- page heading end-->
        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                订单详情
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/meter');?>">首页</a>
                </li>
                <li class="active"> 订单管理 </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
					<form class="cmxform form-horizontal adminex-form" method="post" action="<?php echo U(MODULE_NAME.'/Orders/runUpdata');?>">
                        <header class="panel-heading">
                            订单详细信息
							<span class="tools pull-right">
								<a class="fa fa-rotate-left" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>$id));?>"> 返回</a>
							 </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">								
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-1">订单号</label>
                                        <div class="col-lg-3">
                                            <label class="checkbox form-control"><?php echo ($orders["order"]); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-1">商品名称</label>
                                        <div class="col-lg-3">
										<label class="checkbox form-control"><?php echo ($p["title"]); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-1">商品缩略图</label>
                                        <div class="col-lg-3">
                                            <dl id="ul_pics" class="ul_pics clearfix"><dd id='slt'><?php if($p['pic']): ?><img src="<?php echo ($p["pic"]); ?>"/><?php else: ?>暂无缩略图<?php endif; ?></dd></dl>
                                        </div>
                                    </div>
                                    <div class="form-group ">
										<label for="password" class="control-label col-lg-1">商品原价</label>
                                        <div class="col-lg-2">
                                           <label class="checkbox form-control"> <?php echo ($p["price"]); ?>元</label>
                                        </div>
                                        <label for="password" class="control-label col-lg-1">购买价格</label>
                                        <div class="col-lg-2">
										<div class="input-group">
                                            <input type="text" name="price" value="<?php echo ($orders["price"]); ?>" class="form-control "/>
											<span class="input-group-addon ">元</span>
										</div>
                                        </div>									
                                    </div>
                                    <div class="form-group ">
										<label for="confirm_password" class="control-label col-lg-1">购买数量</label>
                                        <div class="col-lg-2">
                                          <label class="checkbox form-control"> X<?php echo ($orders["num"]); ?></label>
                                        </div>
                                        <label for="email" class="control-label col-lg-1">总计价格</label>
                                        <div class="col-lg-2">
										<div class="input-group">
                                            <input type="text" name="sumprice" value="<?php echo ($orders["sumprice"]); ?>" class="form-control "/>
											<span class="input-group-addon ">元</span>
										</div>
										<span class="help-block">不含快递费用</span>
                                        </div>									
                                    </div>
                                    <div class="form-group ">                                        
										<label for="agree" class="control-label col-lg-1 col-sm-3">会员昵称</label>
                                        <div class="col-lg-2">
                                           <label class="checkbox form-control"> <?php echo ($u["username"]); ?></label>
                                        </div>
										<label for="agree" class="control-label col-lg-1 col-sm-3">客户名称</label>
                                        <div class="col-lg-2">
                                           <label class="checkbox form-control"> <?php echo ($orders["uname"]); ?></label>
                                        </div>
										<label for="agree" class="control-label col-lg-1 col-sm-3">联系电话</label>
                                        <div class="col-lg-2">
                                           <label class="checkbox form-control"> <?php echo ($orders["tel"]); ?></label>
                                        </div>
                                    </div> 
									<div class="form-group ">
                                        <label for="agree" class="control-label col-lg-1 col-sm-3">QQ</label>
                                        <div class="col-lg-2">
                                        <label class="checkbox form-control"><?php echo ($u["QQ"]); ?>	</label>									
                                        </div>
										<label for="agree" class="control-label col-lg-1 col-sm-3">邮递地址</label>
                                        <div class="col-lg-5">
                                       <label class="checkbox form-control"> <?php echo ($orders["adress"]); ?>	</label>								
                                        </div>
                                    </div>
               
							<div class="form-group">
								<label class="col-lg-1 control-label">下单时间</label>
								<div class="col-lg-2">
								<label class="checkbox form-control">	<?php echo (date("Y-m-d H:i",$orders["buytime"])); ?></label>
								</div>
								<label class="col-lg-1 control-label">订单状态</label>
								<div class="col-lg-2"><label class="checkbox form-control">
									<?php switch($orders['status']): case "0": ?>购物车<?php break;?>
										<?php case "1": ?>已下单<?php break;?>
										<?php case "2": ?>已支付<?php break;?>
										<?php case "3": ?>已发货<?php break;?>
										<?php case "4": ?>已收货<?php break; endswitch;?></label>
								</div>
								<label class="col-lg-1 control-label">是否支付</label>
								<div class="col-lg-2">
									<label class="checkbox form-control"><?php if($orders['paytime']): ?>支付时间:<?php echo (date("Y-m-d H:i",$orders["paytime"])); else: ?>未支付<?php endif; ?></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-1 control-label">是否发货</label>
								<div class="col-lg-2">
								<?php if($orders['status'] < 2): ?><label class="checkbox form-control">等待客户付款</label><?php endif; ?>
								<?php if($orders['status'] == 2): ?><label class="checkbox-inline"><input type="radio" name="status" value="3" />发货</label><?php endif; ?>
								<?php if($orders['status'] > 2): ?><label class="checkbox form-control">已发货</label><?php endif; ?>							
								</div>
								<label class="col-lg-1 control-label">分销抵扣</label>
								<div class="col-lg-2">
								<label class="checkbox form-control"><?php echo ($orders["dk"]); ?>	</label>						
								</div>
								<label class="col-lg-1 control-label">实付金额</label>
								<div class="col-lg-2">
								<label class="checkbox form-control alert-success"><b><?php echo ($orders["total_fee"]); ?></b>元	</label>						
								</div>
							</div>							
							<div class="form-group">
								<label class="col-lg-1 control-label">备注信息</label>
								<div class="col-lg-6">
								<textarea name="remark" class="wysihtml5 form-control" rows="5"><?php echo ($orders["remark"]); ?></textarea>
								<input type="hidden" name="id" value="<?php echo ($orders["id"]); ?>">								
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-1 col-lg-10">
									<?php if($orders['status'] != 4): ?><button class="btn btn-primary" type="submit">保&nbsp;&nbsp;存</button><?php endif; ?>
								</div>
							</div>   
							</div>
                        </div>
						</form>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->
<!--footer section start-->
        <footer class="">
		Copyright &copy; 2017 DPCMS T1 Powered by <a href="http://www.dpwl.net" target="_blank">湖北大鹏网络科技有限公司</a>.
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/WEB/Website/public/js/jquery-1.10.2.min.js"></script>
<script src="/WEB/Website/public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/WEB/Website/public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/WEB/Website/public/js/bootstrap.min.js"></script>
<script src="/WEB/Website/public/js/modernizr.min.js"></script>
<script src="/WEB/Website/public/js/jquery.nicescroll.js"></script>

<!--common scripts for all pages-->
<script src="/WEB/Website/public/js/scripts.js"></script>

</body>
</html>