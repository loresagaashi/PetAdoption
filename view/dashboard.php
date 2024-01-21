<?php
  session_start();
  if(!isset($_SESSION["user"])){
    header("Location: LogInForm.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to dashboard</h1>
        <a href="logout.php">Logout</a>
    </div>
    
</body>
</html>