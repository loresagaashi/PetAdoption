<?php 
include_once __DIR__ . '/../database/database.php';

class CatRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertCat($cat){
        $conn = $this->connection;

        $id = $cat->getId();
        $name = $cat->getName();
        $breed= $cat->getBreed();
        $color = $cat->getColor();
        $age = $cat->getAge();
        $gender = $cat->getGender();
        $size = $cat->getSize();
        $coatLength = $cat->getCoatLength();
        $image = $cat->getImage();
        $createdBy = $cat->getCreatedBy();
        $modifiedBy = $cat->getModifiedBy();

        $sql = "INSERT INTO cat (id, name, breed, color, age, gender, size, coatLength,image, createdBy, modifiedBy) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$breed,$color, $age, $gender, $size, $coatLength, $image, $createdBy, $modifiedBy]);
        echo "<script> alert('Cat has been inserted successfuly!') </script>";
    }

    function getAllCats(){
        $conn = $this->connection;

        $sql = "SELECT * FROM cat";
        $statement = $conn->query($sql);
        $cat = $statement->fetchAll();

        return $cat;
    }


    function getCatById($id){
      $conn = $this->connection;

      $sql = "SELECT * FROM cat WHERE id='$id'";
      $statement=$conn->query($sql);
      $cat = $statement->fetch();

      return $cat;
    }


    function updateCat($id,$name,$breed,$color,$age,$gender, $size, $coatLength, $image, $createdBy, $modifiedBy){
        $conn = $this->connection;

        $sql = "UPDATE cat SET name=?,breed=?,color=?,age=?, gender=?, size=?, coatLength=?, image=?, createdBy=?, modifiedBy=? where id=?";
        echo($id);
        $statement = $conn->prepare($sql);

        $statement->execute([$name,$breed,$color,$age,$gender, $size, $coatLength, $image, $createdBy, $modifiedBy,$id]);
        echo "<script> alert('Cat has been updated successfuly!') </script>";
    }

    function deleteCatById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM cat WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('Cat has been deleted successfuly!') </script>";
    }

    function getcatbyname($name){
        $conn = $this->connection;

      $sql = "SELECT * FROM cat WHERE name='$name'";
      $statement=$conn->query($sql);
      $cat = $statement->fetch();

      return $cat;
    }
}
?>