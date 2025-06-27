<style type="text/css">
  
td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
table {
        width: 250px;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
    font-size: 15px;
}

.ticket {
    width: 450px;
    max-width: 260px;
    font-size: 0.8em;
    text-align: center;
    font-style: bold;"
}

img {
    max-width: 100px;
    border-radius: 20px;
    margin-left: 60px;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>
<div class="ticket">
            <img src="printpos/logo1.jpg" alt="Logo" class="Logo">
            <p class="centered"><I><b>Adeola Crowns Limited, Osogbo</b></I>
                <br><b>Gaa area, adjacent delightsome schools permanent site, Halleluyah, Ido Osun via Osogbo, Osun State, Nigeria.</b><br>
                <b>Call +2347020887532, +2348111212882,+2347010057916.<br>
               
               
                    <?php echo date('d-m-Y')." " 
                     //'Cashier: '. $_SESSION["name"];
                    ?>
    <table class="ticket">
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="quantity">B.</th>
                        <th class="description">Description</th>                              
                        <th class="price">#</th>
                        <th class="description">Qx#</th>
                        <th class="description">Qx#</th>
                        <th class="description">Action</th>

                    </tr>
  
  <?php
  //if(isset($_POST['Search'])){
    $Invoiceid = $_POST['invoice_id'];
 $sql = "SELECT * (quantity*unit_price) AS Amount, Cashier FROM credit_sales ";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
    echo ("<tr><td>".$row["Quantity"]."</td><td>". $row["Bonus"]."</td><td>". $row["Brand"]."</td><td>". $row["Unit_price"]."</td><td>".$row["Amount"]."</td></tr>");
  }
  $sql = "SELECT ID, Invoice_id,  Quantity, Unit_price, Cashier, SUM(Quantity) AS Total_quantity, SUM(Quantity*Unit_price) AS Total FROM credit_sales ";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
    echo ("<tr>".'Invoice no.'.''. $row["Invoice_id"]);
  }
  echo "</table>";
}
$sql = "SELECT ID, Invoice_id,  Quantity, Unit_price, SUM(Quantity) AS Total_quantity, SUM(Quantity*Unit_price) AS Total FROM credit_sales WHERE Invoice_id = '$Invoiceid'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
    echo ("<tr><td colspan ='2'><b>" .'T.quantity = '.$row["Total_quantity"]."</td><td>"." ".'Amount= '. $row["Total"]." "."</b></td></tr><br>");
  }
  echo "</table>";

$sql = "SELECT * FROM debtors_list WHERE Invoice_id = '$Invoiceid'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
    echo ("<tr><td><b>" .'Balance = '.$row["Debts"]."</b></td></tr><br>");
  }
  $sql = "SELECT Fullname FROM credit_sales WHERE Invoice_id = '$Invoiceid' LIMIT 1";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
    echo ("<tr><td><b>" .'Dear, ' ." ". $row["Fullname"]."</b></td></tr><br>");
  }
  echo "<tr><td><b>Thanks for your patronage.</b></td></tr>";
  echo "</table>";
}
}
}
}
  else {
    echo "This Invoice number is not on the list.";

  }
    $connect->Close();
  //}
  ?>
</table>
</div>