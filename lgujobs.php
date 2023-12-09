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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                language: {
                    emptyTable: "No events available in table"
                }
            });
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/r9n2435p9uyodoyyrepwi6t74sgc0brvm00fyqgbifcp0g24/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
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
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
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
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="companyname" id="companyname"
                                                placeholder="Company Name" required>
                                            <label for="eventname" class="form-label">Company Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="jobtitle" id="jobtitle"
                                                placeholder="Job Title" required>
                                            <label for="eventname" class="form-label">Job Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="eventname" class="form-label">Job Description</label>
                                            <textarea class="form-control" name="jobdescription" id="jobdescription"
                                                placeholder="Job Description" required></textarea>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="joblocation" id="joblocation"
                                                placeholder="Job Location" required>
                                            <label for="eventname" class="form-label">Job Location</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="eventname" class="form-label">Job Requirements</label>
                                            <textarea class="form-control" name="jobrequirements" id="jobrequirements"
                                                placeholder="Job Requirements" required></textarea>
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
                <div class="d-flex justify-content-center flex-wrap row g-4 mb-3 gx-1">
                    <?php
                    include 'conn.php';
                    $query = "SELECT * FROM jobs WHERE isFeatured = 1";
                    $query_run = mysqli_query($conn, $query);
                    while ($items = mysqli_fetch_array($query_run)) {
                        if ($items['image']) {
							// Display the profile picture
							$picture = $items['image'];
						} else {
							// Use a default profile picture
							$picture = 'default-profile-pic.jpg';
						}
                        echo '<div class="col-auto">';
                        echo '<div class="card text-dark animate__animated animate__fadeInUp" style="width: 22rem;">';
                        echo '<div class="card-header">';
                        echo 'Featured'; // Added quotes around Featured
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title" style="text-transform: uppercase;">'. $items['jobtitle'] .'</h5>';
                        echo '<p class="card-text" style="margin-top:-5px"><b>'. $items['companyname'] .'</b> <br>'. $items['joblocation'] .'</p>';
                        echo '<p class="card-text"><b>Job Requirements</b><br><hr style="margin-top: -15px;"></p>';
                        echo '<p class="card-text" style="margin-top: -10px">'. $items['jobrequirements'] .'</p>';
                        echo '<a href="" class="btn btn-warning" style="margin-left: -30px"><i class="bi bi-briefcase-fill"></i> Apply Now</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
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
</body>

</html>