<?php
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];
	$quantity = $_GET['quantity'];
	$product = $_GET['product'];
	$Invoice_id = $_GET['Invoice_id'];
	$specie = $_GET['specie'];

		$sql="UPDATE products SET quantity= (quantity+'$quantity'), WHERE category = '$product' AND type='$specie';INSERT INTO deleted_sales (Invoice_id, product, quantity, unit_price, payment_method, transaction_date) VALUES ( '$invoice_id','$product','$quantity','$unit_price','$username', '$payment_method', current_timestamp);DELETE FROM temp_sales WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){

			echo '<script type="text/javascript">'; 
		echo 'alert("The transaction was deleted and stock was reconciled, click ok to continue.");'; 
		echo 'window.location.href = "../makesales.php"';
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