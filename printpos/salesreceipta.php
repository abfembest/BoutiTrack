<?php include 'hint.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="postable.css">
        <title>Receipt</title>
    </head>
    <body style=" font-size: 15px;text-align: center; font-style: bold;"><b>
        <div class="ticket">
            <img src="jobuklogo.jpg" alt="Logo" style="margin-left: 10px;"><br>
            <br><p class="centered"><I>JOBUK VENTURES</I>
                <br>Beside Heritage Hotel Ogooluwa, Osogbo, Osun State, Nigeria.
                <div style="text-align: center;font-size: 20px;">
                    <?php echo date('d-m-Y').''.''.
                    include 'db_connect.php';
                    $name = $_SESSION["name"];
                    echo $name;
 $sql = "SELECT invoice_id FROM jobuk.temp_sale WHERE username = '$name'  LIMIT 1";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>

       <?php echo  'Rctno'.": " .$row['invoice_id']." " ." ".'Cashier: '($name);?> </div>
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
                        <th class="price">₦</th>
                        <th class="description">Qx₦</th>
                    </tr>
                    <?php
                    include 'db_connect.php';
 $sql = "SELECT invoice_id, product, quantity, unit_price, (quantity *unit_price) AS selling_price, payment_method, transaction_date FROM jobuk.temp_sale WHERE username = '$name'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>

      <tr>
          <td class="quantity"><?php echo $row['quantity']; ?></td>
          <td class="description"><?php echo $row['product']; ?></td>
          <td class="price"><?php echo $row['unit_price']; ?></td>
          <td class="description"><?php echo $row['selling_price']; ?></td>
      </tr> 

             <?php                 
            }
            } 

              ?>
             <?php 
             include 'db_connect.php';
            $sql = "SELECT quantity, unit_price, SUM(quantity*unit_price) AS Amount, SUM(quantity)AS total_quantity FROM jobuk.temp_sale WHERE username = '$name'";
            $result = $connect->query($sql);
            if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

            <tr><td colspan='2'><?php echo "Quantity ".$row["total_quantity"]."<td colspan='3'>Amount ".' '.'₦'.$row["Amount"] ;?>
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
 $sql = "SELECT username FROM jobuk.temp_sale WHERE username = '$name' LIMIT 1";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      echo "<b>" .$row["username"]; "</b>"
      ?>
            <?php                 
            }
            } 
            ?>
            <?php
            
                $connect->Close();

              ?>
              <hr>
            <p style="margin-top: 0px; font-size: 15px;">Thanks for your patronage!
                <br>+2348065012069</p>
            <button id="btnPrint" class="hidden-print">Print</button>
        <script src="postable.js"></script>
        <a href="../makesalesa.php"><button id="back" class="hidden-print"><i class="fa fa-left">Back</a></button>
          <p><b>Developed by Ab-ray Tech. 08130589812; abfembest@gmail.com</b></p>
      </div>

        
        
        
      </div>
    </a>
    
    </body>

</html>
<script type="text/javascript">
  const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>