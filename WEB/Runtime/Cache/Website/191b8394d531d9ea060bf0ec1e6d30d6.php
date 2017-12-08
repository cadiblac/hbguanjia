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
<script src="/WEB/Website/public/js/jquery-1.10.2.min.js"></script>
<script src="/WEB/Website/public/js/jr.js"></script>
<script type="text/javascript">
   var verifyUrl = '<?php echo U(MODULE_NAME.'/Login/verify','','');?>';
   function change_code(obj){
	$("#code").attr("src",verifyUrl+'/'+Math.random());
	return false;
	}
</script>
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="<?php echo U(MODULE_NAME.'/Login/login');?>" method="post">
        <div class="form-signin-heading profile-pic text-center">
            <h1 class="sign-title">登 录</h1>
            <img src="/WEB/Website/public/images/login-logo.jpg" alt="大鹏网络"/>
        </div>
        <div class="login-wrap">
            <input type="text" name="user" class="form-control" placeholder="用户名" autofocus>
            <input type="password" name="password" class="form-control" placeholder="密码">
            <input type="text" name="verify" placeholder="验证码" style="width: 150px;float: left;" class="form-control"><a href="javascript:void(change_code(this));"><img style="float: right;" src="<?php echo U(MODULE_NAME.'/Login/verify');?>" id="code"></a>
            <div class="clearfix"></div>
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>
    </form>
            <div class="registration">
                
            </div>
            <label class="checkbox1">
                技术支持：<a target="_blank" href="http://www.dpwl.net"> 大鹏网络</a>
                <span class="pull-right">
				服务热线：400-6688-605
                    <!--<a data-toggle="modal" href="#myModal"> 忘记密码?</a>-->

                </span>
            </label>

        </div>

        <!-- Modal -->
        <form action="<?php echo U(MODULE_NAME.'/Login/forget');?>" method="post">
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">忘记密码 ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>请您联系网站后台管理员并提供您的账号信息以便找回密码.</p>
                        <!--<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">-->

                    </div>
                    <div class="modal-footer">
                        <!--<button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-primary" type="button">提交</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

        </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->

<script src="/WEB/Website/public/js/bootstrap.min.js"></script>
<script src="/WEB/Website/public/js/modernizr.min.js"></script>

</body>
</html>