<?php
include 'db_connect.php';
$product= filter_input(INPUT_POST, 'product');
$specie = filter_input(INPUT_POST, 'specie');
$feeds = filter_input(INPUT_POST, 'feeds');
$quantity= filter_input(INPUT_POST, 'quantity');
$weight= filter_input(INPUT_POST, 'weight');
$price= filter_input(INPUT_POST, 'price');
$description= filter_input(INPUT_POST, 'description');
$username = filter_input(INPUT_POST, 'username');
$date= filter_input(INPUT_POST, 'transaction_date');

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be emp ty")
	
	//creating connections.
		

    			$sql="INSERT INTO death (product, specie, quantity, username, price, description, transaction_date) VALUES ( '$product','$specie', '$quantity','$username','$price','$description', current_date);UPDATE products SET quantity = (quantity-'$quantity') where product = '$product' and specie = '$specie'";
					if(mysqli_multi_query($connect, $sql)){
						header('Location:../dead.php');
						echo '<script type="text/javascript">';
						echo "document.getElementById('message').innerHTML='Successfully saved'";
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