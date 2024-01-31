<?php
session_start();
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    <link rel="stylesheet" href="../styles/PetAdoption2.css" />
    <style>
        .hide {
            display: none;
        }

        .section-con {
            width: 15%;
            margin-bottom: 20px;
            height: 400px;
        }

        .section-img {
            width: 100%;
            height: 80%;
            object-fit: cover;
        }

        #section-con-m {
            width: 15%;
            height: 250px;
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
        <div class="header-nav" style="background-color: transparent;">
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
                } else {
                    echo '<a href="./LogInForm.php"><img src="../Photos/login.png" width="25px" height="25px" alt=""></a>';
                }
                ?>
            </div>
        </div>
    </header>
    <main>
        <div class="banner">
            <div class="backgroundPhoto">
                <img src="../Photos/bg.png" alt="" width='100%' height='100%'>
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
                                <img src="../Photos/dog2.png" alt="">
                                <p>Dog Adoption</p>
                            </a>
                        </div>
                        <div class="tool-item">
                            <a href="./CatAdoption.php">
                                <img src="../Photos/cat.png" alt="">
                                <p>Cat Adoption</p>
                            </a>
                        </div>
                        <div class="tool-item">
                            <a href="Animal Hospital"></a>
                            <img src="../Photos/animal.png" alt="">
                            <p>Animal Hospital</p>
                        </div>
                        <div class="tool-item">
                            <a href="Animal Shelter"></a>
                            <img src="../Photos/shelter.png" alt="">
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
                    <?php
                    include_once '../models/dog.php';
                    include_once '../repository/DogRepository.php';

                    $dogRepository = new DogRepository();
                    $dogs = $dogRepository->getAllDogs();
                    $dogCounter = 0;
                    ?>
                    <?php
                    foreach ($dogs as $dog) {
                        if ($dogCounter < 3) {
                            $dogCounter++;
                            ?>
                            <div class="section-con">
                                <div class="section-item">
                                    <a href=""></a>
                                    <a href="./BrianDetails.php?id=<?= $dog['id'] ?>">
                                        <div class="img-pet">
                                            <img class="section-img" src=<?= '../Photos/' . $dog['image'] ?>
                                                alt="dogforadoption1" width="143px" height="191px">
                                        </div>
                                    </a>
                                    <div class="info-gender">
                                        <?php
                                        if (strtolower($dog['gender']) == 'male') {
                                            echo '<img src="../Photos/male.png" alt="" width="20px" height="20px">';
                                        } else {
                                            echo '<img src="../Photos/female.png" alt="" width="20px" height="20px">';
                                        }
                                        ?>
                                    </div>
                                    <div class="section-info">
                                        <div class="info-name">
                                            <?= $dog['name'] ?>
                                        </div>
                                        <div class="info-feature">
                                            <p>
                                                <?= $dog['breed'] ?>
                                            </p>
                                            <p>
                                                <?= $dog['size'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="section-con" id="section-con-m">
                        <a class="link" href="./DogAdoption.php">
                            <div class="section-item-more">
                                <img src="../Photos/dog2.png" alt="" width="30%" height="30%">
                                <p>DOGS</p>
                                <p>View more dogs available</p>
                                <div class="go">
                                    <img src="../Photos/arrow.png" alt="">
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
                    <?php
                    include_once '../models/cat.php';
                    include_once '../repository/CatRepository.php';

                    $catRepository = new CatRepository();
                    $cats = $catRepository->getAllCats();
                    $catCounter = 0;
                    ?>
                    <?php
                    foreach ($cats as $cat) {
                        if ($catCounter < 3) {
                            $catCounter++;
                            ?>
                            <div class="section-con">
                                <div class="section-item">
                                    <a href=""></a>
                                    <a href="./CatDetails.php?id=<?= $cat['id'] ?>">
                                        <div class="img-pet">
                                            <img class="section-img" src=<?= '../Photos/' . $cat['image'] ?> alt="catforadoption"
                                                width="143px" height="191px">
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
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="section-con" id="section-con-m">
                        <a class="link" href="./CatAdoption.php">
                            <div class="section-item-more">
                                <img src="../Photos/cat.png" alt="" width="30%" height="30%">
                                <p>CATS</p>
                                <p>View more cats available</p>
                                <div class="go">
                                    <img src="../Photos/arrow.png" alt="">
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
    </main>
</body>

</html>
<?php

?>