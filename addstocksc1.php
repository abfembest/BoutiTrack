<?php include 'sidemenuc.php';
INCLUDE 'db_connect.php';

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
                  <form action="" method="POST">  

                      <span class="form-inline"><label>Products:&nbsp&nbsp&nbsp</label>
                        <select  id="product" name="product" required="required" class="form-inline">
                        <option style=""></option>
                        <?php
                            $query = "SELECT DISTINCT category FROM joe.products ";
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

                     $query = "SELECT * FROM joe.products  where category='$product'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                  <div class="card card-info">
                  <div class="card-header">
                <h3 class="card-title">Add new Stocks</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_addstock.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Products </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="category" class="wide" min="0" required="required" readonly value="<?php echo $row['category']; ?>" >
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Types:</label>
                    <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="type" required>
                          <option selected></option>
                        <?php
                            $query = "SELECT category,type FROM joe.products WHERE category ='$product'";
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Quantity in Kg</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How many units?" id="Brand" name="quantity" class="wide" min="0" required="required" step=".02" >
                    </div>
                  </div> 
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Price</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price per Kilo" id="Brand" name="price" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Description:</label>
                    <div class="col-sm-8">
                      <div>
                         <textarea class="form-control" id="exampleInputPassword1" placeholder="Briefly describe the produce.." name="description" required></textarea>
                    </div>
                  </div> 
                </div>
                </div>   
                
                    
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"] ?>">
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
