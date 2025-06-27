<?php
include 'db_connect.php';
$Brand= filter_input(INPUT_POST, 'Brand');
$quantity1= filter_input(INPUT_POST, 'Quantity');
$Unit_price= filter_input(INPUT_POST, 'Unit_price');
$Selling_price= filter_input(INPUT_POST, 'Selling_price');
$Bonus= filter_input(INPUT_POST, 'Bonus');
$cashier = filter_input(INPUT_POST, 'cashier');
$location= filter_input(INPUT_POST, 'Location');
$Payment_method= filter_input(INPUT_POST, 'Payment_method');
$Date= filter_input(INPUT_POST, 'Transaction_date');
$Quantity2= filter_input(INPUT_POST, 'Quantity2');
$Invoice_ID= filter_input(INPUT_POST, 'Invoice_ID');
$ID= filter_input(INPUT_POST, 'ID');
//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	

		$sql="UPDATE products SET quantity= (quantity+'$quantity1'), Bonus_stock=(Bonus_stock +'$Bonus') WHERE Brand = '$Brand';INSERT INTO deleted_sales (Invoice_ID, Brand, Quantity, Unit_price, Selling_price, Bonus, cashier,Location, Payment_method, Transaction_date) VALUES ( '$Invoice_ID','$Brand','$quantity1','$Unit_price','$Selling_price','$Bonus','$cashier','$location', '$Payment_method', current_timestamp);DELETE FROM temp_sales WHERE ID = '$ID'";
		if(mysqli_multi_query($connect, $sql)){

			echo '<script type="text/javascript">'; 
		echo 'alert("The transaction was deleted and stock was reconciled, click ok to continue.");'; 
		echo 'window.location.href = "../Make_sales.php"';
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