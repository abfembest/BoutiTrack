<?php
include("db_connect.php");
$category= filter_input(INPUT_POST, 'category');
$type= filter_input(INPUT_POST, 'type');
$quantity= filter_input(INPUT_POST, 'quantity');
$price= filter_input(INPUT_POST, 'price');
$username= filter_input(INPUT_POST, 'username');
#$specie= filter_input(INPUT_POST, 'specie');
#$document= filter_input(INPUT_POST, 'document');

if(isset($_POST['submit'])){
 
  //$name = $_FILES['file']['name'];
  //$target_dir = "documents/";
  //$target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  //$extensions_arr = array("jpg","jpeg","png","gif","pdf");

  // Check extension
  //if( in_array($imageFileType,$extensions_arr) )
 
     // Insert record

     $query = "INSERT into jobuk.products (category, type,quantity, price, username, transaction_date) 
              VALUES('$category','$type','$quantity','$price','$username',current_date)";
   
     if (mysqli_query($connect,$query)){
    
     // Upload file
    //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
      echo '<p style="text-align:center;"><img src="uploaded.png" style ="width:300px; height:300px; text-align:center;"><br>';
      echo "Saved.<br>";
      echo '<a href="../newstocksc.php">Go!</a></p>';

  } else {
          echo "Error, stock cannot be taken or product type already exist.";
           echo'<a href="../newstocksc.php"."".>Go!</a></p>';

      }
}
?>

