<?php session_start();
include 'db_connect.php';
$product= filter_input(INPUT_POST, 'product');
$quantity= filter_input(INPUT_POST, 'quantity');
$weight= filter_input(INPUT_POST, 'weight');
$unit_price= filter_input(INPUT_POST, 'unit_price');
$selling_price= filter_input(INPUT_POST, 'selling_price');
$username = filter_input(INPUT_POST, 'username');
$payment_method= filter_input(INPUT_POST, 'payment_method');
$date= filter_input(INPUT_POST, 'transaction_date');
$quantity2= filter_input(INPUT_POST, 'quantity2');
$invoice_id= filter_input(INPUT_POST, 'invoice_id');
$specie= filter_input(INPUT_POST, 'specie');
$total_instock= filter_input(INPUT_POST, 'total_instock');

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be emp ty")
	
	//creating connections.
		$sql1 = "SELECT category, type, quantity, sum(quantity) as totalstock FROM jobuk.products where category = '$product'AND type='$specie'";
		$result = $connect->query($sql1);
  		if ($result-> num_rows >0) {
    	while ($row = $result-> fetch_assoc()) {
    		$totalstock=$row["totalstock"];
    		echo ($totalstock);
    		$quantity1 = $row["quantity"];
    		//$egg = ($quantity1-$quantity);
    		if ($quantity1 < $quantity) {
    			echo '<script type="text/javascript">'; 
				echo 'alert("Out of stock, kindly restock, click ok to continue.");'; 
				echo 'window.location.href = "../makesalesa.php"';
				echo '</script>';
    			# code...
    		}

    		else{

    			$sql="INSERT INTO jobuktemp_sale (invoice_id, product, quantity, quantity_instock, unit_price, username, payment_method, transaction_date, specie) VALUES ( '$invoice_id','$product','$quantity', '$quantity1','$unit_price','$username','$payment_method', current_timestamp,'$specie'); UPDATE jobuk.products SET quantity = (quantity-$quantity) WHERE category = '$product' AND type = '$specie'";
					if(mysqli_multi_query($connect, $sql)){
						$_SESSION["status"] = "Sold successfully.";
   						header('Location:../makesalesa.php');
   						exit();

		
   					}

		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
			else{
				echo "Error: ".$sql."<br>".$connect->error;
		}
		}
		}
	}
		$connect->close();

?>