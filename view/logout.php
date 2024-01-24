<?php
  session_start();
  
  session_destroy();

  // header("location:LoginForm.php");
  header("location:PetAdoption.php");
?>