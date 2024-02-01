<?php
session_start();
include_once '../../controllers/CatController.php';
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE</title>
    <link rel="stylesheet" href="../../styles/table.css">
    <style>
        .hide {
            display: none;
        }
        header{
            font-weight: 500;
    background: transparent;
    backdrop-filter: blur(20px);
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
                    echo '<a href="../logout.php"><img src="../../Photos/logout2.png" width="25px" height="25px" alt=""></a>';
                } else {
                    echo '<a href="./LogInForm.php"><img src="../../Photos/login.png" width="25px" height="25px" alt=""></a>';
                }
                ?>
            </div>
        </div>
    </header>
    <div class="table">
            <div class="box-add">
                <a href="insertCat.php">
                <button class="button-add">ADD CAT</button>
                </a>
            </div>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Color</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Size</th>
                    <th>Coat Length</th>
                    <th>Image</th>
                    <th>Created By</th>
                    <th>Modified By</th>
                    <th>Actions</th>
                </tr>
                <?php
                      include_once '../../repository/CatRepository.php';
                      $catRepository  = new CatRepository();
                      $cats = $catRepository->getAllCats();
                      foreach ($cats as $cat) {
                        echo 
                        "
                        <tr>
                            <td>$cat[id]</td>
                            <td>$cat[name]</td>
                            <td>$cat[breed]</td>
                            <td>$cat[color]</td>
                            <td>$cat[age]</td>
                            <td>$cat[gender]</td>
                            <td>$cat[size]</td>
                            <td>$cat[coatLength]</td>
                            <td>$cat[image]</td>
                            <td>$cat[createdBy]</td>
                            <td>$cat[modifiedBy]</td>
                            <td colspan='2'><div>
                            <button class='button-update'>
                            <a href='updateCat.php?id=$cat[id]'>Update</a>
                          </button>
                            <button class='button-delete' onclick='confirmDelete($cat[id])'>
                            <a href='deleteCat.php?id=$cat[id]'>Delete</a>
                            </div>
                          </button>
                          </td>
                        </tr>
                        </tr>
                        ";
                      }
                ?>
            </table>
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
        let firstName = document.getElementById("firstName").value.trim();
        let firstNameError = document.getElementById('firstNameError');
        let lastName = document.getElementById("lastName").value.trim();
        let lastNameError = document.getElementById('lastNameError');
        let email = document.getElementById("email").value.trim();
        let emailError = document.getElementById('emailError');
        let password = document.getElementById("password").value.trim();
        let passwordError = document.getElementById('passwordError');
        let date = document.getElementById("date").value.trim();
        let dateError = document.getElementById('dateError');
        let phonenumber = document.getElementById('phonenumber');
        let phonenumberError = document.getElementById('phonenumberError');

        firstNameError.innerText = '';
        lastNameError.innerText = '';
        emailError.innerText = '';
        passwordError.innerText = '';

        let firstNameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!firstNameRegex.test(firstName)) {
            firstNameError.innerText = 'Please enter a valid first name!';
            event.preventDefault();
            return;
        }

        let lastNameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!lastNameRegex.test(lastName)) {
            lastNameError.innerText = 'Please enter a valid last name!';
            event.preventDefault();
            return;
        }

        let emailRegex = /^[^\@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerText = 'Please enter a valid email!';
            event.preventDefault();
            return;
        }

        if (password.length < 8) {
            passwordError.innerText = 'Please enter a valid password!';
            event.preventDefault();
            return;
        }
        if (phonenumber < 9) {
            phonenumberError.innerText = 'Please enter a valid phone number!';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            firstNameError.innerText = "";
            lastNameError.innerText = "";
            emailError.innerText = "";
            passwordError.innerText = "";
        }
    }
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this cat?")) {
            window.location.href = 'deleteUser.php?id=' + userId;
        } else {
            event.preventDefault();
        }
    }
</script>

</html>