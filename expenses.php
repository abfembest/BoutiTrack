<?php include 'sidemenu.php';
  INCLUDE 'db_connect.php';

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: url('images/background.jpg'); background-position: cover;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white;">Monitor Expenses</h1>
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
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <form action="" method="POST">  

                      <span class="form-inline"><label>Expenses:&nbsp&nbsp&nbsp</label>
                        
                    </span>
                    
                  </form> 
                 
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
               <div class="col-sm-6">
                  <div class="card card-info">
                  <div class="card-header">
                <h3 class="card-title">Monitor your expenses here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_expenses.php" method="POST">

                <div class="card-body">
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Title</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Like purpose" id="Brand" name="title" class="wide" required="required" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount Spent</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How much was spent?" id="Brand" name="amount" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Receiver</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Who collected the money?" id="Brand" name="receiver" class="wide" min="0" required="required" >
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
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Descriptions</label>
                    <div class="col-sm-8">
                      <div>
                      <textarea class="form-control" id="inputEmail3" placeholder="What the money was used for?" id="description" name="description" class="wide" required ></textarea>
                    </div>
                  </div> 
                </div>
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"];?>">
                  <div class="card-footer">
                          <button type="submit" name="submit" class="btn btn-info float" style="width: 100%;">Post</button>
                </div>
                            
  </form>

  </div>

</div>



 

                  
              <div class="col-lg-3 col-6">
            <!-- small box -->
                  <div class="small-box bg-danger">
                    <?php 
                                  $query = "SELECT sum(amount) as expenses FROM jobuk.expenses where transaction_date =current_date";
                                  $result = mysqli_query($connect, $query);    
                                  while ($row = mysqli_fetch_array($result)){
                                 $expenses = $row["expenses"];
                                   } 
                                ?>
                    <div class="inner">
                      <p>Today's total expenses</p>
                      <h3><?php echo('#'.$expenses)?></h3>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>#16500.00</h3>

                <p>Worth of expenses was incurred in one week</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

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
