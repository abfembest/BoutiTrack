<html>
<head>

</head>
<body class="hold-transition sidebar-mini">
  <?php include 'datatableheader.php';
  include 'db_connect.php';
  include 'sidemenu.php';
  include 'topmenu.php';
  ?>
<center>
      <div><form action="" method="POST">
        <label class="hidden-print">Project title</label>: <select>
          <option>All</option>
          <option>Current</option>
          <option>Completed</option>
          <option>Failed</option>
        </select>
        <input type="submit" name="Search" value="Generate" id="submit1" class="hidden-print" onclick="show()">            
  </form>
</div>
        <div style="max-width: 800px; margin-left: 80px;">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Project status and reports</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="card1" style="display: none">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
  if(isset($_POST['Search'])){
    $dat1 = $_POST['date1'];
    $dat2 = $_POST['date2'];
     // formating the dates
      $date = new DateTime($dat1);
      $dat1=$date->format('Y-m-d');
      $date = new DateTime($dat2);
      $date2 = $date->format('Y-m-d');
      $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, (Quantity*Unit_price) AS Selling_price, Bonus, Location, Payment_method, Cashier, Transaction_date FROM sales WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      echo ("<tr><td>".$row["ID"]."</td><td>".$row["Invoice_ID"]."</td><td>".$row["Brand"]."</td><td>". $row["Quantity"]."</td><td>". $row["Unit_price"]."</td><td>"."</td></tr>");
    # code...
  }
  echo "</table>";
  echo "The cash analysis are detailed below: ";
    echo "<div><style>background: white; width:70%;text-align: left;</style>";

  $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, Payment_method, Sum(Quantity*Unit_price) AS Direct_sales FROM sales WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $Direct_sales =$row["Direct_sales"];
      
    }
 

   $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, Payment_method, Sum(Quantity*Unit_price) AS Transfer_sales FROM sales WHERE Payment_method = 'Transfer'AND Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {

      $transfer = $row["Transfer_sales"];

      $Direct_sales2 = $Direct_sales-$transfer;

      echo ("<tr><td>". 'Total direct sales = '.$Direct_sales2." ".","."</td><br>");
      echo ("<td>". 'Bank transfer sales = '.$transfer." ,"." "."</td><br>");
    }
 

   $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, Payment_method, Sum(Quantity*Unit_price) AS Cheque_sales FROM sales WHERE Payment_method = 'Cheque'AND Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $cheque = $row["Cheque_sales"];
      //echo ("<tr><td>". 'Cheque sales = '.($cheque).", "." "."</td></tr><br>");
    }


  $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, Payment_method, Sum(Quantity*Unit_price) AS Cash_and_Transfer FROM sales WHERE Payment_method = 'Cash and Transfer'AND Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      //echo ("<td>". 'Total cash and transfer = '.$row["Cash_and_Transfer"].", "." "."</td><br>");
    }


   /*$sql = "SELECT *, SUM(Quantity*Unit_price) AS Credit_sale FROM Credit_sales WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $credit = $row["Credit_sale"];
      echo ("<td>". 'Total Credit sales = '.$row["Credit_sale"].", "." "."</td><br>");*/
    }
    $sql = "SELECT *, SUM(Amount) AS amount2 FROM debts_repay WHERE Payment ='Transfer' AND Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $Transfer = $row["amount2"];
      echo ("<td>". 'Transfer Payment to bank by creditors  = '.$Transfer.", "." "."</td><br>");
    }
    $sql = "SELECT *, SUM(Amount) AS amount1 FROM debts_repay WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $Apaid = $row["amount1"];
      $Total_cash_credit= $Apaid-$Transfer;
      //echo ("<td>". 'Payment from credit sold = '.$Apaid.", "." "."</td><br>");
      echo ("<td>". 'Amount paid by creditors = '.$Total_cash_credit.", "." "."</td><br>");
    }
  $sql = "SELECT ID, Invoice_ID, Brand, Quantity, Unit_price, Sum(Quantity*Unit_price) AS Total_sales FROM sales WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $total1=$row["Total_sales"];
      $Total_sales=$total1+$Total_cash_credit;
      echo ("<tr><td>". 'Grand Total sales = '.($total1+$Total_cash_credit)." ".","."</td></tr></td><br>");
      //echo ("<td>". 'Total income sales less Outstanding debts = '.($total1+$Apaid).", "." "."</td><br>");
      
    }
    $sql = "SELECT *, Sum(Amount) AS Cashtobank FROM cashtobank WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $Cashtobank=$row["Cashtobank"];
      echo ("<tr><td>". 'Cash to bank = '.$Cashtobank." ".","."</td></tr></td><br>");
    }

   $sql = "SELECT *, SUM(Amount) AS expenses FROM expenses WHERE Transaction_date BETWEEN '$dat1' AND '$dat2'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
      $expense = $row["expenses"];
      echo ("<tr><td>". 'Total Expenses = '.$row["expenses"].", "." "."</td>");
      $available = ($Total_sales-$expense-$Cashtobank-$transfer);
     
    }
  echo "</table>";
  echo "</div>";

  echo "Cash at hand: = " .$available;
   echo "</tr>";
}

  else {
    echo "No sales yet.";
  }
  }
  }
}
}
}
}
}
  }
}
//}
    $connect->Close();
  //}
  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          
          <!-- /.card -->
    </div>
    </center>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!--<footer class="main-footer">-->
    <!--<div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->

<?php include 'datatablefooter.php'; 
 
?>
<script type="text/javascript">
    function show() {
      document.getElementById("card1").style.display="block";
    }
      
  </script>
 <?php include 'footer.php';?>
</body>
</html>
