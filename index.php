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
      $statement = $pdo->prepare('SELECT * FROM pastor ORDER BY full_name ASC');
  }

  $statement->execute();
  $pastors = $statement->fetchAll(PDO::FETCH_ASSOC);

// include_once "../partials/header.php"; 
?>
 <!DOCTYPE html>
 <head>
  <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
  <link href="hmcss.css" rel="stylesheet"/>
  <link rel="stylesheet" href="static/lineawesome/css/line-awesome.min.css">

 </head>
 <style>
  body{
    background-color: silver;
    font-family: serif;
  }
</style>
<body>
  <input type="checkbox" id="nav-toggle">
  <div class="sidebar">
    <div class="sidebar-brand">
      <h3>
      <span class="las la-church"></span>PASTORS' RETIREMENT SYSTEM</h3>    
    </div>
    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="index.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
        </li>
        <li>
        <li>
          <a href=" viewpastor.php"><span class="las la-home"></span><span>Home</span></a>
        </li>
        <li>
          <a href="viewpastor.php"><span class="las la-table"></span>Pastor's Database<span></span></a>
        </li>
        <li>
          <a href="active.php"><span class="las la-user-check"></span><span>Active pastors</span></a>
        </li>
        <li>
          <a href="inactive.php"><span class="las la-user-lock"></span><span>Inactive pastors</span></a>
        </li>
        <li>
          <a href="pastorform.php"><span class="las la-user"></span><span>Register Pastor</span></a>
        </li>
        
        <li>
          <a href="changepassword.php"><span class="las la-exchange-alt"></span><span>Change Password</span></a>
        </li>
        <li>
          <a href="addadmin.php"><span class="las la-user-circle"></span>Register New Admin<span></span></a>
        </li>
      </ul>       
    </div>
  </div>
  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="las la-tachometer-alt"></span>
        </label>
        Dashboard
      </h2>
      <div class="search-wrapper"> 
        <span class= "las la-search "></span>
        <input type="search" placeholder="Search here">
      </div>
      <div class="user-wrapper">
      <img src="static/admin.png" width = "30px" height="30px" alt="">
      <div>
        <h4>Admin</h4>
        <small><a href="index.php?logout='1'" style="color: white; float: right 10px;" type="button" class="btn btn-sm btn-danger">LOGOUT</a></small>
      </div>
      </div>
    </header>
    <main>
      <div class="cards">
        <div class="card-single"> 
          <div>
          <span class="las la-users"></span>
          </div>
          <span><h5>All pastors</h5></span>
          <h1>
            <?php 
            $conn = new mysqli('localhost', 'root', '', 'pastors_db');
            $sql = "SELECT * FROM pastor";
            if ($result=mysqli_query($conn,$sql)) {
                $rowcount=mysqli_num_rows($result);
                echo $rowcount; 
            }
            ?>
          </h1>
        </div>
        
        <div class="card-single">
          <div>
          <span class="las la-user-check"></span>
          </div>
          <span><h5>Active pastors</h3></span>
          <h1>
            <?php 
            $conn = new mysqli('localhost', 'root', '', 'pastors_db');
            $sql = "SELECT * FROM pastor WHERE Status=1";
            if ($result=mysqli_query($conn,$sql)) {
                $rowcount=mysqli_num_rows($result);
                echo $rowcount; 
            }
            ?>
          </h1>
        </div>
        <div class="card-single">
          <div>
          <span class="las la-user-lock"></span>
         </div>
          <span><h5>Inactive pastors</h5></span>
          <h1>
            <?php 
            $conn = new mysqli('localhost', 'root', '', 'pastors_db');
            $sql = "SELECT * FROM pastor WHERE Status=0";
            if ($result=mysqli_query($conn,$sql)) {
                $rowcount=mysqli_num_rows($result);
                echo $rowcount; 
            }
            ?>
          </h1>
        </div>
      </div>
      <div class="recent-grid">
        <div class="projects"> 
          <div class="card">
            <div class="card-header">
              <h2>Pastors nearing retirement</h2>
              <button>See all <span class="las la-arrow-right"></span></button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Church</th>
                      <th>Pastorate</th>
                      <th>Service_years</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pastors as $i => $pastor) { ?>
                     <?php
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($pastor['year_of_birth']), date_create($today));
                    $age = $diff->y;
                    ?>
                    <?php if($age >69 ): ?>
                      <style>
                          td{
                            color: green;
                          }
                          th
                        </style> 
                      <tr>
                       <td><a href="pastorview.php?id=<?php echo $pastor['id'] ?>"><?php echo $pastor['full_name'] ?> </a></td>
                       <td><?php

                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($pastor['year_of_birth']), date_create($today));
                            echo $age = $diff->y;
                         ?></td>
                       <td><?php echo $pastor['gender'] ?></td>
                       <td><?php echo $pastor['church'] ?></td>
                       <td><?php echo $pastor['pastorate'] ?></td>

                    </tr>
                    <?php endif ?>   
                    
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="customers">
          <div class="card">
            <div class="card-header">
              <h4>Ready to retire</h4>
              <button>See all <span class="las la-arrow-right"></span></button>
            </div>
            <div class="card-body">
              <div class="customer">
                <div class="info">
                  <?php foreach ($pastors as $i => $pastor) { ?>
                     <?php
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($pastor['year_of_birth']), date_create($today));
                    $age = $diff->y;
                    ?>
                    <?php if($age >75): ?>
                    <a href="pastorview.php?id=<?php echo $pastor['id'] ?>">
                              <img style="width: 4rem; height:4rem; border-radius: 50%;" src="<?php echo $pastor['picture'] ?>" >
                    </a>
                    <div>
                      <h4>Name:<?php echo $pastor['full_name'] ?></h4>
                      <h4>Age:<?php echo $age ?></td></h4>
                      <small>Gender:<?php echo $pastor['gender'] ?></small>
                    </div>
                    <br>
                  <?php endif ?>       
                <?php } ?>
                </div>
                <div>
                  <span class="las la-user-circle"></span>
                </div>
              </div>
        </div>
        
      </div>
    </main>
  </div>
</body>
</html>
