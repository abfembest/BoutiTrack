<?php
$projectname= filter_input(INPUT_POST, 'projectname');
$description= filter_input(INPUT_POST, 'description');
$client= filter_input(INPUT_POST, 'client');
$leader= filter_input(INPUT_POST, 'leader');
$budget= filter_input(INPUT_POST, 'budget');
$amount= filter_input(INPUT_POST, 'amount');
$duration= filter_input(INPUT_POST, 'duration');
$location= filter_input(INPUT_POST, 'location');
$id = filter_input(INPUT_POST, 'id');
$reason = filter_input(INPUT_POST, 'reason');

include"db_connect.php";

    if(isset($_POST['submit'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "documents/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","pdf");

  // Check extension
  if( in_array($imageFileType,$extensions_arr)){

    if (file_exists($target_file)) {
            echo "<p style='color: red; font-weight:bold;'>Sorry, the file already exists.</p>";
            echo'<p><a href="../createprojects.php"."".>Back</a></p>';
  
          }
      else{
 
 
     // Insert record
      //,client,leader, budget, amount, duration,location, document, transaction_date
      //,'$client', '$leader','$budget','$amount','$duration','$location','$name'

     $query = "INSERT INTO project(projectname, description,client,leader,budget,amount, duration,location,document, transaction_date) 
        VALUES('$projectname','$description','$client', '$leader','$budget','$amount','$duration','$location','$name',current_date )";
     if(mysqli_query($connect,$query)){
         
     // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        echo '<p style="text-align:center;"><img src="uploaded.png" style ="width:300px; height:300px; text-align:center;"><br>';
        echo "The project created successfully.<br>";
        echo '<a href="../createprojects.php">Back</a></p>';
   }

  else {
    echo "Error";
  echo "The file type is not allowed.";
   echo'<a href="../createprojects.php"."".>Back</a></p>';

}
}
}
}
elseif (isset($_POST['close'])) {
      $query = "UPDATE project SET status=1 WHERE id ='$id';Update project SET reason ='$reason' WHERE id = '$id'";
      if(mysqli_multi_query($connect,$query)){
        echo "Project closed.";
      }

      else{
        echo "Cannot close this project.";
      }
    }
     # code...
$connect -> close();
?>