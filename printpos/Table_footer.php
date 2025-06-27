<?php  include 'db_connect.php';?>
      <div  style="background-color: white; width: 250px; margin-top: 0px; padding-top: 2px; text-align: left; color: black; margin-bottom: 10px;" >
       <?php
        $sql= "SELECT SUM(Quantity) AS Total_quantity, SUM(Quantity *Unit_price) AS Total_Amount FROM           temp_sales Limit 10";
                     $result = mysqli_query($connect, $sql);
                     while($row = mysqli_fetch_array($result)){
                     echo "<b>Total quantity ". " = ". $row['Total_quantity']."</b>";
                    $sum = $row['Total_Amount'];

        echo " ". " ".",";
        echo "<b>Total cost ". "= #"."$sum".".00</b>";
      }
        ?>
      </div> 
      <?php
       $connect->Close();

  ?>