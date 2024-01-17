<?php
session_start();
  if(isset($_SESSION["user"])){
    header("Location: dashboard.php");
  }
// session_start();
// $hide = "";
// $loginError = "";
// $emailError="";
// $passwordError="";


// if (isset($_POST['login'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     require_once"database.php";
//     $sql=" SELECT * FROM users WHERE email='$email'";
//     $result=mysqli_query($conn,$sql);
//     $user=mysqli_fetch_array($result, MYSQLI_ASSOC);
//     if($user){
//         if(password_verify($password,$user["password"])){
//             session_start();
//             $SESSION["user"]="yes";
//             header("Location: dashboard.php");
//             die();
//         }else{
//              echo"<div class=;alert alert-danger'>Password does not match!</div>"
//         }
//         }
//     }else{
//         echo"<div class=;alert alert-danger'>Email does not match!</div>"
//     }
// }


if (isset($_POST['submitbtn'])) {
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once 'users.php';
    $emailExists = false;
    $loginSuccess = false;

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $emailExists = true;

            if ($user['password'] == $password) {
                $loginSuccess = true;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $user['role'];
                $_SESSION['loginTime'] = date("H:i:s");
                header("location:PetAdoption.php");
                exit();
            } else {
                $passwordError = "Incorrect Password!";
            }
        }
    }

    if (!$emailExists) {
        $emailError = "Incorrect Email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="PetAdoption.css">
    <link rel="stylesheet" href="LogInForm.css">
</head>

<body>
    <header>
        <div class="header-nav">
            <div class="logo">
                <img src="./Photos/logo3.png" alt="Pet">
                <a href="./PetAdoption.html"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./DogAdoption.html">DOGS & PUPPIES</a>
                <a href="./CatAdoption.html">CATS & KITTENS</a>
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
                        <a href="#" class="li-facebook"><img src="./Photos/fb-logo.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" class="li-instagram"><img src="./Photos/instagram.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" class="li-x"><img src="./Photos/xlogo2.png" alt=""></a>
                    </li>
                </ul>

            </div>
            </form>
        </div>
    </div>
    <!-- <footer class="footer">
        <div class="footer-module">
            <div class="footer-module2">
                <div class="footer-module-message">
                    <p>You want to get the latest information on Pet Adoption? <br><b>Please Sign up to
                            continue</b></br></p>
                </div>
                <div class="footer-module-link">
                    <a href="./RegisterLoginForm.html">Sign Up</a>
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

        </div> -->
        <!-- <div class="sub-footer-inner">
            <div class="sub-footer-social">
                <ul class="hArray">
                    <li>
                         <a href="#" class="li-facebook"><img src="C:\Users\lores\Desktop\UBT\Semestri III\Web\Pet Adoption\Photos\fb-logo.png" alt=""></a> -->
                        <!-- <a href="#" class="li-facebook"><img src="./Photos/fb-logo.png" alt=""></a>
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
    </footer>  -->
</body>
<script>
    let signupBtn = document.getElementById("signupBtn");
    let signinBtn = document.getElementById("signinBtn");
    let signInButton = document.getElementById('signIn');
    let signUpButton = document.getElementById('signUp');
    let submit = document.getElementById("submit");
    // function signUp() {
    //     signUpButton.classList.add('border-bottom');
    //     signInButton.classList.remove('border-bottom');
    //     clearErrorMessages();
    //     forgotPassword.innerHTML = ''
    //     firstNameField.style.maxHeight = "60px";
    //     dateField.style.maxHeight = "60px";
    //     lastNameField.style.maxHeight = "60px";
    //     signupBtn.classList.remove("disable");
    //     signinBtn.classList.add("disable");
    //     paragraphs.style.display = "block";
    // }
    // function signIn() {
    //     signInButton.classList.add('border-bottom');
    //     signUpButton.classList.remove('border-bottom');

    //     clearErrorMessages();
    //     forgotPassword.innerHTML = 'Forgot your password? Click here!'
    //     firstNameField.style.maxHeight = "0";
    //     dateField.style.maxHeight = "0";
    //     lastNameField.style.maxHeight = "0";
    //     paragraphs.style.display = "none";
    // }
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
        // let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?!.*\s)[a-zA-Z\d!@#$%^&*]{6,16}$/;
        // if (!passwordRegex.test(password)) {
        if (password.length < 8) {
            passwordError.innerText = 'Please enter a valid password!';
            return;
        }
    }
</script>

</html>