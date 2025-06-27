<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<link rel="stylesheet" href="postable.css">-->
        <title>Receipt</title>
        <style type="text/css">
          
        </style>
    </head>
    <body style=" font-size: 15px;text-align: center; font-style: bold;"><b>
        <div class="ticket">
            <img src="logo1.jpg" alt="Logo" style="margin-left: 10px;"><br>
            <br><p class="centered"><I>R. A. Olaiya ltd Osogbo</I>
                <br>204, Sabo junction, Osogbo, Osun State, Nigeria.
                <div style="text-align: center;font-size: 20px;">
                    <?php echo date('d-m-Y').''.''.
                    include 'db_connect.php';
 $sql = "SELECT Invoice_ID FROM temp_sales LIMIT 1";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>

       <?php echo  'Rctno'.": " .$row['Invoice_ID']." " ." ".'Cashier: '; ?> </div>
  <?php                 
}
} 
?>
<?php
    $connect->Close();

  ?>


            <table style="text-align: center;">
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">Bonus.</th>                  
                        <th class="price">₦</th>
                        <th class="description">Qx₦</th>
                    </tr>
                    <?php
                    include 'db_connect.php';
 $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, (Quantity *Unit_price) AS Selling_price, Bonus,Cashier,Customer, Location, Payment_method, Transaction_date FROM temp_sales LIMIT 10";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>

      <tr>
          <td class="quantity"><?php echo $row['Quantity']; ?></td>
          <td class="description"><?php echo $row['Brand']; ?></td>
          <td class="description"><?php echo $row['Bonus']; ?></td>
          <td class="price"><?php echo $row['Unit_price']; ?></td>
          <td class="description"><?php echo $row['Selling_price']; ?></td>
      </tr> 

             <?php                 
            }
            } 

              ?>
             <?php 

            $sql = "SELECT Quantity, Unit_price, SUM(Quantity*Unit_price) AS Amount, SUM(Quantity)AS Total_quantity FROM temp_sales LIMIT 10";
            $result = $connect->query($sql);
            if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

            <tr><td colspan='2'><?php echo "Quantity ".$row["Total_quantity"]."<td colspan='3'>Amount ".'='.'₦'.$row["Amount"] ;?>
            </tr>

            </table>
            
            <?php                 
            }
            } 
            ?>
            <?php
            
                $connect->Close();

              ?>
              <?php 
              include 'db_connect.php';
 $sql = "SELECT Customer FROM temp_sales LIMIT 1";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      echo "<b>" .$row["Customer"]; "</b>"
      ?>
            <?php                 
            }
            } 
            ?>
            <?php
            
                $connect->Close();

              ?>
            <p style="margin-top: 0px; font-size: 15px;">Thanks for your patronage!
                <br>08033617135, 08033978170,08035880919</p>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="postable.js"></script>
        <a href="../make_salesa.php"><button id="back" class="hidden-print">Back</a></button>
      </div>
    </div>
    </body>

</html>