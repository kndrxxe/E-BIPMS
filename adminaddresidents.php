<?php
session_start();

include 'conn.php';
if (isset($_SESSION['uid']) && isset($_SESSION['user']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
	if (time() - $_SESSION['login_time_stamp'] > 600) {
		session_unset();
		session_destroy();
		header("Location: userlogin.php");
	} else {
		$_SESSION['login_time_stamp'] = time();
	}
} else {
	header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New Resident | E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<!--Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<script src="https://unpkg.com/feather-icons"></script>
</head>
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
</style>

<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b>
		</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
			data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-warning sidebar collapse">
				<div class="position-sticky pt-0 mt-2 sidebar-sticky bg-light">
					<ul class="nav flex-column">
						<a class="navbar-brand px-2 fs-6 bg-warning">
							<img class="float-start" src="kanlurangbukal.png" width="60">
							<span class="fs-4 px-2 text-dark"><b>WELCOME</b></span>
							<br>
							<span class="fs-6 px-2 text-dark" style="text-transform: uppercase;">
								<?php echo $_SESSION['user'] ?>
							</span>
						</a>
						<li class="nav-item fs-7">
							<a class="nav-link" aria-current="page" href="adminhome.php">
								<span data-feather="activity" class="align-text-bottom feather-48"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="adminresidents.php">
								<span data-feather="user" class="align-text-bottom feather-48"></span>
								Residents Profile
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
										<div class="accordion-body" style="margin-right: -20px;">
											<ul class="nav flex-column pt-4">
												<li class="nav-item fs-7" style="margin-left: -20px;">
													<a class="nav-link" style="margin-top: -40px"
														href="admindocument.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Clearance
													
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href="adminindigency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Indigency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href="adminresidency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Residency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href=" adminidentification.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Identification
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px; margin-bottom: -15px"
														href=" admincedula.php">
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
							<a class="nav-link" href="adminincidentreport">
								<span data-feather="message-circle" class="align-text-bottom feather-48"></span>
								Incident Report
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="adminofficials.php">
								<span data-feather="users" class="align-text-bottom feather-48"></span>
								Barangay Officials
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="adminusers.php">
								<span data-feather="layers" class="align-text-bottom feather-48"></span>
								Manage Users
							</a>
						</li>

						<li class="nav-item fs-7">
							<a class="nav-link" href="adminevents.php">
								<span data-feather="calendar" class="align-text-bottom feather-48"></span>
								Events
							</a>
						</li>
						<hr class="mt-2 mb-1">
						<li class="nav-item fs-7">
							<a class="nav-link" href="adminlogout.php">
								<span data-feather="log-out" class="align-text-bottom feather-48"></span>
								Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<form class="needs-validation" action="adminresidentsprocess.php" method="POST" novalidate="">
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<div
						class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">ADD NEW RESIDENT</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-1">
								<button type="submit" class="btn btn-md btn-warning"><i class="bi bi-person-fill-add">
									</i>Add Resident</button>
							</div>
						</div>
					</div>
					<div class="text-center mb-3">
						<img class="rounded-circle border border-2 border-warning" src="default-profile-pic.jpg"
							width="250">
					</div>
					<div class="d-flex flex-wrap row g-4 mb-3 gx-1 p-3  text-start">
						<div class="row g-2">
							<div class="form-floating">
								<input type="hidden" class="form-control" name="id" />
								<input type="hidden" class="form-control" name="isEditable" value="1" />
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="firstname"
									placeholder="First Name" required />
								<label for="firstname">First Name</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="middlename"
									placeholder="Middle Name" required />
								<label for="middlename">Middle Name</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="lastname" placeholder="Last Name"
									required />
								<label for="lastname">Last Name</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<select class="form-select form-select" name="sex" placeholder="Sex" required>
									<option selected disabled> Choose from options</option>
									<option value="Male">Male
									</option>
									<option value="Female">
										Female</option>
								</select>
								<label for="sex">Sex</label>
							</div>
							<div class="form-floating col">
								<input type="date" class="form-control rounded" name="birthday" max="9999-12-31"
									id="birthday" placeholder="Birth Date" required />
								<label for="birthday">Birth Date</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="age" placeholder="Age" id="age"
									readonly />
								<label for="age">Age</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="house_no"
									placeholder="House No. (optional)" required />
								<label for="house_no">House No.</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="purok" placeholder="Purok" required />
								<option selected disabled> Choose from options </option>
								<option value="Purok 1">
									Purok 1</option>
								<option value="Purok 2">
									Purok 2</option>
								<option value="Purok 3">
									Purok 3</option>
								<option value="Purok 4">
									Purok 4</option>
								<option value="Purok 5">
									Purok 5</option>
								<option value="Purok 6">
									Purok 6</option>
								<option value="Purok 7">
									Purok 7</option>
								</select>
								<label for="house_no">Purok</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<select class="form-select form-select" name="civilstatus" placeholder="Civil Status"
									required>
									<option selected disabled>Choose from options</option>
									<option value="Single"> Single</option>
									<option value="Married"> Married</option>
									<option value="Widowed"> Widowed</option>
								</select>
								<label for="civilstatus">Civil Status</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="voter" placeholder="Registered Voter"
									required>
									<option selected disabled>Choose from options</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
								<label for="voter">Registered Voter</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="col d-flex justify-content-start mt-0 mb-0">
								<div class="form-check d-flex align-items-center">
									<input type="hidden" id="specialGroupCheckboxHidden" name="is_special_group"
										value="0" />
									<input class="checkbox" type="checkbox" id="specialGroupCheckbox" value=1 />
									<label class="checkbox-label text-start" id="specialGroupLabel"
										style="font-size: 12pt; margin-left:5px; color:#6c757d;">
										Are you belong to a special group?
									</label>
								</div>
							</div>
							<div class="form-floating col" id="specialGroupDiv">
								<select class="form-select form-select" id="specialGroup" name="specialgroup"
									placeholder="specialgroup">
									<option selected disabled>Choose from options</option>
									<option value="PWD">PWD</option>
									<option value="Senior Citizen">Senior Citizen</option>
									<option value="Solo Parent">Solo Parent</option>
									<option value="Indigenous People">Indigenous People</option>
									<option value="Out of School Youth">Out of School Youth</option>
									<option value="Pregnant">Pregnant</option>
									<option value="Lactating">Lactating</option>
								</select>
								<label for="specialGroup">Special Group</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="number" class="form-control" name="members" id="members" min="0" max="99"
									placeholder="No. of Family Members" required />
								<label class="form-label" for="members">No. of Family Members</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="housingstatus"
									value="<?php echo $row['housingstatus'] ?>" placeholder="housingstatus">
									<option selected disabled>Choose from options</option>
									<option value="Owned">
										Owned</option>
									<option value="Rented">
										Rented
									</option>
									<option value="Living with Relatives">Living with Relatives
									</option>
									<option value="Living with Friends">Living with Friends</option>
									<option value="Living with Others">Living with Others</option>
								</select>
								<label for="housingstatus">Housing Status</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<select class="form-select form-select" name="employmentstatus"
									placeholder="employmentstatus" required>
									<option selected disabled>Choose from options</option>
									<option value="Employed">Employed
									</option>
									<option value="Unemployed">Unemployed
									</option>
									<option value="Self-Employed">Self-Employed
									</option>
									<option value="Retired">Retired
									</option>
									<option value="Student">Student
									</option>
								</select>
								<label for="employmentstatus">Employment Status</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="phonenumber" id="phonenumber"
									pattern="\+63[0-9]{10}" maxlength="13" value="+63" required
									oninput="this.value = this.value.replace(/[^0-9+]/g, ''); if (this.value.length < 3) this.value = '+63';"
									onfocus="if(this.value === '') { this.value = '+63'; }"
									style="background-image: url('philippines-flag-icon-32.png'); background-repeat: no-repeat; background-position: 10px center; margin-left: 0px; padding-left: 45px; margin-top: 15px; padding-top: 10px;" />
								<label class="form-label" for="phonenumber">Phone Number</label>
							</div>
						</div>
					</div>
		</div>
		</main>
		</form>
	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script>feather.replace()
	</script>
	<script src="js/bootstrap.bundle.min.js">
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
			document.getElementById('specialGroupDiv').style.display = 'none';

			document.getElementById('specialGroupCheckbox').addEventListener('change', function () {
				var specialGroupDiv = document.getElementById('specialGroupDiv');
				var specialGroupLabel = document.getElementById('specialGroupLabel');
				if (this.checked) {
					specialGroupDiv.style.display = 'block';
					specialGroupLabel.style.color = '#212529';
				} else {
					specialGroupDiv.style.display = 'none';
					specialGroupLabel.style.color = '#6c757d';
				}
			});
		};
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