<?php include('../functions.php') ?>
<?php include_once "../partials/header.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Maranatha Pastors Retirement System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 <style>
  body{
    background-color: silver;
  }
</style>
</head>
<body>
  <div class="header">
    <h2>ADMIN</h2>
  </div>
  <form method="post" action="addadmin.php">

    <?php echo display_error(); ?>

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm Password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="register_btn">Add admin</button>
    </div>
  </form>
</body>
<?php include_once "../partials/footer.php"; ?>
</html>