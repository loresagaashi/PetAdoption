<?php
session_start();
include_once '../../controllers/DogController.php';
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
    <title>INSERT</title>
    <link rel="stylesheet" href="../../formDog.css">
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-nav" style="background-color: transparent;">
            <div class="logo">
                <img src="../../Photos/pet-logo.png" alt="Pet">
                <a href="../PetAdoption.php"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./dashboard.php" class="<?php echo $hide ?>">DASHBOARD</a>
                <a href="./DogAdoption.php">DOGS & PUPPIES</a>
                <a href="./CatAdoption.php">CATS & KITTENS</a>
                <a href="#">ANIMAL HOSPITAL</a>
                <a href="#">ANIMAL SHELTERS</a>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<a href="../logout.php"><img src="../../Photos/logout2.png" width="25px" height="25px" alt=""></a>';
                } else {
                    echo '<a href="../LogInForm.php"><img src="../../Photos/login.png" width="25px" height="25px" alt=""></a>';
                }
                ?>
            </div>
        </div>

    </header>
    <div class="container">
        <div class="form-box">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return submitForm(event)">
                <h1>Add a dog</h1>
                <div class="input-group">
                    <!-- Left column -->
                    <div class="input-group-left">
                        <div class="input-field left">
                            <input type="text" name="name" placeholder="Name" id="name">

                        </div>
                        <?php
                        if (!empty($nameError)) {
                            echo "<p style='color: red; font-size: 16px;'>$nameError</p>";
                        }
                        ?>
                        <div class="error-message" id="nameError"></div>
                        <p id="errorName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="breed" placeholder="Breed" id="breed">
                        </div>
                        <div class="error-message" id="nameError"></div>
                        <p id="errorName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="color" placeholder="Color" id="color">

                        </div>
                        <div class="error-message" id="nameError"></div>
                        <p id="errorName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="coatLength" placeholder="Coat length" id="coatLength">

                        </div>
                       
                        <div class="error-message" id="nameError"></div>
                        <p id="errorName" style="color: red;"></p>
                    </div>

                    <!-- Right column -->
                    <div class="input-group-right">
                        <div class="input-field right">
                            <input type="number" name="age" placeholder="Age" id="age">
                        </div>
                        <div class="error-message" id="nameError"></div>
                        <p id="errorName" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="text" name="gender" placeholder="Gender" id="gender">

                        </div>
                        <?php
                        if (!empty($genderError)) {
                            echo "<p style='color: red; font-size: 16px;'>$genderError</p>";
                        }
                        ?>
                        <div class="error-message" id="genderError"></div>
                        <p id="errorGender" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="text" name="size" placeholder="Size" id="size">

                        </div>
                      
                        <div class="error-message" id="genderError"></div>
                        <p id="errorGender" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="file" name="image" placeholder="Dog image" id="image">
                        </div>
                    </div>
                    <a href="" id="forgotPassword" class="forgot-password"></a>
                    <!-- <p id="forgotPassword" class="forgot-password"></p> -->

                </div>
                <?php
                if (!empty($Error)) {
                    echo "<p style='color: red; font-size: 16px;'>$Error</p>";
                }
                ?>
                <div class="btn-group">
                    <button type="submit" name="submitBtn" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- <script>
    function submitForm(event) {
        let name = document.getElementById("name").value.trim();
        let gender = document.getElementById("gender").value.trim();

        let nameError = document.getElementById('nameError');
        let genderError = document.getElementById('genderError');

        nameError.innerText = '';
        genderError.innerText = '';


        let nameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!nameRegex.test(name)) {
            nameError.innerText = 'Please enter a valid name!';
            event.preventDefault();
            return;
        }
        let allowedGenders = ["Female", "Male"];
        if (!allowedGenders.includes(gender)) {
            genderError.innerText = 'Gender does not exist';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            nameError.innerText = "";
            submitError.innerText = '';
        }
        clearErrorMessages();
    }

</script> -->


</html>