<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {} else {
	header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-BIPMS</title>
	<link rel = "icon" href = "kanlurangbukal.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<!--Load the AJAX API-->
	<script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
	<header class="navbar navbar-light sticky-top bg-warning flex-md-nowrap p-0 ">
		<a class="navbar-brand px-2 fs-6 text-dark">
			<img src="kanlurangbukal.png" width="40">
			<b>E-BIPMS KANLURANG BUKAL</b></a>
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
							<li class="nav-item fs-7">
								<a class="nav-link" href="userdocument.php">
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
						<?php
						include 'conn.php';
						$id = $_SESSION['id'];
						$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
						$row=mysqli_fetch_array($query);
						?>
						<h1 style="text-transform: uppercase;" class="h2">Profile</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-2">
								<a href="edituserprofile.php?id=<?= $row['id']; ?>" class="btn btn-md btn-warning"><i class="bi bi-pencil-square"> </i>Edit Profile</a>
							</div>
						</div>
					</div>
					<?php
					if(isset($_SESSION['erroruserupdate']))
					{
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
					if(isset($_SESSION['saveuserupdate']))
					{
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
					<img class="float-end rounded-circle" src="default-profile-pic.jpg" width="150">
					<div class="d-flex flex-wrap row g-4 mb-3 gx-1 text-start">
						<h1 style="text-transform: uppercase;"><b><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></b></h1>
						<h4 class="mt-0"style="text-transform: uppercase;"><b>Sex: </b><?php echo $row['sex']; ?></h4>
						<h4 class="mt-0" style="text-transform: uppercase;"><b>BIRTHDAY:</b> <?php 
						$newDate = date("F d, Y", strtotime($row['birthday']));  
						echo $newDate; ?></h4>
						<h4 class="mt-0" style="text-transform: uppercase;"><b>AGE:</b> 
							<?php 
							$dateOfBirth = $row['birthday']; 
							$dob = new DateTime($dateOfBirth);  
							$now = new DateTime(); 
							$diff = $now->diff($dob);
							echo $diff->y ?>
						</h4>
						<h4 class="mt-0" style="text-transform: uppercase;"><b>ADDRESS:</b> 
							<?php echo $row['purok'] . ', ' . $row['house_no'] . ' ' .'KANLURANG BUKAL';?>
						</h4>
					</div>
				</main>
			</div>
		</div>
		<script>feather.replace()</script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>
	</body>
	</html>
