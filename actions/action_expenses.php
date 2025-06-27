<?php
$title= filter_input(INPUT_POST, 'title');
$amount= filter_input(INPUT_POST, 'amount');
$receiver= filter_input(INPUT_POST, 'receiver');
$description= filter_input(INPUT_POST, 'description');
$payment_method= filter_input(INPUT_POST, 'payment_method');
$username= filter_input(INPUT_POST, 'username');
$transaction_date= filter_input(INPUT_POST, 'transaction_date');
$product = filter_input(INPUT_POST, 'product');
//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	include 'db_connect.php';
		$sql ="INSERT INTO jobuk.expenses (title, amount, receiver, description, payment_method, username ,transaction_date) VALUES ('$title', '$amount', '$receiver', '$description', '$payment_method', '$username', Current_timestamp );#INSERT INTO jobsales (product, expense_amount, transaction_date) 
		#VALUES ( '$product','$amount', current_timestamp);";
		if(mysqli_multi_query($connect, $sql)){

   			echo '<script type="text/javascript">'; 
		echo 'alert("Expense was captured, click ok to continue.");'; 
		echo 'window.location.href = "../expenses.php";';
		echo '</script>';
} 


		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>