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
	<!--Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="DataTables/datatables.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
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
		$(document).ready( function () {
			$('#myTable').DataTable( {
				dom: 'Bfrtip',
				buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			} );
		} );
	</script>
	<script src="https://unpkg.com/feather-icons"></script>
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
							<a class="nav-link text-dark bg-warning active shadow">
								<span data-feather="user" class="align-text-bottom feather-48"></span>
								Residents Profile
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="admindocument.php">
								<span data-feather="file" class="align-text-bottom feather-48"></span>
								Document Requests
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
						<hr class="mt-5 mb-1">
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
					<h1 class="h2">LIST OF RESIDENTS</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<a href="adminaddresidents.php" class="btn btn-md btn-warning"><i class="bi bi-plus-circle"> </i>Add New Resident</a>
						</div>
					</div>
				</div>
				<?php
				if(isset($_SESSION['erroraddresident']))
				{
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
				if(isset($_SESSION['successaddresident']))
				{
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
				if(isset($_SESSION['errorupdate']))
				{
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
				if(isset($_SESSION['saveupdate']))
				{
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
				if(isset($_SESSION['deleteerror']))
				{
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
				if(isset($_SESSION['deletesuccess']))
				{
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
						<table id="myTable" class="table table-striped table-hover" style="width:100%">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">First Name</th>
									<th scope="col">Middle Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Purok</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'conn.php';
								$query = "SELECT * FROM residents ";
								$query_run = mysqli_query($conn, $query);

								if (mysqli_num_rows($query_run) > 0) {
									foreach ($query_run as $items) {
										?>
										<tr>
											<td><?= $items['id']; ?></td>
											<td><?= $items['firstname']; ?></td>
											<td><?= $items['middlename']; ?></td>
											<td><?= $items['lastname']; ?></td>
											<td><?= $items['purok']; ?></td>
										<td class="text-right">										
											<div class="btn-group me-2">
												<a href="admineditresidents.php?id=<?= $items['id']; ?>" class="btn btn-warning btn-sm" style="width: 40px;"><i class="bi bi-pencil"></i></a>
												<a href="viewdocument.php?id=<?= $items['id']; ?>" class="btn btn-success btn-sm" style="width: 40px;"><i class="bi bi-eye"></i></a>
												<a href="dropresident.php?id=<?= $items['id']; ?>" class="btn btn-danger btn-sm" style="width: 40px;"><i class="bi bi-trash"></i></a>
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
<script>feather.replace()</script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="/DataTables/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>	
</body>
</html>
