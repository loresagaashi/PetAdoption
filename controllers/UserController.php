<?php 
include_once __DIR__ . '/../repository/UserRepository.php';
include_once __DIR__ . '/../models/user.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["firstName"];
    $breed = $_POST["lastName"];
    $color = $_POST["email"];
    $coatLength = $_POST["password"];
    $age = $_POST["phoneNumber"]; 
    $gender = $_POST["birthDate"];  
    $size = $_POST["role"];  

    if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phoneNumber) || empty($birthDate) || empty($role)){
        echo "All fields are required!";
    }else{
        $users = new User(null, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role);
        $userRepository = new UserRepository();
        $userRepository->insertUser($users);
        header("location: ../dashboard/dashboard.php");
    }
}
?>

