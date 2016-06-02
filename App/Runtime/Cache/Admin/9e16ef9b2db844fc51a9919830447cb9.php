<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QuanTuMore Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Public/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="/Public/Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="/Public/Admin/css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="/Public/Admin/css/ionicons.min.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="/Public/Admin/css/simplify.min.css" rel="stylesheet">
    <!-- Jquery -->
    <script src="/Public/Static/js/jquery-2.2.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/Public/Static/js/bootstrap.min.js"></script>

    
    
    <script type="text/javascript" src="/Public/Admin/js/login.js"></script>
        <script type="text/javascript">
         var verifyURL = "<?php echo U('/Admin/Login/verifyLogin/','','',0);?>";
        </script>

</head>

<body class="overflow-hidden light-background">
    <div class="wrapper no-navigation preload">
        <div class="sign-in-wrapper">
            <div class="sign-in-inner">
                <div class="login-brand text-center">
                    <i class="fa fa-database m-right-xs"></i> QuanTuMore <strong class="text-skin">Admin</strong>
                </div>

                <form  action="<?php echo U('/Admin/Login/login/');?>" method="POST" id="login" role="form" class="form-horizontal">
                    <div class="form-group m-bottom-md">
                        <lable class="col-sm-3 control-lable">用户名</lable>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username"  placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <lable class="col-sm-3 control-lable">密码</lable>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                     <div class="form-group">
                         <lable class="col-sm-3 control-lable">验证码</lable>
                         <div class="col-sm-9">
                             <input type="text" class="form-control" name="code"/> 
                             <img src="<?php echo U('/Admin/Login/verifyLogin/','','',0);?>" id="code"/>
                             <a href="javascript:void(change_code(this));">看不清</a>
                         </div>
                     </div>
                    <div class="form-group-lg">
                        <button type="submit" class="btn btn-success block col-lg-12">Sing in</button>
                    </div>
                </form>
            </div>
            <!-- ./sign-in-inner -->
        </div>
        <!-- ./sign-in-wrapper -->
    </div>
    <!-- /wrapper -->

    <a href="" id="scroll-to-top" class="hidden-print"><i class="icon-chevron-up"></i></a>
</body>

</html>