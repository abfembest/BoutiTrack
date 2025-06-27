<?php include 'hint.php';
 $name = $_SESSION['name'];
include 'db_connect.php';

if(isset($_POST['refresh'])){
  

}
$sql = "UPDATE jobuk.sales SET status = 1 WHERE status = 0 AND username = '$name';INSERT INTO jobuk.invoice_table ( username, transaction_date) VALUES ('$name',current_timestamp);UPDATE jobuk.accounts SET invoice_id ='' WHERE username = '$name';UPDATE jobuk.accounts SET custname ='' WHERE username = '$name'";

if (mysqli_multi_query($connect, $sql)) {
	
    header('Location:../makesales.php');
} else {
    echo "Error completing sales: " . $connect->error;
}

$connect->close();
?>