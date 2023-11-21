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
	<title>E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<!--Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="DataTables/datatables.css" />
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" />
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#myTable').DataTable({
				dom: 'Bfrtip',
				buttons: ['copy', 'csv', 'excel', 'pdf',
					{
						extend: 'print',
						title: '',
						messageTop: function () {
							return '<h2 style="text-align:center;color:black; margin-top:20px;">LIST OF RESIDENTS</h2>';
						},
						customize: function (win) {
							$(win.document.body)
								.css('font-size', '12pt')
								.prepend(
									'<br><br><br>',
									'<p style="position:absolute; margin-left: auto; margin-right: auto; margin-top: -60px; left: 0; right: 0; text-align: center; color:black; font-size: 10pt;">Republic of the Philippines<br><span style="font-weight: bold; font-size: 12pt;">BARANGAY KANLURANG BUKAL</span><br>Liliw, Laguna</p>',
									'<img src="kanlurangbukal.png" style="position:absolute; top:10; left:100px; width:70px;" />',
								);
							$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', '14pt');
						},
						exportOptions: {
							columns: [3, 1, 2, 4, 5]
						}
					}
				]
			});
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

		button.dt-button,
		div.dt-button,
		a.dt-button,
		input.dt-button {
			border-radius: 5px;
			color: black;
			background-color: #ffc107;
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

		button.dt-button:hover:not(.disabled),
		div.dt-button:hover:not(.disabled),
		a.dt-button:hover:not(.disabled),
		input.dt-button:hover:not(.disabled) {
			border: 1px solid #666;
			background-color: black;
			color: white;
		}
	</style>
</head>

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
								<span data-feather="home" class="align-text-bottom feather-48"></span>
								Home
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link text-dark bg-warning active shadow">
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
										<div class="accordion-body">
											<ul class="nav flex-column pt-4">
												<li class="nav-item fs-7" style="margin-left: -20px;">
													<a class="nav-link" style="margin-top: -40px"
														href="admindocument.php">
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
						<hr class="mt-0 mb-1">
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
					<h1 class="h2">LIST OF RESIDENTS</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<a href="adminaddresidents.php" class="btn btn-md btn-warning"><i class="bi bi-plus-circle">
								</i>Add New Resident</a>
						</div>
					</div>
				</div>
				<?php
				if (isset($_SESSION['erroraddresident'])) {
					?>
					<div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
						<i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
						<?= $_SESSION['erroraddresident']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['erroraddresident']);
				}
				?>
				<?php
				if (isset($_SESSION['successaddresident'])) {
					?>
					<div class="alert alert-success alert-dismissible fade show text-start" role="alert">
						<i class="bi bi-check-circle-fill" width="24" height="24"></i>
						<?= $_SESSION['successaddresident']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php
					unset($_SESSION['successaddresident']);
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
				<div class="table-responsive">
					<div class="data_table">
						<table id="myTable" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th scope="col"></th>
									<th scope="col">ID</th>
									<th scope="col">First Name</th>
									<th scope="col">Middle Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Purok</th>
									<th scope="col">Sex</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'conn.php';
								$query = "SELECT * FROM users";
								$query_run = mysqli_query($conn, $query);
								if (mysqli_num_rows($query_run) > 0) {
									foreach ($query_run as $items) {
										?>
										<tr>
											<td style="display: block; margin-left: auto; margin-right: auto;">
												<?php
												if (!empty($items['profile_picture'])) {
													echo '<img class="rounded-circle border border-warning" src="' . $items['profile_picture'] . '" alt="Profile Picture" width="80">';
												} else {
													echo '<img class="rounded-circle border border-warning" src="default-profile-pic.jpg" alt="Profile Picture" width="80">';
												}
												?>
											</td>
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
												<?= $items['purok']; ?>
											</td>
											<td>
												<?= $items['sex']; ?>
											</td>
											<td class="text-right">
												<div class="btn-group me-2">

													<a href="viewdocument.php?id=<?= $items['id']; ?>"
														class="btn btn-success btn-sm" style="width: 40px;"><i
															class="bi bi-eye"></i></a>
													<button type="button" class="btn btn-danger btn-sm deletebtn"
														style="width: 40px;"><i class="bi bi-trash"></i></button>
												</div>
												<!-- Modal -->
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
															<form action="dropresident.php" method="post">
																<div class="modal-body">
																	<input type="hidden" name="delete_id" id="delete_id">

																	<h5>Are you sure, you want to delete this data?</h5>
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
				</div>
			</main>
		</div>
	</div>
	<script>feather.replace()</script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="/DataTables/datatables.js"></script>
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
</body>

</html>