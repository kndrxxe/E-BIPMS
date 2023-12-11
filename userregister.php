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
  <style>
    #message p {
      line-height: 1;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
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
              <a class="nav-link font-weight-bold" href="officials">Officials</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="contact">Contact</a>
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

    <!-- Background image -->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-md-7 mt-5 mb-5">
          <form class="forms needs-validation bg-white rounded shadow-5-strong p-4 text-center" autocomplete="off"
            action="userregisterprocess.php" method="POST" novalidate="">
            <h3 class="mb-3 fw-normal display-5">REGISTER</h3>
            <?php
            if (isset($_SESSION['registrationerror'])) {
              ?>
              <div class="alert alert-danger text-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                <?= $_SESSION['registrationerror']; ?>
              </div>
              <?php
              unset($_SESSION['registrationerror']);
            }
            ?>
            <?php
            if (isset($_SESSION['registerstatus'])) {
              ?>
              <div class="alert alert-danger text-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                <?= $_SESSION['registerstatus']; ?>
              </div>
              <?php
              unset($_SESSION['registerstatus']);
            }
            ?>
            <!-- 2 column grid layout for inline styling -->
            <div class="row g-2 mb-4">
              <div class="col-4 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="firstname" id="firstname" required />
                  <label class="form-label" for="firstname">First Name</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="middlename" id="middlename" />
                  <label class="form-label" for="middlename">Middle Name (optional)</label>
                </div>
              </div>
              <div class="col-4 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" required />
                  <label class="form-label" for="lastname">Last Name</label>
                </div>
              </div>
              <div class="col-5 mb-2">
                <select class="form-select form-select-lg rounded-2" name="sex" placeholder="Sex" required>
                  <option selected disabled>Sex</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col-5 mb-2">
                <div class="form-outline">
                  <input type="date" class="form-control form-control-lg" name="birthday" max="9999-12-31" id="birthday"
                    required />
                  <label class="form-label" for="birthday">Birth Date</label>
                </div>
              </div>
              <div class="col-2 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="age" id="age" readonly />
                </div>
              </div>
              <div class="col-5 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="house_no" maxlength="4" id="house_no" />
                  <label class="form-label" for="house_no">House Number (optional)</label>
                </div>
              </div>
              <div class="col-7 mb-2">
                <select class="form-select form-select-lg rounded-2" name="purok" placeholder="Purok" required>
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
              <div class="col-6 mb-2">
                <select class="form-select form-select-lg rounded-2" name="civilstatus" placeholder="Civil Status"
                  required>
                  <option selected disabled>Civil Status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widowed">Widowed</option>
                  <option value="Separated">Separated</option>
                  <option value="Divorced">Divorced</option>
                </select>
              </div>
              <div class="col-6 mb-2">
                <select class="form-select form-select-lg rounded-2" name="voter" id="voter" placeholder="Registered Voter"
                  required>
                  <option selected disabled>Registered Voter</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="col-12 d-flex justify-content-start mt-0 mb-0">
                <div class="form-check d-flex align-items-center">
                  <input type="hidden" id="specialGroupCheckboxHidden" name="is_special_group" value="0" />
                  <input class="checkbox" type="checkbox" name="is_special_group" id="specialGroupCheckbox" value="1" />
                  <label class="checkbox-label text-start" id="specialGroupLabel"
                    style="font-size: 10pt; margin-left:5px; color:#6c757d;">
                    Are you belong to a special group?
                  </label>
                </div>
              </div>
              <div class="col-12 mb-2" id="specialGroupDiv">
                <select class="form-select form-select-lg rounded-2" id="specialGroup" name="specialgroup"
                  placeholder="specialgroup">
                  <option selected disabled>Special Group</option>
                  <option value="PWD">PWD</option>
                  <option value="Senior Citizen">Senior Citizen</option>
                  <option value="Solo Parent">Solo Parent</option>
                  <option value="Indigenous People">Indigenous People</option>
                  <option value="Out of School Youth">Out of School Youth</option>
                  <option value="Pregnant">Pregnant</option>
                  <option value="Lactating">Lactating</option>
                </select>
              </div>
              <div class="col-6 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="members" id="members" maxlength="2" required />
                  <label class="form-label" for="members">No. of Family Members</label>
                </div>
              </div>
              <div class="col-6 mb-2">
                <select class="form-select form-select-lg rounded-2" name="housingstatus" id="housingstatus" placeholder="housingstatus"
                  required>
                  <option selected disabled>Housing Status</option>
                  <option value="Owned">Owned</option>
                  <option value="Rented">Rented</option>
                  <option value="Living with Relatives">Living with Relatives</option>
                  <option value="Living with Friends">Living with Friends</option>
                  <option value="Living with Others">Living with Others</option>
                </select>
              </div>
              <div class="col-12 mb-2">
                <select class="form-select form-select-lg rounded-2" id="employmentstatus" name="employmentstatus"
                  placeholder="employmentstatus" required>
                  <option selected disabled>Employment Status</option>
                  <option value="Employed">Employed</option>
                  <option value="Unemployed">Unemployed</option>
                  <option value="Self-Employed">Self-Employed</option>
                  <option value="Retired">Retired</option>
                  <option value="Student">Student</option>
                </select>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="phonenumber" id="phonenumber"
                    pattern="\+63[0-9]{10}" maxlength="13" value="+63" required
                    oninput="this.value = this.value.replace(/[^0-9+]/g, ''); if (this.value.length < 3) this.value = '+63';"
                    onfocus="if(this.value === '') { this.value = '+63'; }"
                    style="background-image: url('philippines-flag-icon-32.png'); background-repeat: no-repeat; background-position: 5px center; margin-left: 5px; padding-left: 40px;" />
                  <label class="form-label" for="phonenumber">Phone Number</label>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" required />
                  <label class="form-label" for="email">E-mail Address</label>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" required />
                  <label class="form-label" for="username">Username</label>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="password" class="form-control form-control-lg" name="password" id="password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 up to more characters"
                    maxlength="32" required />
                  <label class="form-label" for="password">Password</label>
                </div>
              </div>

              <div class="col-12 mb-2">
                <div class="form-outline">
                  <input type="password" class="form-control form-control-lg" name="confirm_password"
                    id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 up to more characters"
                    maxlength="32" required />
                  <label class="form-label" for="confirm_password">Confirm Password</label>
                  <div class="invalid-feedback">
                    Passwords do not match
                  </div>
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
              <!-- Submit button -->
              <button type="submit" name="register" id="submitBtn" class="btn btn-warning btn-block">REGISTER</button>
              <div class="col mt-3">
                <!-- Simple link -->
                Already have an account? <a class="text-warning" href="userlogin.php"><b>Log In</b></a>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

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
            <h6 class="text-uppercase fw-bold mb-4">
              <img src="kanlurangbukal.png" width="50" />
              E-BIPMS KANLURANG BUKAL
            </h6>
            <p class="text-justify">
              A system that aims to provide a convenient way for the barangay officials to monitor the
              residents of the barangay and to provide a convenient way for the residents to request
              barangay services.
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
              <a href="index#announce" class="text-reset">Announcement</a>
            </p>
            <p>
              <a href="officials" class="text-reset">Officials</a>
            </p>
            <p>
              <a href="contact" class="text-reset">Contact</a>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Brgy. Kanlurang Bukal<br>Liliw, Laguna</p>
            <p>
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
      var y = document.getElementById("confirm_password");
      if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
    }
  </script>
  <script>
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        const password = form.querySelector('input[name="password"]');
        const confirmPassword = form.querySelector('input[name="confirm_password"]');

        // Add event listener to input event of password and confirm password fields
        password.addEventListener('input', validatePasswords);
        confirmPassword.addEventListener('input', validatePasswords);

        function validatePasswords() {
          if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match');
          } else {
            confirmPassword.setCustomValidity('');
          }
        }

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
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      document.getElementById('birthday').addEventListener('input', function (e) {
        var birthdate = new Date(e.target.value);
        var today = new Date();
        var age;
        if (!isNaN(birthdate.getTime())) { // Check if birthdate is a valid date
          age = today.getFullYear() - birthdate.getFullYear();
          var m = today.getMonth() - birthdate.getMonth();
          if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
            age--;
          }
        } else {
          age = '';
        }
        document.getElementById('age').value = age;
      });
    });
  </script>
  <script>
  window.onload = function () {
			var specialGroupDiv = document.getElementById('specialGroupDiv');
			var specialGroupLabel = document.getElementById('specialGroupLabel');
			var specialGroupCheckbox = document.getElementById('specialGroupCheckbox');

			// Check the status of the checkbox on page load
			if (specialGroupCheckbox.checked) {
				specialGroupDiv.style.display = 'block';
				specialGroupLabel.style.color = '#212529';
			} else {
				specialGroupDiv.style.display = 'none';
				specialGroupLabel.style.color = '#6c757d';
			}

			specialGroupCheckbox.addEventListener('change', function () {
				if (this.checked) {
					specialGroupDiv.style.display = 'block';
					specialGroupLabel.style.color = '#212529';
				} else {
					specialGroupDiv.style.display = 'none';
					specialGroupLabel.style.color = '#6c757d';

					// Send AJAX request to remove the selected option from the database
					$.ajax({
						url: 'remove_specialgroup.php', // The URL of the PHP script that updates the database
						type: 'POST',
						data: {
							id: $('#id').val() // The ID of the record to update
						},
						success: function (data) {
							console.log('Special group removed successfully');
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log('Error removing special group: ' + textStatus + ' ' + errorThrown);
						}
					});
				}
			});
		};	</script>
  <script>
    $(document).ready(function () {
      $('#submitBtn').attr('disabled', 'disabled'); // Initially disable the button

      $('#firstname, #middlename, #lastname, #sex, #birthday, #age, #purok, #civilstatus, #voter, #members, #housingstatus, #employmentstatus, #phonenumber, #emailaddress, #username, #password, #confirm_password').on('keyup', function () {
        let empty = false;

        $('#firstname, #middlename, #lastname, #sex, #birthday, #age, #purok, #civilstatus, #voter, #members, #housingstatus, #employmentstatus, #phonenumber, #emailaddress, #username, #password, #confirm_password').each(function () {
          if ($(this).val() == '') {
            empty = true;
          }
        });

        if (empty) {
          $('#submitBtn').attr('disabled', 'disabled');
        } else {
          $('#submitBtn').removeAttr('disabled');
        }
      });
    });
  </script>
  <script>
		document.querySelector('[name="firstname"]').addEventListener('input', function (e) {
			this.value = this.value.replace(/[0-9]/g, '');
		});
		document.querySelector('[name="middlename"]').addEventListener('input', function (e) {
			this.value = this.value.replace(/[0-9]/g, '');
		});
		document.querySelector('[name="lastname"]').addEventListener('input', function (e) {
			this.value = this.value.replace(/[0-9]/g, '');
		});
		document.querySelector('[name="house_no"]').addEventListener('input', function (e) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		document.querySelector('[name="members"]').addEventListener('input', function (e) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
	</script>

</body>

</html>