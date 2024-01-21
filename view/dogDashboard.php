<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:LogIn.php");
}else{
    if($_SESSION['admin']!=1){
        header("location:PetAdoption.php");
    }else{
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
	<style  type="text/css">

.button1{
            color: grey;
            border: none;
            font-size: 16px;
            /* padding:10% 30%; */
            background-color: #e6a6cc;
        }
        a{
            text-decoration: none;
        }
   .button {
  background-color: ; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 100px;
}   
.button {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
  
}

.button:hover {
  background-color: #4CAF50;
  color: white;
}
        body{
            color:black;
            background-color: #333;
        }
        .table1{
            width:100%;
            padding:2px;
            border-color:white;
            background-color:grey;
            text-align:center;
        }
            
    </style>

</head>
<body>
<ul class="nav">
        <li style="float:left"><a  href="../projektiweb/anywheretravel.php">Dog Adoption</a></li>
        <!-- <li><a href="kycu.php">Kyçu</a></li> -->
        <?php 
        
        if(isset($_SESSION['email'])){
          echo"<li><a href='../controller/LogOut.php'>LogOut</a></li>";
          echo"<li><a href='../view/Bookings.php'>Reservations</a></li>";
        }else{
          echo"
          <li><a href='kycu.php'>kycu</a></li>";
        }
        ?> 
        <li><a href="../projektiweb/kontakti.php">Kontakti</a></li>
        <li><a href="../projektiweb/galeria.php">Galeria</a></li>
        <!-- <li><a href="booking.php">Bileta Online</a></li> -->
        <li><a href="../projektiweb/aboutus.php">Rreth nesh</a></li>
        <li><a href="../projektiweb/anywheretravel.php">Kryefaqja</a></li>
          
        <?php

			if(isset($_SESSION['email'])){
        if($_SESSION['admin']==1){
				echo"<li><a href='../view/dashboard.php'>dashboard</a></li>";
                echo"<li><a href='../view/StaffDash.php'>Staff Management</a></li>";
                echo"<li><a href='../view/hotDashboard.php'>Hotels</a></li>";}
                
			}else{
			
			}

			?>
    
      </ul>
    <table border="2" class="table1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Image</th>
            <th>Capacity</th>
            
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        include_once '../repository/DogRepository.php';
        $DogRepository  = new DogRepository();
        $hotels = $DogRepository->getAllDogs();
        foreach($dogs as $dog){
           echo 
           "
           <tr>
               <td>$dog[HotID]</td>
               <td>$dog[HotName]</td>
               <td>$dog[HotLocation]</td>
               <td>$dog[HotImage]</td>
               <td>$dog[HotCapacity]</td>
               
               
              
              

               <td><div style='width: 100%; height: 100%;'>
               <button  class='button1' style='width: 100%; height: 100%;'>
               <a href='edithotel.php?ID=$dog[HotID]'>Edit</a>
             </button>
               </div>
               </td>
               <td>
               <div style='width: 100%; height: 100%;'>
               <button  class='button1' style='width: 100%; height: 100%;'>
               <a href='delhotel.php?ID=$dog[HotID]'>Delete</a>
             </button>
           </tr>



           </tr>
           ";
        }
        
        
        ?>
    </table>
    <a href="addDog.php">
    <input type="button" value="Add" class="button" />
    </a>
   
</body>
</html>
<?php
    }
}
?>