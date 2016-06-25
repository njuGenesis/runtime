
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

<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>


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
					<li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>
					<li><a href="{{ URL::to('/health') }}">健康</a></li>
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
			<div class="sidebar col-xs-2 col-sm-3 col-md-2 ">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="active"><a
						href="{{ URL::to('/exercise') }}">我的运动</a></li>
					<li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>
					<li role="presentation"><a
						href="{{ URL::to('/exercise/history') }}">历史数据</a></li>
					<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>
					<li role="presentation"><a
						href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>
				</ul>
			</div>
			<!-- main content -->
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">

					<div class="panel panel-default panel-success">
						<!-- Default panel contents -->
						<div class="panel-heading">
							<b>本月运动情况</b>
						</div>
						<div class="panel-body">

							<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
							<div id="goal" style="height: 400px"></div>
							<!-- ECharts单文件引入 -->
							<script src="{{ URL::asset('/') }}build/dist/echarts.js"></script>
							<script type="text/javascript">
        // 路径配置
        require.config({
            paths: {
                echarts: '/build/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/gauge'
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('goal'), 'macarons'); 
                
                var option = {
                	    tooltip : {
                	        formatter: "{a} <br/>{b} : {c}%"
                	    },
                	    toolbox: {
                	        show : true,
                	        feature : {
                	            mark : {show: false},
                	            restore : {show: true},
                	            saveAsImage : {show: true}
                	        }
                	    },
                	    series : [
                	        {
                	            name:'业务指标',
                	            type:'gauge',
                	            startAngle: 180,
                	            endAngle: 0,
                	            center : ['50%', '90%'],    // 默认全局居中
                	            radius : 320,
                	            axisLine: {            // 坐标轴线
                	                lineStyle: {       // 属性lineStyle控制线条样式
                	                    width: 200
                	                }
                	            },
                	            axisTick: {            // 坐标轴小标记
                	                splitNumber: 10,   // 每份split细分多少段
                	                length :12,        // 属性length控制线长
                	            },
                	            axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
                	                formatter: function(v){
                	                    switch (v+''){
                	                        case '25': return '低';
                	                        case '50': return '中';
                	                        case '75': return '高';
                	                        default: return '';
                	                    }
                	                },
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: '#fff',
                	                    fontSize: 15,
                	                    fontWeight: 'bolder'
                	                }
                	            },
                	            pointer: {
                	                width:50,
                	                length: '90%',
                	                color: 'rgba(255, 255, 255, 0.8)'
                	            },
                	            title : {
                	                show : true,
                	                offsetCenter: [0, '-60%'],       // x, y，单位px
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: '#fff',
                	                    fontSize: 30
                	                }
                	            },
                	            detail : {
                	                show : true,
                	                backgroundColor: 'rgba(0,0,0,0)',
                	                borderWidth: 0,
                	                borderColor: '#ccc',
                	                width: 100,
                	                height: 40,
                	                offsetCenter: [0, -40],       // x, y，单位px
                	                formatter:'{value}%',
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    fontSize : 50
                	                }
                	            },
                	            data:[{
                    	            value:  <?php echo $percent ?>,
                    	             name: '运动目标完成',
                    	             
                        	             }]
                	        }
                	    ]
                	};
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>

						</div>
					</div>

				</div>
				<hr />
				<div class="caption">
					<h3>在RunTime的运动总量</h3>
				</div>
				<br>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<a href="#" class="img-circle"> <img src="image/time_green.png"
						alt="天">
					</a>
                    已运动<?php echo $days ?>天
                </div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<a href="#" class="img-circle"> <img src="image/burn_green.png"
						alt="大卡">
					</a>
                    共燃烧<?php echo $calories ?>大卡
                </div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<a href="#" class="img-circle"> <img src="image/run_green.png"
						alt="公里">
					</a>
                    累积里程<?php echo $km ?>公里
                </div>
				<hr />




			</div>
		</div>
	</div>



</body>

</html>