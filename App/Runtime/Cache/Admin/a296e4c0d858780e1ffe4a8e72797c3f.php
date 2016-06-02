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
    <link rel="stylesheet" href="/Public/Static/JQuery/jquery-ui.min.css">
    <link rel="stylesheet" href="/Public/Static/JQuery/raty/jquery.raty.css">


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
                
    <form action="<?php echo U('/Admin/Bsw/AddGameHandle/');?>" method="POST" id="bsw_game_form" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td align="center" colspan="2">添加赛事</td>
            </tr>
            <tr>
                <td align="right">赛事名称：</td>
                <td>
                    <input type="text" name="g_name" id="g_name" />
                </td>
            </tr>
            <tr>
                <td align="right">赛事项目：</td>
                <td>
                    <select name="g_event" id="g_event">
                            <option value="0">--选择赛事项目--</option>
                            <?php if(is_array($eventList)): foreach($eventList as $key=>$event): ?><option value="<?php echo ($event['id']); ?>"><?php echo ($event["e_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td align="right">赛事地点：</td>
                <td>
                   <div id = "areanDiv">
                        <select name="g_location" id="g_province" level="1">
                            <?php if(is_array($provinceList)): foreach($provinceList as $key=>$province): ?><option value="<?php echo ($province['id']); ?>"><?php echo ($province['name']); ?></option><?php endforeach; endif; ?>
                        </select>
                    <select name="g_location" id="g_city" level="2">
                            <?php if(is_array($cityList)): foreach($cityList as $key=>$city): ?><option value="<?php echo ($city[id]); ?>"><?php echo ($city['name']); ?></option><?php endforeach; endif; ?>
                        </select>
                    <select name="g_location" id="g_town" level="3">
                            <?php if(is_array($townList)): foreach($townList as $key=>$town): ?><option value="<?php echo ($town['id']); ?>"><?php echo ($town['name']); ?></option><?php endforeach; endif; ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                    <input type="text" name="g_address" id="g_address" style="width:400px;" placeholder="详细地址,手动输入必须填写，可以是起跑点，或者比赛的具体点">
                   </div>
                    <input type="hidden" name="g_location_str" id="g_location_str" value="0">
                </td>
            </tr>
            <tr>
                <td align="right">报名开始时间：</td>
                <td>
                    <input type="text" name="g_singup_s" id="g_singup_s" onFocus="singuptime(1)" readonly/>
                </td>
            </tr>
            <tr>
                <td align="right">报名结束时间：</td>
                <td>
                    <input type="text" name="g_singup_e" id="g_singup_e" onFocus="singuptime(2)" readonly/>
                </td>
            </tr>
            <tr>
                <td align="right">赛事开始时间：</td>
                <td>
                    <input type="text" name="g_time_s" id="g_time_s" onFocus="selecttime(1)" readonly/>
                </td>
            </tr>
            <tr>
                <td align="right">赛事结束时间：</td>
                <td>
                    <input type="text" name="g_time_e" id="g_time_e" onFocus="selecttime(2)" readonly/>
                </td>
            </tr>
            <tr>
                <td align="right">主办方：</td>
                <td>
                    <input type="text" name="g_sponsor" id="g_sponsor" />
                </td>
            </tr>
            <tr>
                <td align="right">报名费：</td>
                <td>
                    <input type="text" name="g_fee" id="g_fee">
                </td>
            </tr>
            <tr>
                <td align="right">人数限制：</td>
                <td>
                    <!--<input type="text" name="g_image" id="g_image">-->
                    <input type="text" name="g_amount" id="g_amount">
                </td>
            </tr>

            <tr>
                <td align="right">宣传主图：</td>
                <td>
                    <!--<input type="text" name="g_image" id="g_image">-->
                    <input type="file" name="g_image_file" id="g_image_file">
                </td>
            </tr>
            <tr>
                <td align="right">年龄：</td>
                <td>
                    <input type="text" name="g_age" id="g_age">
                </td>
            </tr>
            <tr>
                <td align="right">星级：</td>
                <td>
                    <input type="text" name="g_star" id="g_star" readonly>
                    <div id="starDiv"></div>
                </td>
            </tr>
            <tr>
                <td align="right">GPS坐标：</td>
                <td>
                    <input type="text" name="g_gps" id="g_gps" style="width:23%;" readonly>
                    <div id="container" style="width:500px; height:300px"></div>
                </td>
            </tr>
            <tr>
                <td align="right">性别：</td>
                <td>
                    <select name="g_gender" id="g_gender">
                            <option value="0">不限</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td align="right">简介：</td>
                <td>
                    <textarea name="g_introduction" id="g_introduction" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <!--<tr>
                <td align="right">是否开启</td>
                <td>
                    <input type="radio" name="nodeStatus" value="1" checked="checked" />&nbsp;开启&nbsp;
                    <input type="radio" name="nodeStatus" value="0">&nbsp;关闭
                </td>
            </tr>-->
            <tr>
                <td>&nbsp;</td>
                <td align="left">
                    <input type="submit" value="保存添加">
                </td>
            </tr>
        </table>
    </form>

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
    
    <script src="/Public/Static/my97/WdatePicker.js"></script>
    <script src="/Public/Static/JQuery/jquery-ui.min.js"></script>
    <script src="/Public/Static/JQuery/raty/jquery.raty.js"></script>
    <script src="/Public/Admin/js/adminFunction.js"></script>
    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
    <!--XI4BZ-3COC4-HDEU7-DBFRN-OIDPJ-QTFGW-->
    <script type="text/javascript">
        var ajaxUrl = "<?php echo U('/Admin/Bsw/handleLocation/');?>";
    $(function(){                    
        //初始化腾讯地图
        initialQQMap();
        //初始化五角星
        $("#starDiv").raty({click: function(score, evt)
        {
            //alert('ID: ' + this.id + "\nscore: " + score + "\nevent: " + evt);
            $("#g_star").val(score);
        }});
        
        $("#bsw_game_form").submit(function(){
            var g_location = locationSelect();
            $("#g_location_str").val(g_location);
            // alert(g_location);
            // return false;
        }); 
        
        
        
        $("#g_province").change(function(){
            var level = $(this).attr("level");
            var parentid = $("#g_province").val();
            //省级发生变化，市级和区级都先清空
            $("#g_city").empty();
            $("#g_town").empty();
            
            $.ajax({
                url: ajaxUrl,
                dataType: 'json',
                type:"POST",
                async: true,
                data: { "parentid": parentid,"level": level },
                success: function (results) {
                    
                    var reval = handleLocationJson(results,"2")
                    $("#g_city").html("");
                    $("#g_city").append(reval);
                    reval = handleLocationJson(results,"3");    
                    $("#g_town").html("");
                    $("#g_town").append(reval);                                     
                },
                error: function (result) {
                    alert("查询失败1");
                }
            });
            
            // var province = $("#g_province").find("option:selected").text();
            // var city = $("#g_city").find("option:selected").text();
            // var town = $("#g_town").find("option:selected").text();
            // alert(province + city + town);
            
            // searchKeyword();            
        });
        
        
        $("#g_city").change(function(){
                var level = $(this).attr("level");
                var parentid = $("#g_city").val(); 
                $.ajax({
                    url: ajaxUrl,
                    dataType: 'json',
                    type:"GET",
                    async: true,
                    data: { "parentid": parentid,"level": level },
                    success: function (results) {
                        reval = handleLocationJson(results,"3");    
                        $("#g_town").html("");
                        $("#g_town").append(reval);                                     
                    },
                    error: function (result) {
                        alert("查询失败1");
                    }
                }); 
                // searchKeyword();
        });
        
        // $("#g_town").change(function(){
        //     searchKeyword();
        // });
        $("#g_address").blur(function(){
            searchKeyword();
        });
    });
    
    //初始化腾讯地图
    var searchService, markers = [];
    var initialQQMap = function() {
            var center = new qq.maps.LatLng(31.853848557461927,117.25720882448513);
            var map = new qq.maps.Map(document.getElementById('container'), {
                center: center,
                zoom: 12
            });
            
        //绑定单击事件添加参数
        qq.maps.event.addListener(map, 'click', function(event) {
            var gpsValue = event.latLng.getLat() + ',' +
            event.latLng.getLng();
            $("#g_gps").val(gpsValue);
        });

        //设置Poi检索服务，用于本地检索、周边检索
        searchService = new qq.maps.SearchService({
            //检索成功的回调函数
            complete: function(results) { 
                //设置回调函数参数
                var pois = results.detail.pois;
                var infoWin = new qq.maps.InfoWindow({
                    map: map
                });
                var latlngBounds = new qq.maps.LatLngBounds();
                    for (var i = 0, l = pois.length; i < l; i++) {
                    var poi = pois[i];
                    //扩展边界范围，用来包含搜索到的Poi点
                    latlngBounds.extend(poi.latLng);

                    (function(n) {
                        var marker = new qq.maps.Marker({
                            map: map
                        });
                        marker.setPosition(pois[n].latLng);

                        marker.setTitle(i + 1);
                        markers.push(marker);


                        qq.maps.event.addListener(marker, 'click', function() {
                            infoWin.open();
                            infoWin.setContent('<div style="width:280px;height:100px;">' + 'POI的ID为：' +
                                pois[n].id + '，POI的名称为：' + pois[n].name + '，POI的地址为：' + pois[n].address + '，POI的类型为：' + pois[n].type + '</div>');
                            infoWin.setPosition(pois[n].latLng);
                        });
                    })(i);
                }
                //调整地图视野
                map.fitBounds(latlngBounds);
            },
            //若服务请求失败，则运行以下函数
            error: function() {
                alert("出错了。");
            }
        });

    }

        //清除地图上的marker
        function clearOverlays(overlays) {
            var overlay;
            while (overlay = overlays.pop()) {
                overlay.setMap(null);
            }
        }
        //设置搜索的范围和关键字等属性
        function searchKeyword() {
            
            var keyword = $("#g_address").val();
            var province = $("#g_province").find("option:selected").text();
            var city = $("#g_city").find("option:selected").text();
            var town = $("#g_town").find("option:selected").text();
            if(keyword.length <= 0)
            {
                keyword  = province + city + town;
            }
            var region  = province + city + town;
            clearOverlays(markers);
            //根据输入的城市设置搜索范围
            searchService.setLocation(region);
            //根据输入的关键字在搜索范围内检索
            searchService.search(keyword);
            //根据输入的关键字在圆形范围内检索
            //var region = new qq.maps.LatLng(39.916527,116.397128);
            //searchService.searchNearBy(keyword, region , 2000);
            //根据输入的关键字在矩形范围内检索
            //region = new qq.maps.LatLngBounds(new qq.maps.LatLng(39.936273,116.440043),new qq.maps.LatLng(39.896775,116.354212));
            //searchService.searchInBounds(keyword, region);
        }
    
    //my97日期控件处理
    //报名时间
    function selecttime(flag){
        if(flag==1){
            var endTime = $("#g_time_e").val();                                
            if(endTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime});
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});
            }
        }else{
            var startTime = $("#g_time_s").val();
            if(startTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime});
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});
            }    
        }
    }
    
    //赛事时间
    function singuptime(flag){
        if(flag==1){
            var endTime = $("#g_singup_e").val();                                
            if(endTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime});
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});
            }
        }else{
            var startTime = $("#g_singup_s").val();
            if(startTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime});
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});
            }    
        }
    }
        
    //处理location的最终选择只构建json储存到数据库
    function locationSelect()
    {
        var location = $("select[name='g_location']");
        var g_location_str = '';
        for(i=0;i<location.length;i++)
        {
            if(i == (location.length -1) )
            {
                g_location_str += '{"id":"'+ $(location[i]).val() +'","name":"'+ $(location[i]).find("option:selected").text().trim() +'"}';
            }
            else
            {
                g_location_str += '{"id":"'+ $(location[i]).val() +'","name":"'+ $(location[i]).find("option:selected").text().trim() +'"},';
            }
        }
        
        g_location_str = "[" + g_location_str + "]";
        
        return g_location_str;
    }
    
    //需要把城市的第一列的默认县级数据显示
    function handleLocationJson(jsonData,level)
    {
        var reval = "";
        $.each(jsonData,function(code,item){
            // alert(item.level);
            //         return false;
            if(item.leveltype == level)
            {
                reval += " <option value=\""+ item.id +"\">"+ item.name +" </option>";
            }
        });
        return reval;
    }
    </script>


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