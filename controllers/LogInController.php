<?php
include_once '../models/user.php';
include_once '../repository/UserRepository.php';

$emailError="";
if (isset($_POST['submitbtn'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Please fill all fields";
    } else {
        $userRepository = new UserRepository();
        $userEmail = $userRepository->getUserByEmail($email);

        if (!$userEmail) {
            $emailError = "Email not found!";
        } else {
            $users = $userRepository->getAllUsers();

            foreach ($users as $user) {
                if ($email == $user['email'] && $password == $user['password']) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['role'] = $user['role'];

                    header("location:../view/PetAdoption.php");
                    exit();
                }
            }
        }
    }
}

?>