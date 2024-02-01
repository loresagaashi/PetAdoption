<?php include_once '../controllers/RegisterController.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="../register.css">
</head>

<body>
    <header>
        <div class="header-nav" style="background-color: transparent;">
            <div class="logo">
                <img src="../Photos/pet-logo.png" alt="Pet">
                <a href="./PetAdoption.php"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./DogAdoption.php">DOGS & PUPPIES</a>
                <a href="./CatAdoption.php">CATS & KITTENS</a>
                <a href="#">ANIMAL HOSPITAL</a>
                <a href="#">ANIMAL SHELTERS</a>
            </div>
        </div>

    </header>
    <div class="container">
        <!-- <div class="buttons">
            <button id="signUp" class="border-bottom" onclick="signUp()">Sign Up</button> -->
        <!-- <button id="signIn" class="sign-in" onclick="signIn()">Sign In</button> -->
        <!-- </div> -->
        <div class="form-box">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return submitForm(event)">
                <h1>Sign Up</h1>
                <div class="input-group">
                    <!-- Left column -->
                    <div class="input-group-left">
                        <div class="input-field left">
                            <input type="text" name="firstName" placeholder="First Name" id="firstName">
                        </div>
                        <div class="error-message" id="firstNameError"></div>
                        <p id="errorFName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="lastName" placeholder="Last Name" id="lastName">

                        </div>
                        <div class="error-message" id="lastNameError"></div>
                        <p id="errorLName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="email" placeholder="Email" id="email">

                        </div>
                        <?php
                        if (!empty($emailError)) {
                            echo "<p style='color: red;'>$emailError</p>";
                        }
                        ?>
                        <div class="error-message" id="emailError"></div>
                        <p id="errorEmail" style="color: red;">
                    </div>

                    <!-- Right column -->
                    <div class="input-group-right">
                        <div class="input-field right">
                            <input type="password" name="password" placeholder="Password" id="password">

                        </div>
                        <div class="error-message" id="passwordError"></div>
                        <p id="errorPassword" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="text" name="phoneNumber" placeholder="Phone Number" id="phoneNumber">

                        </div>
                        <div class="error-message" id="numberError"></div>
                        <p id="phoneNumberError" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="date" name="birthDate" id="date">

                        </div>
                        <div class="error-message" id="dateError"></div>
                        <p id="errorDate" style="color: red;"></p>
                    </div>

                    <a href="" id="forgotPassword" class="forgot-password"></a>
                    <p id="forgotPassword" class="forgot-password"></p>

                </div>
                <?php
                if (!empty($Error)) {
                    echo "<p style='color: red; font-size:16px;'>$Error</p>";
                }
                ?>
                <div class="btn-group">
                    <button type="submit" name="submit" id="submit">Sign up</button>
                </div>
                <div class="register">
                    <p>Already have an account? <a href="LogInForm.php">SIGN IN</a></p>
                </div>

            </form>
        </div>
    </div>
</body>
<script>
    // let signupBtn = document.getElementById("signupBtn");
    // let signinBtn = document.getElementById("signinBtn");
    // let signInButton = document.getElementById('signIn');
    // let signUpButton = document.getElementById('signUp');
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
        let phoneNumber = document.getElementById('phoneNumber').value.trim();
        let phoneNumberError = document.getElementById('phoneNumberError');

        firstNameError.innerText = '';
        lastNameError.innerText = '';
        emailError.innerText = '';
        passwordError.innerText = '';
        dateError.innerText = '';
        phoneNumberError.innerText = '';

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
        if (phoneNumber.length < 9) {
            phoneNumberError.innerText = 'Please enter a valid phone number!';
            event.preventDefault();
            return;
        }

        if (date === "") {
            dateError.innerText = 'Please enter your birth date!';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            firstNameError.innerText = "";
            lastNameError.innerText = "";
            emailError.innerText = "";
            passwordError.innerText = "";
            dateError.innerText = "";
            phoneNumberError.innerText = "";
        }
        clearErrorMessages();
    }
</script>

</html>
<?php
?>