<?php
include_once '../models/user.php';
include_once '../repository/UserRepository.php';


if(isset($_POST['submitbtn'])){
    if(empty($_POST['email'])||empty($_POST['password'])){
        echo "Please fill all fields";
    }else{
        $email=$_POST['email'];
        $password=$_POST['password'];

        $userRepository=new UserRepository();

        $users=$userRepository->getAllUsers();
        
        foreach($users as $user){
            if($email == $user['email'] && $password == $user['password']){
                session_start();
                $_SESSION['id']=$user['id'];
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                $_SESSION['role']=$user['role'];

                header("location:../view/PetAdoption.php");
                exit();
            }
            
        }
    }
}

?>