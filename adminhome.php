<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
} else {
	header('location: userlogin.php');
}
?>
<?php
include 'conn.php';
$query = "SELECT purok, count(*) as number FROM users GROUP BY purok";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | E-BIPMS</title>
	<link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
		href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	<!--Load the AJAX API-->
	<script src="https://unpkg.com/feather-icons"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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
			<b>E-BIPMS KANLURANG BUKAL</b></a>
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
							<a class="nav-link text-dark bg-warning active shadow" aria-current="page">
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
					<h1 class="h2">DASHBOARD</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group me-1">
							<button type="button" class="btn btn-md btn-outline-warning">Export</button>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center flex-wrap row g-4 mb-3 gx-1">
					<div class="col-auto">
						<div class="card text-center text-dark animate__animated animate__fadeInUp"
							style="width: 21rem;">
							<div class="card-icon d-flex align-items-center justify-content-start"
								style="background-image: linear-gradient(to right, #f9cb9c, #f6bc0a); padding: 20px; border-radius: 5px;">
								<i class="fa-sharp fa-regular fa-people"
									style="font-size: 3.5rem; margin-right: 50px;"></i>
								<div class="text-left ml-auto">
									<h5 class="card-title fs-5"><b>Total Population</b></h5>
									<p class="card-text">
										<?php
										include 'conn.php';
										$query = "SELECT id FROM users";
										$query_run = mysqli_query($conn, $query);
										$row = mysqli_num_rows($query_run);
										echo '<h2 class="fs-1 text-end"> ' . $row . '</h2>';
										?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<div class="card text-center text-dark animate__animated animate__fadeInUp"
							style="width: 21rem;">
							<div class="card-icon d-flex align-items-center justify-content-start"
								style="background-image: linear-gradient(to right, #f9cb9c, #f6bc0a); padding: 20px; border-radius: 5px;">
								<i class="fa-sharp fa-regular fa-mars"
									style="font-size: 3.5rem; margin-right: 75px;"></i>
								<div class="text-left ml-auto">
									<h5 class="card-title fs-5 text-end"><b>Male Population</b></h5>
									<p class="card-text">
										<?php
										include 'conn.php';
										$query = "SELECT id FROM users WHERE sex = 'Male'";
										$query_run = mysqli_query($conn, $query);
										$row = mysqli_num_rows($query_run);
										echo '<h2 class="fs-1 text-end"> ' . $row . '</h2>';
										?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<div class="card text-center text-dark animate__animated animate__fadeInUp"
							style="width: 21rem;">
							<div class="card-icon d-flex align-items-center justify-content-start"
								style="background-image: linear-gradient(to right, #f9cb9c, #f6bc0a); padding: 20px; border-radius: 5px;">
								<i class="fa-sharp fa-regular fa-venus"
									style="font-size: 3.5rem; margin-right: 55px;"></i>
								<div class="text-left ml-auto">
									<h5 class="card-title fs-5 text-end "><b>Female Population</b></h5>
									<p class="card-text">
										<?php
										include 'conn.php';
										$query = "SELECT id FROM users WHERE sex = 'Female'";
										$query_run = mysqli_query($conn, $query);
										$row = mysqli_num_rows($query_run);
										echo '<h2 class="fs-1 text-end"> ' . $row . '</h2>';
										?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<div class="card text-center text-dark animate__animated animate__fadeInUp"
							style="width: 21rem;">
							<div class="card-icon d-flex align-items-center justify-content-start"
								style="background-image: linear-gradient(to right, #f9cb9c, #f6bc0a); padding: 20px; border-radius: 5px;">
								<i class="fa-sharp fa-regular fa-person-cane"
									style="font-size: 3.5rem; margin-right: 90px;"></i>
								<div class="text-left ml-auto">
									<h5 class="card-title fs-5 text-end"><b>Senior Citizens</b></h5>
									<p class="card-text">
										<?php
										include 'conn.php';
										$query = "SELECT id FROM users WHERE specialgroup = 'Senior Citizens'";
										$query_run = mysqli_query($conn, $query);
										$row = mysqli_num_rows($query_run);
										echo '<h2 class="fs-1 text-end"> ' . $row . '</h2>';
										?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div
					class="d-flex justify-content-center flex-wrap row g-3 mb-3 gx-3 animate__animated animate__fadeInUp">
					<div class="col-auto col-sm-6 col-md-4 pb-2 rounded p-3 animate__animated animate__fadeInUp"
						style="box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.1); width:100%; max-width: 350px; margin-left:auto; margin-right:auto;">
						<canvas id="populationPerPurok"></canvas>
					</div>
					<div class="col-auto col-sm-6 col-lg-7 pt-4 rounded p-3 animate__animated animate__fadeInUp"
						style="box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.1); width:100%; max-width: 700px; margin-left:auto; margin-right:auto;">
						<canvas id="voterPerPurok"></canvas>
					</div>
				</div>
				<div
					class="d-flex justify-content-center flex-wrap row g-3 mb-3 gx-3 animate__animated animate__fadeInUp">
					<div class="col-auto col-sm-6 col-md-4 pb-2 rounded p-3 animate__animated animate__fadeInUp"
						style="box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.1); width:100%; max-width: 600px; margin-left:auto; margin-right:auto;">
						<canvas id="ageGroup"></canvas>
					</div>
				</div>
				<h2>NEWLY ADDED RESIDENT</h2>
				<div class="table-responsive">
					<table class="table table-md">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Purok</th>
								<th scope="col">Sex</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'conn.php';
							$query = "SELECT * FROM users LIMIT 5";
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
											<?= $items['lastname']; ?>
										</td>
										<td>
											<?= $items['purok']; ?>
										</td>
										<td>
											<?= $items['sex']; ?>
										</td>
									</tr>
									<?php
								}
							} else {
								?>
								<tr>
									<td colspan="4">No Records Found</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</main>
		</div>
	</div>

	<?php
	include 'conn.php';
	$query = "SELECT purok, COUNT(*) as people FROM users GROUP BY purok";
	$query_run = mysqli_query($conn, $query);
	$labels = array();
	$data = array();
	while ($row = mysqli_fetch_assoc($query_run)) {
		$labels[] = $row['purok'];
		$data[] = $row['people'];
	}
	?>
	<?php
	include 'conn.php';
	$query = "SELECT purok, voter, COUNT(*) as count FROM users WHERE voter IN ('Yes', 'No') GROUP BY purok, voter";
	$query_run = mysqli_query($conn, $query);
	$dataYes = array_fill_keys(['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7'], 0);
	$dataNo = array_fill_keys(['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7'], 0);
	while ($row = mysqli_fetch_assoc($query_run)) {
		if ($row['voter'] === 'Yes') {
			$voterYes[$row['purok']] = $row['count'];
		} else {
			$voterNo[$row['purok']] = $row['count'];
		}
	}
	?>
	<?php
	include 'conn.php';
	$query = "SELECT FLOOR(DATEDIFF(CURDATE(), birthday) / 365) as age, COUNT(*) as count FROM users GROUP BY age";
	$query_run = mysqli_query($conn, $query);
	$dataList = array_fill_keys(['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61-70'], 0);
	while ($row = mysqli_fetch_assoc($query_run)) {
		if ($row['age'] >= 0 && $row['age'] <= 10) {
			$dataList['0-10'] += $row['count'];
		} elseif ($row['age'] >= 11 && $row['age'] <= 20) {
			$dataList['11-20'] += $row['count'];
		} elseif ($row['age'] >= 21 && $row['age'] <= 30) {
			$dataList['21-30'] += $row['count'];
		} elseif ($row['age'] >= 31 && $row['age'] <= 40) {
			$dataList['31-40'] += $row['count'];
		} elseif ($row['age'] >= 41 && $row['age'] <= 50) {
			$dataList['41-50'] += $row['count'];
		} elseif ($row['age'] >= 51 && $row['age'] <= 60) {
			$dataList['51-60'] += $row['count'];
		} elseif ($row['age'] >= 61 && $row['age'] <= 70) {
			$dataList['61-70'] += $row['count'];
		}
	}
	$data_values = array_values($dataList);
	?>
	<script>feather.replace()</script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script>
	<script src="dashboard.js"></script>
	<script>
		var ctx1 = document.getElementById('populationPerPurok').getContext('2d');
		const myChart1 = new Chart(ctx1, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($labels); ?>,
				datasets: [{
					label: 'Population',
					data: <?php echo json_encode($data); ?>,
					borderWidth: 2
				}]
			},
			options: {
				responsive: true,
				plugins: {
					title: {
						display: true,
						text: 'Population per Purok',
					}
				}
			}
		});
		var ctx2 = document.getElementById('voterPerPurok').getContext('2d');
		const myChart2 = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7'],
				datasets: [{
					label: 'Registered Voter',
					data: <?php echo json_encode($voterYes); ?>, // Use different PHP variable for 'Yes' data
					borderWidth: 2
				}, {
					label: 'Unregistered Voter',
					data: <?php echo json_encode($voterNo); ?>, // Use different PHP variable for 'No' data
					borderWidth: 2
				}]
			},
			options: {
				responsive: true,
				plugins: {
					title: {
						display: true,
						text: 'Voter per Purok',
					}
				}
			}
		});
		var ctx3 = document.getElementById('ageGroup').getContext('2d');
		const myChart3 = new Chart(ctx3, {
			type: 'bar',
			data: {
				labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61-70'],
				datasets: [{
					label: 'Age Group',
					data: <?php echo json_encode($data_values); ?>,
					borderWidth: 2,
				}]
			},
			options: {
				indexAxis: 'y',
				responsive: true,
				plugins: {
					title: {
						display: true,
						text: 'Age Group',
					}
				}
			}
		});
	</script>
</body>

</html>