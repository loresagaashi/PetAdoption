<?php
session_start();
include_once '../../repository/CatRepository.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID parameter not found in the URL.";
}

$catRepository = new CatRepository();
$catRepository->deleteCatById($id);

header("location:./catTable.php");
?>