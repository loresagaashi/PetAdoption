<?php 
include_once __DIR__ . '/../database/database.php';

class DogRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertDog($dog){
        $conn = $this->connection;

        $id = $dog->getId();
        $name = $dog->getName();
        $breed= $dog->getBreed();
        $color = $dog->getColor();
        $age = $dog->getAge();
        $gender = $dog->getGender();
        $size = $dog->getSize();
        $coatLength = $dog->getCoatLength();
        $image = $dog->getImage();

        $sql = "INSERT INTO dog (id, name, breed, color, age, gender, size, coatLength,image) VALUES (?,?,?,?,?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$breed,$color, $age, $gender, $size, $coatLength, $image]);
        echo "<script> alert('Dog has been inserted successfuly!') </script>";
    }

    function getAllDogs(){
        $conn = $this->connection;

        $sql = "SELECT * FROM dog";
        $statement = $conn->query($sql);
        $dog = $statement->fetchAll();

        return $dog;
    }
    
    function getDogById($id){
      $conn = $this->connection;

      $sql = "SELECT * FROM dog WHERE id='$id'";
      $statement=$conn->query($sql);
      $dog = $statement->fetch();

      return $dog;
    }


    function updateDog($id,$name,$breed,$color,$age,$gender, $size, $coatLength, $image){
        $conn = $this->connection;

        $sql = "UPDATE dog SET name=?,breed=?,color=?,age=?, gender=?, size=?, coatLength=?, image=? where id=?";
        echo($id);
        $statement = $conn->prepare($sql);

        $statement->execute([$name,$breed,$color,$age,$gender, $size, $coatLength, $image,$id]);
        // header("location: ../view/dashboard/dogTable.php");
    }

    function deleteDogById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM dog WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('Dog has been deleted successfuly!') </script>";
    }

    // function makeRez($hotelId,$userId,$phone,$numpeople,$checkin,$durability,$roompreference,$anythingelse){
    //     $conn = $this->connection;
        
    //     $sql = "INSERT INTO userhotel (hotid,userid,phonenumber,numpeople,checkin,durability,roompref,anythingelse) VALUES (?,?,?,?,?,?,?,?)";
        
    //     $statement = $conn->prepare($sql);
    //     $statement->execute([$hotelId,$userId,$phone,$numpeople,$checkin,$durability,$roompreference,$anythingelse]);
    //     echo "<script> alert('User has been inserted successfuly!') </script>";
    // }

    // function delRez($userId,$hotelId){
    //     $conn=$this->connection;

    //     $sql=" DELETE FROM userhotel WHERE HotID=? AND UserID=?";
    //     $statement=$conn->prepare($sql);
    //     $statement->execute([$hotelId,$userId]);
    //     echo "<script>alert('CourseUser has been inserted succesfully!')</script>";
    // }
    function getdogbyname($name){
        $conn = $this->connection;

      $sql = "SELECT * FROM dog WHERE name='$name'";
      $statement=$conn->query($sql);
      $dog = $statement->fetch();

      return $dog;
    }
}
?>