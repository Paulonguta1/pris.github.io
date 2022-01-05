<?php
/** @var $pdo \PDO */
require_once "../database.php";
include_once "../functions.php";
include_once "../partials/header.php";


$id = $_GET['id'] ?? null;
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($errors)) {
        
        require_once "../validate.php";

        $statement = $pdo->prepare("UPDATE pastor SET full_name = :full_name, gender = :gender, year_of_birth =  :year_of_birth, phone_no = :phone_no, email = :email, national_id = :national_id, church = :church, pastorate = :pastorate, area = :area, ward = :ward, sub_county = :sub_county, county = :county, picture = :picture, full_namenk = :full_namenk, gendernk = :gendernk, year_of_birthnk = :year_of_birthnk, phone_nonk = :phone_nonk, emailnk = :emailnk, national_idnk = :national_idnk, relationship = :relationship, picturenk = :picturenk WHERE id  = :id");


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
            //$statement->bindValue(':age', $age);
            $statement->bindValue(':full_namenk', $full_namenk);
            $statement->bindValue(':gendernk', $gendernk);
            $statement->bindValue(':year_of_birthnk', $year_of_birthnk);
            $statement->bindValue(':phone_nonk', $phone_nonk);
            $statement->bindValue(':emailnk', $emailnk);
            $statement->bindValue(':national_idnk', $national_idnk);
            $statement->bindValue(':relationship', $relationship);
            $statement->bindValue(':picturenk', $imagePathnk);
            $statement->bindValue(':id', $id);


        $statement->execute();
        header('Location: viewpastor.php');
}
}

?>
<?php include_once "../partials/header.php"; ?>

<h3 align="center">Edit Pastor: <b><?php echo $pastors['full_name']."'s Details" ?></b></h3>

<?php include_once"../pastors/form.php"; ?>


</body>
<?php include_once "../partials/footer.php"; ?>
</html>