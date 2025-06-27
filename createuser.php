<?php include 'toplinks.php';
?>
<title>Jobuk Ventures osogbo</title>
<body class="hold-transition register-page" style="background-color:#6dd5ed">
<div class="register-box">
  <div class="register-logo">
    <a href="front.php"><b>Jobuk </b>Ventures</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body" style="border-radius: 50%;">
      <p class="login-box-msg">Create a new user</p>
      <P style="color: blue;">
        <?php
          if (isset($_SESSION["status"])) {
            echo $_SESSION["status"];
            echo $_SESSION["uname"];
            echo "<br>";
            echo $_SESSION["passwd"];
            unset($_SESSION["status"]);
              # code...
          }
          elseif (isset($_SESSION["status2"])) {
            echo $_SESSION["status2"];
            unset($_SESSION["status2"]);
            # code...
          }
            # code...
          
        ?>
      </P>

      <form action="actions/action_createuser.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First name" name="fname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last name" name="lname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
       
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3"><label for="agreeTerms">User level :</label>
          <select class="form-control" required name="user_access">
            <option></option>
            <option value="3">
              sales
            </option>
            <option value="2">
              Manager
            </option>
            <option value="1">
              Director
            </option>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          </select>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">           
            <button type="submit" class="btn btn-primary btn-block" name="create">Create user</button>
          </div>
          <!-- /.col -->
         
        </div>
      </form>           

      <a href="login.php" class="text-center">I already have an account</a><br>
       <a href="front.php" class="text-center">Cancel</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<?php include 'javascriptlinks.php'; ?>