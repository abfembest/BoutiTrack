<?php session_start();
include 'db_connect.php';
$id= filter_input(INPUT_POST, 'id');
$code= filter_input(INPUT_POST, 'code');
$product= filter_input(INPUT_POST, 'product');
$quantity= filter_input(INPUT_POST, 'quantity');
$unit_price= filter_input(INPUT_POST, 'unit_price');
$fullname= filter_input(INPUT_POST, 'fullname');
$username = filter_input(INPUT_POST, 'username');
$phone= filter_input(INPUT_POST, 'phone');
$payment_method= filter_input(INPUT_POST, 'payment_method');
$date= filter_input(INPUT_POST, 'transaction_date');
$quantity2= filter_input(INPUT_POST, 'quantity2');
$invoice_id= filter_input(INPUT_POST, 'invoice_id');
$lprice= filter_input(INPUT_POST, 'listprice');
$cost = ($quantity*$unit_price);


//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be emp ty")
	
	//creating connections.
		$sql1 = "SELECT id, code, quantity FROM jobuk.products where code = '$code'AND id='$id'";
		$result = $connect->query($sql1);
  		if ($result-> num_rows >0) {
    	while ($row = $result-> fetch_assoc()) {
       		$quantity1 = $row["quantity"];
       	
    		
    		if ($quantity1 < $quantity) {
    			echo '<script type="text/javascript">'; 
				echo 'alert("Out of stock, kindly restock, click ok to continue.");'; 
				echo 'window.location.href = "../makesales.php"';
				echo '</script>';
    			# code...
    		}elseif ($lprice>$unit_price) {
				echo '<script type="text/javascript">'; 
				echo 'alert("The price cannot be leser than list price.");'; 
				echo 'window.location.href = "../makesales.php"';
				echo '</script>';
		
	}

    		else{

    			$sql="INSERT INTO jobuk.sales (invoice_id, product, quantity, unit_price,fullname,code, phone,payment_method, username, transaction_date) VALUES ( '$invoice_id','$product','$quantity','$unit_price','$fullname','$code', '$phone','$payment_method','$username', current_timestamp);UPDATE jobuk.products SET quantity = (quantity-$quantity) WHERE id = '$id' AND code = '$code';UPDATE jobuk.accounts SET payment = (payment+$cost) WHERE username = '$username';UPDATE jobuk.accounts SET invoice_id = '$invoice_id' WHERE username = '$username';UPDATE jobuk.accounts SET custname = '$fullname' WHERE username = '$username';UPDATE jobuk.accounts SET product = '$product' WHERE username = '$username'";
					if(mysqli_multi_query($connect, $sql)){
						$_SESSION["status"]="Sold successfully.";
   						header('Location:../makesales.php');
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