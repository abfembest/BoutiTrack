<?php session_start();
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
			$id = $_GET['id'];
			$sql= "SELECT * FROM temp_sale WHERE id = '$id'";
				$result = $connect->query($sql);
		  		if ($result-> num_rows >0) {
		    	while ($row = $result-> fetch_assoc()) {
			$invoice_id = $row["invoice_id"];
    		$product = $row["product"];
    		$quantity = $row["quantity"];
    		$unit_price = $row["unit_price"];
    		$username = $row["username"];
    		$payment_method = $row["payment_method"];
    		$transaction_date = $row["transaction_date"];
    		$specie = $row["specie"];
    	}

		$sql="UPDATE joe.products SET quantity= (quantity+'$quantity') WHERE category = '$product' AND type='$specie';INSERT INTO deleted_sales (Invoice_id, product, type, quantity, unit_price,username, payment_method, transaction_date) VALUES ( '$invoice_id','$product','$specie','$quantity','$unit_price','$username', '$payment_method', current_timestamp);DELETE FROM joe.temp_sale WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){
			$_SESSION["status"]= "The transaction was deleted and stock was reconciled.";
			header('location:../makesalesa.php');
			exit();

			

} 


		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
	}
		$connect->close();

?>