<?php
include_once '../controllers/LogInController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="../Login.css">
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
 
        <div class="form-box">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return submitForm(event)">
            <h1>Log In</h1>
                <div class="input-group">
        

                    <div class="input-field" id="emailField">
                        <input type="text" name="email" placeholder="Email" id="email">
                    </div>
                    <div class="error-message" id="emailError"></div>
                    <p id="errorEmail" style="color: red;"></p>
                    <?php
                if (!empty($emailError)) {
                    echo "<p style='color: red;'>$emailError</p>";
                }
               
                ?>
                    <div class="input-field" id="passwordField">
                        <input type="password" name="password" placeholder="Password" id="password">
                    </div>
                    <div class="error-message" id="passwordError"></div>
                    <p id="errorPassword" style="color: red;"></p>
                    <?php
                if (!empty($passwordError)) {
                    echo "<p style='color: red;'>$passwordError</p>";
                }
                ?>
               
                    <div class="remember-forgot">
                
                <div class="forgot">
                <a href="#">Forgot password?</a>
                </div>
                    </div>
                    <br>
                 
                </div>
                <div class="btn-group">
                    <button type="submit" name="submitbtn" id="submit">Login</button>
                </div>
               
            <div class="register">
                <p>Don't have an account? <a href="RegisterForm.php">SIGN UP</a></p>
            </div> 
            <div class="register-social">
                <p>OR SIGN UP USING</p>
                <ul class="hArray">
                    <li>
                        <a href="#" class="li-facebook"><img src="../Photos/fb-logo.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" class="li-instagram"><img src="../Photos/instagram.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" class="li-x"><img src="../Photos/xlogo2.png" alt=""></a>
                    </li>
                </ul>

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
        let email = document.getElementById("email").value.trim();
        let emailError = document.getElementById('emailError');
        let password = document.getElementById("password").value.trim();
        let passwordError = document.getElementById('passwordError');
   
        emailError.innerText = '';
        passwordError.innerText = '';
        
        if(email==="") {
            emailError.innerText = 'Please enter an email!';
            event.preventDefault();
            return;
        }
        let emailRegex = /^[^\@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerText = 'Please enter a valid email!';
            return;
        }
        if(password === ""){
                passwordError.innerText = 'Please enter a password!';
                event.preventDefault();
                return;
            }
        if (password.length < 8) {
            passwordError.innerText = 'Please enter a valid password!';
            return;
        }
    }
</script>

</html>
<?php
?>