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
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo ($gameModel['g_name']); ?></h1>
			</div>
			<div class="col-md-5">
				<img class="vGameImage" src="<?php echo ($gameModel['g_image']); ?>" alt="<?php echo ($gameModel['g_name']); ?>">

			</div>
			<div class="col-md-7">
				<div class="race-his">
					<p><?php echo (date("Y-m-d",$gameModel['g_time_s'])); ?> | <?php echo getLocation($gameModel['g_location'],1,1,1);?></p>
					<p>主办方： <span><?php echo ($gameModel['g_sponsor']); ?></span></p>
				</div>
				<div id="starDiv"></div>
				<!--<div class="race-info">
					<p>
						<?php echo ($gameModel['g_introduction']); ?>
					</p>
				</div>-->

				<div class="race-menbers">
					<p>
						<span>
							<?php echo handleGameStatus($gameModel['g_time_s'],$gameModel['g_time_e']);?>							
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-8">
				<div class="related_info mod">
					<div class="race-detail-list active in" style="display:block">
						<div class="group-info">
							<dl>
								<dt>开始时间：</dt>
								<dd><?php echo (date("Y-m-d H:m:s",$gameModel['g_time_s'])); ?></dd>
							</dl>
							<dl>
								<dt>结束时间：</dt>
								<dd><?php echo (date("Y-m-d H:m:s",$gameModel['g_time_e'])); ?></dd>
							</dl>
							<dl>
								<dt>报名时间：</dt>
								<dd><?php echo (date("Y年m月d日",$gameModel['g_singup_s'])); ?>-<?php echo (date("Y年m月d日",$gameModel['g_singup_e'])); ?></dd>
							</dl>
							<dl>
								<dt>报名费用：</dt>
								<dd><?php echo ($gameModel['g_fee']); ?>/人</dd>
							</dl>
							<dl>
								<dt>起点：</dt>
								<dd><?php echo ($gameModel['g_address']); ?></dd>
							</dl>
							<dl>
								<dt>报名资格：</dt>
								<dd><?php echo ($gameModel['g_age']); ?>周岁以上</dd>
							</dl>
							<dl>
								<dt>人数限额：</dt>
								<dd><?php echo ($gameModel['g_amount']); ?></dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<p><?php echo ($gameModel['g_introduction']); ?></p>
				</div>
			</div>
			<div class="col-md-3 col-md-offset-1">
				<div class="col-xs-12 rightHeader">
					<img class="carousel-inner img-responsive img-rounded" src="/Public/Static/images/Watermark.png" />
				</div>
			</div>
			<div class="col-md-3 col-md-offset-1">
				<?php if(is_array($gameRanList)): foreach($gameRanList as $key=>$game): ?><div class="side-list clearfix">
						<div class="item col-xs-12">
							<a href="<?php echo U('/match/'.$game['id']);?>" target="_blank" title="<?php echo ($game['g_name']); ?>">
								<img alt="<?php echo ($game['g_name']); ?>" class="rightImage" src="<?php echo ($game['g_image']); ?>">
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
						</div>
					</div><?php endforeach; endif; ?>
			</div>
		</div>
	</div>

	<script src="/Public/Static/JQuery/jquery-ui.min.js"></script>
	<script src="/Public/Static/JQuery/raty/jquery.raty.js"></script>
	<script>
		$(function(){
			//初始化五角星
			var g_star = <?php echo ($gameModel["g_star"]); ?>;                    
			$("#starDiv").raty({
				score: function() {
					return g_star;
				}
			});
		});
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