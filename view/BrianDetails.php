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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brian</title>
    <link rel="stylesheet" href="../styles/BrianDetails.css">
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
        </div>
    </header>
    <main>
        <?php
          include_once '../repository/DogRepository.php';
          $dogId = isset($_GET['id']) ? $_GET['id'] : null;

          if ($dogId !== null) {
              $dogRepository = new DogRepository();
              $dog = $dogRepository->getDogById($dogId);
          } else {
              echo "Error: 'id' is not set in the URL.";
          }
        ?>
        <div class="main main-common" style="height: auto !important;">
            <div class="container">
                <div class="detail-title">
                    <h1><?=$dog['name']?></h1>
                    <img src="../Photos/<?=strtolower($dog['gender'])?>.png" alt="" width="50px" height="50px">
                </div>
            </div>
            <div class="main-bottom">
                <div class="test">
                    <div class="container" style="height: auto !important;">
                        <div class="animal-info">
                            <div class="slider">
                                <img alt="" id="slideshow">
                                <button class="btn prev" onclick="prev()">
                                    <p>&laquo;</p>
                                </button>
                                <button class="btn next" onclick="next()">
                                    <p>&raquo;</p>
                                </button>
                            </div>

                            <!-- <div class="animal-img">
                                <img src="./Photos/dogforadoption3.png" alt="">
                            </div> -->
                            <table cellpadding="0" cellspacing="0" class="animal-table">
                                <tbody></tbody>
                                <tr>
                                    <td>Breed</td>
                                    <td><?=$dog['breed']?></td>
                                </tr>
                                <tr>
                                    <td>Color</td>
                                    <td><?=$dog['color']?></td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td><?=$dog['age']?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?=$dog['gender']?></td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td><?=$dog['size']?></td>
                                </tr>
                                <tr>
                                    <td>Coat Length</td>
                                    <td><?=$dog['coatLength']?></td>
                                </tr>

                            </table>
                        </div>
                        <div class="animal-detail-item animal-about">
                            <div class="animal-subtitle">
                                <h3>About Me</h3>
                            </div>
                            <div class="about-list">
                                <div class="about-item">
                                    <div class="about-top">
                                        <img src="../Photos/dog2.png" alt="">
                                        <span class="about-text">Characteristics</span>
                                    </div>
                                    <div class="about-des">
                                        Friendly
                                    </div>
                                </div>
                                <div class="about-item">
                                    <div class="about-top">
                                        <img src="../Photos/animal.png" alt="">
                                        <span class="about-text">Health</span>
                                    </div>
                                    <div class="about-des">
                                        Vaccinated
                                    </div>
                                </div>
                                <div class="about-item">
                                    <div class="about-top">
                                        <img src="../Photos/trained.png" alt="">
                                        <span class="about-text">House-trained</span>
                                    </div>
                                    <div class="about-des">
                                        Trained
                                    </div>
                                </div>
                                <div class="about-item">
                                    <div class="about-top">
                                        <img src="../Photos/shelter.png" alt="">
                                        <span class="about-text">Good in a home with</span>
                                    </div>
                                    <div class="about-des">
                                        Children,Dogs
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="animal-detail-item animal-contact">
                            <div class="animal-subtitle">
                                <h3>Contact Me</h3>
                                <div class="about-me">
                                    Adopt Me
                                </div>
                            </div>
                            <div class="contact-list">
                                <div class="contact-item">
                                    <img src="../Photos/shelter.png" alt="">
                                    <p class="contact-text">Pet Adoption</p>
                                </div>
                                <div class="contact-item">
                                    <img src="../Photos/location.png" alt="">
                                    <p class="contact-text">1000 Prishtine, Kosove</p>
                                </div>
                                <div class="contact-item">
                                    <img src="../Photos/phone.png" alt="">
                                    <p class="contact-text">(+383) 45-444-777</p>
                                </div>
                                <div class="contact-item">
                                    <img src="../Photos/email.png" alt="">
                                    <p class="contact-text">petadoption@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aside" style="height: auto !important;">
                        <div class="aside-tool">
                            <h2>Find a Furry Friend</h2>
                            <div class="aside-tool-list">
                                <div class="aside-tool-con">
                                    <div class="aside-tool-item">
                                        <a class="link-cover" href="./DogAdoption.php"></a>
                                        <img class="icon-tool" src="../Photos/dog2.png" alt="">
                                        <p>Dog Adoption</p>
                                    </div>
                                </div>
                                <div class="aside-tool-con">
                                    <div class="aside-tool-item">
                                        <a class="link-cover" href="./CatAdoption.php"></a>
                                        <img class="icon-tool" src="../Photos/cat.png" alt="">
                                        <p>Cat Adoption</p>
                                    </div>
                                </div>
                                <div class="aside-tool-con">
                                    <div class="aside-tool-item">
                                        <a class="link-cover" href=""></a>
                                        <img class="icon-tool" src="../Photos/shelter.png" alt="">
                                        <p>Animal Hospital</p>
                                    </div>
                                </div>
                                <div class="aside-tool-con">
                                    <div class="aside-tool-item">
                                        <a class="link-cover" href=""></a>
                                        <img class="icon-tool" src="../Photos/animal.png" alt="">
                                        <p>Animal Shelter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        let imgArr = []
        for(j=1; j < 4; j++){
            let img = `../Photos/<?=strtolower($dog['name'])?>details${j}.png`;
            imgArr.push(img);
        };
        
        function next() {
            document.getElementById('slideshow').src = imgArr[i];
            if (i < imgArr.length - 1) {
                i++;
            }
            else {
                i = 0;
            }

        }

        function prev() {
            if (i == 0) {
                i = imgArr.length - 1;
            }
            else {
                i--;
            }
            document.getElementById('slideshow').src=imgArr[i];
        }


        document.addEventListener(onload, next());              
    </script>
</body>

</html>
<?php
  
  ?>