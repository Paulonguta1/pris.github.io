<?php
/** @var $pdo \PDO */
require_once "../database.php";

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: viewpastor.php');
    exit;
}
$Status ='';
$pastors['Status'] = $Status = 1;
$statement = $pdo->prepare('UPDATE pastor SET Status = :Status WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->bindValue(':Status', $Status);
$statement->execute();

header('Location: viewpastor.php');