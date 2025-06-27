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
		

    			$sql="INSERT INTO feeding (product, specie, feeds, quantity, username, weight, price, description, transaction_date) VALUES ( '$product','$specie','$feeds','$quantity','$username', '$weight','$price','$description', current_timestamp); UPDATE feed SET size = (size-$weight) WHERE product = '$product' AND feeds = '$feeds'";
					if(mysqli_multi_query($connect, $sql)){
						header('Location:../feeding.php');
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