<?php

/*

Render brain course dashboard

hardcode: module, quizname, score, `date`, modulePercent

*/

$modules = array(
    "Brain Education" => array("colour"=>"blue", "records" => array()),
    "Attention" => array("colour"=>"orange", "records" => array()),
    "Memory" => array("colour"=>"teal", "records" => array()),
    "Social Skills" => array("colour"=>"red", "records" => array()),
    "Executive Functioning" => array("colour"=>"green", "records" => array())
);

$module = "Brain Education"; $quizname = "Sample Quiz A"; $score = "4/5"; $date = "2016-10-31"; $modulePercent = "77";

/*
retrieve quizes for a particular module
*/

//connect to db
$link = mysqli_connect("localhost", "root", "", "bloorview");
if (!$link){
    echo "Error: Unable to connect to mySQL".PHP_EQL;
    echo "Debugging errno: " . mysqli_connect_errno().PHP_EQL;
    echo "Debugging error: " . mysqli_connect_error().PHP_EQL;
    exit();
}

foreach($modules as $moduleName => $properties) {
    //execute queries for all 5 modules
    $sql = "SELECT * FROM quizscore WHERE module = '$moduleName';";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $modules[$moduleName]['records'][] = $row;
        }
    }
    //echo $sql;
    //var_dump(mysqli_num_rows($result));
    //var_dump($modules[$moduleName]['records']);
}
//exit();

/*
foreach($modules as $moduleName => $properties) {
    var_dump($properties['records']);
}

exit();
*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HollandBloorview - Dashboard</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Holland</span>Bloorview</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked stroked-male-userser"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<!-- Dashboard Widgets -->
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-3 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-9	 widget-right">
							<div class="large">Firstname Lastname</div>
							<div class="text-muted">Week of Training</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">Available Quizzes</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!-- BEGIN loading modules here -->
	<?php

    foreach ($modules as $moduleName => $properties) {
        echo '<div class="row">
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>'.$moduleName.'</h4>
					<div class="easypiechart" id="easypiechart-'.$properties['colour'].'" data-percent="1" ><span class="percent">65%</span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="panel panel-'.$properties['colour'].'">
				<div class="panel-heading dark-overlay" onclick="location.href=' . 'tables.html' . ';" style="cursor: pointer;"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg>'.$moduleName.'</div>
				<div class="panel-body">
					<ul class="todo-list">';

                        foreach($modules[$moduleName]['records'] as $key => $value) {
                            echo '<li class="todo-list-item">
							<div class="col-xs-4">
								<div class="pull-left">'.$value['date'].'</div>
							</div>
							<div class="col-xs-4">
								<div>'.$value['quizname'].'</div>
							</div>
							<div class="col-xs-4">
								<div class="pull-right">Score: '.$value['score'].'</div>
							</div>
							</li>';
                        }

               echo '</ul>
				</div>
			</div><!--/.col-->
		</div>
	</div>';
    }

    ?>
<!-- END loading modules here -->


        <div class="row">
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Executive Functioning</h4>
					<div class="easypiechart" id="easypiechart-green" data-percent="3" ><span class="percent">27%</span>
					</div>
				</div>
			</div>
		</div>



	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default chat">
				<div class="panel-heading" id="accordion"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Chat</div>
				<div class="panel-body">
					<ul>
						<li class="left clearfix">
							<span class="chat-img pull-left">
								<img src="http://placehold.it/80/30a5ff/fff" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies.
								</p>
							</div>
						</li>
						<li class="right clearfix">
							<span class="chat-img pull-right">
								<img src="http://placehold.it/80/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small>
								</div>
								<p>
									Mauris dignissim porta enim, sed commodo sem blandit non. Ut scelerisque sapien eu mauris faucibus ultrices. Nulla ac odio nisl. Proin est metus, interdum scelerisque quam eu, eleifend pretium nunc. Suspendisse finibus auctor lectus, eu interdum sapien.
								</p>
							</div>
						</li>
						<li class="left clearfix">
							<span class="chat-img pull-left">
								<img src="http://placehold.it/80/30a5ff/fff" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies.
								</p>
							</div>
						</li>
					</ul>
				</div>

				<div class="panel-footer">
					<div class="input-group">
						<input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." />
						<span class="input-group-btn">
							<button class="btn btn-success btn-md" id="btn-chat">Send</button>
						</span>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
	$('#calendar').datepicker({
	});

	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){
			$(this).find('em:first').toggleClass("glyphicon-minus");
		});
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>
</body>

</html>