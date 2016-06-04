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
					<li><a href="/saishi">赛事</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>

            <!--内容区域-->
            
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-9 ">
				<div class="row clearfix">
					<div class="col-md-12 ">
						<div class="row clearfix show-grid">
							<div class="col-md-12 ">
								<div id="carousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<?php if(is_array($newGames)): $i = 0; $__LIST__ = $newGames;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i; if($key == 0): ?><li data-target="#carousel" data-slide-to="<?php echo ($key); ?>" class="active"></li>
											<?php else: ?>
												<li data-target="#carousel" data-slide-to="<?php echo ($key); ?>" class=""></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
									</ol>
									<div class="carousel-inner" role="listbox">
										<?php if(is_array($newGames)): $i = 0; $__LIST__ = $newGames;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i; if($key == 0): ?><div class="item active">
											<?php else: ?>
												<div class="item"><?php endif; ?>
												<a href="<?php echo U('/saishi/'.$game['id']);?>" target="_blank">
													<img alt="<?php echo ($game['g_name']); ?>" class="img-rounded" src="<?php echo ($game['g_image']); ?>">
													<div class="carousel-caption">

													</div>
												</a>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
									<!-- Controls -->
									<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only"></span>
									</a>
									<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only"></span>
									</a>
								</div>
								<!--<div class="carousel slide" id="carousel" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-slide-to="0" data-target="#carousel">
										</li>
										<li data-slide-to="1" data-target="#carousel">
										</li>
										<li data-slide-to="2" data-target="#carousel" class="active">
										</li>
									</ol>
									<div class="carousel-inner">
										<?php if(is_array($newGames)): foreach($newGames as $key=>$game): ?><div class="item">
												<img src="<?php echo ($game['g_image']); ?>" class="carousel-inner img-responsive img-rounded" />
												<div class="carousel-caption">
													<h4>
													<?php echo ($game['g_name']); ?>
												</h4>
													<p>
														<?php echo ($game['g_introduction']); ?>
													</p>
												</div>
											</div><?php endforeach; endif; ?>
									</div>
									<a class="left carousel-control" href="#carousel" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
									</a>
								</div>-->
							</div>
						</div>
						<div class="row clearfix">
							<div class="mod mod-lg">
								<div class="mod-hd">
									<h2>推荐比赛</h2>
									<a href="/saishi/" class="more pull-right">更多</a>
								</div>
							</div>
							<?php if(is_array($gameList)): foreach($gameList as $key=>$game): ?><div class="col-xs-12 ">
									<h2><?php echo ($game['g_name']); ?></h2>
									<p>
										<?php echo ($game['g_introduction']); ?>
									</p>
									<p><a class="btn btn-default" href="<?php echo U('/saishi/'.$game['id']);?>" role="button">详情 »</a></p>
								</div><?php endforeach; endif; ?>
						</div>
					</div>

				</div>
			</div>
			<div class="row clearfix ">
				<div class="col-md-3">
					<div class="col-xs-12 rightHeader">
						<img class="carousel-inner img-responsive img-rounded" src="/Public/Static/images/Watermark.png" />
					</div>

				</div>
				<div class="col-md-3">
					<div class="side-list clearfix">
						<?php if(is_array($gameRanList)): foreach($gameRanList as $key=>$game): ?><div class="item col-xs-12">
								<a href="<?php echo U('/saishi/'.$game['id']);?>" target="_blank" title="<?php echo ($game['g_name']); ?>">
									<img alt="<?php echo ($game['g_name']); ?>" class="rightImage" src="<?php echo ($game['g_image']); ?>">
								</a>
								<div class="meta">
									<div class="text img-rt-title">
										<a href="<?php echo U('/saishi/'.$game['id']);?>" target="_blank" title="<?php echo ($game['g_name']); ?>"><?php echo ($game['g_name']); ?></a>
									</div>
									<div class="attr time">2016-05-21</div>
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