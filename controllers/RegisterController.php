<?php 
include_once '../repository/UserRepository.php';
include_once '../models/user.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthDate = $_POST["birthDate"]; 
    $phoneNumber = $_POST["phoneNumber"];  
    $role = 'user';

    echo($birthDate);

    if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($birthDate) || empty($phoneNumber)){
        echo "All fields are required!";
    }else{
        $user = new User(null, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role);
        $userRepository = new UserRepository();
        $userRepository->insertUser($user);
        header("location: ../view/PetAdoption.php");
    }
}
?>