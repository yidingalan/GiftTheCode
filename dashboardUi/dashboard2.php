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
	<link rel="shortcut icon" href="../assets/ico/favicon.png">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-new navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>Holland</span>Bloorview</a>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-0 main">

		<div class="row">
			<div class="col-lg-6">
				<h1 class="page-header">Dashboard</h1>
			</div>
			<div class="col-lg-6 button-wrapper"" align="right">
            <a href="../input.html">
                <button class="btn btn-primary btn-lg centroid">Create a Quiz</button>
            </a>
            <a href="../quizSetup.php">
				<button class="btn btn-primary btn-lg centroid">Take a Quiz</button>
				</a>
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
							<div class="text-muted">Patient</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget ">
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
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Complete Quizzes</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

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
