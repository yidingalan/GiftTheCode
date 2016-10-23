<?php

//testing post recieve
//var_dump($_POST);
//exit();

$data = $_POST;
$json = array("questions" => array());
$numOfQuiz = 1;

$json['moduleName'] = $data['module'];
$json['quizName'] = $data['quiz'];

for($i=1; $i<6; $i++) {
    $json['questions'][$i-1]['question'] = $data["question".$i];
    $json['questions'][$i-1]['options'][0] = $data["Q".$i."_A"];
    $json['questions'][$i-1]['options'][1] = $data["Q".$i."_B"];
    $json['questions'][$i-1]['options'][2] = $data["Q".$i."_C"];
    $json['questions'][$i-1]['options'][3] = $data["Q".$i."_D"];
    $json['questions'][$i-1]['answer'] = (int)$data["solution".$i];
}

//echo json_encode($json);
$json = json_encode($json);
file_put_contents(str_replace(' ', '', "data/".$data['quiz'].".json"), $json);

$numOfQuiz++;
//var_dump(json_decode($json));
header('Location:dashboardUi/dashboard2.php?created=true&numOfQuiz='.$numOfQuiz);

?>
