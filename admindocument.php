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
	<title>Request for Barangay Clearance | E-BIPMS</title>
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
	<script src="https://unpkg.com/feather-icons"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#myTable').DataTable();
		});
	</script>
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
	</style>
</head>

<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b>
		</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button" data-bs-toggle="collapse"
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
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">REQUESTS FOR BARANGAY CLEARANCE</h1>
				</div>
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
				<?php
				if (isset($_SESSION['errorupdate'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['errorupdate']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['errorupdate']);
				}
				?>
				<?php
				if (isset($_SESSION['saveupdate'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['saveupdate']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['saveupdate']);
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
				if (isset($_SESSION['sendsmserror'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['sendsmserror']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['sendsmserror']);
				}
				?>
				<?php
				if (isset($_SESSION['sendsms'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['sendsms']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['sendsms']);
				}
				?>
				<div class="table-responsive">
					<table id="myTable" class="table table-md" style="width:100%">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Middle Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Purpose</th>
								<th scope="col">Date of Issuance</th>
								<th scope="col">Date Requested</th>
								<th scope="col">Status</th>
								<th scope="col">Payment Method</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'conn.php';
							$query = "SELECT * FROM documents";
							$query_run = mysqli_query($conn, $query);
							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $items) {
									?>
									<tr>
										<td>
											<?= $items['id']; ?>
										</td>
										<td>
											<?= $items['firstname']; ?>
										</td>
										<td>
											<?= $items['middlename']; ?>
										</td>
										<td>
											<?= $items['lastname']; ?>
										</td>
										<td>
											<?= $items['purpose']; ?>
										</td>
										<td>
											<?= $items['issue_date']; ?>
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
											<?php if ($items['paymentmethod'] == 'GCASH'):
												?>
												<span class="badge bg-primary">
													GCASH
											<?php elseif ($items['paymentmethod'] == 'MAYA'): ?>
												<span class="badge bg-success">
													MAYA
											<?php elseif ($items['paymentmethod'] == ''): ?>
												<span class="badge bg-danger">
													NO PAYMENT
											<?php endif; ?>
										</td>
										<td>
											<?php if ($items['isPaid'] == 0):
												?>
												<span class="badge bg-danger">
													NOT PAID
												</span>
											<?php elseif ($items['isPaid'] == 1): ?>
												<span class="badge bg-success">
													PAID
												</span>
											<?php endif; ?>
										</td>
										<td class="text-right">
											<div class="btn-group me-2">
												<button type="button" class="btn btn-warning btn-sm editbtn"
													style="width: 40px;"><i class="bi bi-pencil-square"></i></button>
												<button type="button" class="btn btn-danger btn-sm deletebtn"
													style="width: 40px;"><i class="bi bi-trash"></i></button>
												<?php if ($items['isPaid'] == 1): ?>
													<?php $imagePath = $items['proof']; ?>
													<a class="btn btn-success viewbtn" data-proof="<?= $imagePath; ?>"
														style="width: 40px;"><i class="bi bi-eye"></i></a>
												<?php endif; ?>
												<?php if ($items['status'] == 1):
													?>
													<a href="generateclearance.php?id=<?php echo $items['id']; ?>" target="_blank"
														class="btn btn-primary" style="width: 40px;">
														<i class="bi bi-printer"></i></a>
												<?php endif; ?>
												<?php if ($items['status'] == 1):
													?>
													<a href="sendemailnotification.php?id=<?php echo $items['id']; ?>"
														class="btn btn-warning" style="width: 40px;">
														<i class="bi bi-bell"></i></a>
												<?php endif; ?>
												<?php if ($items['status'] == 1):
													?>
													<a href="sendtextmessage.php?id=<?php echo $items['id']; ?>"
														class="btn btn-primary" style="width: 40px;">
														<i class="bi bi-phone"></i></a>
												<?php endif; ?>
											</div>
											<!-- View Modal -->
											<div class="modal fade" id="viewPaymentModal" tabindex="-1"
												aria-labelledby="viewPaymentModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-md">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="viewPaymentModalLabel">Proof of Payment
															</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<img id="paymentProofImage" src="" alt="Proof of Payment"
																class="img-fluid">
														</div>
													</div>
												</div>
											</div>
											<!-- Edit Modal -->
											<div class="modal fade" id="editmodal" data-bs-backdrop="static"
												data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-header">
															<h1 class="modal-title fs-5" id="staticBackdropLabel">
																<i class="bi bi-pencil-square"></i>
																Update Data
															</h1>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>

														<form action="updatebarangayclearance.php" method="post">

															<div class="modal-body">
																<input type="hidden" name="update_id" id="update_id">

																<div class="form-floating mb-2">
																	<input type="text" name="firstname" id="firstname"
																		class="form-control" readonly>
																	<label for="firstname" class="form-label">First Name</label>
																</div>

																<div class="form-floating mb-2">
																	<input type="text" name="middlename" id="middlename"
																		class="form-control" readonly>
																	<label for="middlename" class="form-label">Middle
																		Name</label>
																</div>

																<div class="form-floating mb-2">
																	<input type="text" name="lastname" id="lastname"
																		class="form-control" readonly>
																	<label for="lastname" class="form-label">Last Name</label>
																</div>

																<div class="form-floating mb-2">
																	<input type="text" name="purpose" id="purpose"
																		class="form-control" readonly>
																	<label for="purpose" class="form-label">Purpose</label>
																</div>
																<div class="form-floating mb-2">
																	<input type="text" name="issue_date" id="issueDate"
																		class="form-control" readonly>
																	<label for="issue_date" class="form-label">Date of
																		Issuance</label>
																</div>
																<div class="form-floating mb-2">
																	<input type="text" name="date_requested" id="dateRequested"
																		class="form-control" readonly>
																	<label for="date_requested" class="form-label">Date
																		Requested</label>
																</div>
																<div class="form-floating mb-2">
																	<select class="form-select form-select-md" name="status"
																		placeholder="Status" id="viewStatus" required>
																		<option selected disabled>Choose from options</option>
																		<option value="0">Pending</option>
																		<option value="1">Approve</option>
																	</select>
																	<label for="status">Status</label>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary"
																	data-bs-dismiss="modal">Cancel</button>
																<button type="submit" name="updatedata"
																	class="btn btn-warning"><i class="bi bi-pencil-square"></i>
																	Update Data</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!-- DELETE Modal -->
											<div class="modal fade" id="deletemodal" data-bs-backdrop="static"
												data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-header">
															<h1 class="modal-title fs-5" id="staticBackdropLabel">
																<i class="bi bi-exclamation-triangle-fill text-danger"
																	width="24" height="24"></i>
																Warning
															</h1>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<form action="admindropdocument.php" method="post">
															<div class="modal-body">
																<input type="hidden" name="delete_id" id="delete_id">

																<h5>Are you sure, you want to delete this request?</h5>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary"
																	data-bs-dismiss="modal">Cancel</button>
																<button type="submit" name="deletedata"
																	class="btn btn-danger">Delete</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<?php
								}
							}
							?>
						</tbody>
					</table>
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

				$('#editmodal').modal('show');

				$tr = $(this).closest('tr');

				var data = $tr.children("td").map(function () {
					return $(this).text().trim();
				}).get();

				console.log(data);

				$('#update_id').val(data[0]);
				$('#firstname').val(data[1]);
				$('#middlename').val(data[2]);
				$('#lastname').val(data[3]);
				$('#purpose').val(data[4]);
				$('#issueDate').val(data[5]);
				$('#dateRequested').val(data[6]);
				$('#viewStatus').val(data[7]);
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('.viewbtn').on('click', function () {
				// Get the image path from the data-proof attribute
				var proof = $(this).data('proof');

				// Set the src attribute of the paymentProofImage to the image path
				$('#paymentProofImage').attr('src', proof);

				// Show the viewPaymentModal
				$('#viewPaymentModal').modal('show');
			});
		});
	</script>

</body>

</html>