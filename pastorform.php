<?php

/** @var $pdo \PDO */
require_once "../database.php";
include_once "../functions.php";

 
$full_name = '';
$gender = '';
$national_id = '';
$church = '';
$area = '';
$ward = '';
$sub_county = '';
$county = '';
$pastorate = '';
$year_of_birth = '';
$phone_no = '';
$email = '';
$picture ='';
$today = date("Y-m-d");
$age = '';
$full_namenk = '';
$gendernk = '';
$year_of_birthnk = '';
$phone_nonk = '';
$emailnk = '';
$national_idnk = '';
$relationship = '';
$picturenk = '';
$errors = [];
$pastors = [
		'picture' => ''
	];
$pastors = [
		'picturenk' => ''
	];
$age = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	require_once "../validate.php";

	if(empty($errors)){

		$statement = $pdo->prepare("INSERT INTO pastor (full_name, gender, year_of_birth, phone_no, email, national_id, church, pastorate, area, ward, sub_county, county, picture, age, full_namenk, gendernk, year_of_birthnk, phone_nonk, emailnk, national_idnk, relationship, picturenk)
	                VALUES (:full_name, :gender, :year_of_birth, :phone_no, :email, :national_id, :church, :pastorate, :area, :ward, :sub_county, :county, :picture, :age, :full_namenk, :gendernk, :year_of_birthnk, :phone_nonk, :emailnk, :national_idnk,:relationship, :picturenk)");

	        //$statement->bindValue(':id', $id);
	        $statement->bindValue(':full_name', $full_name);
	        $statement->bindValue(':gender', $gender);
	        $statement->bindValue(':year_of_birth', $year_of_birth);
	        $statement->bindValue(':phone_no', $phone_no);
	        $statement->bindValue(':email', $email);
	        $statement->bindValue(':national_id', $national_id);
	        $statement->bindValue(':church', $church);
	        $statement->bindValue(':pastorate', $pastorate);
	        $statement->bindValue(':area', $area);
	        $statement->bindValue(':ward', $ward);
	        $statement->bindValue(':sub_county', $sub_county);
	        $statement->bindValue(':county', $county);
	        $statement->bindValue(':picture', $imagePath);
	        $statement->bindValue(':age', $age);
	        $statement->bindValue(':full_namenk', $full_namenk);
	        $statement->bindValue(':gendernk', $gendernk);
	        $statement->bindValue(':year_of_birthnk', $year_of_birthnk);
	        $statement->bindValue(':phone_nonk', $phone_nonk);
	        $statement->bindValue(':emailnk', $emailnk);
	        $statement->bindValue(':national_idnk', $national_idnk);
	        $statement->bindValue(':relationship', $relationship);
	        $statement->bindValue(':picturenk', $imagePathnk);

	        $statement->execute();

	        header('location: viewpastor.php');
}      
}



?>
<?php include_once "../partials/header.php"; ?>

<style>
  body{
    background-color: silver;
  }
  body{
  	font-family: serif;
  }
</style>
<?php include_once "../partials/header.php"; ?>
<?php include_once"../pastors/pastordetails.php"; ?>

</body>
<?php include_once "../partials/footer.php"; ?>
</html>
