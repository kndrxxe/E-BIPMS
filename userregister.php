<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Register</title>
  <link rel = "icon" href="kanlurangbukal.png" type = "image/x-icon">
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
        height: 170vh;
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

      #message {
        display:none;
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
  accent-color: orange; !important;
}
.checkbox-label{
  font-size: 17px;
}
</style>

<!-- Navbar -->
<nav
class="navbar navbar-expand-lg navbar-dark d-none d-lg-block"
style="z-index: 2000"
>
<div class="container-fluid">
  <!-- Navbar brand -->
  <a href="index.php" 
  class="navbar-brand nav-link"
  >
  <img src="kanlurangbukal.png" width="30" />
  <b>E-BIPMS KANLURANG BUKAL</b>
</a>
<button
class="navbar-toggler"
type="button"
data-mdb-toggle="collapse"
data-mdb-target="#navbarExample01"
aria-controls="navbarExample01"
aria-expanded="false"
aria-label="Toggle navigation"
>
<i class="fas fa-bars"></i>
</button>
<div class="collapse navbar-collapse" id="navbarExample01">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item active">
      <a
      class="nav-link font-weight-bold"
      href="index.php"
      >Home</a
      >
    </li>
    <li class="nav-item active">
      <a
      class="nav-link font-weight-bold"
      href="#announce"
      >Announcement</a
      >
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
        <div class="col-xl-7 col-md-8">
          <form class="needs-validation bg-white rounded shadow-5-strong p-4 text-center" action="userregisterprocess.php" method="POST" novalidate="">
            <h3 class="mb-3 fw-normal display-5">REGISTER</h3>
            <?php
            if(isset($_SESSION['registrationerror']))
            {
              ?>
              <div class="alert alert-danger text-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                <?= $_SESSION['registrationerror']; ?>  
              </div>
              <?php 
              unset($_SESSION['registrationerror']);
            }
            ?>
            <!-- 2 column grid layout for inline styling -->
            <div class="row g-2 mb-4">
              <div class="col-6 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="firstname" id="firstname" required/>
                  <label class="form-label" for="firstname">First Name</label>
                  <div class="invalid-feedback">
                    First Name required!
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="middlename" id="middlename" required />
                  <label class="form-label" for="middlename">Middle Name</label>
                </div>
                <div class="invalid-feedback">
                  Middle Name required!
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" required/>
                  <label class="form-label" for="lastname">Lastname</label>
                  <div class="invalid-feedback">
                    Last Name required!
                  </div>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-outline">
                  <input type="date" class="form-control form-control-lg" name="birthday" id="birthday" required/>
                  <label class="form-label" for="birthday">Birth Date</label>
                  <div class="invalid-feedback">
                    Birth Date required! 
                  </div>
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="house_no" id="house_no"/>
                  <label class="form-label" for="house_no">House Number (optional)</label>
                </div>
              </div>
              <div class="col-6 mb-2">
                <select class="form-select form-select-lg" name="purok" placeholder="Purok">
                  <option selected disabled>Purok</option>
                  <option value="Purok 1">Purok 1</option>
                  <option value="Purok 2">Purok 2</option>
                  <option value="Purok 3">Purok 3</option>
                  <option value="Purok 4">Purok 4</option>
                  <option value="Purok 5">Purok 5</option>
                  <option value="Purok 6">Purok 6</option>
                  <option value="Purok 7">Purok 7</option>
                </select>
              </div>
              <div class="col-12 mb-2">
                <select class="form-select form-select-lg" name="sex" placeholder="Sex" required>
                  <option selected disabled>Sex</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Prefer not to say">Prefer not to say</option>
                </select>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" required/>
                  <label class="form-label" for="email">E-mail Address</label>
                  <div class="invalid-feedback">
                    Enter your E-mail!
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" required/>
                  <label class="form-label" for="username">Username</label>
                  <div class="invalid-feedback">
                    Enter your Username!
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 up to more characters" maxlength="32" required/>
                  <label class="form-label" for="password">Password</label>
                  <div class="invalid-feedback">
                    Enter your Password!
                  </div>
                </div>
              </div>
              <div class="col d-flex justify-content-start">
                <div class="form-check">
                  <input class="checkbox" type="checkbox" onclick="myFunction()"/>
                  <label class="checkbox-label">
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
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-warning btn-block">REGISTER</button>
            <div class="col mt-3">
              <!-- Simple link -->
              Already have an account? <a class="text-warning" href="userlogin.php"><b>Log In</b></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Background image -->
</header>
<!--Main Navigation-->

<!--Footer-->
<footer class="bg-warning text-lg-start">
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
<script >
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
<script>
  var myInput = document.getElementById("password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

// When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }

// When the user starts to type something inside the password field
  myInput.onkeyup = function() {
  // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }

  // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

  // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

  // Validate length
    if(myInput.value.length >= 8) {
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