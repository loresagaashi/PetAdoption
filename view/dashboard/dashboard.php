<?php
session_start();
$hide = "";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin")
        $hide = "";
    else
        $hide = "hide";
} else {
    $hide = "hide";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../dashboard-new.css">
    <style>
        .hide {
            display: none;
        }

        header {
            font-weight: 500;
            background: transparent;
            backdrop-filter: blur(20px);
        }
    </style>
</head>

<body>
    <header>
        <div class="header-nav">
            <div class="logo">
                <img src="../../Photos/pet-logo.png" alt="Pet">
                <a href="../PetAdoption.php"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./dashboard.php" class="<?php echo $hide ?>">DASHBOARD</a>
                <a href="../DogAdoption.php">DOGS & PUPPIES</a>
                <a href="../CatAdoption.php">CATS & KITTENS</a>
                <a href="#">ANIMAL HOSPITAL</a>
                <a href="#">ANIMAL SHELTERS</a>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<a href="../logout.php"><img src="../../Photos/logout2.png" width="25px" height="25px" alt=""></a>';
                } else {
                    echo '<a href="../LogInForm.php"><img src="../../Photos/login.jpg" width="25px" height="25px" alt=""></a>';
                }
                ?>
            </div>
        </div>
    </header>
    <main>
        <!-- <div class="container-top">
                <h2>Welcome to Dashboard, what function do you want to use</h2>
            </div> -->
        <div class="container">

            <div class="box">
                <div class="box1">
                    <a href="userTable.php">
                        <button class="button">VIEW USERS</button>
                    </a>
                </div>
                <div class="box1">
                    <a href="dogTable.php">
                        <button class="button">VIEW DOGS</button>
                    </a>
                </div>
                <div class="box1">
                    <a href="./catTable.php">
                        <button class="button">VIEW CATS</button>
                    </a>
                    <!-- </div>
                <div class="box1">
                    <button class="button">UPDATE</button>
                </div>
                <div class="box1">
                    <button class="button">DELETE</button>
                </div>
            </div> -->
                </div>
    </main>
</body>

</html>