<?php

/*

Login form validation.
Note: Valid users hardcoded at the moment.

*/

print_r($_POST);
$validUsers = array("usr"=>"pwd");
$usrIn = $_POST['form-username'];
$pwdIn = $_POST['form-password'];

$found = false;
foreach($validUsers as $usr => $pwd){
    if($usrIn == $usr && $pwdIn == $pwd){
        $found = true;
    }
}
if($found != true){
    header('Location:index.php?login=false');
}
else{
    header('Location:dashboardUi/dashboard2.php');
}


?>