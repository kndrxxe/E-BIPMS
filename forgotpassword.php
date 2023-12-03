<?php
session_start();
include 'conn.php';
use PHPMailer\PHPMailer\PHPMailer;

ob_start(); // Turn on output buffering
if (isset($_POST['forgot'])) {
    $email = $_POST['email'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) <= 0) {
        $_SESSION['loginstatus'] = "Email does not exist.";
        header('Location: forgotpassword.php');
        exit();
    } else {
        if ($fetch["status"] == 0) {
            $_SESSION['loginstatus'] = "Sorry, your account must verify first, before you recover your password !";
            header('Location: forgotpassword.php');
            exit();
        } else {
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require 'vendor/autoload.php';
            require 'vendor/phpmailer/phpmailer/src/Exception.php';
            require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
            require 'vendor/phpmailer/phpmailer/src/SMTP.php';
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            // h-hotel account
            $mail->Username = 'ebipmskanlurangbukal@gmail.com';
            $mail->Password = 'siuc vmrq comb wdtf';
            $mail->setFrom('ebipmskanlurangbukal@gmail.com', 'EBIPMS Kanlurang Bukal');
            // get email from input
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->Subject = "Recover your password";
            $mail->Body = '
            <html>
              <head> </head>
              <body>
                <header style="background-color: #ffc107; padding: 10px">
                  <a style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif; display: flex; flex-direction: column; align-items: center;">
                    <img src="https://previews.dropbox.com/p/thumb/ACGuII26Bp-Xxdz0LP4khNeu7xffZLmmNhpj2iYZyLokBK9ir2oNaDrWNo06kBldZMEIDfbfXoKCG0hiAvwIC4-7AzaWHHB0ygHzQFAIj6mUbZcvejHmAn53EF3jvLc8-skuCf-IQaW5C_2wcXmj7mIaob4JBRFSVM04wL-uETHRZ9F4UOxerrsKY4KlYpWIjeR6GngoUxax-gT4JW94NbIlMHw1TevSDdFAQJY3l2Q-af93IG32L2A_EoXoLxlYn1zm1DHLHP5vum_y5UJA2jzvYDySszmSay3jNODiWfEG-FBkKGVK350FtHWjXboleDydSvZMp11CbvZi9JXJjO0C/p.png" width="50"/>
                    <b>E-BIPMS KANLURANG BUKAL</b>
                  </a>
                </header>
                <h1 style="margin: 10px 0; font-size: 18px">
                  <p style="font-family: Arial, Helvetica, sans-serif">Dear Resident,</p>
                </h1>
                <p style="font-family: Arial, Helvetica, sans-serif">
                  We have received a request to reset your password. If you did not make this request, please ignore this email.
                  <br>
                http://localhost/ebipms/resetpassword.php
                </p>
                <h1 style="font-family: Arial, Helvetica, sans-serif; margin: 10px 0; font-size: 18px">Best regards,</h1>
                <h1 style="font-family: Arial, Helvetica, sans-serif; margin: 10px 0; font-size: 18px">
                  Brgy. Kanlurang Bukal
                </h1>
              </body>
            </html>';
            $mail->isHTML(true);
            if (!$mail->send()) {
                $_SESSION['loginstatus'] = "Email not sent. Please try again.";
                header('Location: forgotpassword.php');
                exit();
            } else {
                $_SESSION['forgotstatus'] = "Please check your email to reset your password ! <strong>" . $email . "</strong>";
                header('Location: forgotpassword.php');
                exit();
            }
        }
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
    <title>Forgot Password | EBIPMS</title>
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
                        name="forgotpassword" action="forgotpassword.php" method="POST" novalidate="">
                        <h4 class="mb-2 fw-normal display-6">FORGOT PASSWORD?</h4>
                        <p class="fw-normal text-center text-secondary ms-3 me-3">Please enter your registered email
                            address and we will send you a
                            link to reset your password.</p>
                        <?php
                        if (isset($_SESSION['forgotstatus'])) {
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                <i class="bi bi-envelope" width="24" height="24"></i>
                                <?= $_SESSION['forgotstatus']; ?>
                            </div>
                            <?php
                            unset($_SESSION['forgotstatus']);
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
                        <!-- Email input -->
                        <div class="row g-1 mb-2">
                            <div class="col-12 mb-2">
                                <div class="form-outline">
                                    <input type="text" class="form-control form-control-lg" name="email" id="email"
                                        required autofocus />
                                    <label class="form-label" for="email"><i class="bi bi-envelope"></i> Email
                                        Address</label>
                                    <div class="invalid-feedback">
                                        Please enter your registered email address.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="forgot" class="btn btn-warning btn-block">FORGOT</button>
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