<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
	if (time() - $_SESSION["login_time_stamp"] > 600) {
        session_unset();
        session_destroy();
        header("Location: userlogin.php");
    } else {
		$_SESSION["login_time_stamp"] = time();
	}
} else {
	header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account Settings | E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<!--Load the AJAX API-->
	<script src="https://unpkg.com/feather-icons"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<style>
		.accordion {
			--bs-accordion-active-bg: #ffc107;
			--bs-accordion-active-color: #212529;
			--bs-accordion-btn-focus-box-shadow: none;
		}

		.accordion-button::after {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'%3E%3Cpath d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/%3E%3C/svg%3E");
			transition: all 0.5s;
		}

		.accordion-button:not(.collapsed)::after {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'%3E%3Cpath d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/%3E%3C/svg%3E");
		}

		#message {
			display: none;
			position: relative;
		}

		#message p {
			margin: 5px 0 0 0;
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

		.invalid-password {
			border: 1px solid red;
		}
	</style>
</head>

<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b></a>
		<button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button"
			data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</header>
	<?php
	include 'conn.php';
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM users where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_array($query);

	if ($row['profile_picture']) {
		// Display the profile picture
		$profile_picture = $row['profile_picture'];
	} else {
		// Use a default profile picture
		$profile_picture = 'default-profile-pic.jpg';
	}
	?>
	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
				<div class="position-sticky pt-2 mt-2 sidebar-sticky bg-light">
					<ul class="nav flex-column">
						<a class="navbar-brand px-2 fs-6 bg-warning">
							<img class="float-start rounded-circle border border-2 border-dark"
								src="<?php echo $profile_picture ?>" width="60">
							<span class="fs-4 px-2 text-dark"><b>WELCOME</b></span>
							<br>
							<span class="fs-6 px-2 text-dark" style="text-transform: uppercase;">
								<?php echo $_SESSION['name']; ?>
							</span>
						</a>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userhome.php">
								<span data-feather="user" class="align-text-bottom feather-48"></span>
								User Profile
							</a>
						</li>
						<hr class="mt-0 mb-0">
						<li class="nav-item fs-7">
							<div class="accordion accordion-flush" id="accordionFlushExample">
								<div class="accordion-item">
									<h2 class="accordion-header fs-7">
										<button class="accordion-button collapsed fs-7 pt-3 pb-2 nav-link"
											style="font-size:11pt;" type="button" data-bs-toggle="collapse"
											data-bs-target="#flush-collapseOne" aria-expanded="false"
											aria-controls="flush-collapseOne">
											Document Requests
										</button>
									</h2>
									<hr class="mt-0 mb-0">
									<div id="flush-collapseOne" class="accordion-collapse collapse"
										data-bs-parent="#accordionFlushExample">
										<div class="accordion-body">
											<ul class="nav flex-column pt-4">
												<li class="nav-item fs-7" style="margin-left: -20px;">
													<a class="nav-link" style="margin-top: -40px" href="userdocument">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Clearance
														<?php
														include 'conn.php';
														$uid = $_SESSION['uid'];
														$query = "SELECT id FROM documents where userID='$uid' and status='1'";
														$query_run = mysqli_query($conn, $query);
														$row = mysqli_num_rows($query_run);
														if ($row > 0) {
															?>
															<span class="badge rounded-pill text-bg-warning text-end">
																<?php echo $row ?>
															</span>
															<?php
														}
														?>
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px" href=" ">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Indigency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px" href="">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Residency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px" href="">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Business Permit
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px; margin-bottom: -20px"
														href="">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Cedula
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
						</li>
						<hr class="mt-0 mb-0">
						<li class="nav-item fs-7">
							<a class="nav-link" href="reportincident">
								<span data-feather="message-circle" class="align-text-bottom feather-48"></span>
								Report Incident
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userevents" id="resetEvent">
								<span data-feather="calendar" class="align-text-bottom feather-48"></span>
								Events
								<?php
								include 'conn.php';
								$query = "SELECT * FROM events where status='1'";
								$query_run = mysqli_query($conn, $query);
								$row = mysqli_num_rows($query_run);
								if ($row > 0) {
									?>
									<span class="badge rounded-pill text-bg-warning text-end" id="counterBadge">
										<?php echo $row ?>
									</span>
									<?php
								}
								?>
							</a>
						</li>
						<hr class="mt-5 mb-0">
						<li class="nav-item fs-7">
							<a class="nav-link bg-warning active shadow text-dark">
								<span data-feather="settings" class="align-text-bottom feather-48"></span>
								Account Settings
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userlogout.php">
								<span data-feather="log-out" class="align-text-bottom feather-48"></span>
								Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<?php
					include 'conn.php';
					$id = $_SESSION['id'];
					$query = mysqli_query($conn, "SELECT * FROM users where id='$id'") or die(mysqli_error());
					$row = mysqli_fetch_array($query);
					?>
					<h1 style="text-transform: uppercase;" class="h2">Account Settings</h1>
				</div>
				<?php
				if (isset($_SESSION['updateerror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['updateerror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['updateerror']);
				}
				?>
				<?php
				if (isset($_SESSION['updatesuccess'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['updatesuccess']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['updatesuccess']);
				}
				?>
				<div class="card mb-2">
					<div class="card-header fw-bold">
						<i class="bi bi-person-gear"></i> Change Username
					</div>
					<div class="card-body fs-5 fw-bold mb-0 d-flex justify-content-between align-items-center">
						<p style="margin-bottom: 0px;">Username:
							<?php echo $row['username'] ?><br><span style="font-size: 15px;"
								class="text-secondary fw-normal fst-italic">
								<?php
								$lastUsernameChange = new DateTime($row['last_username_change']);
								$now = new DateTime();

								$interval = $lastUsernameChange->diff($now);
								if ($interval->y > 0) {
									if ($interval->y == 1) {
										echo "You changed your username " . $interval->format('%y year') . " ago.";
									} else {
										echo "You changed your username " . $interval->format('%y years') . " ago.";
									}
								} elseif ($interval->m > 0) {
									if ($interval->m == 1) {
										echo "You changed your username " . $interval->format('%m month') . " ago.";
									} else {
										echo "You changed your username " . $interval->format('%m months') . " ago.";
									}
								} elseif ($interval->d > 0) {
									if ($interval->d == 1) {
										echo "You changed your username " . $interval->format('%d day') . " ago.";
									} else {
										echo "You changed your username " . $interval->format('%d days') . " ago.";
									}
								} elseif ($interval->h > 0) {
									if ($interval->h == 1) {
										echo "You changed your username " . $interval->format('%h hour') . " ago.";
									} else {
										echo "You changed your username " . $interval->format('%h hours') . " ago.";
									}
								} elseif ($interval->i > 0) {
									if ($interval->i == 1) {
										echo "You changed your username " . $interval->format('%i minute') . " ago.";
									} else {
										echo "You changed your username " . $interval->format('%i minutes') . " ago.";
									}
								} else {
									if ($interval->s == 1) {
										echo "You changed your username " . $interval->format('%s second') . " ago.";
									} else {
										echo "You changed your username " . $interval->format('%s seconds') . " ago.";
									}
								}?>
						</p>
						<button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal"
							data-bs-target="#editUsernameModal">
							<i class="bi bi-person-gear"></i> Edit
						</button>
					</div>
				</div>
				<div class="card">
					<div class="card-header fw-bold">
						<i class="bi bi-key-fill"></i> Change Password
					</div>
					<div class="card-body fs-5 fw-bold mb-0 d-flex justify-content-between align-items-center">
						<p style="margin-bottom: 0px;">Password
							<br><span style="font-size: 15px;" class="text-secondary fw-normal fst-italic">
								<?php
								$lastPasswordChange = new DateTime($row['last_password_change']);
								$now = new DateTime();

								$interval = $lastPasswordChange->diff($now);
								if ($interval->y > 0) {
									if ($interval->y == 1) {
										echo "You changed your password " . $interval->format('%y year') . " ago.";
									} else {
										echo "You changed your password " . $interval->format('%y years') . " ago.";
									}
								} elseif ($interval->m > 0) {
									if ($interval->m == 1) {
										echo "You changed your password " . $interval->format('%m month') . " ago.";
									} else {
										echo "You changed your password " . $interval->format('%m months') . " ago.";
									}
								} elseif ($interval->d > 0) {
									if ($interval->d == 1) {
										echo "You changed your password " . $interval->format('%d day') . " ago.";
									} else {
										echo "You changed your password " . $interval->format('%d days') . " ago.";
									}
								} elseif ($interval->h > 0) {
									if ($interval->h == 1) {
										echo "You changed your password " . $interval->format('%h hour') . " ago.";
									} else {
										echo "You changed your password " . $interval->format('%h hours') . " ago.";
									}
								} elseif ($interval->i > 0) {
									if ($interval->i == 1) {
										echo "You changed your password " . $interval->format('%i minute') . " ago.";
									} else {
										echo "You changed your password " . $interval->format('%i minutes') . " ago.";
									}
								} else {
									if ($interval->s == 1) {
										echo "You changed your password " . $interval->format('%s second') . " ago.";
									} else {
										echo "You changed your password " . $interval->format('%s seconds') . " ago.";
									}
								} ?>
						</p>
						<button type="button" class="btn btn-warning editpassbtn" data-bs-toggle="modal"
							data-bs-target="#editPasswordModal">
							<i class="bi bi-key-fill"></i> Edit
						</button>
					</div>
				</div>
				<!-- Edit Username Modal -->
				<div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editUsernameModalLabel"><i
										class="bi bi-person-fill-gear"></i> Change Username</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form class="forms needs-validation" method="POST" action="changeusername.php"
									novalidate="">
									<input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
									<div class="form-floating mb-3">
										<input type="text" class="form-control" value="<?php echo $row['username']; ?>"
											name="username" id="editUsername" required>
										<label for="username" class="form-label">Username</label>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" name="updateusername" class="btn btn-warning"><i
										class="bi bi-person-fill-gear"></i> Change Username</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Edit Password Modal -->
				<div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editPasswordModalLabel"><i class="bi bi-key-fill"></i>
									Change Password</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form class="forms needs-validation" method="POST" action="changepassword.php"
									novalidate="">
									<input type="hidden" value="<?php echo $row['id']; ?>" name="updatepassword_id"
										id="updatepassword_id">
									<div class="form-floating mb-2">
										<input type="password" class="form-control" name="password" id="editPassword"
											required>
										<label for="password" class="form-label">Password</label>
									</div>
									<div class="col d-flex justify-content-start mb-2">
										<div class="form-check d-flex align-items-center">
											<input class="checkbox" type="checkbox" onclick="myFunction()" />
											<label class="checkbox-label" style="font-size: 10pt; margin-left:5px;">
												Show Password
											</label>
										</div>
									</div>
									<div class="text-start" id="message">
										<p><b>Password must contain the following:</b></p>
										<p id="length" class="invalid"><b>8</b> up to <b>32</b> characters</b>
										</p>
										<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
										<p id="capital" class="invalid">A <b>uppercase</b> letter</p>
										<p id="number" class="invalid">A <b>number</b></p>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" name="updatepassword" class="btn btn-warning">
									<i class="bi bi-key-fill"></i> Change Password</button>
							</div>
							</form>
						</div>
					</div>
				</div>
		</div>
		</main>
	</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script>feather.replace()</script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
		integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
		</script>
	<script>
		$(document).ready(function () {
			$('#counterBadge').on('click', function () {

				$.ajax({
					url: 'reset_counter.php',
					type: 'POST',
					success: function () {
						// Change the text to '1' when the AJAX call is successful
						$('#counterBadge').text('1');
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.error(textStatus, errorThrown);
						// Change the text to 'Error' when the AJAX call fails
						$('#counterBadge').text('Error');
					}
				});
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('.editbtn').on('click', function () {

				$('#editUsernameModal').modal('show');
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('.editpassbtn').on('click', function () {

				$('#editPasswordModal').modal('show');
			});
		});
	</script>
	<style>

	</style>

	<script>
		(() => {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.querySelectorAll('.needs-validation')

			// Password validation function
			function validatePassword(password) {
				// Validate lowercase letters
				var lowerCaseLetters = /[a-z]/g;
				if (!password.match(lowerCaseLetters)) {
					return false;
				}

				// Validate capital letters
				var upperCaseLetters = /[A-Z]/g;
				if (!password.match(upperCaseLetters)) {
					return false;
				}

				// Validate numbers
				var numbers = /[0-9]/g;
				if (!password.match(numbers)) {
					return false;
				}

				// Validate length
				if (password.length < 8) {
					return false;
				}

				return true;
			}

			// Loop over them and prevent submission
			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					const passwordField = form.elements["editPassword"]; // Replace "editPassword" with the name of your password field
					const password = passwordField.value;

					if (!form.checkValidity() || !validatePassword(password)) {
						event.preventDefault()
						event.stopPropagation()
						passwordField.classList.add('invalid-password');
					} else {
						passwordField.classList.remove('invalid-password');
					}

					form.classList.add('was-validated')
				}, false)
			})
		})()
	</script>
	<script>
		function myFunction() {
			var x = document.getElementById("editPassword");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
	<script>
		var myInput = document.getElementById("editPassword");
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
		$(document).ready(function () {
			$('#resetEvent').on('click', function () {
				// Remove the badge immediately when clicked
				$('#counterBadge').remove();

				$.ajax({
					url: 'reset_counter.php',
					type: 'POST',
					success: function () {
						// No need to do anything as the badge is already removed
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.error(textStatus, errorThrown);
					}
				});
			});
		});
	</script>
</body>

</html>