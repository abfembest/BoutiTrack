<?php session_start();
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
			$id = $_GET['id'];
			$sql= "SELECT * FROM jobuk.accounts WHERE id = '$id'";
				$result = $connect->query($sql);
		  		if ($result-> num_rows >0) {
		    	while ($row = $result-> fetch_assoc()) {
			$username = $row["username"];
    		$user_access = $row["user_access"];
    	}

		$sql="UPDATE jobuk.accounts SET user_access= 0 WHERE id = '$id' AND username='$username'";
		if(mysqli_multi_query($connect, $sql)){
			$_SESSION["disabled"]= "The user has been disabled.";
			header('location:../userlist.php');
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