<?php include 'sidemenuc.php';
INCLUDE 'db_connect.php';

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#302b63;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white;">Select product and search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" style ="color:white;">Home</a></li>
              <li class="breadcrumb-item"><a href="#" style ="color:white;">Expenses</a></li>
              <li class="breadcrumb-item active" style ="color:white;">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <form action="" method="POST">  

                      <span class="form-inline"><label>Products:&nbsp&nbsp&nbsp</label>
                        <select  id="product" name="product" required="required" class="form-inline">
                        <option style=""></option>
                        <?php

                            $query = "SELECT DISTINCT category FROM jobuk.products";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['category']."'>" . $row['category'] . "</option>";
                             } 
                          ?>
                        </option>
                      </select>
                      <button name = "Search"><i class="fa fa-search"></i></button>
                    </span>
                    
                  </form> 
                 
                </h3>
                  <label style="margin-left: 20px;">
                    Your current cash sales: 
                        <?php
                        $username= $_SESSION["name"];
                       
                            $query = "SELECT unit_price, quantity,transaction_date, username, sum(unit_price*quantity) AS tsales FROM jobuk.sales WHERE transaction_date= current_date() AND username='$username'";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                              $sales = $row["tsales"];
                              echo ($sales); 
                             } 
                          ?>
                  </label>
                  <span class="btn btn-info">
                      <?php 
                      if (isset($_SESSION["status"])) {
                        echo $_SESSION["status"]; 
                        unset($_SESSION["status"]);
                      # code...
                    }
                    ?></span> 
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

            <div class="row">
               <div class="col-sm-12">
           
              <?php
                  if(isset($_POST['Search'])){
                    $product = $_POST['product'];

                     $query = "SELECT category, type FROM jobuk.products  where category='$product'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                  <div class="card card-info">
                  <div class="card-header">
                <h3 class="card-title">Sell your products here</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_salesa.php" method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Products </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="product" class="wide" min="0" required="required" readonly value="<?php echo $row['category'];?>" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                  <!--<input type="text" name="total_instock" value="<?php #echo $row['total'];  ?> ">-->
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Items:</label>
                    <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="specie" required>
                          <option selected></option>
                        <?php
                            $query = "SELECT category, type, quantity FROM jobuk.products WHERE category ='$product'";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['type']."'>" . $row['type'] . "</option>";
                             } 
                          ?>
                          </SELECT>
                    </div>
                  </div> 
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How many units?" id="Brand" name="quantity" class="wide" min="0" required="required" step=".02" >
                    </div>
                  </div> 
                </div>
                <!--<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Weight</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="kilogram?" id="Brand" name="weight" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>-->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Price</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price per Kilo" id="Brand" name="unit_price" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Payment Method:</label>
                    <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="payment_method" required>
                          <option selected></option>
                          <option value="cash">Cash</option>
                          <option value="transfer">Transfer</option>
                          <option value="both">Cash and Transfer</option>
                          <option value="cheque">Cheque</option>
                          </SELECT>
                    </div>
                  </div> 
                </div>
                </div>       
  
                    <?php 
                      $rowSQL = mysqli_query($connect, "SELECT MAX(invoice_id) AS maxid FROM jobuk.invoice_table"); 
                    $row = mysqli_fetch_assoc($rowSQL);

                    $largestUID = $row['maxid']; 
                      
                      ?>
                      
                      <input type="hidden" class = "form-control" readonly="readonly"  width="10" name="invoice_id" value="<?php echo 'inv0'.$largestUID?>">
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"];?>">
                  <div class="card-footer">
                         
                          <button type="submit" name="submit" class="btn btn-info" style="width: 100%;">Click to sell</button>
                </div>
                            
  </form>
  </div>
</div>

  

  <?php
}
}
                  
  //$connect->Close();
  ?>
  

                  
                
            </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Sales module...
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="col-md-10">
                
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <a href="actions/action_refresha.php" style="float: right;"> <input type="button" name="refresh" value="Complete sales" class="btn btn-danger"> 
                  </a>
                <h3 class="card-title">Invoice</h3> <span>
                  <?php if (isset($_SESSION["status"])) {
                    echo $_SESSION["status"]; 
                    unset($_SESSION["status"]);
                    # code...
                  } ?>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      
                        <?php INCLUDE 'printpos/postable2a.php'; ?>
                     
                    </div>
                  </div>
         
         </div>   
      </div>
    </div>
  </div>
  <!-- /.content-wrapper-->
