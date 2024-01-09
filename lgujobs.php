<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
} else {
    header('location: login.php');
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
    <title>Jobs and Services | E-BIPMS</title>
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="DataTables/datatables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <!--Load the AJAX API-->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- FullCalendar scripts -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                language: {
                    emptyTable: "No jobs available",
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#jobdescription',
            plugins: 'link lists autoresize help hr code',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncentre alignright alignjustify | indent outdent hr | bullist numlist code',
            menubar: false,
            statusbar: false,
            content_style: ".mce-content-body {font-size:15px;font-family:Arial,sans-serif;}",
            height: 300
        });
        tinymce.init({
            selector: '#jobrequirements',
            plugins: 'link lists autoresize help hr code',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncentre alignright alignjustify | indent outdent hr | bullist numlist code',
            menubar: false,
            statusbar: false,
            content_style: ".mce-content-body {font-size:15px;font-family:Arial,sans-serif;}",
            height: 300
        });
    </script>
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

        .pagination .page-item.active .page-link {
            background-color: #ffc107;
            border-color: #ffc107;
            color: black
        }

        .pagination .page-link {
            margin-bottom: 10px;
        }

        textarea {
            resize: none;
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
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-warning sidebar collapse">
                <div class="position-sticky pt-0 mt-2 sidebar-sticky bg-light">
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
                            <a class="nav-link" aria-current="page" href="lguhome.php">
                                <span data-feather="activity" class="align-text-bottom feather-48"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item fs-7">
                            <a class="nav-link" href="lguresidents.php">
                                <span data-feather="user" class="align-text-bottom feather-48"></span>
                                Residents Profile
                            </a>
                        </li>
                        <li class="nav-item fs-7">
                            <a class="nav-link" href="lguevents.php">
                                <span data-feather="calendar" class="align-text-bottom feather-48"></span>
                                Events
                            </a>
                        </li>
                        <li class="nav-item fs-7">
                            <a class="nav-link text-dark bg-warning active shadow">
                                <span data-feather="briefcase" class="align-text-bottom feather-48"></span>
                                Jobs and Services
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
                    <h1 style="text-transform: uppercase;" class="h2">Jobs and Services</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button class="btn btn-md btn-warning addbtn" data-bs-toggle="modal"
                                data-bs-target="#addJobsModal"><i class="bi bi-briefcase-fill">
                                </i>Add Jobs and Services</a>
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="addJobsModal" tabindex="-1" aria-labelledby="addJobsModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addJobsModalLabel"><i class="bi bi-briefcase-fill"></i>
                                        Add Job Offer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="forms needs-validation" method="POST" action="handle_jobs.php"
                                        novalidate="">
                                        <input type="hidden" class="form-control" name="isFeatured" value="1">
                                        <input type="hidden" class="form-control" name="status" value="1">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="jobtitle" id="jobtitle"
                                                placeholder="Job Title" required>
                                            <label for="jobtitle" class="form-label">Job Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="companyname" id="companyname"
                                                placeholder="Company Name" required>
                                            <label for="companyname" class="form-label">Company Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="applicants" maxlength="3"
                                                id="applicants" placeholder="Number of Applicants" required>
                                            <label for="applicants" class="form-label">Number of Applicants</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="region" class="form-control form-control-md"
                                                id="region"></select>
                                            <input type="hidden" class="form-control form-control-md" name="region_text"
                                                id="region-text" required>
                                            <label class="form-label">Region</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="province" class="form-control form-control-md"
                                                id="province"></select>
                                            <input type="hidden" class="form-control form-control-md"
                                                name="province_text" id="province-text" required>
                                            <label class="form-label">Province</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="city" class="form-control form-control-md" id="city"></select>
                                            <input type="hidden" class="form-control form-control-md" name="city_text"
                                                id="city-text" required>
                                            <label class="form-label">City / Municipality</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="jobdescription" id="jobdescription"
                                                placeholder="Job Description" required></textarea>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="jobrequirements" id="jobrequirements"
                                                placeholder="Job Requirements" required></textarea>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="joblink" id="joblink"
                                                placeholder="Job Link" required>
                                            <label for="joblink" class="form-label">Job Link</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-briefcase-fill"></i>
                                        Add Job</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['joberror'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                        <?= $_SESSION['joberror']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['joberror']);
                }
                ?>
                <?php
                if (isset($_SESSION['jobsuccess'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                        <?= $_SESSION['jobsuccess']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['jobsuccess']);
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
                if (isset($_SESSION['updateerror'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                        <?= $_SESSION['updateerror']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['updateerror']);
                }
                ?>
                <?php
                if (isset($_SESSION['updatesuccess'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                        <?= $_SESSION['updatesuccess']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['updatesuccess']);
                }
                ?>
                <div class="table-responsive mb-3 mt-0">
                    <div class="data_table">
                        <table id="myTable" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Date Posted</th>
                                    <th scope="col">Number of Applicants</th>
                                    <th scope="col">Featured</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'conn.php';
                                $query = 'SELECT * FROM jobs';
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $id = $row['id'];
                                    $hash = hash('sha256', $id);
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td class="fw-bold">
                                            <?php echo $row['jobtitle']; ?>
                                        </td>
                                        <td class="fw-bold">
                                            <?php echo $row['companyname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['city']; ?>,
                                            <?php echo $row['region']; ?>, Philippines
                                        </td>
                                        <td>
                                            <?php echo date('F d, Y', strtotime($row['date_posted'])); ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                <?php echo $row['applicants']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['isFeatured'] == 1) {
                                                echo '<span class="badge bg-success">FEATURED</span>';
                                            } else {
                                                echo '<span class="badge bg-danger">NOT FEATURED</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo '<span class="badge bg-success">OPEN</span>';
                                            } else {
                                                echo '<span class="badge bg-danger">CLOSED</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group me-2">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal<?= $row['id']; ?>">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal"
                                                    data-bs-target="#editJobs">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                            <i class="bi bi-pencil-square"></i>
                                                            Update Data
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="updatejobs.php" method="post">

                                                        <div class="modal-body">
                                                            <input type="hidden" name="update_id" id="update_id">

                                                            <div class="form-floating mb-2">
                                                                <input type="text" name="jobtitle" id="updatejobtitle"
                                                                    class="form-control" readonly>
                                                                <label for="jobtitle" class="form-label">Job Title</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <input type="text" name="companyname" id="updatecompanyname"
                                                                    class="form-control" readonly>
                                                                <label for="companyname" class="form-label">Company Name</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <input type="text" name="applicants" id="updateapplicants"
                                                                    class="form-control" required>
                                                                <label for="applicants" class="form-label">Applicants</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <select class="form-select form-select-md"
                                                                    name="isFeatured" placeholder="Featured" required>
                                                                    <option selected disabled>Choose from options</option>
                                                                    <option value="1">Featured</option>
                                                                    <option value="0">Not Featured</option>
                                                                </select>
                                                                <label for="isFeatured">Featured</label>
                                                            </div>
                                                            <div class="form-floating mb-2">
                                                                <select class="form-select form-select-md"
                                                                    name="status"
                                                                    placeholder="Status" required>
                                                                    <option selected disabled>Choose from options</option>
                                                                    <option value="1">Open</option>
                                                                    <option value="0">Closed</option>
                                                                </select>
                                                                <label for="status">Status</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="updatedata"
                                                                class="btn btn-warning"><i class="bi bi-pencil-square"></i>
                                                                Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <div class="modal fade" id="viewModal<?= $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel">Job Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="text-start text-dark mb-0"><strong>
                                                            <?php echo $row['jobtitle'] ?>
                                                        </strong>
                                                    </h4>
                                                    <hr class="my-1" />
                                                    <p class="text-start text-dark mt-0 fs-6"><strong>
                                                            <?php echo $row['companyname'] ?> ·
                                                        </strong>
                                                        <?php echo $row['city'] ?>,
                                                        <?php echo $row['region'] ?>, Philippines <b>·</b>
                                                        <span class="fst-italic text-secondary">
                                                            <?php
                                                            $datePosted = new DateTime($row['date_posted']);
                                                            $now = new DateTime();

                                                            $interval = $datePosted->diff($now);
                                                            if ($interval->y > 0) {
                                                                if ($interval->y == 1) {
                                                                    echo $interval->format('%y year') . " ago.";
                                                                } else {
                                                                    echo $interval->format('%y years') . " ago.";
                                                                }
                                                            } elseif ($interval->m > 0) {
                                                                if ($interval->m == 1) {
                                                                    echo $interval->format('%m month') . " ago.";
                                                                } else {
                                                                    echo $interval->format('%m months') . " ago.";
                                                                }
                                                            } elseif ($interval->d > 0) {
                                                                if ($interval->d == 1) {
                                                                    echo $interval->format('%d day') . " ago.";
                                                                } else {
                                                                    echo $interval->format('%d days') . " ago.";
                                                                }
                                                            } elseif ($interval->h > 0) {
                                                                if ($interval->h == 1) {
                                                                    echo $interval->format('%h hour') . " ago.";
                                                                } else {
                                                                    echo $interval->format('%h hours') . " ago.";
                                                                }
                                                            } elseif ($interval->i > 0) {
                                                                if ($interval->i == 1) {
                                                                    echo $interval->format('%i minute') . " ago.";
                                                                } else {
                                                                    echo $interval->format('%i minutes') . " ago.";
                                                                }
                                                            } else {
                                                                if ($interval->s == 1) {
                                                                    echo $interval->format('%s second') . " ago.";
                                                                } else {
                                                                    echo $interval->format('%s seconds') . " ago.";
                                                                }
                                                            } ?>
                                                        </span>
                                                    </p>
                                                    <h4 class="text-start text-dark mb-0"><strong>About the Job</strong>
                                                    </h4>
                                                    <hr class="my-1" />
                                                    <h6 class="text-start mt-0">
                                                        <?php echo $row['jobdescription'] ?>
                                                    </h6>
                                                    <h4 class="text-start text-dark mb-0"><strong>Job
                                                            Requirements</strong></h4>
                                                    <hr class="my-1" />
                                                    <h6 class="text-start mt-0">
                                                        <?php echo $row['jobrequirements'] ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script>
    <script>
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
    <script>
        document.addEventListener('focusin', (e) => {
            if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                e.stopImmediatePropagation();
            }
        });
    </script>
    <script src="js/ph-address-selector.js"></script>
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
                $('#updatejobtitle').val(data[1]);
                $('#updatecompanyname').val(data[2]);
                $('#updateapplicants').val(data[5]);
            });
        });
    </script>
    <script>
        document.querySelector('[name="applicants"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>

</html>