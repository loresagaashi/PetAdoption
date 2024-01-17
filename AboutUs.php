<?php
session_start();

// if (!isset($_SESSION['email']) &&  !isset($_COOKIE['auth_token'])) {
//     header("location:LoginForm.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    <link rel="stylesheet" href="AboutUs.css">
    <link rel="stylesheet" href="RegisterLoginForm.css" >
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
                <!-- <a href="./RegisterLoginForm.html">SIGN UP</a> -->
                <a href="./logout.php"><img src="./Photos/logout2.png" width="25px" height="25px" alt=""></a>
            </div>
        </div>
    </header>
    <main>
        <div class=" main-index">
            <div class="index-content">
                <div class="content">
                    <div class="slider">
                        <img alt="" id="slideshow">
                        <button class="btn prev" onclick="prev()">
                            <p>&laquo;</p>
                        </button>
                        <button class="btn next" onclick="next()">
                            <p>&raquo;</p>
                        </button>
                    </div>
                    <br>
                    <div class="about_us">
                        <h1>About Us</h1>
                        <p>Pets TheCountyOffice is a resourceful website that is dedicated to offering accurate
                            and up-to-date information on pet adoption to help pet lovers find their perfect pet companion. 
                            At Pets.thecountyoffice, you can find detailed information about pet breeds, rescue clubs,
                            nearby animal hospitals, valuable guidance on feeding and precautions.</p>    
                        <h3>Our Features</h3>
                        <p>Pets TheCountyOffice strives to make the adoption process as seamless as possible.
                         From searching for an ideal available pet in your area to breeding it with professional tips,
                         Pets TheCountyOffice supports you every step of the wa:</p>
            
                         <p>1. Comprehensive Pet Profiles. Whether you're looking for a playful pup, a cuddly kitten,
                            or a loyal companion, we have a wide variety of animals waiting to find their forever homes.
                            We provide detailed profiles of each pet, including their breed, age, gender, temperament,
                             and any special needs they may have.</p>
            
                         <p>2. Corresponding Pet Care Locations. Pet owners can easily find animal shelters,
                            rescue organizations, and reputable breeders nearby to facilitate the adoption process.
                            We are passionate about promoting responsible pet ownership and ensuring the well-being of animals.</p>
            
                         <p>3. Adoption Resources and Education. We offer a wealth of educational resources and guides on pet care, training,
                            feeding and the responsibilities of pet ownership. This ensures new pet owners have the knowledge and
                            resources necessary to provide a loving and nurturing environment for their new furry friend.</p>
            
                         <p>Start your journey towards pet adoption today and give every pet a chance at a happy and fulfilling life.</p>
            
                         <h3>Disclaimer</h3>
            
                         <p>The information provided on Pets TheCountyOffice regarding pet adoption is intended for general informational purposes only.
                            While we strive to provide accurate and up-to-date information, we make no representations or warranties of any kind,
                            express or implied, about the completeness, accuracy, reliability, suitability, or availability of the information contained on the website.</p>
            
                         <p>Pet adoption is a complex process that involves various factors, including but not limited to the availability of pets,
                            adoption policies of different organizations, and individual circumstances of potential adopters. We strongly recommend
                            conducting thorough research and seeking professional advice before making any decisions related to pet adoption.</p>
            
                         <p>Furthermore, we do not endorse or guarantee the availability, health, behavior,
                            or temperament of any specific pet listed on our website or through any linked resources.
                            The adoption process, including but not limited to application procedures, fees, and requirements,
                            may vary among different adoption agencies, shelters, or rescue organizations.
                            It is the responsibility of the user to directly contact the relevant organizations for accurate and up-to-date information.</p>
            
                         <p>In no event will we be liable for any loss or damage, including without limitation,
                            indirect or consequential loss or damage, or any loss or damage whatsoever arising from the use or reliance on the information provided on Pets.thecountyoffice.</p>
                    </div>
                    <br>
                    <div class="map">
                        <h2>Where can you find us?</h2>
                        <br>
                        <h3>Map to our location:</h3>
                        <br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46965.77799594501!2d21.12571752314643!3d42.632503667118534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549c5e3bc3081b%3A0x7879057d173f21d6!2sVozhde%20Karaxhorxhe!5e0!3m2!1sen!2s!4v1704402584490!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        
        </main>

        <footer class="footer">
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
                    <a href="#">About Us</a>
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
                            <a href="https://www.facebook.com/" class="li-facebook"><img src="./Photos/fb-logo.png"
                                    alt=""></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" class="li-instagram"><img src="./Photos/instagram.png"
                                    alt=""></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" class="li-x"><img src="./Photos/xlogo.png" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="sub-footer-body">
                    <p class="sub-footer-copyright">
                        ©
                        2023
                        PetAdoption.com
                    </p>
                    <p class="sub-footer-trademark">
                        All trademark are owned by PetAdoption, or used with permission
                    </p>
                </div>
            </div>
        </footer>
        <script>
            let i = 0;
            let img = ['./Photos/bg1.jpg', './Photos/bg6.png', './Photos/bg5.png', './Photos/bg7.jpg'];
    
            function next() {
                document.getElementById('slideshow').src = img[i];
                if (i < img.length - 1) {
                    i++;
                }
                else {
                    i = 0;
                }
    
            }
            function prev() {
                if (i == 0) {
                    i = img.length - 1;
                }
                else {
                    i--;
                }
                document.getElementById('slideshow').src=img[i];
            }
            document.addEventListener(onload, next());              
        </script>
</body>
</html>