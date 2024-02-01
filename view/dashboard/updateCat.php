<?php
session_start();
include_once '../../repository/CatRepository.php';
include_once '../../repository/UserRepository.php';
$hide = "";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin")
        $hide = "";
    else
        $hide = "hide";
} else {
    $hide = "hide";
}
$catId = isset($_GET['id']) ? $_GET['id'] : null;
$id = $_SESSION['id'] ? $_SESSION['id'] : null;
$userRepository = new UserRepository();
$user = $userRepository->getUserById($id);

if ($catId !== null) {
    $catRepository = new CatRepository();
    $cat = $catRepository->getCatById($catId);
} else {
    echo "Error: 'id' is not set in the URL.";
}
if (isset($_POST['submitBtn'])) {
    $id = $catId;
    $createdBy = $cat['createdBy'];
    $name = $_POST["name"];
    $breed = $_POST["breed"];
    $color = $_POST["color"];
    $coatLength = $_POST["coatLength"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $size = $_POST["size"];
    $image = $_FILES["image"]["name"];

    $catRepository->updateCat($id, $name, $breed, $color, $age, $gender, $size, $coatLength, $image, $createdBy, $user['firstName']);
    header("location:./catTable.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="stylesheet" href="../../formDog.css">
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-nav" style="background-color: transparent;">
            <div class="logo">
                <img src="../../Photos/pet-logo.png" alt="Pet">
                <a href="../PetAdoption.php"><strong>Pet Adoption</strong></a>
            </div>
            <div class="left">
                <a href="./dashboard.php" class="<?php echo $hide ?>">DASHBOARD</a>
                <a href="../DogAdoption.php">DOGS & PUPPIES</a>
                <a href="../CatAdoption.php">CATS & KITTENS</a>
                <a href="#">ANIMAL HOSPITAL</a>
                <a href="#">ANIMAL SHELTERS</a>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<a href="./logout.php"><img src="../../Photos/logout2.png" width="25px" height="25px" alt=""></a>';
                } else {
                    echo '<a href="./LogInForm.php"><img src="../../Photos/login.png" width="25px" height="25px" alt=""></a>';
                }
                ?>
            </div>
        </div>

    </header>
    <div class="container">
        <div class="form-box">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return submitForm(event)">
                <h1>Update</h1>
                <div class="input-group">
                    <!-- Left column -->
                    <div class="input-group-left">
                        <div class="input-field left">
                            <input type="text" name="id" value="<?= $cat['id'] ?>" readonly hidden>
                            <input type="text" name="name" value="<?= $cat['name'] ?>" placeholder="Name" id="name">
                          
                        </div>
                        <div class="error-message" id="nameError"></div>
                            <p id="errorName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="breed" value="<?= $cat['breed'] ?>" placeholder="Breed" id="breed">
                            <div class="error-message" id="breedError"></div>
                            <p id="errorBreed" style="color: red;"></p>
                        </div>
                        <div class="input-field left">
                            <input type="text" name="color" value="<?= $cat['color'] ?>" placeholder="Color" id="color">
                            <div class="error-message" id="colorError"></div>
                            <p id="errorColor" style="color: red;"></p>
                        </div>
                        <div class="input-field left">
                            <input type="text" name="coatLength" value="<?= $cat['coatLength'] ?>"
                                placeholder="Coat length" id="coatLength">
                            <div class="error-message" id="coatLengthError"></div>
                            <p id="errorCoatLength" style="color: red;"></p>
                        </div>
                    </div>

                    <!-- Right column -->
                    <div class="input-group-right">
                        <div class="input-field right">
                            <input type="number" name="age" value="<?= $cat['age'] ?>" placeholder="Age" id="age">
                            <div class="error-message" id="ageError"></div>
                            <p id="errorAge" style="color: red;"></p>
                        </div>
                        <div class="input-field right">
                            <input type="text" name="gender" value="<?= $cat['gender'] ?>" placeholder="Gender"
                                id="gender">
                            <div class="error-message" id="genderError"></div>
                            <p id="errorGender" style="color: red;"></p>
                        </div>
                        <div class="input-field right">
                            <input type="text" name="size" value="<?= $cat['size'] ?>" placeholder="Size" id="size">
                            <div class="error-message" id="sizeError"></div>
                            <p id="errorSize" style="color: red;"></p>
                        </div>
                        <div>
                            <input type="file" name="image" id="image" onchange="displayFileName()">
                            <div class="error-message" id="imageError"></div>
                            <p id="errorImage" style="color: red;"></p>
                            <span id="selectedFileName" class="image">
                                <?= $cat['image'] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="btn-group">
                <div class="error-message" id="submitError"></div>
                <p id="errorSubmit" style="color: red;"></p>
                    <button type="submit" name="submitBtn" id="submitBtn">Update</button>
                    <button type="button" onclick="window.location.href='./catTable.php'" name="cancelBtn"
                        id="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function submitForm(event) {
        let name = document.getElementById("name").value.trim();
        let gender = document.getElementById("gender").value.trim();
       
        let nameError = document.getElementById('nameError');
        let genderError = document.getElementById('genderError');
        let submitError = document.getElementById('submitError');
        nameError.innerText = '';
        submitError.innerText='';
        genderError.innerText = '';
        


        if (name === '' || age === '' || breed === '' || gender === '' || color === '' || size === '' || coatLength === '' ) {
            submitError.innerText = 'Fill all the fields!';
            event.preventDefault();
            return;
        }

        let nameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!nameRegex.test(name)) {
            nameError.innerText = 'Please enter a valid name!';
            event.preventDefault();
            return;
        }
        let allowedGenders = ["Female", "Male"];
        if (!allowedGenders.includes(gender)) {
            genderError.innerText = 'Gender does not exist';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            nameError.innerText = "";
            submitError.innerText='';
            genderError.innerText = '';
        }
        clearErrorMessages();
    }
</script>

</html>