<?php include 'sidemenu.php'; ?>
<link rel="stylesheet" type="text/css" href="dist/css/newstocks.css">
  <!-- Content Wrapper. Contains page content -->
  <body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
       
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Receive new stocks here..</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Available stocks</a></li>
              <li class="breadcrumb-item"><a href="#">Correct Stock error</a></li>
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
                <h3 class="card-title" style="text-align: center; color: blue;">New livestocks, should be added here</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                              <!-- /.card-body -->
                    <div class="container">
  <h2 align="center">Fill the details carefully</h2>
  <form method="post" action="action_upload2.php" enctype='multipart/form-data'>
    <div class="row">
      <div class="col-25">
        <label for="Owner">Product</label>
      </div>
      <div class="col-75">
        <select id="country" required name="appartment">
          <option value=""></option>
          <option value="pig">Pig</option>
          <option value="cockrel">Cockrel</option>
          <option value="broiwlers">Broiwlers</option>
          <option value="layers">Layers</option>
          <option value="eggs">Crates of eggs</option>

        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Quantity</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="quantity" step="01" min="0" required placeholder="How many.." style="width: 90%;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Kilo</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="size" required placeholder="Measurement.." style="width: 90%;">

        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Price</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="phonenumber" step=".02" required placeholder="Phone number.." style="width: 90%;">
      </div>
    </div>
     
      <div class="row">
      <div class="col-25">
        <label for="lname">Gender</label>
      </div>
      <div class="col-75">
        <select id="country" required name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      </div>
      
    <div class="row">
        <div class="col-25">
          <label for="subject">Description </label>
        </div>
        <div class="col-75">
          <textarea id="subject" name="address" required placeholder="Write something.." style=""></textarea>
        </div>
    </div>
        <input type="hidden" name="username">
      <input type="submit" name="submit" value="Submit">
  
  </form>
</div>          
              <div class="card-footer" style="margin-top: 5px;">
               <h4>Click save button to create stocks.</h4>
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

  <?php include 'javascriptlinks.php';?>