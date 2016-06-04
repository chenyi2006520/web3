<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <meta name="apple-mobile-web-app-title" content="比赛网">

    <link href="/Public/favicon.ico" rel="shortcut icon">
    
        <!--html页面head区域定义-->
    <title>比赛网-民间比赛第一门户</title>
    <meta name="keywords" content="比赛网,比赛,体育比赛,足球比赛,篮球比赛,羽毛球比赛,民间比赛" />
    <meta name="description" content="民间比赛第一门户" />
    <meta name="copyright" content="合肥宽土猫科技有限公司" />
    
    <link rel="stylesheet" href="/Public/Static/css/bootstrap.min.css">
    <!--单页自定义样式引入-->
    
	<link rel="stylesheet" href="/Public/Home/default/css/bisai.css">

    <script src="/Public/Static/js/jquery-2.2.0.min.js"></script>
    <script src="/Public/Static/js/bootstrap.min.js"></script>
</head>

<body>
       <div class="container-fluid">
            <!--页面顶部内容-->
            
	<header>
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
				<div class="logo_v1">
					<a href="/" title="比赛网，民间比赛第一门">
						<i>运动不止于梦想</i>
					</a>
				</div>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/">首页</a></li>
					<li><a href="/matches">赛事</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>

            <!--内容区域-->
            
	<div class="container">
		<div class="col-md-9 ">
			<div class="row clearfix">
				<div class="col-md-12 ">
					<div class="row clearfix">
						<div class="col-md-12 ">
							<div class="filter-bar less-bar <?php echo compareValue('1',$listModel['showMore'],'more');?>">
								<div class="filters">
									<div class="filter type clearfix"><span class="tit">类型:</span>
										<span class="word <?php echo compareValue('all',$listModel['event'],'active');?>">
											<a href="<?php echo U('/matches/all');?>" datatype="type" datavalue = "all">全部</a>
											<input type="hidden" name="activeType" id="activeType" value="<?php echo ($listModel["event"]); ?>">
										</span>
										<?php if(is_array($eventList)): foreach($eventList as $key=>$value): ?><span class="word <?php echo compareValue($value['e_pyname'],$listModel['event'],'active');?>">
											<a href="<?php echo U('/matches/'.$value['e_pyname']);?>" datatype="type"  datavalue = "<?php echo ($value['e_pyname']); ?>"><?php echo ($value['e_name']); ?></a>
											</span><?php endforeach; endif; ?>
										<!--<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%81%A5%E5%BA%B7%E8%B7%91">健康跑</a>
											</span>-->
										<!--<span style="float:right;">
											<a href="javascript:void(0)" id="showOther">更多</a>
											</span>-->
									</div>
									<!--<div id="otherEvent" style="padding-top: 0px;" class="filter clearfix hidden">
										<span class="tit">&nbsp;</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E9%93%81%E4%BA%BA%E4%B8%89%E9%A1%B9">铁人三项</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%BE%92%E6%AD%A5">徒步</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%81%A5%E5%BA%B7%E8%B7%91">健康跑</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E9%A9%AC%E6%8B%89%E6%9D%BE">马拉松</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E8%B6%8A%E9%87%8E%E8%B7%91">越野跑</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%85%B6%E4%BB%96">测试</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E9%93%81%E4%BA%BA%E4%B8%89%E9%A1%B9">铁人三项</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%BE%92%E6%AD%A5">徒步</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%81%A5%E5%BA%B7%E8%B7%91">健康跑</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E9%A9%AC%E6%8B%89%E6%9D%BE">马拉松</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E8%B6%8A%E9%87%8E%E8%B7%91">越野跑</a>
											</span>
										<span class="word ">
											<a href="/Home/Bsw/Index/?page=1&amp;type=%E5%85%B6%E4%BB%96">测试</a>
											</span>
									</div>-->
									<div class="filter js-less less-item clearfix"><span class="tit">省份:</span>
										<span class="word <?php echo compareValue('all',$listModel['province'],'active');?>">
											<a href="<?php echo U('/matches/all');?>" datatype="province" datavalue = "all">全部</a>
											<input type="hidden" name="activeProvince" id = "activeProvince" value="<?php echo ($listModel["province"]); ?>">											
										</span>
										<?php if(is_array($provinceList)): foreach($provinceList as $key=>$value): ?><span class="word <?php echo compareValue(strtolower($value['pinyin']),$listModel['province'],'active');?>">
												<a href="<?php echo U('/matches/'.strtolower($value['pinyin']));?>"  datatype="province"  datavalue = "<?php echo ($value['pinyin']); ?>"><?php echo ($value['shortname']); ?></a>
											</span><?php endforeach; endif; ?>
									</div>
									<!--{overrideCompareValue(1,$listModel['showCityFlag'],'1','hidden')}-->
									<?php if($listModel['showCityFlag'] == 0): ?><div class="filter js-less less-item clearfix " id="citydiv"><span class="tit">市级:</span>
											<span class="word <?php echo compareValue('all',$listModel['city'],'active');?>">
												<a href="<?php echo U('/matches/all');?>"  datatype="city" datavalue = "all">全部</a>
												<input type="hidden" name="activeCity" id="activeCity" value="<?php echo ($listModel["city"]); ?>">	
											</span>
											<?php if(is_array($cityList)): foreach($cityList as $key=>$value): ?><span class="word <?php echo compareValue($value['pinyin'],$listModel['city'],'active');?>">
														<a href="<?php echo U('/matches/'.strtolower($value['pinyin']));?>"   datatype="city" datavalue = "<?php echo ($value['pinyin']); ?>"><?php echo ($value['shortname']); ?></a>
														<!--<a href="<?php echo U('/Home/Bsw/Index/',array('page' => '1','province' =>urlencode($listModel['province']),'city' =>urlencode($value['shortname'])));?>"><?php echo ($value['shortname']); ?></a>-->
													</span><?php endforeach; endif; ?>
										</div><?php endif; ?>


									<div class="filter js-less less-item clearfix" style="border:0"><span class="tit">时间:</span>
										<span class="word <?php echo compareValue('all',$listModel['year'],'active');?>">
											<a href="<?php echo U('/matches/all');?>"   datatype="year" datavalue = "all" >全部</a>
												<input type="hidden" name="activeYear" id="activeYear" value="<?php echo ($listModel["year"]); ?>">											
												<input type="hidden" name="activeMonth" id="activeMonth" value="<?php echo ($listModel["month"]); ?>">
										</span>
										<?php if(is_array($yearList)): foreach($yearList as $key=>$value): ?><span class="word <?php echo compareValue($value,$listModel['year'],'active');?>">
												<a href="<?php echo U('/matches/'.$value);?>"   datatype="year" datavalue = "<?php echo ($value); ?>" ><?php echo ($value); ?>年</a>
											</span><?php endforeach; endif; ?>
									</div>
									<?php if($listModel['year'] != 'all'): ?><div class="filter js-less less-item clearfix" style="border:0"><span class="tit"></span>
											<span class="word <?php echo compareValue('all',$listModel['month'],'active');?>">
											<a href="<?php echo U('/matches/all');?>"   datatype="month" datavalue = "all" >全部</a>
										</span>
											<?php $__FOR_START_115681269__=1;$__FOR_END_115681269__=13;for($i=$__FOR_START_115681269__;$i < $__FOR_END_115681269__;$i+=1){ ?><span class="word <?php echo compareValue($i,$listModel['month'],'active');?>">
											<a href="<?php echo U('/matches/'.$i);?>"   datatype="month" datavalue = "<?php echo ($i); ?>" ><?php echo ($i); ?>月</a>
											</span><?php } ?>
										</div><?php endif; ?>

									<div class="filter-bottom text-center">
										<a href="javascript:void(0);" class="expand">展开更多<i class="fa fa-angle-down"></i></a>
										<a href="javascript:void(0);" class="collapse">收起<i class="fa fa-angle-up"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="raceitems">
						<?php if($listModel['NoGameData'] != 1): if(is_array($gameList)): foreach($gameList as $key=>$game): ?><div class="race-itemlist clearfix">
									<div class="col-lg-7 col-md-7 col-sm-8 col-xs-10">
										<a href="<?php echo U('/match/'.$game['id']);?>" target="_blank">
											<img alt="<?php echo ($game['g_name']); ?>" src="<?php echo ($game['g_image']); ?>">
										</a>
										<div class="itemname">
											<strong><a href="<?php echo U('/match/'.$game['id']);?>" class="" target="_blank"><?php echo ($game['g_name']); ?></a></strong>
										</div>
										<div class="attr">
											<?php echo getLocation($game['g_location'],1,1,0);?>
										</div>
									</div>
									<div class="col-md-2">
										<span class="itemtime"><?php echo (date('Y-m-d',$game['g_time_s'])); ?></span>
										<span class="itemtime"><?php echo (date('Y-m-d',$game['g_time_e'])); ?></span>
									</div>
									<!--<div class="col-md-2 hidden-xs">
										<ul class="del-cnt">
											<li>
												<a href="/races/3391/albums" target="_blank">
													<span><em>408</em>张照片</span>
												</a>
											</li>

										</ul>
									</div>-->
									<div class="col-md-3">
										<div class=""><?php echo handleGameStatus($game['g_time_s'],$game['g_time_e']);?></div>
									</div>
								</div><?php endforeach; endif; ?>
							<?php else: ?>
							<div class="race-itemlist clearfix">
								<div class="col-md-10">
									没有内容 不好意思
								</div>
							</div><?php endif; ?>
					</div>
				</div>

			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-3">
				<div class="col-xs-12 rightHeader">
					<img class="carousel-inner img-responsive img-rounded" src="/Public/Static/images/Watermark.png" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="side-list clearfix">
					<?php if(is_array($gameRanList)): foreach($gameRanList as $key=>$game): ?><div class="item col-xs-12">
						<a href="<?php echo U('/match/'.$game['id']);?>" target="_blank" title="<?php echo ($game['g_name']); ?>">
							<img alt="<?php echo ($game['g_name']); ?>"  class="rightImage" src="<?php echo ($game['g_image']); ?>">
						</a>
						<div class="meta">
							<div class="text img-rt-title">
								<a href="<?php echo U('/match/'.$game['id']);?>" target="_blank" title="<?php echo ($game['g_name']); ?>"><?php echo ($game['g_name']); ?></a>
							</div>
							<div class="attr time"><?php echo (date('Y-m-d',$game['g_time_s'])); ?></div>
							<div class="attr state">
								<?php echo handleGameStatus($game['g_time_s'],$game['g_time_e']);?>
							</div>
						</div>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script type="text/javascript">
		var thisUrl = "<?php echo U('/matches/');?>";
		$(function(){
			$(".expand").click(function () {
				$(".filter-bar").addClass("more");
			});
			$(".collapse").click(function () {
				$(".filter-bar").removeClass("more");				
			});
			
			$("#showOther").click(function(){
				if($("#otherEvent").hasClass("hidden")){
					$("#otherEvent").removeClass("hidden");					
				}else{
					$("#otherEvent").addClass("hidden");					
				}
			}); 
			
			handleLink();
		});
		
		
		function handleLink()
		{
			var activeType = $("#activeType").val();
			var activeProvince = $("#activeProvince").val();
			var activeCity = $("#activeCity").val();
			var activeYear = $("#activeYear").val(); 
			var activeMonth = $("#activeMonth").val(); 
			
			var tempHref = "";
			$(".filter .word a").click(function(){
				
				var thisHref = $(this).attr("datatype");
				var thisHrefText = $(this).attr("datavalue");
				
				if(thisHrefText == "all")
				{
					 	tempHref = "/" + activeType + "/" + activeProvince	+ "/" + activeYear 	+ "/" + activeMonth;
						location.href = thisUrl + tempHref;						 					
				}	
				
				if(thisHref == "type")
				{
					if(typeof(activeCity) == "undefined")//如果city没有值
					{
					 	tempHref = "/" + thisHrefText + "/" + activeProvince	+ "/all/" + activeYear 	+ "/" + activeMonth;				
					}
					else//有city
					{
					 	tempHref = "/" +  thisHrefText	+ "/" + activeProvince + "/" + activeCity 	+ "/" + activeYear 	+ "/" + activeMonth;
					}
				}
				
				if(thisHref == "province")
				{
					if(typeof(activeCity) == "undefined")
					{
					 	tempHref = "/" + activeType + "/" + thisHrefText	+ "/all/" + activeYear 	+ "/" + activeMonth;									 					
					}
					else
					{
						//如果省份更换，还带有原来的city值，就要检查这个值是不是在city list里面，不在赋值为all？
					 	tempHref = "/" + activeType + "/" + thisHrefText + "/" +  activeCity 	+ "/" + activeYear 	+ "/" + activeMonth;				
					}									
				}
				
				
				if(thisHref == "city")
				{
					if(thisHrefText != "all")
					{
						tempHref = "/" + activeType + "/" + activeProvince + "/" + thisHrefText + "/" + activeYear + "/" + activeMonth;
					}else
					{
						tempHref = "/" + activeType + "/" + activeProvince + "/all/" + activeYear + "/" + activeMonth;					 						 	
					}
				}
				
				if(thisHref  =="year")
				{
					if(typeof(activeCity) == "undefined")//如果没有城市
					{
						tempHref = "/" + activeType + "/" + activeProvince + "/all/" + activeYear + "/" + activeMonth;					 						
					}
					else
					{
					    if(typeof(activeMonth) == "undefined")//如果没有月份
                        {
                            if(activeYear != "all")//如果年份不是所有
                            {
								tempHref = "/" + activeType + "/" + activeProvince + "/" + activeCity + "/" + thisHrefText + "/" + activeMonth;
                            }
                            else
                            {
								tempHref = "/" + activeType + "/" + activeProvince + "/" + activeCity + "/" + thisHrefText + "/all/";
                            }
                        }else
						{
								tempHref = "/" + activeType + "/" + activeProvince + "/" + activeCity + "/" + thisHrefText + "/" + activeMonth;
						}                      
					}										
				}
                
                if(thisHref == "month")
				{
					if(typeof(activeCity) == "undefined")
					{
						tempHref = "/" + activeType + "/" + activeProvince + "/all/" + activeYear + "/" + activeMonth;
					}
					else
					{
					 	tempHref = "/" + activeType + "/" + activeProvince + "/"+ activeCity +"/" + activeYear + "/" + thisHrefText;				
					}										
				}
				
				//alert(thisUrl + tempHref);
				//tempHref = "";
				location.href = thisUrl + tempHref;	
				return false;
			});
		}
	</script>

            <!--页面尾部内容-->
            
	<footer>
	<hr>
	<div class="row clearfix">
		<div class="col-md-2 ">
		</div>
		<div class="col-md-8 ">
			<div class="row clearfix">
				<div class="col-md-4">
					<div class="copyright-txt">
						<div class="logo-gray"><a href="/">比赛网</a></div>
						<p>© Copyright 比赛网 2015-<?php echo date("Y");?>. All rights reserved. (皖ICP备15008148号-4)</p>
					</div>
				</div>
				<div class="col-md-2">
					<!--<div class="footer-irs">
						<h4>比赛网</h4>
						<ul>
							<li><a href="/about" title="关于我们">关于我们</a></li>
							<li><a href="/terms#contact" title="联系我们">联系我们</a></li>
							<li><a href="/terms#friendlink" title="友情链接">友情链接</a></li>
						</ul>
					</div>-->
				</div>
				<div class="col-md-5 col-md-offset-1">
					<!--<div class="footer-social">
						<h4>关注我们</h4>
						<div class="sns-sina">
							<strong>新浪微博</strong>
							<ul>
								<li><a href="$" title="比赛网" target="_blank">@比赛网</a></li>
								<li><a href="$" title="比赛网" target="_blank">@比赛网</a></li>
								<li><a href="$" title="比赛网" target="_blank">@比赛网</a></li>
							</ul>
						</div>
						<div class="sns-weixin">
							<strong>微信</strong>
							<ul>
								<li><img src="/assets/global/qrcode-iranshao.jpg" alt="比赛网"></li>
							</ul>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<div class="col-md-2 ">
		</div>
	</div>
</footer>
    
       </div>
    <!--页尾js-->
    
    <div style="display:none">
        <script src="http://s95.cnzz.com/stat.php?id=1255812022&web_id=1255812022" language="JavaScript"></script>
    </div>
</body>

</html>