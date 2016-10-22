<?php
//testing post recieve
print_r($_POST);

/*
 INSERTING QUIZ RESULTS INTO DB
*/
//read the JSON file
$file = "quizQuestion.json";
$json = json_decode(file_get_contents($file), true);
if($json != NULL){
  echo "not null";
}
//testing to see if the JSON is actually being loaded
echo '<pre>' . print_r($json, true) . '</pre>';

//testing: echo $json[1]['question'];

$score = 0;
//Hardcode an answer and convert it to an array
//todo: dynamically get the data from front end
$answer = "33221";
$array_answer = str_split($answer);

//Calculate the user's score
foreach ($json as $key => $value){
  //user answer: echo $array_answer[$key];
  //correct answer: echo $value['answer'];
  if ($array_answer[$key] == $value['answer']){
    $score++;
  }
}
echo $score;

//connect with bloorview db
$link = mysqli_connect("localhost", "root", "Singard,.", "bloorview");
//error handling
if (!$link){
  echo "Error: Unable to connect to mySQL".PHP_EQL;
  echo "Debugging errno: " . mysqli_connect_errno().PHP_EQL;
  echo "Debugging error: " . mysqli_connect_error().PHP_EQL;
  exit;
}

//if it succeeds  --delete it later
echo "<br>Success<br>";

//create an hardcoded associative array - will be dynamically updated later
$quizstatus = array("module"=>"2","quizname"=>"math1","date"=>"2016-10-22");

//Parse the data
$module = $quizstatus["module"];
$quizname = $quizstatus["quizname"];
//$score = $quizstatus["score"];
$date = $quizstatus["date"];

//$date1 = date('Y-m-d', strtotime(str_replace('-', '/', $date)));

//insert into the table
$sql = "INSERT INTO quizscore(module, quizname, score, date) VALUES('$module', '$quizname', '$score', '$date')";

//error handling
if ($link->query($sql) === TRUE) {
    echo "inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
?>
