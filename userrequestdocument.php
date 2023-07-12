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
								<a class="nav-link" href="userhome.php">
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
				<form class="needs-validation" action="userprocessdocument.php" method="POST" novalidate="">
					<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
						<style>
							
							#message {
								display:none;
								position: relative;
							}

							#message p {
								padding: -20px 20px;
								font-size: 15px;
							}
							.valid {
								color: green;
							}

							.valid:before {
								position: relative;
								padding-left: 10px;
								left: -10px;
								content: "✔";
							}.invalid {
								color: red;
							}

							.invalid:before {
								position: relative;
								padding-left: 10px;
								left: -10px;
								content: "✖";
							}
							.checkbox {
								width: 17px;
								height: 17px;

								margin-left: -20px;
							}
							.checkbox:checked {
								accent-color: orange; !important;
							}
							.checkbox-label{
								font-size: 17px;
							}
						</style>
						<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
							<?php
							include 'conn.php';
							$id = $_SESSION['id'];
							$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
							$row=mysqli_fetch_array($query);
							?>
							<h1 style="text-transform: uppercase;" class="h2">REQUEST DOCUMENT</h1>
							<div class="btn-toolbar mb-2 mb-md-0">
								<div class="btn-group me-2">
									<button type="submit" class="btn btn-md btn-success"><i class="bi bi-check-circle"> </i>Request</button>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							<h1 style="text-transform: uppercase;" class="h2"></h1>
						</div>
						<div class="d-flex flex-wrap row g-4 mb-3 gx-1 p-3  text-start">
							<div class="row g-2">
								<div class="form-floating">
									<input type="hidden" class="form-control" name="userID" value="<?php echo $row['userID'] ?>" />
								</div>
								<div class="form-floating">
									<input type="hidden" class="form-control" name="status" value="0" />
								</div>
								<div class="form-floating col">
									<input type="text" class="form-control rounded" name="firstname" placeholder="First Name" value="<?php echo $row['firstname'] ?>" readonly/>
									<label for="firstname">First Name</label>
								</div>
								<div class="form-floating col">
									<input type="text" class="form-control rounded" name="middlename" placeholder="Middle Name" value="<?php echo $row['middlename'] ?>" readonly />
									<label for="middlename">Middle Name</label>
								</div>
								<div class="form-floating col">
									<input type="text" class="form-control rounded" name="lastname" placeholder="Last Name" value="<?php echo $row['lastname'] ?>" readonly/>
									<label for="lastname">Last Name</label>
								</div>
								<div class="row g-2">
									<div class="form-floating col">
										<input type="text" class="form-control rounded" name="nature" placeholder="Nature of Business" required />
										<label for="lastname">Nature of Business</label>
									</div>
									<div class="form-floating col">
										<input type="date" class="form-control rounded" name="date_applied" placeholder="Date of Application" required />
										<label for="date">Date of Application</label>
									</div>
								</div>
							</div>
						</div>
					</main>
				</form>
			</div>
		</div>
		<script>
			feather.replace()
		</script>
		<script src="js/bootstrap.bundle.min.js">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
		<script >
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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
	</body>
	</html>
