<?php
session_start();
include 'conn.php';
if (isset($_POST["verify"])) {
    $otp = $_SESSION['otp'];
    $email = $_SESSION['email'];
    $otp_code = $_POST['otp_code'];

    if ($otp != $otp_code) {
        $_SESSION['registerfailed'] = "Invalid OTP Code.";
        header('Location: verification.php');
    } else {
        mysqli_query($conn, "UPDATE users SET status = 1 WHERE email = '$email'");
        if (mysqli_error($conn)) {
            die(mysqli_error($conn));
        }
        $_SESSION['registerverified'] = "Account successfully verified. Please wait for the admin to approve your account.";
        header('Location: userlogin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Verify Account | EBIPMS</title>
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
                        action="#" method="POST" novalidate="">
                        <h4 class="mb-2 fw-normal display-6">VERIFY ACCOUNT</h4>
                        <p class="fw-normal text-center text-secondary ms-3 me-3">Enter the 6-digit code sent to your
                            email address to verify your account.
                        </p>
                        <?php
                        if (isset($_SESSION['registerfailed'])) {
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                                <?= $_SESSION['registerfailed']; ?>
                            </div>
                            <?php
                            unset($_SESSION['registerfailed']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['registerstatus'])) {
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                <i class="bi bi-envelope" width="24" height="24"></i>
                                <?= $_SESSION['registerstatus']; ?>
                            </div>
                            <?php
                            unset($_SESSION['registerstatus']);
                        }
                        ?>
                        <!-- OTP Code -->
                        <div class="row g-1 mb-2">
                            <div class="col-12 mb-2">
                                <div class="form-outline">
                                    <input type="text" class="form-control form-control-lg" name="otp_code"
                                        id="otp_code" required autofocus />
                                    <label class="form-label" for="otp_code">
                                        <i class="bi bi-shield-lock-fill"></i>
                                        OTP Code
                                    </label>
                                    <div class="invalid-feedback">
                                        Please enter the 6-digit code
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-warning btn-block" name="verify">
                            <i class="bi bi-shield-lock-fill"></i>
                            VERIFY
                        </button>
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
</body>

</html>