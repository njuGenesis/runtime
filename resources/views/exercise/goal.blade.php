
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
	<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
	{{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet" media="screen">--}}
	<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
		  media="screen">
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">

	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap.js"></script>

	<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>


	<style>
		body {
			/*padding-top: 80px;*/
		}
	</style>

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
<!-- fixed header -->
<header class="navbar">
	<div class="container-fluid">
		<button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
		<a class="navbar-brand" href="#"></a>
		<ul class="nav navbar-nav hidden-md-down">
			<li class="nav-item">
				<a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
			</li>
			<li class="nav-item p-x-1">
				<a class="nav-link" href="{{ URL::to('/home') }}">主页</a>
			</li>
			<li class="nav-item p-x-1">
				<a class="nav-link" href="{{ URL::to('/exercise') }}">锻炼</a>
			</li>
			<li class="nav-item p-x-1">
				<a class="nav-link" href="{{ URL::to('/activity') }}">活动</a>
			</li>
			<li class="nav-item p-x-1">
				<a class="nav-link" href="{{ URL::to('/weibo') }}">微博</a>
			</li>
		</ul>
		<ul class="nav navbar-nav pull-right hidden-md-down">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="hidden-md-down">{{ Auth::user()->nickname }}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">

					<div class="dropdown-header text-xs-center">
						<strong>设置</strong>
					</div>
					<a class="dropdown-item" href="{{ URL::to('/personal') }}"><i class="fa fa-user"></i> 个人设置</a>
					<a class="dropdown-item" href="{{ URL::to('/logout') }}"><i class="fa fa-lock"></i> 退出登录</a>
				</div>
			</li>

		</ul>
	</div>
</header>

{{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">--}}
{{--<div class="container-fluid">--}}
{{--<div class="navbar-header">--}}
{{--<button class="navbar-toggle collapsed" type="button"--}}
{{--data-toggle="collapse" data-target="#collapse-header">--}}
{{--<span class="sr-only">Toggle navigation</span> <span--}}
{{--class="icon-bar"></span> <span class="icon-bar"></span> <span--}}
{{--class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="#">RunTime</a>--}}
{{--</div>--}}
{{--<div class="navbar-collapse collapse" role="navigation"--}}
{{--id="collapse-header">--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li><a href="{{ URL::to('/home') }}">主页</a></li>--}}
{{--<li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>--}}
{{--<li><a href="{{ URL::to('/health') }}">健康</a></li>--}}
{{--<li><a href="{{ URL::to('/activity') }}">活动</a></li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li>--}}
{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" --}}
{{--role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li>--}}
{{--<a href="/personal">个人设置</a>--}}
{{--</li>--}}
{{--<li role="separator" class="divider">--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ URL::to('/logout') }}">退出登录</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

<!-- sidebar -->
<div class="sidebar">
	<nav class="sidebar-nav">
		<ul class="nav">
			<li class="nav-title">
				运动
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise') }}"><i class="icon-puzzle"></i> 我的运动</a>

			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise/history') }}"><i class="icon-docs"></i> 历史数据</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise/chart') }}"><i class="icon-graph"></i> 图表展示</a>

			</li>
			<li class="divider"></li>
			<li class="nav-title">
				健康
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health') }}"><i class="icon-puzzle"></i> 身体管理</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health/sleep') }}"><i class="icon-speedometer"></i> 睡眠分析</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health/rate') }}"><i class="icon-graph"></i> 心率分析</a>
			</li>

			<li class="divider"></li>
			<li class="nav-title">
				建议
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise/suggestion') }}"><i class="icon-people"></i> 锻炼建议</a>
			</li>
		</ul>
	</nav>
</div>

<!-- main -->
<main class="main">
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			{{--<div class="sidebar col-xs-2 col-sm-3 col-md-2 ">--}}
			{{--<ul class="nav nav-pills nav-stacked">--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise') }}">我的运动</a></li>--}}
			{{--<li role="presentation" class="active"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/history') }}">历史数据</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>--}}
			{{--</ul>--}}
			{{--</div>--}}
			<!-- main content -->
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="card card-local">
						<!-- Default panel contents -->
						<div class="card-header">
							<b>月目标</b>
						</div>
						<div class="card-block">
							<form class="form-horizontal" method="POST" action="/login">

								{!! csrf_field() !!}
								<div class="form-group row">
									<label for="inputID" class="col-md-1 col-md-offset-1 form-control-label">步数</label>

									<div class="col-md-10">
										<p class="form-control-static"><?php echo $goalstep ?>步</p>
									</div>
								</div>
							</form>

						</div>
					</div>
					<br>
					<hr/>
					<br>


					<div class="card card-local">
						<!-- Default panel contents -->
						<div class="card-header">
							<b>目标设置</b>
							<a href="javascript:form.submit();" type="button" class="btn  btn-sm btn-success pull-right">
								<i class="fa fa-magic"></i> 保存
							</a>
						</div>

						<div class="card-block">
							<form name="form" class="form-horizontal" method="POST" action="/exercise/goal">

								{!! csrf_field() !!}
								<div class="form-group row">
									<label for="inputStep" class="col-md-1 col-md-offset-1 form-control-label">步数</label>

									<div class="col-md-10">
										<input name="step" type="text" class=" form-control" id="inputStep"
											   placeholder="请输入目标步数" value="{{ old('step') }}">
									</div>
								</div>
							</form>
							@if($errors->any())
								<ul class="alert alert-danger">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif

						</div>


					</div>

				</div>

			</div>
		</div>
	</div>
</main>



</body>

<script src="{{ URL::asset('/') }}js/libs/tether.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/pace.min.js"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ URL::asset('/') }}js/views/shared.js"></script>
<!-- GenesisUI main scripts -->
<script src="{{ URL::asset('/') }}js/app.js"></script>
<!-- Plugins and scripts required by this views -->
{{--<script src="{{ URL::asset('/') }}js/libs/toastr.min.js"></script>--}}
<script src="{{ URL::asset('/') }}js/libs/gauge.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/main.js"></script>

</html>
