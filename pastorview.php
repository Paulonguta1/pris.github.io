<?php 
session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
/** @var$pdo \PDO */
require_once  "../database.php";
$id = $_GET['id'] ?? null;

//checks if there is an id selected.
if (!$id) {
     header('Location: viewpastor.php');
     exit;
}

$statement = $pdo->prepare('SELECT * FROM pastor WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$pastors = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

$full_name = $pastors['full_name'];
$gender = $pastors['gender'];
$year_of_birth = $pastors['year_of_birth'];
$phone_no = $pastors['phone_no'];
$email = $pastors['email'];
$national_id = $pastors['national_id'];
$church = $pastors['church'];
$pastorate = $pastors['pastorate'];
$area = $pastors['area'];
$ward = $pastors['ward'];
$sub_county = $pastors['sub_county'];
$county = $pastors['county'];
$picture = $pastors['picture'];
$age = '';
$full_namenk = $pastors['full_namenk'];
$gendernk = $pastors['gendernk'];
$year_of_birthnk = $pastors['year_of_birthnk'];
$phone_nonk = $pastors['phone_nonk'];
$emailnk = $pastors['emailnk'];
$national_idnk = $pastors['national_idnk'];
$relationship = $pastors['relationship'];
$picturenk = $pastors['picturenk'];

?>
<?php include_once "../partials/navbar.php" ?>
<?php include_once "../partials/header.php"; ?>
<style>
  body{
    background-color: silver;
    font-family: serif;
  }
  .center{ 
  }
  .card-header{
    background-color: black;
  }

</style>
<h2 class="card-title" align="center"><b>Pastor <?php echo $full_name ?>'s full details </b></h2>
<div class="row text-black bg-secondary mb-3 ">
  <div class="col-sm-6 bg-secondary mb-3">
    <div class="card bg-secondary mb-3" style="width: 34rem;">
      <div class="card-body">
        <div class="card-header text-center mb-3 text-white">
        <h4><?php echo 'Pastor '.$pastors['full_name']?> details</h4></div>
          <img class="card-img-top mx-auto d-block" style="height:18rem; width: 18rem; border-radius: 50%;" src="<?php echo $picture ?>" alt="Card image cap">
          <ul class="list-group list-group-flush">
          <li class="list-group-item"> <b> Gender: </b><?php echo $pastors['gender'] ?></li>
          <li class="list-group-item"> <b> Date of Birth: </b><?php echo $pastors['year_of_birth'] ?></li>
          <li class="list-group-item"> <b> Phone No: </b><?php echo $pastors['phone_no'] ?></li>
          <li class="list-group-item"> <b> Email: </b><?php echo $pastors['email'] ?></li>
          <li class="list-group-item"> <b> National ID: </b><?php echo $pastors['national_id'] ?></li>
          <li class="list-group-item"> <b> Church: </b><?php echo $pastors['church'] ?></li>
          <li class="list-group-item"> <b> Pastorate: </b><?php echo $pastors['pastorate'] ?></li>
          <li class="list-group-item"> <b> Area: </b><?php echo $pastors['area'] ?></li>
          <li class="list-group-item"> <b> Ward: </b><?php echo $pastors['ward'] ?></li>
          <li class="list-group-item"> <b> Sub-County: </b><?php echo $pastors['sub_county'] ?></li>
          <li class="list-group-item"> <b> County: </b><?php echo $pastors['county'] ?></li>
          <li class="list-group-item"> <b> Age: </b><?php

                $today = date("Y-m-d");
                $diff = date_diff(date_create($pastors['year_of_birth']), date_create($today));
                echo $age = $diff->y .' years old.';
             ?></li>
            </ul>
          </div>
        </div>
      </div>
    
      <div class="col-sm-6 text-white bg-secondary mb-3">
        <div class="card bg-secondary mb-3" style="width: 34rem;">
          <div class="card-body bg-secondary mb-3">
            <div class="card-header text-center mb-3 text-white">
            <h4 class="card-title ">Next of kin's details(<?php echo $pastors['relationship'] ?>)</h4></div>
            <img style=" width: 18rem; height:18rem; border-radius: 50%;" class="card-img-top mx-auto d-block" src="<?php echo $picturenk ?>" alt="Card image cap">
            <ul class="list-group list-group-flush ">
            <li class="list-group-item"> <b> Name of NOK: </b><?php echo $pastors['full_namenk'] ?></li>
            <li class="list-group-item"> <b> Gender: </b><?php echo $pastors['gendernk'] ?></li>
            <li class="list-group-item"> <b> Date of Birth: </b><?php echo $pastors['year_of_birthnk'] ?></li>
            <li class="list-group-item"> <b> Phone No: </b><?php echo $pastors['phone_nonk'] ?></li>
            <li class="list-group-item"> <b> Email: </b><?php echo $pastors['emailnk'] ?></li>
            <li class="list-group-item"> <b> National ID: </b><?php echo $pastors['national_idnk'] ?></li>
          </ul>
        </div>
      <div class="d-inline-block text-white center">
        <?php if($pastors['Status'] ==1): ?>  
         <form method="post" action="deactivate.php" style="display: inline-block;">
            <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
            <button type="submit" class="btn btn-sm btn-success">Click to Deactivate</button>
          </form>
        <?php else : ?>
             <form method="post" action="activate.php" style="display: inline-block;">
              <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
              <button type="submit" class="btn btn-sm btn-secondary">Click to Activate</button>
          </form>
        <?php endif ?>   
        <form method="post" action="deletepastor.php" style="display: inline-block;">
        <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
        <button type="submit" class="btn btn-sm btn-danger">Click Here to Delete</button>
        </form>
        <a href="updatepastor.php?id=<?php echo $pastors['id'] ?>" type="button" class="btn btn-sm btn-primary">Click Here to Update</a>
      </div>
      <br>
      <hr>
      <a href="viewpastor.php" class="btn btn-black" >Back to pastors</a>
  </div>
</div>
  
<?php include_once "../partials/footer.php"; ?>