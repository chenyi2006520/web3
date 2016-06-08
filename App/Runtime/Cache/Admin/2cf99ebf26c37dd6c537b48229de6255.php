<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Public/favicon.ico" rel="shortcut icon">
    
    <title>宽土猫科技有限公司</title>
<meta name="keywords" content="宽土猫,宽土猫科技,宽土猫公司,合肥宽土猫" />
<meta name="description" content="合肥宽土猫科技有限公司" />
<meta name="copyright" content="QuanTuMore" />

    
    <link rel="stylesheet" href="/Public/Static/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="/Public/Admin/css/font-awesome.min.css" rel="stylesheet">
    <!-- ionicons -->
    <link href="/Public/Admin/css/ionicons.min.css" rel="stylesheet">
    <!-- Morris -->
    <link href="/Public/Admin/css/morris.css" rel="stylesheet" />
    <!-- Datepicker -->
    <!--<link href="/Public/Admin/css/datepicker.css" rel="stylesheet" />-->
    <!-- Animate -->
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="/Public/Admin/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Simplify -->
    <link href="/Public/Admin/css/simplify.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="/Public/Admin/css/public.css">


    <!-- Le javascript
	    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Public/Static/js/jquery-2.2.0.min.js"></script>
    <!--<script src="/Public/Static/Jquery/jquery-1.11.3.min.js"></script>-->
    <script src="/Public/Static/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="/Public/Admin/js/jquery.slimscroll.min.js"></script>

    <!-- Simplify -->
    <script src="/Public/Admin/js/simplify/simplify.js"></script>
</head>

