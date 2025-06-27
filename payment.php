<?php 
include 'sidemenu.php';
INCLUDE 'db_connect.php';

$name = $_SESSION['name'];

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: url('images/background.jpg'); background-size: cover;">
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
              <li class="breadcrumb-item"><a href="expenses.php" style ="color:white;">Expenses</a></li>
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
                  <a href="makesales.php"><button class="btn btn-primary">Back</button></a>
                  
                    <?php if (isset($_SESSION["paystatus"])) {

                      echo "<b style = 'color:red;'>".$_SESSION["paystatus"]."</b>";
                      unset($_SESSION["paystatus"]);
                      # code...
                    } ?>
                 
                 
                </h3>

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
                 
                    $query = "SELECT * FROM jobuk.accounts  where username='$name'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                  <div class="card card-info">
                  <div class="card-header">
                <h3 class="card-title">Payment here</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_payment.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Name </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Customer's name here" id="brand" name="custname" class="wide" min="0" required="required" readonly value="<?php echo $row['custname']; ?>" >
                    </div>
                  </div> 
                </div>
                


                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How many units?" id="Brand" name="amount" min="0" required="required" step="any" readonly value="<?php echo $row['payment'];?>">
                    </div>
                  </div> 
                </div>

                 <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'] ;?> ">
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Payment method</label>
                  <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="paymethod" required>
                          <option selected></option>
                          <option>cash</option>
                          <option>POS</option>
                          <option>transfer</option>
                          <option>cash and transfer</option>
                        
                          </SELECT>
                    </div>
                  </div> 
                </div>
                </div>
                

                   
                </div>   
                
                    
                    
                  <div class="card-footer">
                         
                          <button type="submit" name="submit" class="btn btn-info" style="width: 100%;">Click to save</button>
                </div>
                            
  </form>
  </div>
</div>

  <!--<div class="col-md-6">
                
           
            <div class="card card-warning">
              <div class="card-header">
                
                <h3 class="card-title">Preview</h3>
              </div>
              /.card-header 
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      text input
                      
                        <?php #INCLUDE 'printpos/postable2.php'; ?>
                     
                    </div>
                  </div>
         
         </div>   
      </div>
    </div>-->

  <?php


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
  </div>
  <!-- /.content-wrapper-->
