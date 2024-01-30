<?php
session_start();
include_once '../../controllers/CatController.php';
$hide = "";
    if(isset($_SESSION['role'])) {
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
                        echo '<a href="./logout.php"><img src="../../Photos/logout2.png" width="25px" height="25px" alt=""></a>';
                    }
                    else {
                        echo '<a href="./LogInForm.php"><img src="../../Photos/login.jpg" width="25px" height="25px" alt=""></a>';
                    }
                ?>
            </div>
        </div>

    </header>
    <div class="container">
        <div class="form-box">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" onsubmit="return submitForm(event)">
            <h1>Add a cat</h1>
                <div class="input-group">
                    <!-- Left column -->
                    <div class="input-group-left">
                    <div class="input-field left">
                    <input type="text" name="name" placeholder="Name" id="name">
                        <div class="error-message" id="nameError"></div>
                        <p id="errorName" style="color: red;"></p>
                    </div>
                    <div class="input-field left">
                    <input type="text" name="breed" placeholder="Breed" id="breed">
                        <div class="error-message" id="breedError"></div>
                        <p id="errorBreed" style="color: red;"></p>
                    </div>
                    <div class="input-field left">
                        <input type="text" name="color" placeholder="Color" id="color">
                        <div class="error-message" id="colorError"></div>
                        <p id="errorColor" style="color: red;"></p>
                    </div>
                    <div class="input-field left">
                    <input type="text" name="coatLength" placeholder="Coat length" id="coatLength">
                        <div class="error-message" id="coatLengthError"></div>
                        <p id="errorCoatLength" style="color: red;"></p>
                    </div>
                    </div>
           
                    <!-- Right column -->
                <div class="input-group-right">
                <div class="input-field right">
                        <input type="number" name="age" placeholder="Age" id="age">
                        <div class="error-message" id="ageError"></div>
                        <p id="errorAge" style="color: red;"></p>
                    </div>
                    <div class="input-field right">
                        <input type="text" name="gender" placeholder="Gender" id="gender">
                        <div class="error-message" id="genderError"></div>
                        <p id="errorGender" style="color: red;"></p>
                    </div>
                    <div class="input-field right">
                    <input type="text" name="size" placeholder="Size" id="size">
                        <div class="error-message" id="sizeError"></div>
                        <p id="errorSize" style="color: red;"></p>
                    </div>
                    <div class="input-field right">
                    <input type="file" name="image" placeholder="Cat image" id="image">
                        <div class="error-message" id="imageError"></div>
                        <p id="errorImage" style="color: red;"></p>
                    </div>
                </div>
                    <a href="" id="forgotPassword" class="forgot-password"></a>
                    <!-- <p id="forgotPassword" class="forgot-password"></p> -->
                    <!-- <?php
                    if ($emailExists) {
                        echo "<p style='color: red; font-weight: bold;'>$emailError</p>";
                    }
                    ?> -->
                </div>
                <div class="btn-group">
                    <button type="submit" name="submitBtn" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    let signupBtn = document.getElementById("signupBtn");
    let signinBtn = document.getElementById("signinBtn");
    let signInButton = document.getElementById('signIn');
    let signUpButton = document.getElementById('signUp');
    let submit = document.getElementById("submit");

    function submitForm(event) {
        let firstName = document.getElementById("firstName").value.trim();
        let firstNameError = document.getElementById('firstNameError');
        let lastName = document.getElementById("lastName").value.trim();
        let lastNameError = document.getElementById('lastNameError');
        let email = document.getElementById("email").value.trim();
        let emailError = document.getElementById('emailError');
        let password = document.getElementById("password").value.trim();
        let passwordError = document.getElementById('passwordError');
        let date = document.getElementById("date").value.trim();
        let dateError = document.getElementById('dateError');
        let phonenumber = document.getElementById('phonenumber');
        let phonenumberError = document.getElementById('phonenumberError');

        firstNameError.innerText = '';
        lastNameError.innerText = '';
        emailError.innerText = '';
        passwordError.innerText = '';

        let firstNameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!firstNameRegex.test(firstName)) {
            firstNameError.innerText = 'Please enter a valid first name!';
            event.preventDefault();
            return;
        }

        let lastNameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!lastNameRegex.test(lastName)) {
            lastNameError.innerText = 'Please enter a valid last name!';
            event.preventDefault();
            return;
        }

        let emailRegex = /^[^\@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerText = 'Please enter a valid email!';
            event.preventDefault();
            return;
        }

        if (password.length < 8) {
            passwordError.innerText = 'Please enter a valid password!';
            event.preventDefault();
            return;
        }
        if (phonenumber < 9) {
            phonenumberError.innerText = 'Please enter a valid phone number!';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            firstNameError.innerText = "";
            lastNameError.innerText = "";
            emailError.innerText = "";
            passwordError.innerText = "";
        }
    }
</script>
</html>