<?php
//Used to process the POST request and store the quiz scores in DB

//connect with bloorview db
$link = mysqli_connect("localhost", "root", "", "bloorview");
//error handling
if (!$link){
  echo "Error: Unable to connect to mySQL".PHP_EQL;
  echo "Debugging errno: " . mysqli_connect_errno().PHP_EQL;
  echo "Debugging error: " . mysqli_connect_error().PHP_EQL;
  exit;
}

//if it succeeds  --delete it later
echo "Success<br>";

//create an hardcoded associative array
$quizstatus = array("module"=>"2","quizname"=>"math1","score"=>"2/5","date"=>"2016-10-22");

//Parse the data
$module = $quizstatus["module"];
$quizname = $quizstatus["quizname"];
$score = $quizstatus["score"];
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
