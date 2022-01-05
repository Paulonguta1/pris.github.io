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
    <h2>Change Password</h2>
  </div>
  <form method="post" action="changepassword.php">

    <?php echo display_error(); ?>

    <div class="input-group">
      <label>Current Password</label>
      <input type="password" name="current_password" >
    </div>
    <div class="input-group">
      <label>New Password</label>
      <input type="password" name="new_password">
    </div>
    <div class="input-group">
      <label>Confirm Password</label>
      <input type="password" name="confirm_password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="changepassword_btn">Change Password</button>
    </div>
  </form>
</body>
<hr>
<?php include_once "../partials/footer.php"; ?>
</html>