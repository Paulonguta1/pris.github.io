<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php include_once "../partials/header.php"; ?>
<style>
  body{
    background-color: silver;
  }
  .card-header{
    background-color: black;
  }

</style>
<div id="container">
<h2 class="card-title" align="center"><b> Pastor registration form </b></h2>
<form action="" method="post" enctype="multipart/form-data">
<div class="row text-black bg-secondary mb-3 ">
  <div class="col-sm-6 bg-secondary mb-3">
    <div class="card bg-secondary mb-3" style="width: 34rem;">
      <div class="card-body">
        <div class="card-header text-center  mb-3 text-white">
        <h4 class="card-title ">Pastor's details</h4></div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Pastor's full name</label>
            <input type="text" name="full_name" class="form-control" value="<?php echo $full_name ?>" required >
            </div>
            <div class="form-group">
            <label>Pastor's Picture</label><br>
            <input type="file" name="picture">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label>Gender:</label>
              <select name="gender" value=" <?php echo $gender  ?> "required style="width: 400px;">
              <option value="Male">Male</option>
              <option value="Female">Female</option> 
              </select>
            </div>
            <div class="form-group col-md-12">
              <label>Year of Birth</label>
              <input type="date" name="year_of_birth" class="form-control" value="<?php echo $year_of_birth ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label>Phone Number</label>
              <input type="number" name="phone_no" class="form-control" value="<?php echo $phone_no ?>" required>
            </div>
            <div class="form-group col-md-12">
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label>National_ID</label>
              <input type="number" name="national_id" class="form-control" value="<?php echo $national_id ?>" required>
            </div>
            <div class="form-group col-md-12">
              <label>Church</label>
              <input type="text" name="church" class="form-control" value="<?php echo $church ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label>Pastorate</label>
              <input type="text" name="pastorate" class="form-control" value="<?php echo $pastorate ?>" required>
            </div>
            <div class="form-group col-md-12">
              <label>Area</label>
              <input type="text" name="area" class="form-control" value="<?php echo $area ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label>Ward</label>
              <input type="text" name="ward" class="form-control" value="<?php echo $ward ?>" required>
            </div>
            <div class="form-group col-md-12">
              <label>Sub-County</label>
              <input type="text" name="sub_county" class="form-control" value="<?php echo $sub_county ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
              <label>County</label>
              <input type="text" name="county" class="form-control" value="<?php echo $county ?>" required>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 text-black bg-secondary mb-3">
    <div class="card bg-secondary mb-3" style="width: 34rem;">
      <div class="card-body bg-secondary mb-3">
        <div class="card-header text-center mb-3 text-white">
        <h4 class="card-title">Details of Next of kin (NoK)</h4></div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Picture of NoK</label><br>
              <input type="file" name="picturenk">
            </div>
            <div class="form-group col-md-12">
              <label>Name of NoK</label>
              <input type="text" name="full_namenk" class="form-control" value="<?php echo $full_namenk ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Gender of NoK</label>
              <select name="gendernk" value=" <?php echo $gendernk  ?>" required style="width: px;">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label>D.O.B of NOK</label>
              <input type="date" name="year_of_birthnk" class="form-control" value="<?php echo $year_of_birthnk ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Phone.No. of NOK</label>
              <input type="text" name="phone_nonk" class="form-control" value="<?php echo $phone_nonk ?>">
            </div>
            <div class="form-group col-md-12">
              <label>Email of Next of Kin</label>
              <input type="email" name="emailnk" class="form-control" value="<?php echo $emailnk ?>" required>
          </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>National ID of Next of Kin</label>
              <input type="number" name="national_idnk" class="form-control" value="<?php echo $national_idnk ?>" required>
            </div>
            <div class="form-group col-md-12">
              <label>Relationship</label>
              <input type="text" name="relationship" class="form-control" value="<?php echo $relationship ?>" required>
            </div>
          </div>
          <br>
          <hr>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button><button class="btn" style="float: right; ">
        <hr>
        <a href="viewpastor.php" class="btn btn-dark">Back to pastors</a></button>
    </div>
    
  </div>
      
</div>
</form>
</div>
<?php include_once "../partials/footer.php"; ?>