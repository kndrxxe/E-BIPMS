<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
	if (time() - $_SESSION["login_time_stamp"] > 600) {
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
	<title>Report Incident | E-BIPMS</title>
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
			<b>E-BIPMS KANLURANG BUKAL</b>
		</a>
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
								<?php echo $_SESSION['name'] ?>
							</span>
						</a>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userhome">
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
														$count = mysqli_num_rows($query_run);
														if ($count > 0) {
															?>
															<span class="badge rounded-pill text-bg-warning text-end">
																<?php echo $count ?>
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
							<a class="nav-link bg-warning active shadow text-dark">
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
								$uid = $_SESSION['uid'];
								$query = "SELECT * FROM events where status='1'";
								$query_run = mysqli_query($conn, $query);
								$items = mysqli_num_rows($query_run);
								if ($items > 0) {
									?>
									<span class="badge rounded-pill text-bg-warning text-end" id="counterBadge">
										<?php echo $items ?>
									</span>
									<?php
								}
								?>
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
							<a class="nav-link" href="userlogout">
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
					<h1 class="h2">REPORT INCIDENT</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<button type="button" class="btn btn-md btn-warning addbtn" data-bs-toggle="modal"
								data-bs-target="#requestBarangayClearance"><i class="bi bi-flag-fill">
								</i>
								Report Incident
							</button>
						</div>
					</div>
					<div class="modal fade" id="requestBarangayClearance" tabindex="-1"
						aria-labelledby="requestBarangayClearanceLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="requestBarangayClearanceLabel"><i
											class="bi bi-flag-fill">
										</i>Report Incident</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="forms needs-validation" method="POST" action="userprocessincident.php"
										novalidate="">
										<input type="hidden" class="form-control" name="userID"
											value="<?php echo $row['userID'] ?>" />
										<input type="hidden" class="form-control rounded" name="contact"
											value="<?php echo $row['phonenumber'] ?>" readonly />
										<input type="hidden" class="form-control rounded" name="email"
											value="<?php echo $row['email'] ?>" readonly />
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="incident"
												placeholder="Type of Incident" required />
											<label for="incident">Type of Incident</label>
										</div>
										<div class="form-floating mb-3">
											<input type="date" class="form-control rounded" name="date"
												placeholder="Date of Incident" required />
											<label for="date">Date of Incident</label>
										</div>
										<div class="form-floating mb-3">
											<input type="time" class="form-control rounded" name="time"
												placeholder="Time of Incident" required />
											<label for="time">Time of Incident</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="location"
												placeholder="Exact Location" required />
											<label for="location">Exact Location</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="person"
												placeholder="Person Involved" required />
											<label for="person">Person Involved</label>
										</div>
										<div class="form-floating mb-3">
											<textarea class="form-control" class="form-control rounded"
												name="description" maxlength="300" placeholder="Description"
												style="resize: none;" id="description" required></textarea>
											<span class="text-secondary float-end" style="font-size: 10pt;"
												id="charCountModal">0</span>
											<label for="description">Description</label>
										</div>
										<input type="hidden" class="form-control" name="status" value="0" />
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-warning"> <i class="bi bi-flag-fill">
										</i>Report Incident</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php
				if (isset($_SESSION['requesterror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['requesterror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['requesterror']);
				}
				?>
				<?php
				if (isset($_SESSION['requestsuccess'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['requestsuccess']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['requestsuccess']);
				}
				?>
				<?php
				if (isset($_SESSION['deleteerror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['deleteerror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['deleteerror']);
				}
				?>
				<?php
				if (isset($_SESSION['deletesuccess'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['deletesuccess']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['deletesuccess']);
				}
				?>
				<div class="table-responsive">
					<table class="table table-striped table-hover table-md" style="width:100%">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Type of Incident</th>
								<th scope="col">Date of Incident</th>
								<th scope="col">Time of Incident</th>
								<th scope="col">Exact Location</th>
								<th scope="col">Person Involved</th>
								<th scope="col">Status</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							error_reporting(0);
							include 'conn.php';
							$uid = $_SESSION['uid'];
							$query = "SELECT * FROM incidentreport WHERE userID='$uid' ";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $items) {
									?>
									<tr>
										<td>
											<?= $items['id']; ?>
										</td>
										<td>
											<?= $items['incident']; ?>
										<td>
											<?= $items['date']; ?>
										</td>
										<td>
											<?= $items['time']; ?>
										</td>
										<td>
											<?= $items['location']; ?>
										</td>
										<td>
											<?= $items['person']; ?>
										</td>
										<td>
											<?php
											if ($items['status'] == 0) {
												?>
												<span class="badge bg-danger">PENDING
												</span>
												<?php
											} else if ($items['status'] == 1) {
												?>
													<span class="badge bg-primary">RECEIVED
													</span>
												<?php
											} else if ($items['status'] == 2) {
												?>
														<span class="badge bg-success">ACTION MADE
														</span>
												<?php
											}
											?>
										</td>
										<td>
											<button type="button" class="btn btn-danger deletebtn"><i
													class="bi bi-trash"></i></button>
										</td>
									</tr>
									<?php
								}
							} else {
								?>
								<tr>
									<td colspan="8">
										<p class="text-center">No incident report yet.</p>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<!-- DELETE Modal -->
					<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false"
						tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">
										<i class="bi bi-exclamation-triangle-fill text-danger" width="24"
											height="24"></i>
										Warning
									</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<form action="userdropincident.php" method="post">
									<div class="modal-body">
										<input type="hidden" name="delete_id" id="delete_id">
										<h5>Are you sure you want to delete this incident report?</h5>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" name="deletedata" class="btn btn-danger">
											<i class="bi bi-trash"></i> Delete</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script>feather.replace()</script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
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
	<script>
		$(document).ready(function () {
			$('.deletebtn').on('click', function () {
				$('#deletemodal').modal('show');
				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function () {
					return $(this).text();
				}).get();
				console.log(data);
				$('#delete_id').val(data[0]);
			});
		});
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
	<script>
		$(document).ready(function () {
			$('.addbtn').on('click', function () {
				var charCount = $('#description').val().length;
				var charLeft = 300 - charCount;
				$('#charCountModal').text(charLeft + '/300');
			});
			$('#description').on('input', function () {
				this.style.height = 'auto';
				this.style.height = (this.scrollHeight) + 'px';

				var charCount = this.value.length;
				var charLeft = 300 - charCount;
				$('#charCountModal').text(charLeft + '/300');
			});
		});
	</script>
</body>

</html>