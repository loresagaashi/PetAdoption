<?php 
include_once __DIR__ . '/../database/database.php';

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

      $sql = "SELECT * FROM users WHERE id='$id'";
      $statement=$conn->query($sql);
      $users = $statement->fetch();

      return $users;
    }


    function updateUser($id,$firstName,$lastName,$email,$password,$phoneNumber, $birthDate,$role){
        $conn = $this->connection;

        $sql = "UPDATE users SET firstName=?,lastName=?,email=?,password=?, phoneNumber=?, birthDate=?, role=? where id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$firstName,$lastName,$email,$password,$phoneNumber,$birthDate,$role, $id]);
        echo "<script> alert('User has been updated successfuly!') </script>";
    }

    function deleteUserById($id){
        $conn = $this->connection;
    
        try {
            $sql = "DELETE FROM users WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            header("location: ./userTable.php");
            exit();
        } catch (PDOException $e) {
            echo "Error deleting user: " . $e->getMessage();
        }
    }
    

    function getuserbyemail($email){
        $conn = $this->connection;

      $sql = "SELECT * FROM users WHERE email='$email'";
      $statement=$conn->query($sql);
      $users = $statement->fetch();

      return $users;
    }
}
?>