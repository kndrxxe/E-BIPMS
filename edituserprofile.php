<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-BIPMS</title>
	<link rel = "icon" href = "kanlurangbukal.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<!--Load the AJAX API-->
	<script src="https://unpkg.com/feather-icons"></script>
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
	</style>
</head>
<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b></a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</header>
		<?php
	include 'conn.php';
	$id = $_SESSION['id'];
	$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);

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
								<img class="float-start rounded-circle" src="<?php echo $profile_picture;?>" width="60">
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
													<a class="nav-link" style="margin-top: -40px"
														href="userdocument.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Clearance
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href=" admindocument.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Indigency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href=" admindocument.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Residency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href=" admindocument.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Business Permit
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px; margin-bottom: -20px"
														href=" admindocument.php">
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
								<a class="nav-link" href="">
									<span data-feather="message-circle" class="align-text-bottom feather-48"></span>
									Feedback
								</a>
							</li>
							<hr class="mt-5 mb-1">
							<li class="nav-item fs-7">
								<a class="nav-link" href="userlogout.php">
									<span data-feather="log-out" class="align-text-bottom feather-48"></span>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</nav>
				<form action="updateuserprofile.php" method="POST" enctype="multipart/form-data">
					<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
						<style>
							
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
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<?php
	include 'conn.php';
	$id = $_SESSION['id'];
	$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);

	if ($row['profile_picture']) {
		// Display the profile picture
		$profile_picture = $row['profile_picture'];
	} else {
		// Use a default profile picture
		$profile_picture = 'default-profile-pic.jpg';
	}
	?>
	
	<h1 style="text-transform: uppercase;" class="h2">Edit Profile</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group me-2">
			<button type="submit" class="btn btn-md btn-success"><i class="bi bi-check-circle"> </i>Save Changes</button>
		</div>
	</div>
</div>
<form action="updateuserprofile.php" method="POST" enctype="multipart/form-data">
<div class="text-center mb-3">
	<img class="rounded-circle border border-2 border-warning" src="<?php echo $profile_picture ?>" width="150">
	
	<div class="form-floating mt-2 mb-1" style="width: 80%; margin-left:auto; margin-right: auto">
    <input type="file" class="form-control border-warning rounded" value="<?php echo $row['profile_picture'] ?>" id="profile_picture" name="profile_picture" accept="image/*" /> 
	<button type="submit" class="btn btn-md btn-success mt-2"><i class="bi bi-upload"> </i>Upload</button>
    <label for="profile_picture">Profile Picture</label>
</div>
</div>
</form>
<div class="d-flex flex-wrap row g-4 mb-3 gx-1 p-3  text-start">
	<div class="row g-2">
		<div class="form-floating">
			<input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>" />
		</div>
		<div class="form-floating col">
			<input type="text" class="form-control rounded" name="firstname" placeholder="First Name" value="<?php echo $row['firstname'] ?>" readonly/>
			<label for="firstname">First Name</label>
		</div>
		<div class="form-floating col">
			<input type="text" class="form-control rounded" name="middlename" placeholder="Middle Name" value="<?php echo $row['middlename'] ?>" readonly/>
			<label for="middlename">Middle Name</label>
		</div>
		<div class="form-floating col">
			<input type="text" class="form-control rounded" name="lastname" placeholder="Last Name" value="<?php echo $row['lastname'] ?>" readonly/>
			<label for="lastname">Last Name</label>
		</div>
	</div>
	<div class="row g-2">
		<div class="form-floating col">
			<input type="date" class="form-control rounded" name="birthday" placeholder="Birth Date" value="<?php echo $row['birthday'] ?>" readonly/>
			<label for="birthday">Birth Date</label>
		</div>
		<div class="form-floating col">
			<input type="text" class="form-control rounded" name="house_no" placeholder="House No." value="<?php echo $row['house_no']?>" />
			<label for="house_no">House No.</label>
		</div>
		<div class="form-floating col">
			<select class="form-select form-select" name="purok" placeholder="Purok" required>
				<option value="" disabled>Purok</option>
				<option value="Purok 1" 
				<?php
				if ($row['purok'] == 'Purok 1') {
					echo "selected";
				}
				?>
				>Purok 1</option>
				<option value="Purok 2"
				<?php
				if ($row['purok'] == 'Purok 2') {
					echo "selected";
				}
				?>
				>Purok 2</option>
				<option value="Purok 3"
				<?php
				if ($row['purok'] == 'Purok 3') {
					echo "selected";
				}
				?>
				>Purok 3</option>
				<option value="Purok 4"
				<?php
				if ($row['purok'] == 'Purok 4') {
					echo "selected";
				}
				?>
				>Purok 4</option>
				<option value="Purok 5"
				<?php
				if ($row['purok'] == 'Purok 5') {
					echo "selected";
				}
				?>
				>Purok 5</option>
				<option value="Purok 6"
				<?php
				if ($row['purok'] == 'Purok 6') {
					echo "selected";
				}
				?>
				>Purok 6</option>
				<option value="Purok 7"
				<?php
				if ($row['purok'] == 'Purok 7') {
					echo "selected";
				}
				?>
				>Purok 7</option>
			</select>
			<label for="house_no">Purok</label>
		</div>
		<div class="form-floating">
			<select class="form-select form-select" name="sex" placeholder="Sex" value="<?php echo $row['sex'] ?>" readonly />
				<option value="" disabled>Sex</option>
				<option value="Male"
				<?php
				if ($row['sex'] == 'Male') {
					echo "selected";
				}
				?>
				>Male</option>
				<option value="Female"
				<?php
				if ($row['sex'] == 'Female') {
					echo "selected";
				}
				?>
				>Female</option>
				<option value="Prefer not to say"
				<?php
				if ($row['sex'] == 'Prefer not to say') {
					echo "selected";
				}
				?>
				>Prefer not to say</option>
			</select>
			<label for="sex">Sex</label>
		</div>
		<div class="form-floating mb-2">
			<input type="email" class="form-control border-warning rounded" name="email" placeholder="E-mail" value="<?php echo $row['email'] ?>"/>
			<label for="birthday">E-mail Address</label>
		</div>
		<h1 style="text-transform: uppercase;" class="h2">Change Credentials</h1>
		<div class="form-floating mb-2">
			<input type="text" class="form-control border-warning rounded" name="username" placeholder="Username" value="<?php echo $row['username'] ?>" />
			<label for="username">User Name</label>
		</div>
		<div class="form-floating mb-2">
			<input type="password" class="form-control border-warning rounded" name="password" placeholder="Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 up to more characters" maxlength="32"/>
			<label for="password">Password</label>
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
</div>
</main>
</form>
</div>
</div>
<script>feather.replace()</script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
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
