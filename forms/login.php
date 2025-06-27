<?php include 'menu.html'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fontawesome.com/icons">

</head>
<body>
<center> 
  <div class="login">
    <h1>Login to JOSCOM FARMS</h1>
      <form method="post" action="../actions/action_login.php" class="login1">
        <div class="row">
              <p>Username:<span><i class="fa fa-user"></i></span><input type="text" name="username" value="" placeholder="Username or Email"></p>
        </div>
        <div class="row">
            <p>Password :<span><i class="fa fa-unlock-alt"></i><input type="password" name="password" value="" placeholder="Password"></span></p>
        </div>
        <div class="row">
            <p>User Type :<span><i class="fa fa-user"></i>
              <SELECT  name="user_role">
                <option selected="selected">Select user role</option>
                <option value="1">Manager</option>
                <option value="2">Admin</option>
                <option value="3">Director</option>
            </SELECT></span></p>
        </div>
        <div class="row" style="max-width: 350px;">      
              <div class="col-20">
                <input type="checkbox" name="remember_me" id="remember_me">
              </div>
              <div class="col-80">
                <label>Remember me on this computer</label>
              </div>

        </div>
        <p class="submit"><input type="submit" name="commit" value="Login" class="submit1"></p>

      </form>
      <div class="login-help">
      <p>Forgot your password? <a href="#" style="color: black;">Click here to reset it</a>.</p>
</div>
  </div>
</center>


</body>
</html>