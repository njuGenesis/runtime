
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet"
	media="screen">
<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
	media="screen">

<script type="text/javascript"
	src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap.js"></script>


<style>
body {
	padding-top: 80px;
}

.info{
	font-size:16px;
	text-align:center;
}
</style>

</head>

<body>
	<!-- fixed header -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button"
					data-toggle="collapse" data-target="#collapse-header">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">RunTime</a>
			</div>
			<div class="navbar-collapse collapse" role="navigation"
				id="collapse-header">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ URL::to('/home') }}">主页</a></li>
					<li><a href="{{ URL::to('/exercise') }}">运动</a></li>
					<li><a href="{{ URL::to('/health') }}">健康</a></li>
					<li><a href="{{ URL::to('/activity') }}">活动</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/personal">个人设置</a></li>
							<li><a href="/testdata">测试数据</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>
						</ul></li>
				</ul>


			</div>
		</div>
	</nav>

	<!-- main -->
	<div class="row">

		<div
			class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
			<div class="row">
				<div class="caption text-center">
					<h3>你加入RunTime以来</h3>
				</div>
			</div>
			<br> <br> <br>
			<div class="row">
				<div class="info col-xs-4 col-sm-4 col-md-4">
					<div>
						<a href="#" class="img-circle"> <img src="image/time_green.png"
							alt="天">
						</a>
					</div>
					<div>
						<br>
						<p class="info">已运动<?php echo $days ?>天</p>
					</div>

				</div>
				<div class="info col-xs-4 col-sm-4 col-md-4">
					<a href="#" class="img-circle"> <img src="image/burn_green.png"
						alt="大卡">
					</a>
                    <div>
						<br>
						<p class="info">共燃烧<?php echo $calories ?>大卡</p>
					</div>
                </div>
				<div class="info col-xs-4 col-sm-4 col-md-4">
					<a href="#" class="img-circle"> <img src="image/run_green.png"
						alt="公里">
					</a>
                    <div>
						<br>
						<p class="info"> 累积里程<?php echo $km ?>公里</p>
					</div>
                </div>


			</div>
		</div>
	</div>

</body>

</html>