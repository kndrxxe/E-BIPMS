<?php
session_start();

include_once 'conn.php';
if (isset($_SESSION['id'])) {
    header("Location: lguhome.php");
    exit();
} else {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        $sql = "SELECT * FROM localgovernment WHERE username='$username' AND password ='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['name'] = $row['firstname'];
            header("Location: lguhome.php");
            exit();
        } else {
            $_SESSION['loginstatus'] = "The Username/Password you entered is incorrect. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>LGU Login | EBIPMS</title>
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
            #intro {
                background-image: url(https://adrian8124.files.wordpress.com/2016/08/img_0679.jpg);
                height: 100vh;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #intro {
                    margin-top: -58.59px;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }

            .form-control input[type="text"] {
                margin-bottom: 10px;
            }

            .form-control input[type="password"] {
                margin-bottom: 10px;
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
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark sticky bg-dark" style="z-index: 2000">
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
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="index#announce">Announcement</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="officials.php">Officials</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-mdb-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="adminlogin"><i class="fa fa-user"></i> Login as
                                        Admin</a></li>
                                <li><a class="dropdown-item" href="bhwlogin"><i class="fa fa-user"></i> Login as BHW</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Background image -->
        <div id="intro" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-md-8">
                            <form class="forms needs-validation bg-white rounded shadow-5-strong p-4 text-center"
                                action="lgulogin.php" method="POST" novalidate="">
                                <h3 class="mb-3 fw-normal display-5">LOGIN</h3>
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
                                <!-- Username input -->
                                <div class="row g-1 mb-2">
                                    <div class="col-12 mb-2">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" name="username"
                                                id="username" required />
                                            <label class="form-label" for="username">Username</label>
                                            <div class="invalid-feedback">
                                                Username is required!
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Password input -->
                                    <div class="col-12 mb-2">
                                        <div class="form-outline">
                                            <input type="password" class="form-control form-control-lg" name="password"
                                                id="password" required />
                                            <label class="form-label" for="password">Password</label>
                                            <div class="invalid-feedback">
                                                Password is required!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="col d-flex justify-content-start">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="checkbox" type="checkbox" onclick="myFunction()" />
                                            <label class="checkbox-label" style="font-size: 10pt; margin-left:5px;">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-warning btn-block mt-3 mb-3">LOG IN</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background image -->
    </header>
    <!--Main Navigation-->

    <!--Footer-->
    <footer class="bg-dark text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 text-light">
            © 2023 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
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
</body>

</html>