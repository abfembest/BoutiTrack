<?php
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
    		$price = $row["unit_price"];
    		$username = $row["username"];
    		$payment_method = $row["payment_method"];
    		$transaction_date = $row["transaction_date"];
    	}
		$sql= "UPDATE products SET quantity= (quantity+'$quantity') WHERE product = '$product';INSERT INTO deleted_sales (invoice_id, product, quantity, unit_price, username, payment_method, transaction_date, deleted_date) VALUES('$invoice_id','$product','$quantity','$price', '$username', '$payment_method', '$transaction_date', current_timestamp);DELETE FROM temp_sale WHERE id = '$id'";
			
		if(mysqli_multi_query($connect, $sql)){
			
			echo '<script type="text/javascript">';
			echo 'window.location.href = "../makesales.php"';
			echo '</script>';

} 


		
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		}
		$connect->close();

?>