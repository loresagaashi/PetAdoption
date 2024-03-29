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
        $createdBy = $dog->getCreatedBy();
        $modifiedBy = $dog->getModifiedBy();

        $sql = "INSERT INTO dog (id, name, breed, color, age, gender, size, coatLength,image,createdBy,modifiedBy) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$breed,$color, $age, $gender, $size, $coatLength, $image, $createdBy, $modifiedBy]);
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


    function updateDog($id,$name,$breed,$color,$age,$gender, $size, $coatLength, $image, $createdBy, $modifiedBy){
        $conn = $this->connection;

        $sql = "UPDATE dog SET name=?,breed=?,color=?,age=?, gender=?, size=?, coatLength=?, image=?, createdBy=?, modifiedBy=? where id=?";
        echo($id);
        $statement = $conn->prepare($sql);

        $statement->execute([$name,$breed,$color,$age,$gender, $size, $coatLength, $image, $createdBy, $modifiedBy, $id]);
        // header("location: ../view/dashboard/dogTable.php");
    }

    function deleteDogById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM dog WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('Dog has been deleted successfuly!') </script>";
    }

    function getdogbyname($name){
        $conn = $this->connection;

      $sql = "SELECT * FROM dog WHERE name='$name'";
      $statement=$conn->query($sql);
      $dog = $statement->fetch();

      return $dog;
    }
}
?>