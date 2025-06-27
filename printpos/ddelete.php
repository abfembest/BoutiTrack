<?php session_start();
include 'db_connect.php';


//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];
	$name = $_SESSION['name'];
	$sql= "SELECT * FROM jobuk.sales WHERE id = '$id'";
		$result = $connect->query($sql);
  		if ($result-> num_rows >0) {
    	while ($row = $result-> fetch_assoc()) {
    		$invoice_id = $row["invoice_id"];
    		$product = $row["product"];
    		$quantity = $row["quantity"];
    		$price = $row["unit_price"];
    		$username = $row["username"];
    		$code = $row["code"];
    		
    	}
    		$cost= ($quantity*$price);
	//load amount from payment table
		$sql = "SELECT * FROM jobuk.accounts WHERE username = '$name'";
		  $result = $connect->query($sql);
		  if ($result-> num_rows >0) {
		    while ($row = $result-> fetch_assoc()){
		    	$payment = $row["payment"];

				
		    }
		}

    		if ($payment>=$cost) {
    			

		$sql="UPDATE jobuk.products SET quantity= (quantity+'$quantity') WHERE code = '$code';UPDATE jobuk.accounts SET payment= (payment-'$cost') WHERE username = '$username';DELETE FROM jobuk.sales WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){

			echo '<script type="text/javascript">'; 
		echo 'alert("The transaction was deleted and stock was reconciled, click ok to continue.");'; 
		echo 'window.location.href = "../makesales.php"';
		echo '</script>';

} 

}
	elseif ($payment<$cost) {
				echo '<script type="text/javascript">'; 
				echo 'alert("Cannot delete transaction kindly complete sales to continue.");'; 
				echo 'window.location.href = "../makesales.php"';
				echo '</script>';
		# code...
	}


		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		}
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>