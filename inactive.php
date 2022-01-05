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

$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM pastor WHERE full_name LIKE :full_name ORDER BY full_name ASC');
    $statement->bindValue(':full_name', "%$search%");
}
else{
    $statement = $pdo->prepare('SELECT * FROM pastor WHERE Status=0 ORDER BY full_name ASC');
}

$statement->execute();
$pastor = $statement->fetchAll(PDO::FETCH_ASSOC);
//$status = $pastors['status'];
?>
<!-- <div class="logout align-left" align="left">
    <p align="floatright" style="display: inline-block;">
    <a href="pastorform.php" type="button" class="btn btn-sm btn-success">Add Pastor</a>
   
  <a href="index.php?logout='1'" style="color: white; float: right 10px;" type="button" class="btn btn-sm btn-success">Logout</a>
  </p>
  </div> -->
<?php include_once "../partials/header.php"; ?>
</head>
<style>
  body{
    background-color: silver;
  }
  table{
    border-collapse: collapse;
}
thead tr{
    border-top:1px solid #f0f0f0 ;
    border-bottom: 2px solid #f0f0f0;
}
thead {
    font-weight: ;
    font-family: serif;
}
td {
    padding: .5rem 1rem;
    font-size: 16px;
    color: black;
    font-weight: 500;
    font-family: serif;
}
.card{
    background: grey;
    border-radius: 5px;
}

.card-header,
.card-body{
    padding: 1rem;
}
.card-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom:1px solid #f0f0f0 ;
}
.card-header button{
    background: green;
    border-radius: 10px;
    color: #fff;
    font-size: .8rem;
    padding: .5rem 1rem;
    border: 1px solid black;
}
.table-responsive{
    width: 100%;
    overflow-x: auto;
}
.customer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem .7rem;
}
.info {
    display: flex;
    align-items: center;
}
.info img{
    border-radius: 50%;
    margin-right: 1rem;
}
.info h4{
    font-family: serif;
    font-size: .8rem;
    font-weight: 700;
    color: #222;
}
body{
    font-family: serif;
}
</style>
<body>
<div class="recent-grid">
        <div class="projects"> 
          <div class="card">
            <div class="card-header">
              <h4 align="center">PASTOR'S TABLE</h4>
              <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search pastor" name="search" value="<?php echo $search ?>">
                     <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" width="100%">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Picture</th>
                      <th scope="col">Full_Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Date_Of_Birth</th>
                      <th scope="col">Age</th>
                      <th scope="col">Phone No.</th>
                      <th scope="col">Email address</th>
                      <th scope="col">National_ID</th>
                      <th scope="col">Church</th>
                      <th scope="col">Pastorate</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pastor as $i => $pastors) { ?>
                      <tr>
                          <th scope="row"><?php echo $i + 1 ?></th>
                          <td>
                               <a href="pastorview.php?id=<?php echo $pastors['id'] ?>">
                              <img style="width: 3rem; height:3rem; border-radius: 50%;" src="<?php echo $pastors['picture'] ?>" >
                          </a>
    
                          </td>
                          <td><?php echo $pastors['full_name'] ?></td>
                          <td><?php echo $pastors['gender'] ?></td>
                          <td><?php echo $pastors['year_of_birth'] ?></td>
                          <td><?php

                          $today = date("Y-m-d");
                          $diff = date_diff(date_create($pastors['year_of_birth']), date_create($today));
                          echo $age = $diff->y;
                       ?></td>
                          <td><?php echo $pastors['phone_no'] ?></td>
                          <td><?php echo $pastors['email'] ?></td>
                          <td><?php echo $pastors['national_id'] ?></td>
                          <td><?php echo $pastors['church'] ?></td>
                          <td><?php echo $pastors['pastorate'] ?></td>
                          <td>
                            <?php if($pastors['Status'] ==1): ?>  
                                 <form method="post" action="deactivate.php" style="display: inline-block;">
                                  <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
                                  <button type="submit" class="btn btn-sm btn-success">Active</button>
                              </form>
                            <?php else : ?>
                                 <form method="post" action="activate.php" style="display: inline-block;">
                                  <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
                                  <button type="submit" class="btn btn-sm btn-secondary">Inactive</button>
                              </form>
                            <?php endif ?>                  
                          </td>
                          
                          <td>
                            <span style="display: inline-block;">
                                <a href="updatepastor.php?id=<?php echo $pastors['id'] ?>" type="button" class="btn btn-sm btn-primary">Update</a>
                               <form method="post" action="deletepastor.php" style="display: inline-block;">
                                  <input  type="hidden" name="id" value="<?php echo $pastors['id'] ?>"/>
                                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                            </span>
                          </td>
                      </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<button class=" btn btn-primary" ><a href="index.php" style="width:10PX; font-size: 18px;color: white;"> BACK TO DASHBOARD</a></button>
</body>
<?php include_once "../partials/footer.php"; ?>
</html>