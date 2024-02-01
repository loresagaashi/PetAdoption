<?php
session_start();
include_once '../../repository/DogRepository.php';
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
$dogId = isset($_GET['id']) ? $_GET['id'] : null;
$id = $_SESSION['id'] ? $_SESSION['id'] : null;
$userRepository = new UserRepository();
$user = $userRepository->getUserById($id);

if ($dogId !== null) {
    $dogRepository = new DogRepository();
    $dog = $dogRepository->getDogById($dogId);
} else {
    echo "Error: 'id' is not set in the URL.";
}
if (isset($_POST['submitBtn'])) {
    $id = $dogId;
    $createdBy = $dog['createdBy'];
    $name = $_POST["name"];
    $breed = $_POST["breed"];
    $color = $_POST["color"];
    $coatLength = $_POST["coatLength"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $size = $_POST["size"];
    $image = $_FILES["image"]["name"];

    $dogRepository->updateDog($id, $name, $breed, $color, $age, $gender, $size, $coatLength, $image, $createdBy, $user['firstName']);
    header("location:./dogTable.php");
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
                            <input type="text" name="id" value="<?= $dog['id'] ?>" readonly hidden>
                            <input type="text" name="name" value="<?= $dog['name'] ?>" placeholder="Name" id="name">
                            
                        </div>
                        <div class="error-message" id="nameError"></div>
                            <p id="errorName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="breed" value="<?= $dog['breed'] ?>" placeholder="Breed" id="breed">
                           
                        </div>
                        <div class="error-message" id="breedError"></div>
                            <p id="errorBreed" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="color" value="<?= $dog['color'] ?>" placeholder="Color" id="color">
                            
                        </div>
                        <div class="error-message" id="colorError"></div>
                            <p id="errorColor" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="coatLength" value="<?= $dog['coatLength'] ?>"
                                placeholder="Coat length" id="coatLength">
                            
                        </div>
                        <div class="error-message" id="coatLengthError"></div>
                            <p id="errorCoatLength" style="color: red;"></p>
                    </div>

                    <!-- Right column -->
                    <div class="input-group-right">
                        <div class="input-field right">
                            <input type="number" name="age" value="<?= $dog['age'] ?>" placeholder="Age" id="age">
                           
                        </div>
                        <div class="error-message" id="ageError"></div>
                            <p id="errorAge" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="text" name="gender" value="<?= $dog['gender'] ?>" placeholder="Gender"
                                id="gender">
                            
                        </div>
                        <div class="error-message" id="genderError"></div>
                            <p id="errorGender" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="text" name="size" value="<?= $dog['size'] ?>" placeholder="Size" id="size">
                            
                        </div>
                        <div class="error-message" id="sizeError"></div>
                            <p id="errorSize" style="color: red;"></p>
                        <div>
                            <input type="file" name="image" id="image" onchange="displayFileName()">
                            <div class="error-message" id="imageError"></div>
                            <p id="errorImage" style="color: red;"></p>
                            <span id="selectedFileName" class="image">
                                <?= $dog['image'] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="btn-group">
                <div class="error-message" id="submitError"></div>
                <p id="errorSubmit" style="color: red;"></p>
                    <button type="submit" name="submitBtn" id="submitBtn">Update</button>
                    <button type="button" onclick="window.location.href='./dogTable.php'" name="cancelBtn"
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