<body class="overflow-hidden">
    <div class="wrapper preload">
        <div class="sidebar-right">
            <!--系统内部聊天-->
            <!-- sidebar-inner -->
        </div>
        <!-- sidebar-right -->
        <header class="top-nav">
            <div class="top-nav-inner">
                <div class="nav-header">
                    <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <ul class="nav-notification pull-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                            <span class="badge badge-danger bounceIn">1</span>
                            <ul class="dropdown-menu dropdown-sm pull-right user-dropdown">
                                <li class="user-avatar">
                                    <img src="/Public/Admin/images/profile/profile1.jpg" alt="" class="img-circle">
                                    <div class="user-content">
                                        <h5 class="no-m-bottom">Jane Doe</h5>
                                        <div class="m-top-xs">
                                            <a href="profile.html" class="m-right-sm">Profile</a>
                                            <a href="signin.html">Log out</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="inbox.html">
											Inbox
											<span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
										</a>
                                </li>
                                <li>
                                    <a href="#">
											Notification
											<span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
										</a>
                                </li>
                                <li>
                                    <a href="#" class="sidebarRight-toggle">
											Message
											<span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
										</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">Setting</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a href="index.html" class="brand">
                        <i class="fa fa-database"></i><span class="brand-name">QuanTuMore Admin</span>
                    </a>
                </div>
                <div class="nav-container">
                    <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav-notification">
                        <li class="search-list">
                            <div class="search-input-wrapper">
                                <div class="search-input">
                                    <input type="text" class="form-control input-sm inline-block">
                                    <a href="#" class="input-icon text-normal"><i class="ion-ios7-search-strong"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="pull-right m-right-sm">
                        <div class="user-block hidden-xs">
                            <a href="#" id="userToggle" data-toggle="dropdown">
                                <img src="/Public/Admin/images/profile/profile1.jpg" alt="" class="img-circle inline-block user-profile-pic">
                                <div class="user-detail inline-block">
                                    <?php echo ($_SESSION['username']); ?>
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="panel border dropdown-menu user-panel">
                                <div class="panel-body paddingTB-sm">
                                    <ul>
                                        <!--暂时用不到的注释-->
                                        <!--<li>
                                            
                                            <a href="profile.html">
                                                <i class="fa fa-edit fa-lg"></i><span class="m-left-xs">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="inbox.html">
                                                <i class="fa fa-inbox fa-lg"></i><span class="m-left-xs">Inboxes</span>
                                                <span class="badge badge-danger bounceIn animation-delay3">2</span>
                                            </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo U('/Admin/Index/Logout/');?>">
                                                <i class="fa fa-power-off fa-lg"></i><span class="m-left-xs">Sign out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--系统消息不用-->
                        <!--<div></div>-->
                    </div>
                </div>
            </div>
            <!-- ./top-nav-inner -->
        </header>
        <aside class="sidebar-menu fixed">
            <div class="sidebar-inner scrollable-sidebar">
                <div class="main-menu">
                    <!--菜单模块-->
                    
    <!--    -->
    <?php echo BaseTreeList($treeArr);?>

                </div>
                <div class="sidebar-fix-bottom clearfix">
                    <div class="user-dropdown dropup pull-left">
                        <a href="#" class="dropdwon-toggle font-18" data-toggle="dropdown"><i class="ion-person-add"></i>
							</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="inbox.html">
										Inbox
										<span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
									</a>
                            </li>
                            <li>
                                <a href="#">
										Notification
										<span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
									</a>
                            </li>
                            <li>
                                <a href="#" class="sidebarRight-toggle">
										Message
										<span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
									</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">Setting</a>
                            </li>
                        </ul>
                    </div>
                    <a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>
                </div>
            </div>
            <!-- sidebar-inner -->
        </aside>

        <div class="main-container">
            <div class="padding-md">
                
    <ul class="breadcrumb">
        <li><span class="primary-font"><i class="icon-home"></i></span><a href="<?php echo U('/Admin/Index/');?>"> Home</a></li>
        <li>RBAC权限管理</li>
        <li>用户列表</li>
    </ul>
    <table class="table table-striped" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>最后登陆时间</th>
                <th>最后登陆IP</th>
                <th>锁定状态</th>
                <th>用户所属别组</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($userList)): foreach($userList as $key=>$val): ?><tr>
                    <td><?php echo ($val["id"]); ?></td>
                    <td><?php echo ($val["username"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i',$val["logiontime"])); ?></td>
                    <td><?php echo ($val["logionip"]); ?></td>
                    <td>
                        <?php if($val["islock"]): ?>锁定
                            <?php else: ?> 正常<?php endif; ?>
                    </td>
                    <td>
                        <ul>
                            <?php if($val["username"] == C("RBAC_SUPERADMIN")): ?>超级管理员
                                <?php else: ?>
                                <?php if(is_array($val["role"])): foreach($val["role"] as $key=>$value): ?><li><?php echo ($value["name"]); ?>[<?php echo ($value["remark"]); ?>]</li><?php endforeach; endif; endif; ?>
                        </ul>
                    </td>
                    <td><a href="#">锁定</a></td>
                </tr><?php endforeach; endif; ?>
            <tr>
                <td colspan="7" align='center'>
                    <div class="Pagination"><?php echo ($show); ?></div>
                </td>
            </tr>
        </tbody>
    </table>

            </div>
        </div>
        <!-- /main-container -->

        <footer class="footer">
            <span class="footer-brand">
					<strong class="text-danger">QuanTuMore</strong> Admin
				</span>
            <p class="no-margin">
                &copy; 2015-<?php echo date('Y',time());?> <strong>QuanTuMore Admin</strong>. ALL Rights Reserved.
            </p>
        </footer>
    </div>
    <!-- /wrapper -->

    <a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>

    <!-- Delete Widget Confirmation -->
    <div class="custom-popup delete-widget-popup delete-confirmation-popup" id="deleteWidgetConfirm">
        <div class="popup-header text-center">
            <span class="fa-stack fa-4x">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
				</span>
        </div>
        <div class="popup-body text-center">
            <h5>Are you sure to delete this widget?</h5>
            <strong class="block m-top-xs"><i class="fa fa-exclamation-circle m-right-xs text-danger"></i>This action cannot be undone</strong>

            <div class="text-center m-top-lg">
                <a class="btn btn-success m-right-sm remove-widget-btn">Delete</a>
                <a class="btn btn-default deleteWidgetConfirm_close">Cancel</a>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(function(){
            
            handleACFlag();
            
//             $('.chart').easyPieChart({
// 					easing: 'easeOutBounce',
// 					size: '140',
// 					lineWidth: '7',
// 					barColor: '#7266ba',
// 					onStep: function(from, to, percent) {
// 						$(this.el).find('.percent').text(Math.round(percent));
// 					}
// 				});
// 
// 				$('.sortable-list').sortable(); 
// 
// 				$('.todo-checkbox').click(function()	{
// 					
// 					var _activeCheckbox = $(this).find('input[type="checkbox"]');
// 
// 					if(_activeCheckbox.is(':checked'))	{
// 						$(this).parent().addClass('selected');					
// 					}
// 					else	{
// 						$(this).parent().removeClass('selected');
// 					}
// 				
// 				});
// 
// 				//Delete Widget Confirmation
// 				$('#deleteWidgetConfirm').popup({
// 					vertical: 'top',
// 					pagecontainer: '.container',
// 					transition: 'all 0.3s'
// 				});
        });
        
        function handleACFlag()
        {
            var menuList = $(".accordion li");//获得菜单列表所有的li
            for(var i= 0; i<menuList.length;i++)
            {
                var statusLi = $(menuList[i]);
                var status = statusLi.attr("status");
                //激活当前页面
                if(typeof(status) != "undefined")
                {
                    statusLi.addClass("active");//只要有status就可以添加active
                    if(status == 3)
                    {
                        statusLi.parent().css('display',"block").parent().parent().css('display',"block").parent().addClass("active");
                    }
                    
                     if(status == 2)
                    {
                        statusLi.parent().css('display',"block").parent().addClass("active");
                    }
                }
            }
    }
    </script>
</body>

</html>