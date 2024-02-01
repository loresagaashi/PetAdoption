<?php
include_once __DIR__ . '/../repository/DogRepository.php';
include_once __DIR__ . '/../models/dog.php';
include_once __DIR__ . '/../repository/UserRepository.php';
$Error = "";
$genderError = "";
$nameError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $breed = $_POST["breed"];
    $color = $_POST["color"];
    $coatLength = $_POST["coatLength"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $size = $_POST["size"];
    $image = $_POST["image"];

    if (empty($name) || empty($breed) || empty($color) || empty($coatLength) || empty($age) || empty($gender) || empty($size) || empty($image)) {
        $Error = "All fields are required!";
    } else if ($name !== ucfirst($name)) {
        $nameError = "Name must start with an uppercase letter!";
    } else if ($gender !== "Female" && $gender !== "Male") {
        $genderError = "Invalid gender!";
    } else {
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $userRepository = new UserRepository();
            $user = $userRepository->getUserById($id);
            $dog = new Dog(null, $name, $breed, $color, $age, $gender, $size, $coatLength, $image, $user['firstName'], '');
            $dogRepository = new DogRepository();
            $dogRepository->insertDog($dog);
            header("location: ../dashboard/dashboard.php");
        }
    }
}
?>