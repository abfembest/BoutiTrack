<html>
<head>
  <title>Adeola crown farms</title>
<style type="text/css">
  th{
    font-size: 12px;
    text-transform: uppercase;
    text-align: top;

  }
</style>
</head>

<body class="hold-transition sidebar-mini" style="background: url('images/background.jpg'); background-size: cover;">
  <?php include 'datatableheader.php';
  include 'db_connect.php';?>
<center>
      <div>
        
  <form action="" method="POST">
        <label class="hidden-print">From:</label> <input type="Date" required="required" class="hidden-print" id="date01" name="date1" placeholder="Enter Date to Search" >
        <label class="hidden-print">To:</label><input type="Date" required="required" id="date02" name="date2" class="hidden-print" placeholder="Enter Date to Search">
        <button name="search" value="Generate" id="submit1" class="hidden-print" onclick="show()"><i class="fa fa-search"></i></button>          
  </form>
</div>
        <div style="max-width: 1000px; margin:auto;">
          <div class="card">
            <div class="card-header">

              <h2 class="card-title"><a href="reportpage.php"><button class="btn btn-info">Back</button></a> <b>Eggs Sales reports for today  <span id="span1"><script type="text/javascript">
                var dat = new Date();
                var dat1 = dat.toLocaleDateString();
                document.write(dat1);
              </script></span> </b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="card1" style="">
              <table id="example1" class="table table-bordered table-striped" style="background-color: white;">
                <thead>
                <tr>
                   <th>EGGS IN STOCK B/F</th>
                  <th>Eggs produced</th>
                  <th>Eggs sold</th>
                  <th>Eggs Bal B/F</th>
                  <th>Total daily sales</th>
                  <th>Total daily expenses</th>
                  <th>Cash in hand</th>
                  <th>Balance C/F</th>
                  <th>Remarks</th>

                </tr>
                </thead>
                <tbody>
                <?php
  if(isset($_POST['search'])){
    $dat1 = $_POST['date1'];
    $dat2 = $_POST['date2'];
    //$produce = $_POST['produce'];
     // formating the dates
      $date = new DateTime($dat1);
      $dat1=$date->format('Y-m-d');
      $date = new DateTime($dat2);
      $date2 = $date->format('Y-m-d');
   
      //$sql ="SELECT s.quantity_instock, sum(s.quantity_instock) as egginstock, sum(s.quantity_sold) as qsold, sum(s.quantity_instock-s.quantity_sold) as balancebf, s.unit_price, sum(s.quantity_sold*s.unit_price) as total_sales,s.transaction_date,e.transaction_date, e.amount, sum(e.amount) as total_expenses FROM sales s, expenses e WHERE s.transaction_date BETWEEN '$dat1' AND '$dat2' AND e.transaction_date BETWEEN '$dat1' AND '$dat2' GROUP BY s.transaction_date";
      //$sql ="SELECT s.quantity_instock, SUM(s.quantity_instock) as egginstock, SUM(s.quantity_sold) as qsold, sum(s.quantity_instock-s.quantity_sold) as balancebf, s.unit_price, SUM(s.quantity_sold*s.unit_price) as total_sales, s.transaction_date AS tdate FROM sales s WHERE s.transaction_date  BETWEEN '$dat1' AND '$dat2' GROUP BY s.transaction_date";
      //$sql ="SELECT (s.quantity_instock, sum(s.quantity_instock) as egginstock, sum(s.quantity_sold) as qsold, sum(s.quantity_instock-s.quantity_sold) as balancebf, s.unit_price, sum(s.quantity_sold*s.unit_price) as total_sales,s.transaction_date FROM sales s Where s.transaction_date BETWEEN '$dat1' AND '$dat2'), select (e.transaction_date, e.amount, sum(e.amount) as total_expenses FROM expenses e WHERE s.transaction_date BETWEEN '$dat1' AND '$dat2')";
      $sql ="SELECT SUM(s.quantity_instock) as egginstock, s.transaction_date as sdate from sales s WHERE s.transaction_date  BETWEEN '$dat1' AND '$dat2' GROUP BY s.transaction_date, (SELECT SUM(product_added.quantity) as eggprod from product_added  left join sales on product_added.transaction_date = s.transaction_date group by product_added.transaction_date              
              ";
      //$egginstock =0;
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
            echo $row["pq"];
             //$cash=$row["total_sales"]-$row["balancebf"];
             $total_expens1 = $row["total_expenses"];
            echo ("<tr><td><a href='#'>".$row["egginstock"]."</a>"."</td>
                  <td>".$row["eggprod"]."</td>
                 <td>".$row["qsold"]."</td>
                  <td>". $row["balancebf"]."</td>
                  <td>". $row["total_sales"]."</td>
                  <td>". ($total_expens1)."</td>
                   <td>". $row["cash"]."</td>
                  <td>". $row["unit_price"]."</td>
                  <td>".$row["sdate"]."</td>
                  </tr>");
           
  }
       
    # code...
   
  
  echo "</table>";
  echo "<table style= 'margin-top: 2px;'>";
  echo "<tr><h3>The cash analysis are detailed below: <h3></tr>";
  echo "<tr>";
  echo "<th>TOTAL EGGS PRODUCED IN THE WEEK:&nbsp </th><td><b>".($sumq)."</b></td><th>TOTAL SALES IN THE WEEK</th>
          <td>-----------</td>";
  
  echo "</tr>";
  echo "<tr>";
  echo "<th>TOTAL EGGS SOLD IN THE WEEK </th><td>--------</td><th>TOTAL EXPENSES IN THE WEEK</th>
          <td>-----------</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<th>EGGS BALANCE C/D IN THE WEEK</th><td>--------</td><th>TOTAL BALANCE C/D IN THE WEEK</th>
          <td>-----------</td>";
  echo "</tr>";

 
  echo "</table>";
  echo "</div>";
}

  else {
    echo "No sales yet.";
 
}
}

//}

  

//}
    $connect->Close();
  //}
  ?>
                </tbody>
                <tfoot>
                <!--<tr>
                  <th>EGGS IN STOCK B/F</th>
                  <th>Eggs produced</th>
                  <th>Eggs sold</th>
                  <th>Eggs Bal B/F</th>
                  <th>Cash in hand</th>
                  <th>Total daily sales</th>
                  <th>Total daily expenses</th>
                  <th>Balance C/F</th>
                  <th>Remarks</th>
                </tr>-->
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
<?php include 'datatablefooter.php';?>
<script type="text/javascript">
     function show() {
      document.getElementById("card1").style.display="block";
    }
      
  </script>
</body>




</html>
