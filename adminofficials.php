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
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b></a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
							<li class="nav-item fs-7">
								<a class="nav-link" href="admindocument.php">
									<span data-feather="file" class="align-text-bottom feather-48"></span>
									Document Requests
								</a>
							</li>
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
						<h1 class="h2">BARANGAY OFFICIALS</h1>
					</div>
					<div class="d-flex flex-wrap mb-3 row g-2 justify-content-between">
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>ROMEO BORGONIA</strong><br>BARANGAY CHAIRMAN</p>
									<div class="text-center">
									<a href="editpage.php?id=<?= $items['id']; ?>" class="btn btn-warning btn-sm f" style="width: 70px;"><i class="bi bi-pencil-square"></i> Edit</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>GENESIS PANAGLIMA</strong><br>SK CHAIRMAN</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>HONEYLETTE VILLANUEVA</strong><br>BARANGAY SECRETARY</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>HONEYLETTE VILLANUEVA</strong><br>BARANGAY SECRETARY</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>HONEYLETTE VILLANUEVA</strong><br>BARANGAY SECRETARY</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>HONEYLETTE VILLANUEVA</strong><br>BARANGAY SECRETARY</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 21rem;">
								<img class="mx-auto d-block mt-3" src="kanlurangbukal.png" width="50%"  alt="...">
								<div class="card-body">
									<p class="card-text text-center fs-5"><strong>HONEYLETTE VILLANUEVA</strong><br>BARANGAY SECRETARY</p>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>

		<script>feather.replace()</script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>
		<script src="dashboard.js"></script>
	</body>
	</html>
