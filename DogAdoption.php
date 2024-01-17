<?php
session_start();

if (!isset($_SESSION['email']) &&  !isset($_COOKIE['auth_token'])) {
    header("location:LoginForm.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dog Adoption</title>
    <link rel="stylesheet" href="DogAdoption.css" />
</head>

<body>
    <header>
        <div class="header-nav">
            <div class="logo">
                <img src="./Photos/logo3.png" alt="Pet" />
                <a href="./PetAdoption.php"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./DogAdoption.php">DOGS & PUPPIES</a>
                <a href="./CatAdoption.php">CATS & KITTENS</a>
                <a href="#">ANIMAL HOSPITAL</a>
                <a href="#">ANIMAL SHELTERS</a>
                <a href="logout.php">LOG OUT</a>
            </div>
        </div>
    </header>
    <main>
        <div class="backgroundPhoto">
            <img id="slideshow" alt="">
            <button onclick="changeImg()"></button>
        </div>
        </div>
        <div class="banner-text">
            <h1>
                <div>Find yourself not just a furry friend</div>
                <div>but a lifetime bestfriend</div>
            </h1>
            <span>Pet Adoption and care</span>
        </div>
        <div class="home">
            <div class="section">
                <h1 class="title">Available dogs and puppies </h1>
                <!-- <h2 class="title">Adoptable Dogs</h2> -->
                <div class="section-list">
                    <div class="section-con">
                        <div class="section-item">
                            <a href=""></a>
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
                                <div class="seciton-button">
                                    <button>
                                        <a href="./BrianDetails.html">
                                            Adopt Me
                                        </a>
                                        <!-- Adopt Me -->
                                    </button>
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
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="#"> -->
                                        Adopt Me
                                        <!-- </a> -->

                                    </button>
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
                                    <p>Medium</p>
                                    <p>Puppy</p>
                                </div>
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="./DogAdoption.html"> -->
                                        Adopt Me
                                        <!-- </a> -->
                                        <!-- Adopt Me -->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-con">
                        <div class="section-item">
                            <a href=""></a>
                            <div class="img-pet">
                                <img class="section-img" src="./Photos/dogforadoption3.png" alt="dogforadoption1">
                            </div>
                            <div class="section-info">
                                <div class="info-gender">
                                    <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="info-name">Tod</div>
                                <div class="info-feature">
                                    <p>Big</p>
                                    <p>Adult</p>
                                </div>
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="./DogAdoption.html"> -->
                                        Adopt Me
                                        <!-- </a> -->

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home">
            <div class="section">
                <!-- <h2 class="title">Adoptable Cats</h2> -->
                <div class="section-list">
                    <div class="section-con">
                        <div class="section-item">
                            <a href=""></a>
                            <div class="img-pet">
                                <img class="section-img" src="./Photos/dogforadoption4.png" alt="dogforadoption1">
                            </div>
                            <div class="section-info">
                                <div class="info-gender">
                                    <img src="./Photos/female.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="info-name">Max</div>
                                <div class="info-feature">
                                    <p>Medium</p>
                                    <p>Adult</p>
                                </div>
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="./DogAdoption.html"> -->
                                        Adopt Me
                                        <!-- </a> -->
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="section-con">
                        <div class="section-item">
                            <a href=""></a>
                            <div class="img-pet">
                                <img class="section-img" src="./Photos/dogforadoption7.jpg" alt="dogforadoption1">
                            </div>
                            <div class="section-info">
                                <div class="info-gender">
                                    <img src="./Photos/female.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="info-name">Stella</div>
                                <div class="info-feature">
                                    <p>Big</p>
                                    <p>Adult</p>
                                </div>
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="./DogAdoption.html"> -->
                                        Adopt Me
                                        <!-- </a> -->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-con">
                        <div class="section-item">
                            <a href=""></a>
                            <div class="img-pet">
                                <img class="section-img" src="./Photos/dogforadoption8.jpg" alt="dogforadoption1">
                            </div>
                            <div class="section-info">
                                <div class="info-gender">
                                    <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="info-name">Bailey</div>
                                <div class="info-feature">
                                    <p>Small</p>
                                    <p>Baby</p>
                                </div>
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="./DogAdoption.html"> -->
                                        Adopt Me
                                        <!-- </a> -->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-con">
                        <div class="section-item">
                            <a href=""></a>
                            <div class="img-pet">
                                <img class="section-img" src="./Photos/dogforadoption133.png" alt="dogforadoption1">
                            </div>
                            <div class="section-info">
                                <div class="info-gender">
                                    <img src="./Photos/male.png" alt="" width="20px" height="20px">
                                </div>
                                <div class="info-name">Teddy</div>
                                <div class="info-feature">
                                    <p>Small</p>
                                    <p>Puppy</p>
                                </div>
                                <div class="seciton-button">
                                    <button>
                                        <!-- <a href="./DogAdoption.html"> -->
                                        Adopt Me
                                        <!-- </a> -->
                                    </button>
                                </div>
                            </div>
                        </div>
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
            let imgArray = ['./Photos/background6.png', './Photos/background8.png', './Photos/background9.png', './Photos/background20.png', './Photos/background123.jpg'];

            function changeImg() {
                document.getElementById('slideshow').src = imgArray[i];

                if (i < imgArray.length - 1) {
                    i++;
                }
                else {
                    i = 0;
                }
                setTimeout("changeImg()", 1000);
            }
            document.addEventListener(onload, changeImg());
        </script>
</body>

</html>