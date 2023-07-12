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
							<a class="nav-link" href="admindocument.php">
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
			<form class="needs-validation" action="adminresidentsprocess.php" method="POST" novalidate="">
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">ADD NEW RESIDENT</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-2">
								<button type="submit" class="btn btn-md btn-warning"><i class="bi bi-plus-circle"> </i>Add Resident</button>
							</div>
						</div>
					</div>
					<div class="text-center mb-3">
						<img class="rounded-circle border border-2 border-warning" src="default-profile-pic.jpg" width="150">
					</div>
					<div class="d-flex flex-wrap row g-4 mb-3 gx-1 p-3  text-start">
						<div class="row g-2">
							<div class="form-floating">
								<input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>" />
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="firstname" placeholder="First Name" required />
								<label for="firstname">First Name</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="middlename" placeholder="Middle Name" required />
								<label for="middlename">Middle Name</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="lastname" placeholder="Last Name" required />
								<label for="lastname">Last Name</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<input type="date" class="form-control rounded" name="birthday" placeholder="Birth Date" required />
								<label for="birthday">Birth Date</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="house_no" placeholder="House No." required />
								<label for="house_no">House No.</label>
							</div>
							<div class="form-floating col">
								<select class="form-select form-select" name="purok" placeholder="Purok" required />
									<option selected disabled> Choose from options </option>
									<option value="Purok 1"> Purok 1</option>
									<option value="Purok 2"> Purok 2</option>
									<option value="Purok 3"> Purok 3</option>
									<option value="Purok 4"> Purok 4</option>
									<option value="Purok 5"> Purok 5</option>
									<option value="Purok 6"> Purok 6</option>
									<option value="Purok 7"> Purok 7</option>
								</select>
								<label for="house_no">Purok</label>
							</div>
						</div>
						<div class="row g-2">
							<div class="form-floating col">
								<select class="form-select form-select" name="civilstatus" placeholder="Civil Status" required />
									<option selected disabled> Choose from options</option>
									<option value="Single"> Single</option>
									<option value="Married"> Married</option>
									<option value="Widowed"> Widowed</option>
								</select>
								<label for="civilstatus">Civil Status</label>
							</div>
							<div class="form-floating col">
								<input type="text" class="form-control rounded" name="occupation" placeholder="Occupation" required />
								<label for="firstname">Occupation</label>
							</div>
						</div>
					</div>
				</div>
			</main>
		</form>
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
<script>feather.replace()
</script>
<script src="js/bootstrap.bundle.min.js">
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
