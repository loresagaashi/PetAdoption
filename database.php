<?php
$hostname = "hostname";
$dbuser = "root";
$dbpassword = "";
$dbname = "registerlogin";


$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);

if (!$conn) {
    die("Connection failed " );
}
$conn->close();
?>
