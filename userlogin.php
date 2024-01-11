<?php
session_start();

include_once 'conn.php';
if (isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
  header("Location: userhome.php");
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
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      if ($row['status'] == 0) {
        $_SESSION['loginstatus'] = "Your account is not yet approved by the admin. Please wait for the admin to approve your account.";
      } else {
        $_SESSION['id'] = $row['id'];
        $_SESSION['uid'] = $row['userID'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['name'] = $row['firstname'];
        $_SESSION['user_type'] = 'user';
        $_SESSION["login_time_stamp"] = time();
        header("Location:userhome.php");
        exit();
      }
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
  <title>User Login</title>
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
      .text-justify {
        text-align: justify;
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
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="index">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="index#announce">Announcement</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="jobs.php">Jobs</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="officials.php">Officials</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="contact">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown"
                aria-expanded="false">
                Login
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="adminlogin"><i class="fa fa-user"></i> Login as Admin</a></li>
                <li><a class="dropdown-item" href="lgulogin"><i class="fa fa-user"></i> Login as LGU</a></li>
                <li><a class="dropdown-item" href="bhwlogin"><i class="fa fa-user"></i> Login as BHW</a></li>
              </ul>
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
            action="userlogin.php" method="POST" novalidate="">
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
            <?php
            if (isset($_SESSION['registerverified'])) {
              ?>
              <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                <?= $_SESSION['registerverified']; ?>
              </div>
              <?php
              unset($_SESSION['registerverified']);
            }
            ?>
            <?php
            if (isset($_SESSION['forgotstatussuccess'])) {
              ?>
              <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                <?= $_SESSION['forgotstatussuccess']; ?>
              </div>
              <?php
              unset($_SESSION['forgotstatussuccess']);
            }
            ?>
            <!-- Email input -->
            <div class="row g-1 mb-2">
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" required />
                  <label class="form-label" for="username">Username</label>
                  <div class="invalid-feedback">
                    Username is required!
                  </div>
                </div>
              </div>

              <!-- Password input -->
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" required />
                  <label class="form-label" for="password">Password</label>
                  <div class="invalid-feedback">
                    Password is required!
                  </div>
                </div>
              </div>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-3">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="col d-flex justify-content-start">
                  <div class="form-check d-flex align-items-center">
                    <input class="checkbox" type="checkbox" onclick="myFunction()" />
                    <label class="checkbox-label" style="font-size: 10pt; margin-left:5px;">
                      Show Password
                    </label>
                  </div>
                </div>
              </div>

              <div class="col">
                <!-- Simple link -->
                <a class="text-warning float-end" style="font-size: 10pt" href="forgotpassword">Forgot password?</a>
              </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-warning btn-block">LOG IN</button>
            <div class="col mt-3">
              Not yet registered? <a class="text-warning" href="userregister"><b>Register</b></a>
            </div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </header>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-light pt-1">

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h4 class="text-uppercase fw-bold mb-4">
              E-BIPMS KANLURANG BUKAL
            </h4>
            <p class="text-justify">
              A system that aims to provide a convenient way for the barangay officials to monitor the residents of the
              barangay and to provide a convenient way for the residents to request barangay services.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="index" class="text-reset">Home</a>
            </p>
            <p>
              <a href="#announce" class="text-reset">Announcement</a>
            </p>
            <p>
              <a href="jobs.php" class="text-reset">Jobs</a>
            </p>
            <p>
              <a href="officials.php" class="text-reset">Officials</a>
            </p>
            <p>
              <a href="contact" class="text-reset">Contact</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p class="text-break"><i class="fas fa-home me-3"></i> Brgy. Kanlurang Bukal<br>Liliw, Laguna</p>
            <p class="text-break">
              <i class="fas fa-envelope me-3"></i>
              ebipmskanlurangbukal@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <!-- Footer -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
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