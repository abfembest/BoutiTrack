<?php session_start();
include("db_connect.php");
$category= filter_input(INPUT_POST, 'category');
$type= filter_input(INPUT_POST, 'type');
$quantity= filter_input(INPUT_POST, 'quantity');
$price= filter_input(INPUT_POST, 'price');
$description= filter_input(INPUT_POST, 'description');
$username= filter_input(INPUT_POST, 'username');
$id= filter_input(INPUT_POST, 'id');
$code= filter_input(INPUT_POST, 'code');
if(isset($_POST['submit'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "documents/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","pdf");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record

     $query = "UPDATE jobuk.products SET price = '$price'
          WHERE id='$id';UPDATE jobuk.products SET code = '$code'
          WHERE id='$id';UPDATE jobuk.products SET photo = '$name' 
           WHERE id='$id';UPDATE jobuk.products SET transaction_date = current_date 
           WHERE id='$id'";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          $_SESSION["status"]="Updated.";
              header('Location:../update_table.php');
              exit();


  } else {
      echo "Could not save.";
      echo'<a href="../update_table.php">Back</a></p>';

}
 }
} 
?>

