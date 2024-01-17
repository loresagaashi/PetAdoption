<?php
session_start();
$hide = "";
if (!isset($_SESSION['email']))
    header("location:LoginForm.php");
else {
    if ($_SESSION['role'] == "admin")
        $hide = "";
    else
        $hide = "hide";
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pet Adoption</title>
        <link rel="stylesheet" href="PetAdoption.css" />
        <link rel="stylesheet" href="RegisterLoginForm.css" />
        <style>
            .hide {
                display: none;
            }
        </style>
    </head>

    <body>
        <header>
            <div class="header-nav">
                <div class="logo">
                    <img src="./Photos/logo3.png" alt="Pet" />
                    <a href="./PetAdoption.php"><strong>Pet Adoption</strong></a>
                </div>
                <div class="left">
                    <a href="#" class="<?php echo $hide ?>">DASHBOARD</a>
                    <a href="./DogAdoption.php">DOGS & PUPPIES</a>
                    <a href="./CatAdoption.php">CATS & KITTENS</a>
                    <a href="#">ANIMAL HOSPITAL</a>
                    <a href="#">ANIMAL SHELTERS</a>
                    <a href="./logout.php">LOG OUT</a>
                </div>
            </div>
        </header>
        <main>
            <div class="banner">
                <div class="backgroundPhoto">

                </div>
                <div class="banner-text">
                    <h1>
                        <div>Find yourself not just a furry friend</div>
                        <div>but a lifetime bestfriend</div>
                    </h1>
                    <span>Pet Adoption and care</span>
                </div>
                <div class="banner-tool-wrap">
                    <div class="banner-tool">
                        <div class="banner-con">
                            <div class="tool-item">
                                <a href="./DogAdoption.php">
                                    <img src="./Photos/dog2.png" alt="">
                                    <p>Dog Adoption</p>
                                </a>
                            </div>
                            <div class="tool-item">
                                <a href="./CatAdoption.php">
                                    <img src="./Photos/cat.png" alt="">
                                    <p>Cat Adoption</p>
                                </a>
                            </div>
                            <div class="tool-item">
                                <a href="Animal Hospital"></a>
                                <img src="./Photos/animal.png" alt="">
                                <p>Animal Hospital</p>
                            </div>
                            <div class="tool-item">
                                <a href="Animal Shelter"></a>
                                <img src="./Photos/shelter.png" alt="">
                                <p>Animal Shelter</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home">
                <div class="section">
                    <h1 class="title">Recommend</h1>
                    <h2 class="title">Adoptable Dogs</h2>
                    <div class="section-list">
                        <div class="section-con">
                            <div class="section-item">
                                <a href=""></a>
                                <a href="./BrianDetails.php">
                                    <div class="img-pet">
                                        <img class="section-img" src="./Photos/briandetails11.png" alt="dogforadoption1"
                                            width="143px" height="191px">
                                    </div>
                                </a>
                                <div class="info-gender">
                                    <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="section-info">
                                    <div class="info-name">Brian</div>
                                    <div class="info-feature">
                                        <p>Small</p>
                                        <p>Puppy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-con">
                            <div class="section-item">
                                <a href=""></a>
                                <div class="img-pet">
                                    <img class="section-img" src="./Photos/dogforadoption11.png" alt="dogforadoption1">
                                </div>
                                <div class="info-gender">
                                    <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="section-info">
                                    <div class="info-name">Ari</div>
                                    <div class="info-feature">
                                        <p>Big </p>
                                        <p>Adult</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-con">
                            <div class="section-item">
                                <a href=""></a>
                                <div class="img-pet">
                                    <img class="section-img" src="./Photos/dogforadoption2.png" alt="dogforadoption1">
                                </div>
                                <div class="section-info">
                                    <div class="info-gender">
                                        <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                    </div>
                                    <div class="info-name">Ollie</div>
                                    <div class="info-feature">
                                        <p>Small</p>
                                        <p>Puppy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-con" id="section-con-m">
                            <a class="link" href="./DogAdoption.php">
                                <div class="section-item-more">
                                    <img src="./Photos/dog2.png" alt="" width="30%" height="30%">
                                    <p>DOGS</p>
                                    <p>View more dogs available</p>
                                    <div class="go">
                                        <img src="./Photos/arrow.png" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home">
                <div class="section">
                    <h2 class="title">Adoptable Cats</h2>
                    <div class="section-list">
                        <div class="section-con">
                            <div class="section-item">
                                <a href=""></a>
                                <div class="img-pet">
                                    <img class="section-img" src="./Photos/catforadoption1.png" alt="dogforadoption1">
                                </div>
                                <div class="section-info">
                                    <div class="info-gender">
                                        <img src="./Photos/female.png" alt="" width="20px" height="20px">
                                    </div>
                                    <div class="info-name">Albie</div>
                                    <div class="info-feature">
                                        <p>Medium</p>
                                        <p>Adult</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-con">
                            <div class="section-item">
                                <a href=""></a>
                                <div class="img-pet">
                                    <img class="section-img" src="./Photos/catforadoption2.png" alt="dogforadoption1">
                                </div>
                                <div class="section-info">
                                    <div class="info-gender">
                                        <img src="./Photos/female.png" alt="" width="20px" height="20px">
                                    </div>
                                    <div class="info-name">Doc</div>
                                    <div class="info-feature">
                                        <p>Small</p>
                                        <p>Baby</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-con">
                            <div class="section-item">
                                <a href=""></a>
                                <div class="img-pet">
                                    <img class="section-img" src="./Photos/catforadoption3.png" alt="dogforadoption1">
                                </div>
                                <div class="section-info">
                                    <div class="info-gender">
                                        <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                    </div>
                                    <div class="info-name">Zombie</div>
                                    <div class="info-feature">
                                        <p>Small</p>
                                        <p>Baby</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-con" id="section-con-m">
                            <a class="link" href="./CatAdoption.php">
                                <div class="section-item-more">
                                    <img src="./Photos/cat.png" alt="" width="30%" height="30%">
                                    <p>CATS</p>
                                    <p>View more cats available</p>
                                    <div class="go">
                                        <img src="./Photos/arrow.png" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
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
                        <a href="./AboutUs.php">About Us</a>
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
        </main>
    </body>

    </html>
    <?php
}
?>