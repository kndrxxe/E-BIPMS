<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
} else {
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barangay Officials | E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<script src="https://unpkg.com/feather-icons"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
		<button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button"
			data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
			</span>
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
							<a class="nav-link text-dark bg-warning active shadow">
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
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">BARANGAY OFFICIALS</h1>
					<?php
					include 'conn.php';
					$query = "SELECT COUNT(*) as count FROM officials WHERE type='Barangay'";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$count = $row['count'];

					if ($count < 14) {
						?>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-1">
								<button class="btn btn-md btn-warning" data-bs-toggle="modal"
									data-bs-target="#addOfficialModal">
									<i class="bi bi-person-fill-add"></i> Add Barangay Official
								</button>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<div class="modal fade" id="addOfficialModal" tabindex="-1" aria-labelledby="addOfficialModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="addOfficialModalLabel"> <i class="bi bi-person-fill-add">
									</i>Add Barangay Official</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form class="forms needs-validation" method="POST" action="handle_officials.php"
									novalidate="">
									<div class="col text-center">
										<?php
										if (!empty($items['profile_picture'])) {
											echo '<img class="rounded-circle border border-warning mb-2" src="' . $items['profile_picture'] . '" alt="Profile Picture" width="150">';
										} else {
											echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
										}
										?>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="firstName" id="firstName"
											placeholder="First Name" required>
										<label for="firstName" class="form-label">First Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="middleName" id="middleName"
											placeholder="Middle Name" required>
										<label for="middleName" class="form-label">Middle Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="lastName" id="lastName"
											placeholder="Last Name" required>
										<label for="lastName" class="form-label">Last Name</label>
									</div>
									<div class="form-floating mb-3">
										<select class="form-select form-select" name="position" placeholder="Position"
											required>
											<option selected disabled> Choose from options</option>
											<option value="Barangay Chairperson">Barangay Chairperson
											</option>
											<option value="SK Chairperson">SK Chairperson
											</option>
											<option value="Barangay Councilor">
												Barangay Councilor</option>
											<option value="Barangay Secretary">
												Barangay Secretary</option>
											<option value="Barangay Treasurer">
												Barangay Treasurer</option>
										</select>
										<label for="position">Position</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="committee" id="committee"
											placeholder="Committee">
										<label for="committee" class="form-label">Committee (optional)</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" class="form-control" maxlength="4" name="termStartYear"
											id="termStartYear" placeholder="Start of Term" required>
										<label for="termStartYear" class="form-label">Start of Term</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" class="form-control" maxlength="4" name="termEndYear"
											id="termEndYear" placeholder="End of Term" required>
										<label for="termEndYear" class="form-label">End of Term</label>
									</div>
									<div class="form-floating mb-3">
										<select class="form-select form-select" name="type" placeholder="Type" required>
											<option selected disabled> Choose from options</option>
											<option value="Barangay">Barangay
											</option>
											<option value="SK">
												SK</option>
										</select>
										<label for="type">Type</label>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-warning"><i class="bi bi-person-fill-add">
									</i>Add Official</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<?php
				if (isset($_SESSION['officialserror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['officialserror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['officialserror']);
				}
				?>
				<?php
				if (isset($_SESSION['officialssuccess'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['officialssuccess']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['officialssuccess']);
				}
				?>
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
				if (isset($_SESSION['errorofficialsupdate'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['errorofficialsupdate']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['errorofficialsupdate']);
				}
				?>
				<?php
				if (isset($_SESSION['saveofficialsupdate'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['saveofficialsupdate']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['saveofficialsupdate']);
				}
				?>
				<?php
				if (isset($_SESSION['officialpicturedeleted'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['officialpicturedeleted']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['officialpicturedeleted']);
				}
				?>
				<div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
					<?php
					include 'conn.php';
					$query = "SELECT * FROM officials WHERE position='Barangay Chairperson'";
					$query_run = mysqli_query($conn, $query);
					while ($items = mysqli_fetch_array($query_run)) {
						if ($items['picture']) {
							// Display the profile picture
							$picture = $items['picture'];
						} else {
							// Use a default profile picture
							$picture = 'default-profile-pic.jpg';
						}
						echo '<div class="col-auto">';
						echo '<div class="card" style="width: 22rem;">';
						echo '<div class="card-body">';
						echo '<div class="col text-center">';
						if (!empty($picture)) {
							echo '<img class="rounded-circle border border-warning mb-2" src="' . $picture . '" alt="Profile Picture" width="150">';
						} else {
							echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
						}
						$id = $items['id'];
						echo '</div>';
						echo '<h3 class="text-center" style="text-transform: uppercase;">' . '<strong>' . $items['firstName'] . ' ' . $items['middleName'] . '<br>' . $items['lastName'] . '</strong>' . '</h3>';
						echo '<h4 class="text-center mt-0" style="text-transform: uppercase;">' . $items['position'] . '</h4>';
						echo '<div class="text-center mt-3">';
						echo '<button class="btn btn-warning btn-sm me-2 edit-btn" style="width: 50px;" data-id="' . $items['id'] . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>';
						echo '<a href="delete_official_picture.php?id=' . $id . '" class="btn btn-secondary btn-sm edit-btn" style="width: 50px;"><i class="bi bi-file-earmark-x"></i></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					?>
				</div>
				<!-- Edit Modal -->
				<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editModalLabel"><i class="bi bi-person-fill-gear"></i> Edit Official</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form id="editForm" method="POST" action="update_officials.php"
									enctype="multipart/form-data">
									<input type="hidden" name="update_id" id="update_id">
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="firstName" id="updatefirstName"
											placeholder="First Name" required>
										<label for="firstName" class="form-label">First Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="middleName" id="updatemiddleName"
											placeholder="Middle Name" required>
										<label for="middleName" class="form-label">Middle Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="lastName" id="updatelastName"
											placeholder="Last Name" required>
										<label for="lastName" class="form-label">Last Name</label>
									</div>
									<div class="form-floating mb-3">
										<select class="form-select form-select" name="position" placeholder="Position"
											id="updateposition" required>
											<option selected disabled> Choose from options</option>
											<option value="Barangay Chairperson">Barangay Chairperson
											</option>
											<option value="SK Chairperson">SK Chairperson
											</option>
											<option value="Barangay Councilor">
												Barangay Councilor</option>
											<option value="Barangay Secretary">
												Barangay Secretary</option>
											<option value="Barangay Treasurer">
												Barangay Treasurer</option>
										</select>
										<label for="position">Position</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="committee" id="updatecommittee"
											placeholder="Committee">
										<label for="committee" class="form-label">Committee (optional)</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" class="form-control" maxlength="4" name="termStartYear"
											id="updatetermStartYear" placeholder="Start of Term" required>
										<label for="termStartYear" class="form-label">Start of Term</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" class="form-control" maxlength="4" name="termEndYear"
											id="updatetermEndYear" placeholder="End of Term" required>
										<label for="termEndYear" class="form-label">End of Term</label>
									</div>
									<div class="form-floating mb-3">
										<select class="form-select form-select" name="type" placeholder="Type"
											id="updatetype" required>
											<option selected disabled> Choose from options</option>
											<option value="Barangay">Barangay
											</option>
											<option value="SK">
												SK</option>
										</select>
										<label for="type">Type</label>
									</div>
									<div class="text-center">
										<div class="form-floating mb-3">
											<input type="file" class="form-control border-warning rounded" id="picture"
												name="picture" accept="image/*" />
											<label for="updatepicture" class="form-label">Attach Picture</label>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" form="editForm" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Update</button>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
					<?php
					include 'conn.php';
					$query = "SELECT * FROM officials WHERE position='Barangay Councilor' or position='SK Chairperson'";
					$query_run = mysqli_query($conn, $query);
					while ($items = mysqli_fetch_array($query_run)) {
						if ($items['picture']) {
							// Display the profile picture
							$picture = $items['picture'];
						} else {
							// Use a default profile picture
							$picture = 'default-profile-pic.jpg';
						}
						echo '<div class="col-auto">';
						echo '<div class="card" style="width: 22rem;">';
						echo '<div class="card-body">';
						echo '<div class="col text-center">';
						if (!empty($picture)) {
							echo '<img class="rounded-circle border border-warning mb-2" src="' . $picture . '" alt="Profile Picture" width="150">';
						} else {
							echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
						}
						echo '</div>';
						$id = $items['id'];
						echo '<h3 class="text-center" style="text-transform: uppercase;">' . '<strong>' . $items['firstName'] . ' ' . $items['middleName'] . '<br>' . $items['lastName'] . '</strong>' . '</h3>';
						echo '<h4 class="text-center mt-0" style="text-transform: uppercase;">' . $items['position'] . '</h4>';
						echo '<div class="text-center mt-3">';
						echo '<button class="btn btn-warning btn-sm me-2 edit-btn" style="width: 50px;" data-id="' . $items['id'] . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>';
						echo '<a href="delete_official_picture.php?id=' . $id . '" class="btn btn-secondary btn-sm edit-btn" style="width: 50px;"><i class="bi bi-file-earmark-x"></i></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					?>
				</div>
				<div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
					<?php
					include 'conn.php';
					$query = "SELECT * FROM officials WHERE position='Barangay Treasurer' OR position='Barangay Secretary'";
					$query_run = mysqli_query($conn, $query);
					while ($items = mysqli_fetch_array($query_run)) {
						if ($items['picture']) {
							// Display the profile picture
							$picture = $items['picture'];
						} else {
							// Use a default profile picture
							$picture = 'default-profile-pic.jpg';
						}
						echo '<div class="col-auto">';
						echo '<div class="card" style="width: 22rem;">';
						echo '<div class="card-body">';
						echo '<div class="col text-center">';
						if (!empty($picture)) {
							echo '<img class="rounded-circle border border-warning mb-2" src="' . $picture . '" alt="Profile Picture" width="150">';
						} else {
							echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
						}
						echo '</div>';
						$id = $items['id'];
						echo '<h3 class="text-center" style="text-transform: uppercase;">' . '<strong>' . $items['firstName'] . ' ' . $items['middleName'] . '<br>' . $items['lastName'] . '</strong>' . '</h3>';
						echo '<h4 class="text-center mt-0" style="text-transform: uppercase;">' . $items['position'] . '</h4>';
						echo '<div class="text-center mt-3">';
						echo '<button class="btn btn-warning btn-sm me-2 edit-btn" style="width: 50px;" data-id="' . $items['id'] . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>';
						echo '<a href="delete_official_picture.php?id=' . $id . '" class="btn btn-secondary btn-sm edit-btn" style="width: 50px;"><i class="bi bi-file-earmark-x"></i></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					?>
				</div>
			</main>
		</div>
	</div>

	<script>feather.replace()</script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
		integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG"
		crossorigin="anonymous"></script>
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
		$(document).ready(function () {
			$('#termStartYear, #termEndYear').on('input', function () {
				this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
			});
		});
	</script>
	<script>
		$(document).on('click', '.edit-btn', function () {
			var id = $(this).attr('data-id');
			$.ajax({
				url: 'fetch_official.php',
				type: 'GET',
				data: {
					id: id
				},
				success: function (response) {
					var data = JSON.parse(response);
					$('#update_id').val(data.id);
					$('#updatefirstName').val(data.firstName);
					$('#updatemiddleName').val(data.middleName);
					$('#updatelastName').val(data.lastName);
					$('#updateposition').val(data.position);
					$('#updatecommittee').val(data.committee);
					$('#updatetermStartYear').val(data.termStartYear);
					$('#updatetermEndYear').val(data.termEndYear);
					$('#updatetype').val(data.type);
				}
			});
		});
	</script>
</body>

</html>