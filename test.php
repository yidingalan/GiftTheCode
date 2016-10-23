<?php

//connect with testing db
$link = mysqli_connect("localhost", "root", "", "testing");

if (!$link){
  echo "Error: Unable to connect to mySQL".PHP_EQL;
  echo "Debugging errno: " . mysqli_connect_errno().PHP_EQL;
  echo "Debugging error: " . mysqli_connect_error().PHP_EQL;
  exit;
}

echo "Succress<br>" . PHP_EQL;
echo "host information: " . mysqli_get_host_info($link).PHP_EQL;

//query for selecting everything from db
$sql = "select * from tbl_employee";
$result = mysqli_query($link, $sql) or die("Error in selecting" . mysqli_error($link));

$jsonarray = array();
while($row = mysqli_fetch_assoc($result)){
  $jsonarray[] = $row;
}

//convert it to JSON
echo json_encode($jsonarray);

//write to a JSON file
$fp = fopen("testing.json", 'w');
if ($fp){
  fwrite($fp, json_encode($jsonarray));
  fclose($fp);
  echo "<br>opened";
}else{
  echo "<br>cannot be opened";
}

//close the connection
mysqli_close($link);


//retrieve data to display
$someData = "patient courses done";
if (function_exists('mysqli_connect')){
  echo "<br><br>this shit is installed!!";
}
//var_dump();

?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

title
random text
<?php  echo "<br>".$someData;?>

<body>

</body>
</html>
