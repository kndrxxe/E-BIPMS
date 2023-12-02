<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
} else {
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
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
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
			data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
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
								src="<?php echo $profile_picture; ?>" width="60">
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
							<a class="nav-link" href="">
								<span data-feather="message-circle" class="align-text-bottom feather-48"></span>
								Report Incident
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userevents.php">
								<span data-feather="calendar" class="align-text-bottom feather-48"></span>
								Events
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

						#message p {
							line-height: 1;
						}
					</style>
					<div
						class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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

						<h1 style="text-transform: uppercase;" class="h2">Edit Profile</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-2">
								<button type="submit" class="btn btn-md btn-success"><i class="bi bi-check-circle">
									</i>Save</button>
							</div>
						</div>
					</div>
					<form action="updateuserprofile.php" method="POST" enctype="multipart/form-data">
						<div class="text-center mb-3">
							<img class="rounded-circle border border-2 border-warning"
								src="<?php echo $profile_picture ?>" width="250">
							<div class="form-floating mt-2 mb-1"
								style="width: 80%; margin-left:auto; margin-right: auto">
								<input type="file" class="form-control border-warning rounded"
									value="<?php echo $row['profile_picture'] ?>" id="profile_picture"
									name="profile_picture" accept="image/*" />
								<button type="submit" class="btn btn-md btn-success mt-2"><i class="bi bi-upload">
									</i>Upload</button>
								<label for="profile_picture">Profile Picture</label>

							</div>
						</div>
					</form>
					<div class="d-flex justify-content-center">
						<form action="delete_profile_picture.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<button type="submit" class="btn btn-danger mt-0"><i class="bi bi-trash">
								</i>Delete Picture</button>
						</form>
					</div>
					<div class="d-flex flex-wrap row g-4 mb-3 gx-1 p-3  text-start">
						<div class="row g-2">
							<div class="form-floating">
								<input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>" />
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="firstname"
									value="<?php echo $row['firstname'] ?>" placeholder="First Name" required />
								<label for="firstname">First Name</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="middlename"
									value="<?php echo $row['middlename'] ?>" placeholder="Middle Name" required />
								<label for="middlename">Middle Name</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="lastname"
									value="<?php echo $row['lastname'] ?>" placeholder="Last Name" required />
								<label for="lastname">Last Name</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<select class="form-select form-select" name="sex" value="<?php echo $row['sex'] ?>"
									placeholder="Sex" required>
									<option selected disabled> Choose from options</option>
									<option value="Male" <?php
									if ($row['sex'] == 'Male') {
										echo "selected";
									}
									?>>Male
									</option>
									<option value="Female" <?php
									if ($row['sex'] == 'Female') {
										echo "selected";
									}
									?>>
										Female</option>
								</select>
								<label for="sex">Sex</label>
							</div>
							<div class="form-floating col">
								<input type="date" class="form-control rounded" name="birthday" max="9999-12-31"
									id="birthday" value="<?php echo $row['birthday'] ?>" placeholder="Birth Date"
									required />
								<label for="birthday">Birth Date</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" value="<?php echo $row['age'] ?>"
									name="age" placeholder="Age" id="age" readonly />
								<label for="age">Age</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="house_no"
									placeholder="House No. (optional)" value="<?php echo $row['house_no'] ?>"
									required />
								<label for="house_no">House No.</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="purok" value="<?php echo $row['purok'] ?>"
									placeholder="Purok" required />
								<option selected disabled> Choose from options </option>
								<option value="Purok 1" <?php
								if ($row['purok'] == 'Purok 1') {
									echo "selected";
								}
								?>>
									Purok 1</option>
								<option value="Purok 2" <?php
								if ($row['purok'] == 'Purok 2') {
									echo "selected";
								}
								?>>
									Purok 2</option>
								<option value="Purok 3" <?php
								if ($row['purok'] == 'Purok 3') {
									echo "selected";
								}
								?>>
									Purok 3</option>
								<option value="Purok 4" <?php
								if ($row['purok'] == 'Purok 4') {
									echo "selected";
								}
								?>>
									Purok 4</option>
								<option value="Purok 5" <?php
								if ($row['purok'] == 'Purok 5') {
									echo "selected";
								}
								?>>
									Purok 5</option>
								<option value="Purok 6" <?php
								if ($row['purok'] == 'Purok 6') {
									echo "selected";
								}
								?>>
									Purok 6</option>
								<option value="Purok 7" <?php
								if ($row['purok'] == 'Purok 7') {
									echo "selected";
								}
								?>>
									Purok 7</option>
								</select>
								<label for="house_no">Purok</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<select class="form-select form-select" name="civilstatus"
									value="<?php echo $row['civilstatus'] ?>" placeholder="Civil Status" required>
									<option selected disabled>Choose from options</option>
									<option value="Single" <?php
									if ($row['civilstatus'] == 'Single') {
										echo "selected";
									}
									?>> Single</option>
									<option value="Married" <?php
									if ($row['civilstatus'] == 'Married') {
										echo "selected";
									}
									?>> Married</option>
									<option value="Widowed" <?php
									if ($row['civilstatus'] == 'Widowed') {
										echo "selected";
									}
									?>> Widowed</option>
								</select>
								<label for="civilstatus">Civil Status</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="voter" value="<?php echo $row['voter'] ?>"
									placeholder="Registered Voter" required>
									<option selected disabled>Choose from options</option>
									<option value="Yes" <?php
									if ($row['voter'] == 'Yes') {
										echo "selected";
									}
									?>>Yes</option>
									<option value="No" <?php
									if ($row['voter'] == 'No') {
										echo "selected";
									}
									?>>No</option>
								</select>
								<label for="voter">Registered Voter</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="col d-flex justify-content-start mt-0 mb-0">
								<div class="form-check d-flex align-items-center">
									<input class="checkbox" type="checkbox" id="specialGroupCheckbox"
										name="is_special_group" value="1" <?php if ($row['is_special_group'] == '1')
											echo 'checked'; ?> />
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
									<option value="PWD" <?php if ($row['specialgroup'] == 'PWD')
										echo 'selected'; ?>>PWD
									</option>
									<option value="Senior Citizen" <?php if ($row['specialgroup'] == 'Senior Citizen')
										echo 'selected'; ?>>Senior Citizen</option>
									<option value="Solo Parent" <?php if ($row['specialgroup'] == 'Solo Parent')
										echo 'selected'; ?>>Solo Parent</option>
									<option value="Indigenous People" <?php if ($row['specialgroup'] == 'Indigenous People')
										echo 'selected'; ?>>Indigenous People</option>
									<option value="Out of School Youth" <?php if ($row['specialgroup'] == 'Out of School Youth')
										echo 'selected'; ?>>Out of School Youth</option>
									<option value="Pregnant" <?php if ($row['specialgroup'] == 'Pregnant')
										echo 'selected'; ?>>Pregnant</option>
									<option value="Lactating" <?php if ($row['specialgroup'] == 'Lactating')
										echo 'selected'; ?>>Lactating</option>
								</select>
								<label for="specialGroup">Special Group</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="text" class="form-control" name="members" id="members"
									value="<?php echo $row['members'] ?>" required />
								<label class="form-label" for="members">No. of Family Members</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="housingstatus" placeholder="housingstatus"
									required>
									<option selected disabled>Choose from options</option>
									<option value="Owned" <?php if ($row['housingstatus'] == 'Owned')
										echo 'selected'; ?>>
										Owned</option>
									<option value="Rented" <?php if ($row['housingstatus'] == 'Rented')
										echo 'selected'; ?>>Rented
									</option>
									<option value="Living with Relatives" <?php if ($row['housingstatus'] == 'Living with Relatives')
										echo 'selected'; ?>>Living with Relatives
									</option>
									<option value="Living with Friends" <?php if ($row['housingstatus'] == 'Living with Friends')
										echo 'selected'; ?>>Living with Friends</option>
									<option value="Living with Others" <?php if ($row['housingstatus'] == 'Living with Others')
										echo 'selected'; ?>>Living with Others</option>
								</select>
								<label for="housingstatus">Housing Status</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="phonenumber"
									value="<?php echo $row['phonenumber'] ?>" id="phonenumber" pattern="\+63[0-9]{10}"
									maxlength="13" value="+63" required
									oninput="this.value = this.value.replace(/[^0-9+]/g, ''); if (this.value.length < 3) this.value = '+63';"
									onfocus="if(this.value === '') { this.value = '+63'; }"
									style="background-image: url('philippines-flag-icon-32.png'); background-repeat: no-repeat; background-position: 10px center; margin-left: 0px; padding-left: 45px; margin-top: 15px; padding-top: 10px;" />
								<label class="form-label" for="phonenumber">Phone Number</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="email" class="form-control rounded" name="email" id="email"
									value="<?php echo $row['email'] ?>" required />
								<label class="form-label" for="email">Email Address</label>
							</div>
						</div>
					</div>
		</div>
	</div>
	</main>
	</form>
	</div>
	</div>
	<script>feather.replace()</script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
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
</body>

</html>