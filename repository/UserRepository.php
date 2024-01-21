<?php 
include '../database/database.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $id = $user->getId();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $phoneNumber = $user->getPhoneNumber();
        $birthDate = $user->getBirthDate();
        $role = $user->getRole();

        $sql = "INSERT INTO users (id, firstName, lastName, email, password, phoneNumber, birthDate, role) VALUES (?,?,?,?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$firstName,$lastName,$email, $password, $phoneNumber, $birthDate, $role]);
        echo "<script> alert('User has been inserted successfuly!') </script>";
    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM users";
        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserByUsernameAndPassword($username,$password){
      
    }

    function getUserById($id){
      $conn = $this->connection;

      $sql = "SELECT * FROM user WHERE id='$id'";
      $statement=$conn->query($sql);
      $user = $statement->fetch();

      return $user;
    }


    function updateUser($id,$name,$email,$password,$admin){
        $conn = $this->connection;

        $sql = "UPDATE user SET name=?,email=?,password=?,admin=? where id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$name,$email,$password,$admin,$id]);
        echo "<script> alert('User has been updated successfuly!') </script>";
    }

    function deleteUserById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('User has been deleted successfuly!') </script>";
    }

    function makeRez($hotelId,$userId,$phone,$numpeople,$checkin,$durability,$roompreference,$anythingelse){
        $conn = $this->connection;
        
        $sql = "INSERT INTO userhotel (hotid,userid,phonenumber,numpeople,checkin,durability,roompref,anythingelse) VALUES (?,?,?,?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$hotelId,$userId,$phone,$numpeople,$checkin,$durability,$roompreference,$anythingelse]);
        echo "<script> alert('User has been inserted successfuly!') </script>";
    }

    function delRez($userId,$hotelId){
        $conn=$this->connection;

        $sql=" DELETE FROM userhotel WHERE HotID=? AND UserID=?";
        $statement=$conn->prepare($sql);
        $statement->execute([$hotelId,$userId]);
        echo "<script>alert('CourseUser has been inserted succesfully!')</script>";
    }
    function getuserbyemail($email){
        $conn = $this->connection;

      $sql = "SELECT * FROM user WHERE email='$email'";
      $statement=$conn->query($sql);
      $user = $statement->fetch();

      return $user;
    }
}
?>