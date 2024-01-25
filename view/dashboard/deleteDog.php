<?php
session_start();
include_once '../../repository/DogRepository.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID parameter not found in the URL.";
}

$dogRepository = new DogRepository();
$dogRepository->deleteDogById($id);

header("location:./dogTable.php");
?>