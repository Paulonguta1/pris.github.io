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


// $server = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'pastors_db';

// $limit =5;
//$page = isset($_GET['page']) ?$_GET['page']: 1;
//$start =($page -1) * $limit;

// $conn = new mysqli($server, $username, $password, $database); 
// $result = $conn->query("SELECT * FROM pastor LIMIT $limit");
// $pastors = $result->fetch_All(MYSQLI_ASSOC);

// $result1 = $conn->query("SELECT * FROM pastor);
// $count= $result1->fetch_All(MYSQLI_ASSOC);


$limit = 2;
$statement = $pdo->prepare("SELECT * FROM pastor ORDER BY full_name ASC ");
$statement->execute();  
$rowcount1 = $statement->rowCount();
$pages = ceil($rowcount1 / $limit);
$page = isset($_GET['page']);
$start =(($page -1) * $limit);

$Previous = $page - 1;
$Next = $page +1;

$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare("SELECT * FROM pastor WHERE full_name LIKE :full_name ORDER BY full_name ASC LIMIT $start, $limit;");
    $statement->bindValue(':full_name', "%$search%");
}
else{
	
    $statement = $pdo->prepare("SELECT * FROM pastor ORDER BY full_name ASC LIMIT $start, $limit; ");
}
$statement->execute();
$pastors = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

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
              <h4 align="center"><b>PASTOR'S TABLE</b></h4>
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
                      <th scope="col">Area</th>
                      <th scope="col">Ward</th>
                      <th scope="col">SubCounty</th>
                      <th scope="col">County</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pastors as $i => $pastor) { ?>
		                <?php
		                  $today = date("Y-m-d");
		                  $diff = date_diff(date_create($pastor['year_of_birth']), date_create($today));
		                  $age = $diff->y;
		                ?>

                		<style>
	                		td{
	                			color: darkred;
	                		}
                    	</style>
	                      <tr>
	                          <th scope="row"><?php echo $i + 1 ?></th>
	                          <td>
	                               <a href="pastorview.php?id=<?php echo $pastor['id'] ?>">
	                              <img style="width: 3rem; height:3rem; border-radius: 50%;" src="<?php echo $pastor['picture'] ?>" >
	                          </a>
	                              
	                          </td>
	                          <td><?php echo $pastor['full_name'] ?></td>
	                          <td><?php echo $pastor['gender'] ?></td>
	                          <td><?php echo $pastor['year_of_birth'] ?></td>
	                          <td><?php

	                          $today = date("Y-m-d");
	                          $diff = date_diff(date_create($pastor['year_of_birth']), date_create($today));
	                          echo $age = $diff->y;
	                       ?></td>
	                          <td><?php echo $pastor['phone_no'] ?></td>
	                          <td><?php echo $pastor['email'] ?></td>
	                          <td><?php echo $pastor['national_id'] ?></td>
	                          <td><?php echo $pastor['church'] ?></td>
	                          <td><?php echo $pastor['pastorate'] ?></td>
	                          <td><?php echo $pastor['area'] ?></td>
	                          <td><?php echo $pastor['ward'] ?></td>
	                          <td><?php echo $pastor['sub_county'] ?></td>
	                          <td><?php echo $pastor['county'] ?></td>
	                          <td>
	                            <?php if($pastor['Status'] ==1): ?>  
	                                 <form method="post" action="deactivate.php" style="display: inline-block;">
	                                  <input  type="hidden" name="id" value="<?php echo $pastor['id'] ?>"/>
	                                  <button type="submit" class="btn btn-sm btn-success">Active</button>
	                              </form>
	                            <?php else : ?>
	                                 <form method="post" action="activate.php" style="display: inline-block;">
	                                  <input  type="hidden" name="id" value="<?php echo $pastor['id'] ?>"/>
	                                  <button type="submit" class="btn btn-sm btn-secondary">Inactive</button>
	                              </form>
	                            <?php endif ?>                   
	                          </td>
	                          
	                          <td>
	                            <span style="display: inline-block;">
	                                <a href="updatepastor.php?id=<?php echo $pastor['id'] ?>" type="button" class="btn btn-sm btn-primary">Update</a>
	                               <form method="post" action="deletepastor.php" style="display: inline-block;">
	                                  <input  type="hidden" name="id" value="<?php echo $pastor['id'] ?>"/>
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
<div style="display: inline-block">
<button class=" btn btn-primary" ><a href="index.php" style="width:10PX; font-size: 18px;color: white;"> BACK TO DASHBOARD</a></button>
<span aria-label="Page navigation example" style="float: right;
padding-left:250px;">
  <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link" href="index.php?page=<?= $Previous; ?>">Previous</a></li>
    <?php for ($i=1; $i <= $pages; $i++) : ?>
     <li class="page-item"><a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
<?php endfor ?>
    <li class="page-item"><a class="page-link" href="index.php?page=<?= $Next; ?>">Next</a></li>
  </ul>
</span>
</div>
</body>
<?php include_once "../partials/footer.php"; ?>
</html><?php 
// $dob = "1997-01-18";
// $today = date("Y-m-d h:i:s");
// $diff = date_diff(date_create($dob), date_create($today));
// $Age = $diff->y;
// $months = $diff->m;
// $days = $diff->d;
// $hours = $diff->h;
// $minutes = $diff->i;
// $seconds = $diff->s;
// //var_dump($diff);
// echo "Your age is: ".$Age."Years ".$months." Months ".$days." Days ".$hours." Hours ".$minutes." Minutes ".$seconds." Seconds old";
// ?>