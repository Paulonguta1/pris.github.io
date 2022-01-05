<?php
/** @var $pdo \PDO */
require_once "../database.php";

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: viewpastor.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM pastor WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: viewpastor.php');