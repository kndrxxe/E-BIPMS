<?php
session_start();

include 'conn.php';
if (isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
	if (time() - $_SESSION['login_time_stamp'] > 600) {
		session_unset();
		session_destroy();
		header("Location: userlogin.php");
	} else {
		$_SESSION['login_time_stamp'] = time();
	}
} else {
	header("Location: index.php");
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Home | E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-warning sidebar collapse">
				<div class="position-sticky pt-0 mt-2 sidebar-sticky bg-light">
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
							<a class="nav-link bg-warning active shadow text-dark">
								<span data-feather="user" class="align-text-bottom feather-48"></span>
								User Profile
							</a>
						</li>
						<hr class="mt-0 mb-0">
						<li class="nav-item fs-7">
							<div class="accordion accordion-flush" id="accordionFlushExample">
								<div class="accordion-item">
									<h2 class="accordion-header fs-7 bg-light">
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
													<a class="nav-link bg-light" style="margin-top: -40px"
														href="userdocument">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Clearance
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
													<a class="nav-link bg-light" style="margin-top: -15px"
														href="userindigency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Indigency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link bg-light" style="margin-top: -15px"
														href="userresidency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Residency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link bg-light" style="margin-top: -15px"
														href="useridentification.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Barangay Identification
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link bg-light"
														style="margin-top: -15px; margin-bottom: -15px"
														href="usercedula.php">
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
							</a>
						</li>
						<hr class="mt-5 mb-0">
						<li class="nav-item fs-7">
							<a class="nav-link" href="useraccount.php">
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
					$uid = $row['id'];
					$hash = hash('sha256', $uid);
					?>
					<h1 style="text-transform: uppercase;" class="h2">Profile</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<a href="edituserprofile.php?id=<?php echo $hash; ?>" class="btn btn-md btn-warning"><i
									class="bi bi-pencil-square"> </i>Edit Profile</a>
						</div>
					</div>
				</div>
				<?php
				if (isset($_SESSION['erroruserupdate'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['erroruserupdate']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['erroruserupdate']);
				}
				?>
				<?php
				if (isset($_SESSION['saveuserupdate'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['saveuserupdate']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['saveuserupdate']);
				}
				?>
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
				<div class="row">
					<div class="col-lg-4">
						<div class="text-center mb-3">
							<img class="rounded-circle border border-2 border-warning"
								src="<?php echo $profile_picture ?>" width="200">
						</div>
					</div>
					<!-- This empty column will push the information to the right on large screens -->
					<div class="col-lg-7">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 25pt;"><b>
									<?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?>
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;"><b>ADDRESS:</b>
								<?php echo $row['house_no'] . ', ' . $row['purok'] . ' ' . 'KANLURANG BUKAL'; ?>
							</h4>
							<h4 class="mt-0" style="text-transform: uppercase;"><b>Sex: </b>
								<?php echo $row['sex']; ?>
							</h4>
							<h4 class="mt-0" style="text-transform: uppercase;"><b>BIRTHDAY:</b>
								<?php
								$newDate = date("F d, Y", strtotime($row['birthday']));
								echo $newDate; ?>
							</h4>
							<h4 class="mt-0" style="text-transform: uppercase;"><b>AGE:</b>
								<?php echo $row['age']; ?>
							</h4>
						</div>
					</div>
				</div>
				<hr class="mt-0 mb-0 text-secondary">
				<div class="row mt-4">
					<!-- This empty column will push the information to the right on large screens -->
					<div class="col-lg-4">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Civil Status
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['civilstatus']; ?>
							</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Registered Voter
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['voter']; ?>
							</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Special Group
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php
								if (!empty($row['specialgroup'])) {
									echo $row['specialgroup'];
								} else {
									echo "N/A";
								}
								?>
							</h4>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<!-- This empty column will push the information to the right on large screens -->
					<div class="col-lg-4">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									No. of Family Members
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['members']; ?>
							</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Housing Status
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['housingstatus']; ?>
							</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Employment Status
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['employmentstatus']; ?>
							</h4>
						</div>
					</div>
				</div>
				<div class="row mt-2 justify-content-center">
					<!-- This empty column will push the information to the right on large screens -->
					<div class="col-lg-4">
						<div
							class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center justify-content-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Phone Number
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['phonenumber']; ?>
							</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div
							class="d-flex flex-wrap row g-4 mb-3 gx-1 text-lg-start text-center justify-content-center">
							<h1 class="text-warning" style="text-transform: uppercase; font-size: 20pt;"><b>
									Email Address
								</b>
								<hr class="mt-2 mb-0 text-secondary">
							</h1>
							<h4 class="mt-0" style="text-transform: uppercase;">
								<?php echo $row['email']; ?>
							</h4>
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
</body>

</html>