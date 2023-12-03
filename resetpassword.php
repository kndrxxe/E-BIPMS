<?php
session_start();
include 'conn.php';
ob_start();
if (isset($_POST["reset"])) {
    include 'conn.php';
    $password = md5($_POST["password"]);

    $token = $_SESSION['token'];
    $email = $_SESSION['email'];

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if ($query > 0) {
        mysqli_query($conn, "UPDATE users SET password='$password' WHERE email='$email'");
        $_SESSION['forgotstatussuccess'] = "Password successfully changed.";
        header('Location: userlogin.php');
        exit();
    } else {
        $_SESSION['forgotstatusfailed'] = "Password not changed. No user with this email.";
        header('Location: resetpassword.php');
        exit();
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Reset Password | EBIPMS</title>
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <style>
            .navbar .nav-link {
                color: #fff !important;
            }

            .form-control input[type="text"] {
                margin-bottom: 10px;
            }

            footer.bg-warning {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
            }

            #message {
                display: none;
                position: relative;
            }

            #message p {
                padding: -20px 20px;
                font-size: 15px;
            }

            /* Add a green text color and a checkmark when the requirements are right */
            .valid {
                color: green;
            }

            .valid:before {
                position: relative;
                padding-left: 10px;
                left: -10px;
                content: "✔";
            }

            /* Add a red text color and an "x" icon when the requirements are wrong */
            .invalid {
                color: red;
            }

            .invalid:before {
                position: relative;
                padding-left: 10px;
                left: -10px;
                content: "✖";
            }

            .checkbox {
                width: 17px;
                height: 17px;

                margin-left: -20px;
            }

            .checkbox:checked {
                accent-color: orange;
                !important;
            }

            .checkbox-label {
                font-size: 17px;
            }

            @media (max-width: 768px) {

                /* Adjust this value as needed */
                .form-control {
                    height: 45px;
                    /* Adjust this value as needed */
                }
            }
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 2000">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a href="index.php" class="navbar-brand nav-link">
                    <img src="kanlurangbukal.png" width="30" />
                    <b>E-BIPMS</b>
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-md-7 mt-5 mb-5">
                    <form class="forms needs-validation bg-white rounded shadow-5-strong p-4 mt-2 text-center"
                        name="login" action="resetpassword.php" method="POST" novalidate="">
                        <h4 class="mb-2 fw-normal display-6">RESET PASSWORD</h4>
                        <p class="fw-normal text-center text-secondary ms-3 me-3">

                        </p>
                        <?php
                        if (isset($_SESSION['loginstatus'])) {
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                                <?= $_SESSION['loginstatus']; ?>
                            </div>
                            <?php
                            unset($_SESSION['loginstatus']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['loginstatus'])) {
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                                <?= $_SESSION['loginstatus']; ?>
                            </div>
                            <?php
                            unset($_SESSION['loginstatus']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['forgotstatusfailed'])) {
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                <i class="bi bi-envelope" width="24" height="24"></i>
                                <?= $_SESSION['forgotstatusfailed']; ?>
                            </div>
                            <?php
                            unset($_SESSION['forgotstatusfailed']);
                        }
                        ?>
                        <div class="col-12 mb-2">
                            <div class="form-outline">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 up to more characters"
                                    maxlength="32" required />
                                <label class="form-label" for="password"><i class="bi bi-lock-fill"></i>Password</label>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-start">
                            <div class="form-check d-flex align-items-center">
                                <input class="checkbox" type="checkbox" onclick="myFunction()" />
                                <label class="checkbox-label" style="font-size: 10pt; margin-left:5px;">
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <div class="text-start" id="message">
                            <p><b>Password must contain the following:</b></p>
                            <p id="length" class="invalid"><b>8</b> up to <b>32</b> characters</b></p>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>uppercase</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                        </div>
                        <button type="submit" name="reset" class="btn btn-warning btn-block mt-3">RESET
                            PASSWORD</button>
                </div>
            </div>
            </form>
        </div>
        </div>
        </div>
    </header>
    <!--Main Navigation-->
    <footer class="bg-warning text-lg-start">
        <div class="text-center p-3 text-light">
            © 2023 Copyright
        </div>
    </footer>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function () {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function () {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
    <script>
        var x = document.getElementById("password").maxLength;
        document.getElementById("demo").innerHTML = x;
    </script>
</body>

</html>
