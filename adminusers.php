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
	<title>Manage Users | E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="DataTables/datatables.css" />
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#myTable').DataTable();
		});
	</script>
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

		div.dataTables_wrapper div.dataTables_filter input {
			border-radius: 5px;
			border: 1px solid #ffc107;
		}

		div.dataTables_wrapper div.dataTables_filter input:focus {
			border-radius: 5px;
			border: 1px solid #ffc107;
			box-shadow: none;
		}

		.pagination .page-item.active .page-link {
			background-color: #ffc107;
			border-color: #ffc107;
			color: black
		}

		.pagination .page-link {
			margin-bottom: 10px;
		}

		div.dataTables_wrapper div.dataTables_length label {
			margin-bottom: 10px;
		}

		div.dataTables_wrapper div.dataTables_length select {
			border-radius: 5px;
			border: 1px solid #ffc107;
		}

		div.dataTables_wrapper div.dataTables_length select:focus {
			border-radius: 5px;
			border: 1px solid #ffc107;
			box-shadow: none;
		}

		.pagination .page-item.active .page-link {
			background-color: #ffc107;
			border-color: #ffc107;
			color: black
		}

		.pagination .page-link {
			margin-bottom: 10px;
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
	</style>
</head>

<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b></a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
			data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
				<div class="position-sticky pt-2 mt-2 sidebar-sticky bg-light">
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
										<button class="accordion-button collapsed fs-7 pb-2 nav-link"
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
														href="admindocument.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Clearance
														<?php
														include 'conn.php';
														$query = "SELECT id FROM documents WHERE status = 0";
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
													<a class="nav-link" style="margin-top: -15px"
														href="adminindigency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Indigency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href="adminresidency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Residency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href=" adminbusinesspermit.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Business Permit
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px; margin-bottom: -20px"
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
							<a class="nav-link text-dark bg-warning active shadow">
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

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">MANAGE USERS</h1>
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
				<?php
				if (isset($_SESSION['emailerror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['emailerror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['emailerror']);
				}
				?>
				<?php
				if (isset($_SESSION['emailsent'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['emailsent']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['emailsent']);
				}
				?>
				<div class="table-responsive">
					<div class="data_table">
						<table id="myTable" class="table" style="width:100%">
							<thead>
								<tr>
									<th scope="col">Photo</th>
									<th scope="col">ID</th>
									<th scope="col">Full Name</th>
									<th scope="col">Username</th>
									<th scope="col">Residency Status</th>
									<th scope="col">Status</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'conn.php';
								$query = 'SELECT * FROM users WHERE username IS NOT NULL AND username <> ""';
								$result = mysqli_query($conn, $query);
								while ($row = mysqli_fetch_array($result)) {
									$id = $row['id'];
									$hash = hash('sha256', $id);
									?>
									<tr>
										<td>
											<?php
											if (!empty($row['profile_picture'])) {
												echo '<img class="rounded-circle border border-warning" src="' . $row['profile_picture'] . '" alt="Profile Picture" width="80">';
											} else {
												echo '<img class="rounded-circle border border-warning" src="default-profile-pic.jpg" alt="Profile Picture" width="80">';
											}
											?>
										<td>
											<?php echo $row['id']; ?>
										</td>
										<td>
											<?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
										</td>
										<td>
											<?php echo $row['username']; ?>
										</td>
										<td>
											<?php
											if ($row['status'] == 1) {
												echo '<span class="badge rounded-pill bg-success">ACTIVATED</span>';
											} else {
												echo '<span class="badge rounded-pill bg-danger">DEACTIVATED</span>';
											}
											?>
										</td>
										<td>
											<?php
											if ($row['residencystatus'] == 'Old Resident') {
												echo '<span class="badge rounded-pill bg-success">OLD RESIDENT</span>';
											} else {
												echo '<span class="badge rounded-pill bg-danger">TRANSFERRED / NEW RESIDENT</span>';
											}
											?>
										</td>
										<td class="text-right">
											<div class="btn-group me-2">
												<?php $imagePath = $row['proof']; ?>
												<a class="btn btn-secondary viewbtn" data-proof="<?= $imagePath; ?>"
													style="width: 40px;"><i class="bi bi-eye"></i></a>
												<button type="button" class="btn btn-success btn-sm editstatusbtn"
													data-bs-target="#editStatusModal" style="width: 40px;"><i
														class="bi bi-gear"></i></button>
												<button type="button" class="btn btn-success btn-sm editbtn"
													data-bs-target="#editUsernameModal" style="width: 40px;"><i
														class="bi bi-person-fill-gear"></i></button>
												<button type="button" class="btn btn-primary btn-sm editpassbtn"
													data-bs-target="#editPasswordModal" style="width: 40px;"><i
														class="bi bi-key-fill"></i></button>
												<?php if ($row['status'] == 1):
													?>
													<a href="sendverifiedemail.php?id=<?php echo $row['id']; ?>"
														class="btn btn-warning" style="width: 40px;">
														<i class="bi bi-bell"></i></a>
												<?php endif; ?>
											</div>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
						<!-- View Modal -->
						<div class="modal fade" id="viewProofModal" tabindex="-1" aria-labelledby="viewProofModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="viewProofModalLabel">Proof
										</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<img id="proofImage" src="" alt="Proof" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
						<!-- Edit Status Modal -->
						<div class="modal fade" id="editStatusModal" tabindex="-1"
							aria-labelledby="editStatusModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editStatusModalLabel"><i class="bi bi-gear"></i>
											Approve Account</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="forms needs-validation" method="POST" action="updateuserstatus.php"
											novalidate="">
											<input type="hidden" name="updatestatus_id" id="updatestatus_id">
											<div class="form-floating mb-3">
												<select class="form-select" name="status" id="editStatus" required>
													<option disabled selected>Select Status</option>
													<option value="1">Activate</option>
													<option value="0">Deactivate</option>
												</select>
												<label for="updatestatus_id" class="form-label">Activation</label>
											</div>


									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Close</button>
										<button type="submit" name="updateuserstatus" class="btn btn-warning"><i
												class="bi bi-gear"></i> Update Status</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Edit Username Modal -->
						<div class="modal fade" id="editUsernameModal" tabindex="-1"
							aria-labelledby="editUsernameModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editUsernameModalLabel"><i
												class="bi bi-person-fill-gear"></i> Edit Username</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="forms needs-validation" method="POST" action="updateuser.php"
											novalidate="">
											<input type="hidden" name="update_id" id="update_id">
											<div class="form-floating mb-3">
												<input type="text" class="form-control" name="username"
													id="editUsername" required>
												<label for="username" class="form-label">Username</label>
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Close</button>
										<button type="submit" name="updateusername" class="btn btn-warning"><i
												class="bi bi-person-fill-gear"></i> Update User</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Edit Password Modal -->
						<div class="modal fade" id="editPasswordModal" tabindex="-1"
							aria-labelledby="editPasswordModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editPasswordModalLabel"><i
												class="bi bi-key-fill"></i>
											Change Password</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="forms needs-validation" method="POST" action="updatepassword.php"
											novalidate="">
											<input type="hidden" name="updatepassword_id" id="updatepassword_id">
											<div class="form-floating mb-2">
												<input type="password" class="form-control" name="password"
													id="editPassword" required>
												<label for="password" class="form-label">Password</label>
											</div>
											<div class="col d-flex justify-content-start mb-2">
												<div class="form-check d-flex align-items-center">
													<input class="checkbox" type="checkbox" onclick="myFunction()" />
													<label class="checkbox-label"
														style="font-size: 10pt; margin-left:5px;">
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
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Close</button>
										<button type="submit" name="updatepassword" class="btn btn-warning">
											<i class="bi bi-key-fill"></i> Change Password</button>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script>
		feather.replace()
	</script>
	<script src="js/bootstrap.bundle.min.js">
	</script>
	<script src="DataTables/datatables.js">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
	<script>
		$(document).ready(function () {
			$('.editbtn').on('click', function () {

				$('#editUsernameModal').modal('show');

				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function () {
					return $(this).text().trim();
				}).get();

				console.log(data);

				$('#update_id').val(data[1]);
				$('#editUsername').val(data[3]);
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('.editpassbtn').on('click', function () {

				$('#editPasswordModal').modal('show');

				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function () {
					return $(this).text().trim();
				}).get();

				console.log(data);

				$('#updatepassword_id').val(data[1]);
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('.editstatusbtn').on('click', function () {

				$('#editStatusModal').modal('show');

				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function () {
					return $(this).text().trim();
				}).get();

				console.log(data);

				$('#updatestatus_id').val(data[1]);
			});
		});
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
			$('.viewbtn').on('click', function () {
				// Get the image path from the data-proof attribute
				var proof = $(this).data('proof');

				// Set the src attribute of the proofImage to the image path
				$('#proofImage').attr('src', proof);

				// Show the viewProofModal
				$('#viewProofModal').modal('show');
			});
		});
	</script>
</body>

</html>