<?php
session_start();
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cat Adoption</title>
    <link rel="stylesheet" href="../styles/CatAdoption.css" />
    <style>
        .hide {
            display: none;
        }
        .dog-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .section-con {
        width: 19%; 
        margin-bottom: 20px; 
        height: 500px;
    }

    .section-img {
        width: 100%;
        height: 80%; 
        object-fit: cover; 
    }
    @media (min-width: 320px) and (max-width: 620px) {

.section-con {
    width: 100%;
    margin-bottom: 20px;
    height: auto;
}

.section-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#section-con-m {
    width: 75%;
    height: 250px;
}
}

@media (min-width: 200px) and (max-width: 620px) {

.section-con {
    width: 100%;
    margin-bottom: 20px;
    height: auto;
}

.section-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#section-con-m {
    width: 75%;
    height: 250px;
}
}

@media (min-width: 481px) and (max-width: 1024px) {
.section-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}

.section-con {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    margin: 10px;
}

#section-con-m {
    width: 75%;
    height: 250px;
}
}



@media (min-width: 540px) and (max-width: 720px) {

.section-con {
    /* display: flex;
    flex-direction: column; */
    /* width: 50%;
    margin-bottom: 20px;
    height: auto; */
}

.section-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#section-con-m {
    width: 75%;
    height: 250px;
}
}
    </style>
</head>

<body>
    <header>
        <div class="header-nav">
            <div class="logo">
                <img src="../Photos/pet-logo.png" alt="Pet" />
                <a href="./PetAdoption.php"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./dashboard/dashboard.php" class="<?php echo $hide ?>">DASHBOARD</a>
                <a href="./DogAdoption.php">DOGS & PUPPIES</a>
                <a href="./CatAdoption.php">CATS & KITTENS</a>
                <a href="#">ANIMAL HOSPITAL</a>
                <a href="#">ANIMAL SHELTERS</a>
                <?php 
                    if (isset($_SESSION['email'])) {
                        echo '<a href="./logout.php"><img src="../Photos/logout2.png" width="25px" height="25px" alt=""></a>';
                    }
                    else {
                        echo '<a href="./LogInForm.php"><img src="../Photos/login.png" width="25px" height="25px" alt=""></a>';
                    }
                ?>
        </div>
    </header>
    <main>
        <div class="backgroundPhoto">
            <img id="slideshow" alt="">
            <button onclick="changeImg()"></button>
        </div>
        <div class="banner-text">
            <h1>
                <div>Find yourself not just a furry friend
                    but a lifetime bestfriend</div>
            </h1>
            <span>Pet Adoption and care</span>
        </div>
        <div class="home">
            <div class="section">
                <h1 class="title">Available cats and kittens </h1>
                <div class="section-list">
                    <?php
                    include_once '../models/cat.php';
                    include_once '../repository/CatRepository.php';
                    
                    $catRepository = new CatRepository();
                    $cats = $catRepository->getAllCats();
                    $catCounter = 0;
                    ?>
                    <?php
                    foreach ($cats as $cat) {
                            ?>
                            <div class="section-con">
                                <div class="section-item">
                                    <a href=""></a>
                                    <a href="./CatDetails.php?id=<?=$cat['id']?>">
                                    <div class="img-pet">
                                        <img class="section-img" src=<?= '../Photos/' . $cat['image'] ?> alt="dogforadoption1"
                                            >
                                    </div>
                                    </a>
                                    <div class="info-gender">
                                        <?php
                                        if (strtolower($cat['gender']) == 'male') {
                                            echo '<img src="../Photos/male.png" alt="" width="20px" height="20px">';
                                        } else {
                                            echo '<img src="../Photos/female.png" alt="" width="20px" height="20px">';
                                        }
                                        ?>
                                    </div>
                                    <div class="section-info">
                                        <div class="info-name">
                                            <?= $cat['name'] ?>
                                        </div>
                                        <div class="info-feature">
                                            <p>
                                                <?= $cat['breed'] ?>
                                            </p>
                                            <p>
                                                <?= $cat['size'] ?>
                                            </p>
                                        </div>
                                        <div class="seciton-button">
                                            <button>
                                                <a href="./CatDetails.php?id=<?=$cat['id']?>">
                                                    Adopt Me
                                                </a>
                                                <!-- Adopt Me -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
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
                            <a href="https://www.facebook.com/" class="li-facebook"><img src="../Photos/fb-logo.png"
                                    alt=""></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" class="li-instagram"><img src="../Photos/instagram.png"
                                    alt=""></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" class="li-x"><img src="../Photos/xlogo.png" alt=""></a>
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
            let imgArray = ['../Photos/bgCAT3.png', '../Photos/bgCAT2.png', '../Photos/bgCAT.png', '../Photos/bgCAT1.png', '../Photos/bgCAT4.png'];

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