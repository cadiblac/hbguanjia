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

<title>DPCMS T1网站管理系统</title>
  <!--icheck-->
  <link href="/WEB/Website/public/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="/WEB/Website/public/js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="/WEB/Website/public/js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="/WEB/Website/public/js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="/WEB/Website/public/css/clndr.css" rel="stylesheet">

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="/WEB/Website/public/js/morris-chart/morris.css">

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
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Member/message');?>"> 信息群发</a></li>
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

        <div class="page-heading">
            <h3>
                欢迎使用
            </h3>
            <ul class="breadcrumb">
                <li>
                    首页
                </li>
                <li class="active"> 信息统计 </li>
            </ul>
            <div class="state-info">
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>普通文章</span>
                            <h3 class="red-txt"><?php echo ($mon); ?></h3>
                        </div>
                        <div id="income" class="chart-bar"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>产品统计</span>
                            <h3 class="green-txt"><?php echo ($sum); ?></h3>
                        </div>
                        <div id="expense" class="chart-bar"></div>
                    </div>
                </section>
            </div>
        </div>
        <div class="wrapper">
            <!--1ping end-->
            <div class="row">
				<div class="col-lg-4">
					<section class="panel">
					<header class="panel-heading">
					欢迎使用DPCMS T1网站管理系统
					</header>
					<div class="panel-body">
					<div class="form">
						<div class="alert alert-success alert-block fade in">系统基本信息</div>
						<div class="form-group clearfix">
						<label class="col-lg-3">操作系统：</label>
						<div class="col-lg-6"><?php echo PHP_OS;?></div>
						</div>
						<div class="form-group clearfix">
						<label class="col-lg-3">运行环境：</label>
						<div class="col-lg-6"><?php echo ($_SERVER["SERVER_SOFTWARE"]); ?></div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">运行方式：</label>
						<div class="col-lg-6"><?php echo php_sapi_name();?></div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">版本号：</label>
						<div class="col-lg-6">T1</div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">上传限制：</label>
						<div class="col-lg-6">2M</div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">执行时间：</label>
						<div class="col-lg-6"><?php echo ini_get('max_execution_time');?>秒</div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">北京时间：</label>
						<div class="col-lg-6"><?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600);?></div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">域名/IP：</label>
						<div class="col-lg-6"><?php echo ($_SERVER['SERVER_NAME']); ?> [ <?php echo gethostbyname($_SERVER['SERVER_NAME']);?> ]</div>
						</div>
						<div class="alert alert-success alert-block fade in">使用帮助</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">技术支持：</label>
						<div class="col-lg-6"><a href="http://www.dpwl.net" target="_blank">湖北大鹏网络</a></div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">服务热线：</label>
						<div class="col-lg-6">400-6688-605</div>
						</div>
						<div class="form-group clearfix">
                        <label class="col-lg-3">客服QQ：</label>
						<div class="col-lg-6">528051088<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=528051088&site=qq&menu=yes">
                          <img border="0" src="http://wpa.qq.com/pa?p=2:528051088:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></div>
						</div>
					</div>
					</div>
					</section>
				</div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="calendar-block ">
                                <div class="cal1">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <header class="panel-heading">
                            最新文档
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <!--<a class="fa fa-times" href="javascript:;"></a>-->
                             </span>
                        </header>
                        <div class="panel-body">
                            <ul class="to-do-list" id="sortable-todo">
                            <?php if(is_array($works)): foreach($works as $key=>$v): ?><li class="clearfix">
                                    <span class="drag-marker" style="margin-right:10px;">
                                    <i></i>
                                    </span>
                                    <p class="todo-title">
                                        <a href="<?php echo U(MODULE_NAME.'/Article/updata',array('id'=>$v['id'],'cid'=>$v['cid']));?>"><?php echo (substr($v["title"],0,60)); ?></a>
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">
                                        <?php echo (date('y-m-d',$v["time"])); ?>
                                    </div>
                                </li><?php endforeach; endif; ?>                               
                            </ul>
                            <div class="row">
                                <div class="col-md-12">                            
                                </div>
                            </div>
                        </div>
                    </div>
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

<!--easy pie chart-->
<script src="/WEB/Website/public/js/easypiechart/jquery.easypiechart.js"></script>
<script src="/WEB/Website/public/js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="/WEB/Website/public/js/sparkline/jquery.sparkline.js"></script>
<script src="/WEB/Website/public/js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="/WEB/Website/public/js/iCheck/jquery.icheck.js"></script>
<script src="/WEB/Website/public/js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="/WEB/Website/public/js/flot-chart/jquery.flot.js"></script>
<script src="/WEB/Website/public/js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="/WEB/Website/public/js/flot-chart/jquery.flot.resize.js"></script>


<!--Morris Chart-->
<script src="/WEB/Website/public/js/morris-chart/morris.js"></script>
<script src="/WEB/Website/public/js/morris-chart/raphael-min.js"></script>

<!--Calendar-->
<script src="/WEB/Website/public/js/calendar/clndr.js"></script>
<script src="/WEB/Website/public/js/calendar/evnt.calendar.init.js"></script>
<script src="/WEB/Website/public/js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--pickers plugins-->
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!--pickers initialization-->
<script src="/WEB/Website/public/js/pickers-init.js"></script>

<!--common scripts for all pages-->
<script src="/WEB/Website/public/js/scripts.js"></script>

</body>
</html>