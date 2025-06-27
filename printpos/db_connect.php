<?php
$hostname ="localhost";
$username ="root";
$password ="password2$";
$databasename="joe";
$connect = mysqli_connect($hostname, $username, $password, $databasename);
if (mysqli_connect_error()) {
   die("Database connection failed:".mysqli_connect_error());
    exit();
}



?>