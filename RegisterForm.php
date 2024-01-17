<?php
session_start();
$hide = "";
$firstNameError = "";
$lastNameError = "";
$passwordError = "";
$phonenumberError = "";
$emailError = "";
$emailExists = "";
if (isset($_POST['submitbtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once 'users.php';
    $emailExists = false;

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $emailExists = true;
            $emailError = "Email already exists! Please try another one";
            break;
        }
    }

    if (!$emailExists) {
        // Email doesn't exist, proceed with registration
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = 'user';
        header("location: LogInForm.php");
        exit();
    }
}
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="PetAdoption.css">
    <link rel="stylesheet" href="LoginForm.css">
</head>

<body>
    <header>
        <div class="header-nav">
            <div class="logo">
                <img src="./Photos/logo3.png" alt="Pet">
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
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return submitForm(event)">
            <h1>Sign Up</h1>
                <div class="input-group">
                    <div class="input-field" id="firstNameField">
                        <input type="text" placeholder="First Name" id="firstName">
                    </div>
                    <div class="error-message" id="firstNameError"></div>
                    <p id="errorFName" style="color: red;"></p>

                    <div class="input-field" id="lastNameField">
                        <input type="text" placeholder="Last Name" id="lastName">
                    </div>
                    <div class="error-message" id="lastNameError"></div>
                    <p id="errorLName" style="color: red;"></p>

                    <div class="input-field" id="emailField">
                        <input type="text" name="email" placeholder="Email" id="email">
                    </div>
                    <div class="error-message" id="emailError"></div>
                    <p id="errorEmail" style="color: red;"></p>

                    <div class="input-field" id="passwordField">
                        <input type="password" name="password" placeholder="Password" id="password">
                    </div>
                    <div class="error-message" id="passwordError"></div>
                    <p id="errorPassword" style="color: red;"></p>

                    <div class="input-field" id="numberField">
                        <input type="text" name="phonenumber" placeholder="Phone Number" id="phonenumber">
                    </div>
                    <div class="error-message" id="numberError"></div>
                    <p id="phonenumberError" style="color: red;"></p>

                    <div class="input-field" id="dateField">
                        <input type="date" id="date">
                    </div>
                    <div class="error-message" id="dateError"></div>
                    <p id="errorDate" st yle="color: red;" aria-placeholder="Enter your birthday"></p>
                    <a href="" id="forgotPassword" class="forgot-password"></a>
                    <?php
                    if ($emailExists) {
                        echo "<p style='color: red;'>$emailError</p>";
                    }
                    ?>
                    <!-- <p id="forgotPassword" class="forgot-password"></p> -->
                </div>
                <div class="btn-group">
                    <button type="submit" name="submitbtn" id="submit">Submit</button>
                </div>
                <div class="register">
                <p>Already have an account? <a href="LogInForm.php">SIGN IN</a></p>
            </div> 
               
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-module">
            <div class="footer-module2">
                <div class="footer-module-message">
                    <p>You want to get the latest information on Pet Adoption? <br><b>Please Sign up to
                            continue</b></br></p>
                </div>
                <div class="footer-module-link">
                    <a href="./RegisterForm.php">Sign Up</a>
                </div>
            </div>
        </div>
        <ul class="footer-list">
            <li class="footer-item">
                <a href="./AboutUs.html">About Us</a>
            </li>
            <li class="footer-item">
                <a href="#">Contact Us</a>
            </li>
            <li class="footer-item">
                <a href="#">Privacy Policy</a>
            </li>
            <li class="footer-item">
                <a href="#">Terms of Service</a>
            </li>
        </ul>

        </div>
        <div class="sub-footer-inner">
            <div class="sub-footer-social">
                <ul class="hArray">
                    <li>
                        <!-- <a href="#" class="li-facebook"><img src="C:\Users\lores\Desktop\UBT\Semestri III\Web\Pet Adoption\Photos\fb-logo.png" alt=""></a> -->
                        <a href="#" class="li-facebook"><img src="./Photos/fb-logo.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" class="li-instagram"><img src="./Photos/instagram.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" class="li-x"><img src="./Photos/xlogo.png" alt=""></a>
                    </li>
                </ul>
            </div>
            <div class="sub-footer-body">
                <p class="sub-footer-copyright">
                    ©
                    "2023"
                    PetAdoption.com
                </p>
                <p class="sub-footer-trademark">
                    All trademark are owned by PetAdoption, or used with permission
                </p>
            </div>
        </div>
    </footer>
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
        // let phonenumberRegex = /^\+\d{3} \d{3}-\d{3}$/;
        // if(!phonenumberRegex.test(phonenumber.value)){
            if(phonenumber<8) {
            phonenumberError.innerText='Please enter a valid phone number!';
            event.preventDefault();
            return;
        }
    }
    function clearErrorMessages() {
        // errorFName.innerHTML = "";
        // errorLName.innerHTML = "";
        // errorEmail.innerHTML = "";
        // errorPassword.innerHTML = "";
        // errorDate.innerHTML = "";
        firstNameError.innerText = "";
        lastNameError.innerText = "";
        emailError.innerText = "";
        passwordError.innerText = "";
    }
</script>

</html>