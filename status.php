   <?php
                  if(isset($_POST['Search'])){
                    $id = $_POST['id'];

                     $query = "SELECT * FROM project  where id='$id'";

                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      $status = $row['status'];
                      $amount = $row['amount'];
                      $odate = $row['transaction_date'];
                      $projectname = $row['projectname'];
                     if ($status==1) {
                            echo "<p><h2></h2></P>";
                          echo " <p style ='color:red; font-size: 18px;'> &nbsp;This project has been closed and cannot be edited.</p><br>";
                          echo "<b style: margin-left: 150px;>Project title :</b>".$projectname;
                          echo "<br><b style: margin-left: 150px;>Amount spent :</b>".$amount;
                          echo "<br><b style: margin-left: 150px;>Project date :</b>".$odate;
                        //echo'<a href="../updateprojects.php"."".>Back</a></p>';
                     }
                     else{
                    ?>
                      <?php
}

  } 
  }               
  $connect->Close();
  ?>