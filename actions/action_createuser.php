<?php session_start();
include 'db_connect.php';
$fname= filter_input(INPUT_POST, 'fname');
$lname= filter_input(INPUT_POST, 'lname');
$password= filter_input(INPUT_POST, 'password');
$email= filter_input(INPUT_POST, 'email');
$access= filter_input(INPUT_POST, 'user_access');


if(isset($_POST['create'])){
   


$sql = "INSERT INTO jobuk.accounts(username, fname,lname, email, password, user_access, transaction_date) VALUES ('$fname', '$fname','$lname','$email','$password','$access',current_timestamp)";

if (mysqli_multi_query($connect, $sql)) {
	$_SESSION["status"]="Successfully registered, kindly note the following:";
	$_SESSION["uname"]= "username :" .($fname);
	$_SESSION["passwd"]= "Password :" .($password);
	header("Location: ../createuser.php");
	exit();
} 

	# code...



else {
	$_SESSION["status2"]="error creating the new user: The username already exist.";
    header("Location: ../createuser.php");
    exit();
}
}
$connect->close();
?>