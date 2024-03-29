<?php
include_once '../repository/UserRepository.php';
include_once '../models/user.php';
$emailError = "";
$Error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthDate = $_POST["birthDate"];
    $phoneNumber = $_POST["phoneNumber"];
    $role = 'user';

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($birthDate) || empty($phoneNumber)) {
        $Error = "All fields are required!";
    } else {
        $userRepository = new UserRepository();
        $userEmail = $userRepository->getUserByEmail($email);
        if ($userEmail) {
            $emailError = "This email exists! Please try another one";
        } else {

            $user = new User(null, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role);
            $userRepository = new UserRepository();
            $userRepository->insertUser($user);
            header("location: ../view/LogInForm.php");
        }
    }
}
?>