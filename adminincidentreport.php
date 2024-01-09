<?php
session_start();

include 'conn.php';
if (isset($_SESSION['uid']) && isset($_SESSION['user']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
	if (time() - $_SESSION['login_time_stamp'] > 600) {
		session_unset();
		session_destroy();
		header("Location: userlogin.php");
	} else {
		$_SESSION['login_time_stamp'] = time();
	}
} else {
	header('location: index.php');
}

$query = "SELECT purok, count(*) as number FROM users GROUP BY purok";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incident Report | E-BIPMS</title>
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    <link rel="stylesheet" href="DataTables/datatables.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                language: {
                    emptyTable: "No incident reported yet."
                }
            });
        });
    </script>
    <!--Load the AJAX API-->
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

        div.dataTables_wrapper div.dataTables_filter input {
            border-radius: 5px;
            border: 1px solid #ffc107;
        }

        div.dataTables_wrapper div.dataTables_filter input:focus {
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

        div.dataTables_wrapper div.dataTables_length label {
            margin-bottom: 10px;
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
            <b>E-BIPMS KANLURANG BUKAL</b></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
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
                            <a class="nav-link" href="adminhome.php">
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
                                                        <?php
                                                        include 'conn.php';
                                                        $status = 0;
                                                        $query = "SELECT id FROM documents WHERE status = ?";
                                                        $stmt = $conn->prepare($query);
                                                        $stmt->bind_param("i", $status);
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();
                                                        $row = $result->num_rows;
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
														href="adminindigency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Indigency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href="adminresidency.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Brgy. Residency
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px"
														href=" adminbusinesspermit.php">
														<span data-feather="file" style="width: 28px; height: 28px;"
															class="align-text-bottom"></span>
														Business Permit
													</a>
												</li>
												<li class="nav-item fs-7 pt-2" style="margin-left: -20px">
													<a class="nav-link" style="margin-top: -15px; margin-bottom: -20px"
														href=" admincedula.php">
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
                            <a class="nav-link text-dark bg-warning active shadow">
                                <span data-feather="message-circle" class="align-text-bottom feather-48"></span>
                                Incident Report
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
                    <h1 class="h2">INCIDENT REPORT</h1>
                </div>
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
                <div class="table-responsive">
                    <div class="data_table">
                        <table id="myTable" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Type of Incident</th>
                                    <th scope="col">Date of Incident</th>
                                    <th scope="col">Time of Incident</th>
                                    <th scope="col">Exact Location</th>
                                    <th scope="col">Person Involved</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'conn.php';
                                $query = "SELECT * FROM incidentreport";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($items = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $items['id']; ?>
                                            </td>
                                            <td>
                                                <?= $items['incident']; ?>
                                            <td>
                                                <?= $items['date']; ?>
                                            </td>
                                            <td>
                                                <?= $items['time']; ?>
                                            </td>
                                            <td>
                                                <?= $items['location']; ?>
                                            </td>
                                            <td>
                                                <?= $items['person']; ?>
                                            </td>
                                            <td>
                                                <?= $items['description']; ?>
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
                                                        <span class="badge bg-primary">RECEIVED
                                                        </span>
                                                    <?php
                                                } else if ($items['status'] == 2) {
                                                    ?>
                                                            <span class="badge bg-success">ACTION MADE
                                                            </span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success editbtn" style="width: 40px;"><i
                                                        class="bi bi-pencil"></i></a>
                                            </td>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                <i class="bi bi-flag-fill"></i>
                                                                Update Report
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <form action="updatereport.php" method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="update_id" id="update_id">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded"
                                                                        name="incident" id="incident"
                                                                        placeholder="Type of Incident" readonly />
                                                                    <label for="incident">Type of Incident</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="date" class="form-control rounded" name="date"
                                                                        placeholder="Date of Incident" id="date" readonly />
                                                                    <label for="date">Date of Incident</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="time" class="form-control rounded" name="time"
                                                                        placeholder="Time of Incident" id="time" readonly />
                                                                    <label for="time">Time of Incident</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded"
                                                                        name="location" id="location"
                                                                        placeholder="Exact Location" readonly />
                                                                    <label for="location">Exact Location</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded"
                                                                        name="person" id="person" placeholder="Person Involved"
                                                                        readonly />
                                                                    <label for="person">Person Involved</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control" class="form-control rounded"
                                                                        name="description" id="description" maxlength="300"
                                                                        placeholder="Description" style="resize: none;"
                                                                        readonly>
                                                                                            </textarea>
                                                                    <span class="text-secondary float-end"
                                                                        style="font-size: 10pt;" id="charCount">0</span>
                                                                    <label for="description">Description</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <select class="form-select form-select-md"
                                                                        value="<?php echo $items['status'] ?>" name="status"
                                                                        placeholder="Status" required>
                                                                        <option selected disabled>Choose from options</option>
                                                                        <option value="0" <?php
                                                                        if ($items['status'] == '0') {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>Pending</option>
                                                                        <option value="1" <?php
                                                                        if ($items['status'] == '1') {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>Received</option>
                                                                        <option value="2" <?php
                                                                        if ($items['status'] == '2') {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>Action Made</option>
                                                                    </select>
                                                                    <label for="status">Status</label>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" name="updatedata"
                                                                    class="btn btn-warning"><i class="bi bi-flag-fill"></i>
                                                                    Update Report</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="DataTables/datatables.js">
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
                $('#incident').val(data[1]);
                $('#date').val(data[2]);
                $('#time').val(data[3]);
                $('#location').val(data[4]);
                $('#person').val(data[5]);
                $('#description').val(data[6]);
                $('#status').val(data[7]);

                var charCount = $('#description').val().length;
                var charLeft = 150 - charCount;
                $('#charCount').text(charLeft + '/150');
            });
            $('#description').on('input', function () {
                // Existing code to auto-size the textarea...
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
                // Update the character count
                var charCount = this.value.length;
                var charLeft = 150 - charCount;
                $('#charCount').text(charLeft + '/150');
            });
        });
    </script>
</body>

</html>