<?php
    class DatabaseConnection{
        private $server="127.0.0.1";
        private $username="root";
        private $password="";
        private $database = "petadoption";

        function startConnection(){
            try{
                $conn = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch(PDOException $e){
                echo "Lidhja me bazen e te dhenave deshtoi! ".$e->getMessage();
                return null;
            }
        }
    }
?>