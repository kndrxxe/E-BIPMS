<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-BIPMS</title>
	<link rel = "icon" href = "kanlurangbukal.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="DataTables/datatables.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<script src="https://unpkg.com/feather-icons"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>
</head>
<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b>
		</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
							<span class="fs-6 px-2 text-dark" style="text-transform: uppercase;"><?php echo $_SESSION['user']?></span>
						</a>
						<li class="nav-item fs-7">
							<a class="nav-link" aria-current="page" href="adminhome.php">
								<span data-feather="home" class="align-text-bottom feather-48"></span>
								Home
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
										<button class="accordion-button collapsed fs-7 pt-2 pb-2 fs-6" type="button"
											data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
											aria-expanded="false" aria-controls="flush-collapseOne">
											Document Requests
										</button>
									</h2>
									<hr class="mt-0 mb-0">
									<div id="flush-collapseOne" class="accordion-collapse collapse show"
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
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">DOCUMENT REQUESTS</h1>
				</div>
				<div class="table-responsive">
					<table id="myTable" class="table table-striped table-hover table-md" style="width:100%">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col">Type of Document</th>
								<th scope="col">Nature of Business</th>
								<th scope="col">Status</th>
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
										<td><?= $items['id']; ?></td>
										<td><?= $items['firstname'] ." ". $items['lastname']; ?></td>
										<td>Business Clearance</td>
										<td><?= $items['nature']; ?></td>
										<td>
											<?php 
											if($items['status'] == 0){ 
												?>
												<span class="badge bg-danger">PENDING
												</span>
												<?php 
											}
											else if($record['status'] == 1){ 
												?>
												<span class="badge bg-success">APPROVED
												</span>
												<?php 
											} 
											?>
										</td>
										<td class="text-right">										
											<div class="btn-group me-2">
												<a href="editpage.php?id=<?= $items['id']; ?>" class="btn btn-warning btn-sm" style="width: 40px;"><i class="bi bi-pencil-square"></i></a>
												<a href="viewpage.php?id=<?= $items['id']; ?>" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 40px;"><i class="bi bi-eye"></i></a>
												<a href="dropdocument.php?id=<?= $items['id']; ?>" class="btn btn-danger btn-sm" style="width: 40px;"><i class="bi bi-trash"></i></a>
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
	<script src="/DataTables/datatables.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
	</script>
</body>
</html>
