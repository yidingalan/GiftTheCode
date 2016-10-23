<?php
//testing post recieve
print_r($_POST);

//Convert it to string and initialize user answer and date
$_POST . "";
$useranswer = "";
$date = "";

foreach ($_POST as $key => $value){
  $value . "";
  if (strpos($key, 'Question') !== false){
    $useranswer = $useranswer . $value;

  }
  if (strpos($key, 'datestring') !== false){
    $date = $date . $value;
  }
}

echo "useranswer: " . $useranswer . "<br>";
echo "date: " . $date;

//Now we compare the user answer with the correct answer
//Then we update the scores and insert it into db

//read the JSON file  -->contains the correct answer
$file = "quizQuestion.json";
$json = json_decode(file_get_contents($file), true);
if($json != NULL){
  echo "not null";
}
//testing to see if the JSON is actually being loaded
echo '<pre>' . print_r($json, true) . '</pre>';

$score = 0;

//Convert the user answer from string to array
$array_answer = str_split($useranswer);

//Calculate the user's score
foreach ($json as $key => $value){
  //user answer: echo $array_answer[$key];
  //correct answer: echo $value['answer'];
  if ($array_answer[$key] == $value['answer']){
    $score++;
  }
}
//for debbugging
echo $score;
$score = $score . "/5";

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
echo "<br>Success<br>";

//create an hardcoded associative array - will be dynamically updated later
$quizstatus = array("module"=>"2","quizname"=>"math1");

//Parse the data
$module = $quizstatus["module"];
$quizname = $quizstatus["quizname"];

//insert into the table
$sql = "INSERT INTO quizscore(module, quizname, score, date) VALUES('$module', '$quizname', '$score', '$date')";

//error handling
if ($link->query($sql) === TRUE) {
    echo "inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
exit();
?>
