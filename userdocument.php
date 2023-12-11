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
	<title>Request Barangay Clearance | E-BIPMS</title>
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
							<a class="nav-link" href="reportincident.php">
								<span data-feather="message-circle" class="align-text-bottom feather-48"></span>
								Report Incident
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userevents.php">
								<span data-feather="calendar" class="align-text-bottom feather-48"></span>
								Events
								<?php
								include 'conn.php';
								$uid = $_SESSION['uid'];
								$query = "SELECT * FROM events where status='1'";
								$query_run = mysqli_query($conn, $query);
								$items = mysqli_num_rows($query_run);
								if ($row > 0) {
									?>
									<span class="badge rounded-pill text-bg-warning text-end">
										<?php echo $items ?>
									</span>
									<?php
								}
								?>
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
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">REQUEST BARANGAY CLEARANCE</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<button type="button" class="btn btn-md btn-warning addbtn" data-bs-toggle="modal"
								data-bs-target="#requestBarangayClearance"><i class="bi bi-file-earmark-text">
								</i>Request Document
							</button>
						</div>
					</div>
					<div class="modal fade" id="requestBarangayClearance" tabindex="-1"
						aria-labelledby="requestBarangayClearanceLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="requestBarangayClearanceLabel">Request Barangay
										Clearance (₱50.00)</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="forms needs-validation" method="POST" action="userprocessdocument.php"
										novalidate="">
										<div class="form-floating">
											<input type="hidden" class="form-control" name="userID"
												value="<?php echo $row['userID'] ?>" />
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control" name="status" value="0" />
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="firstname"
												placeholder="First Name" value="<?php echo $row['firstname'] ?>"
												readonly />
											<label for="firstname">First Name</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="middlename"
												placeholder="Middle Name" value="<?php echo $row['middlename'] ?>"
												readonly />
											<label for="middlename">Middle Name</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="lastname"
												placeholder="Last Name" value="<?php echo $row['lastname'] ?>"
												readonly />
											<label for="lastname">Last Name</label>
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control rounded" name="email"
												value="<?php echo $row['email'] ?>" readonly />
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control rounded" name="phonenumber"
												value="<?php echo $row['phonenumber'] ?>" readonly />
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control rounded" name="birthday"
												value="<?php echo $row['birthday'] ?>" readonly />
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control rounded" name="civilstatus"
												value="<?php echo $row['civilstatus'] ?>" readonly />
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control rounded" name="sex"
												value="<?php echo $row['sex'] ?>" readonly />
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control rounded" name="purok"
												value="<?php echo $row['purok'] ?>" readonly />
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control rounded" name="purpose"
												placeholder="Purpose" required />
											<label for="lastname">Purpose</label>
										</div>
										<div class="form-floating mb-3">
											<input type="date" class="form-control rounded" name="issue_date"
												placeholder="Issuance Date" required />
											<label for="date">Issuance Date</label>
										</div>
										<div class="form-floating mb-3">
											<input type="hidden" class="form-control" name="isPaid" value="0" />
										</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-warning"> <i class="bi bi-check2-circle">
										</i>Request</button>
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
				<?php
				if (isset($_SESSION['paymenterror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['paymenterror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['paymenterror']);
				}
				?>
				<?php
				if (isset($_SESSION['paymentsuccessfull'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['paymentsuccessfull']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['paymentsuccessfull']);
				}
				?>
				<div class="table-responsive">
					<table class="table table-striped table-hover table-md" style="width:100%">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Issuance Date</th>
								<th scope="col">Purpose</th>
								<th scope="col">Date Requested</th>
								<th scope="col">Status</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							error_reporting(0);
							include 'conn.php';
							$uid = $_SESSION['uid'];
							$query = "SELECT * FROM documents WHERE userID='$uid' ";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $items) {
									?>
									<tr>
										<td>
											<?= $items['id']; ?>
										</td>
										<td>
											<?= $items['firstname'] . " " . $items['middlename'] . " " . $items['lastname']; ?>
										</td>
										<td>
											<?= $items['issue_date']; ?>
										</td>
										<td>
											<?= $items['purpose']; ?>
										</td>
										<td>
											<?= $items['date_requested']; ?>
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
													<span class="badge bg-success">APPROVED
													</span>
												<?php
											}
											?>
										</td>
										<td>
											<?php if ($items['isPaid'] == 0):
												?>
												<button type="button" data-bs-target="#updatePayment" class="btn btn-danger editbtn"
													style="width: 90px; font-size:10pt">
													PAY NOW</button>
											<?php elseif ($items['isPaid'] == 1): ?>
												<span class="badge bg-success">PAID
												</span>
											<?php endif; ?>
										</td>
										<td class="text-right">
											<?php if ($items['isPaid'] == 0): ?>
												<div class="btn-group me-2">
													<button type="button" class="btn btn-danger btn-sm deletebtn"
														style="width: 40px;"><i class="bi bi-trash"></i></button>
												</div>
											<?php endif; ?>
										</td>

										<!-- UPDATE Modal -->
										<div class="modal fade" id="updatePayment" tabindex="-1"
											aria-labelledby="updatePaymentModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="updatePaymentModalLabel"><i
																class="bi bi-cash"></i> Mode of Payment</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form class="forms needs-validation" method="POST"
															action="userclearancepayment.php" enctype="multipart/form-data"
															novalidate="">
															<input type="hidden" name="id" value="<?php echo $items['id'] ?>"
																id="update_id">
															<input type="hidden" name="isPaid" id="isPaid">
															<div class="row g-2">
																<div class="col">
																	<div class="card">
																		<div
																			class="card-body d-flex justify-content-center align-items-center flex-column p-0">
																			<img class="pt-4" src="gcash_logo.png" width="100px" alt="">
																			<p style="font-size: 20px; margin-bottom:2px">09664179718</p>
																			<input class="mb-2" type="radio" name="paymentmethod" value="GCASH" required>
																		</div>
																	</div>
																</div>
																<div class="col">
																	<div class="card">
																		<div
																			class="card-body d-flex justify-content-center align-items-center flex-column p-0">
																			<img class="pt-4" src="maya_logo.png" width="80px" alt="">
																			<p style="font-size: 20px; margin-bottom:2px">09664179718</p>
																			<input class="mb-2" type="radio" name="paymentmethod" value="MAYA" required>
																		</div>
																	</div>
																</div>
															</div>
															<div class="form-floating mt-1">
																<input type="file" class="form-control" id="paymentProof"
																	name="proof" required>
																<label for="proof">Proof of Payment</label>
															</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-bs-dismiss="modal">Close</button>
														<button type="submit" name="updateevent" class="btn btn-warning"><i
																class="bi bi-cash"></i> Pay Now</button>
													</div>
													</form>
												</div>
											</div>
										</div>
									</tr>
									<?php
								}
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
								<form action="userdropdocument.php" method="post">
									<div class="modal-body">
										<input type="hidden" name="delete_id" id="delete_id">
										<h5>Are you sure you want to delete this request?</h5>
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
			$('.editbtn').on('click', function () {

				$('#updatePayment').modal('show');

				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function () {
					return $(this).text().trim();
				}).get();

				console.log(data);

				$('#update_id').val(data[0]);
				$('#isPaid').val(1);
			});
		});
	</script>
</body>

</html>