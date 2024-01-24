<?php
session_start();
include_once '../../repository/DogRepository.php';
$id = $_GET['id'];//e merr id prej url

$dogRepository = new DogRepository();
$dogRepository->deleteDogById($id);

header("location:./dogTable.php");
?>