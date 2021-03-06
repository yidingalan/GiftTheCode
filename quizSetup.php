<?php

/*

Retrieve quiz json
Note: default quiz hardcoded at the moment

*/

session_start();
//quiz to load
$file = "ABIQuiz.json";
if(isset($_POST['fetch'])) {
    $file = $_POST['fetch'];
}
$_SESSION["fetch"] = $file;
//print_r($GLOBALS); die;
$data = file_get_contents("data/".$file);
$data = json_decode($data, true);
//var_dump($data);
//exit();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=chrome">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BrainQuiz</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements-quiz.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
        <!-- Top content -->
        <div class="top-content" id="form_container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong> <? echo $data['moduleName']." Module"; ?></strong> <br/></h1>
							<h2 style="color:white"><? echo $data['quizName']; ?></h2>
                        </div>
                    </div>

                    <a href="dashboardUi/dashboard2.php">
                        <button class="btn btn-primary btn-lg centroid" style="height:50px;width:200px">Back to Dashboard</button>
                    </a>

      <?php
      //BEGIN loading quiz questions here
                foreach($data['questions'] as $index => $properties) {
                    $num = $index + 1;
                    echo '<div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
									<div id="first_question">
										<p style="font-size:20px"class="form_group"> '.$properties['question'].'
												 </p>
										<button id="Q'.$num.'_A" type="submit" onclick="Q'.$num.'(' . "'Q".$num."_A'" . ');" class="btn">'.$properties['options'][0].'</button>
										<button id="Q'.$num.'_B" type="submit" onclick="Q'.$num.'(' . "'Q".$num."_B'" . ');" class="btn">'.$properties['options'][1].'</button>
										<button id="Q'.$num.'_C" type="submit" onclick="Q'.$num.'(' . "'Q".$num."_C'" . ');" class="btn">'.$properties['options'][2].'</button>
										<button id="Q'.$num.'_D" type="submit" onclick="Q'.$num.'(' . "'Q".$num."_D'" . ');" class="btn">'.$properties['options'][3].'</button>
									</div>	
							</div>
						</div>
				    </div>';
                }

      //FINISH loading quiz questions here
      ?>
                </div>

	</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 form-box">
					<button style="width:75%" onclick="submit();" class="btn_sign_up" background ="#eee">Submit!</button>
				</div>
			</div>
			
			<br/>
			<br/>			

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
		<script src="assets/js/buttons.js"></script>
    </body>
</html>