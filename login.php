<?php include('../functions.php') ?>
<//?php include_once "../partials/header.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pastor-retirement-system</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
 <style>
  body{
    background-color: silver;
    font-family: serif;
  }
  *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: serif;  
  }
  nav{
      left: 0;
      top: 0;
      width: 100%;
      height: 55px;
      background-color:black;
      line-height: 55px;
      padding: 0px 100px;
      position: fixed;
      z-index: 1;

  }
  .nav ul{
      font-size: 30px;
      font-weight: bold;
      letter-spacing: 1.5px;
  }
  nav .logo p{
      margin-left: 0px;
      float: left ;
      color: #fff;
      text-transform: uppercase;
      font-size: 30px;
  }
  nav ul li{
      float: right;
      display: block;
  }
  nav ul li a{
      color: red;
      text-decoration: none;
      font-size: 18px;
      text-transform: uppercase;
      padding: 0px 32px;
  }
  nav ul li a:hover{
      color: white;
  }

</style>
</head>
<nav>
      <div class="logo">
          <p>PASTOR'S RETIREMENT SYSTEM-MFA</p>
      </div>

    </nav>
<body>
  <div class="header">
    <h2>ADMIN</h2>
  </div>
  <form method="post" action="login.php">

    <?php echo display_error(); ?>

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
    </div>
  </form>
</body>
<hr>


<?php include_once "../partials/footer.php"; ?>
</html>