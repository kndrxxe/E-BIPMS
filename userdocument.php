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
							<img class="float-start rounded-circle" src="default-profile-pic.jpg" width="60">
							<span class="fs-4 px-2 text-dark"><b>WELCOME</b></span>
							<br>
							<span class="fs-6 px-2 text-dark" style="text-transform: uppercase;"><?php echo $_SESSION['name']?></span>
						</a>
						<li class="nav-item fs-7">
							<a class="nav-link" href="userhome.php">
								<span data-feather="user" class="align-text-bottom feather-48"></span>
								User Profile
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link bg-warning active shadow text-dark">
								<span data-feather="file" class="align-text-bottom feather-48"></span>
								Document Request
							</a>
						</li>
						<li class="nav-item fs-7">
							<a class="nav-link" href="">
								<span data-feather="message-circle" class="align-text-bottom feather-48"></span>
								Feedback
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
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">DOCUMENT REQUESTS</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-2">
							<a href="userrequestdocument.php" class="btn btn-md btn-warning"><i class="bi bi-plus-circle"> </i>Request Document</a>
						</div>
					</div>
				</div>
				<?php
				if(isset($_SESSION['requesterror']))
				{
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
				if(isset($_SESSION['requestsuccess']))
				{
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
					<table class="table table-striped table-hover table-md" style="width:100%">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Type of Document</th>
								<th scope="col">Nature of Business</th>
								<th scope="col">Status</th>
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
										<td><?= $items['id']; ?></td>
										<td><?= $items['firstname'] ." ". $items['lastname']; ?></td>
										<td>Business Clearance</td>
										<td><?= $items['nature']; ?></td>
										<td><?php 
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
									?></td>
									<td class="text-right">										
										<div class="btn-group me-2">
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
