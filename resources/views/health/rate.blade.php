
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
<link href="{{ URL::asset('/') }}css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" media="screen">
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap.js"></script>
<script src="{{ URL::asset('/') }}js/Chart.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap-datetimepicker.js"></script>

<style>
body {
	padding-top: 80px;
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
					<li><a href="{{ URL::to('/home') }}">主页</a></li>
					<li><a href="{{ URL::to('/exercise') }}">运动</a></li>
					<li class="active"><a href="{{ URL::to('/health') }}">健康</a></li>
					<li><a href="{{ URL::to('/activity') }}">活动</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/personal">个人设置</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- main -->
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			<div class="sidebar col-xs-2 col-sm-3 col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><a href="{{ URL::to('/health') }}">身体管理</a></li>
					<li role="presentation"><a href="{{ URL::to('/health/sleep') }}">睡眠分析</a></li>
					<li role="presentation" class="active"><a
						href="{{ URL::to('/health/rate') }}">心率分析</a></li>
					<!-- <li role="presentation"><a
						href="{{ URL::to('/health/suggestion') }}">健康建议</a></li> -->
				</ul>
			</div>
			<!-- main content -->
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">


				<div class="panel panel-default panel-success">
					<!-- Default panel contents -->
					<div class="panel-heading">
						<b>心率监测</b>
					</div>
					<div id="heart" style="height: 400px"></div>
					<script src="/build/dist/echarts-all.js"></script>
					<script type="text/javascript">
                    // 基于准备好的dom，初始化echarts图表
                    var myChart = echarts.init(document.getElementById('heart'));

                    var option = {
                        tooltip : {
                            trigger: 'item',
                        },
                        toolbox: {
                            show : true,
                            feature : {
                                mark : {show: true},
                                dataView : {show: true, readOnly: false},
                                restore : {show: true},
                                saveAsImage : {show: true}
                            }
                        },
                        dataZoom: {
                            show: true,
                            start : 70
                        },
                        legend : {
                            data : ['心率']
                        },
                        grid: {
                            y2: 80
                        },
                        xAxis : [
                            {
                                type : 'time',
                                splitNumber:10
                            }
                        ],
                        yAxis : [
                            {
                                type : 'value'
                            }
                        ],
                        series : [
                            {
                                name: '心率',
                                type: 'line',
                                showAllSymbol: true,
                                symbolSize: function (value){
                                    return 2;
                                },
                                data: (function () {
                                    var d = [];
                                    var rate = <?php echo json_encode($rate) ?>;
                                    var time = <?php echo json_encode($time) ?>;
                                    len = rate.length;
                                    for (var i = 0; i < len; ++i) {
                                        d.push([
                                            new Date(time[i]),
                                            rate[i]
                                        ]);
                                    }
                                    return d;
                                })()
                            }
                        ]
                    };
                    // 为echarts对象加载数据
                    myChart.setOption(option);

                </script>
				</div>


			</div>
		</div>
	</div>


</body>

</html>
