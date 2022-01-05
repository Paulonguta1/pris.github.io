<?php 

session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pastors_db';


// variable declaration
$username = "";
$email    = "";
$errors   = array(); 
$full_name = "";
$gender ="";
$national_id = "";
$church = "";
$area = "";
$ward = "";
$sub_county = "";
$county = "";
$pastorate = "";
$year_of_birth = "";
$phone_no = "";
$email = "";
$picture = "";
$age = "";
$status ="";
$full_namenk = "";
$gendernk = "";
$year_of_birthnk = "";
$phone_nonk = "";
$emailnk = "";
$national_idnk = "";
$relationship = "";
$picturenk = "";


// connect to database
$db = mysqli_connect('localhost', 'root', '', 'pastors_db');

if(mysqli_connect_errno()){
	die(mysqli_connect_error());
}

else{
	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}
} 

// call the login() function if login_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: viewpastor.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function randomString($n){
	$str = '';
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	for ($i=0; $i <$n ; $i++) { 
		$index = rand(0, strlen($characters) -1);
		$str = $characters[$index];
	}
	return $str;
}  

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	$query = "SELECT * FROM admin WHERE username='$username'LIMIT 1";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);

	if ($user) { // if user exists
      if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    }

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO admin (username, password) 
				  VALUES('$username', '$password')";
		mysqli_query($db, $query);

		// get id of the created user
		$_SESSION['success']  = "You have registered an admin succesfully";
		header('location: login.php');				
	}
}

// escape string
function   e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function isLoggedIn()
{
	if (isset($_SESSION['username'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

//changepassword
if (isset($_POST['changepassword_btn'])) {
	changepassword();
}

function changepassword(){
	global $db, $errors;
	$username =$_SESSION['username'];
	$current_password =e($_POST['current_password']);
	$new_password =  e($_POST['new_password']);
	$confirm_password  =  e($_POST['confirm_password']);
	$query = "SELECT password FROM admin WHERE username='$username'LIMIT 1";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);

    if (empty($user['password'])) {
		array_push($errors, "Please login first");
		header('location: login.php');	
	}

    if (empty($current_password)) {
		array_push($errors, "Current Password is required");
	}
	if(md5($current_password) != $user['password']){
		array_push($errors, "Current password is incorrect");
	}
	if (empty($new_password)) {
		array_push($errors, "New Password is required");
	}
	if (empty($confirm_password)) {
		array_push($errors, "Please confirm password");
	}

	if ($new_password != $confirm_password) {
		array_push($errors, "The two passwords do not match");
	}
	if(md5($new_password) === $user['password']){
		array_push($errors, "You cannot use the old password");
	}

	if (count($errors) == 0) {
		$password1 = md5($new_password);//encrypt the password before saving in the database
		$query = "UPDATE admin SET password='" .$password1. "' WHERE username='" . $username . "'";
		mysqli_query($db, $query);
		// get id of the created user
		$_SESSION['success']  = "Password succesfully changed";
		header('location: login.php');				
	}
}


