<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon" />
    <title>Jobs | EBIPMS</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MmUjv89qIO9qjsa6v+4L0K+4FSAF1h9OtbxM0vUSz8iZAD4C2B4ToAtE1wsIzOSF"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <style>
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
    <!--Main Navigation-->
    <header>
        <style>
            .navbar .nav-link {
                color: #fff !important;
            }

            .text-justify {
                text-align: justify;
            }
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark sticky bg-dark" style="z-index: 2000">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand nav-link" href="index">
                    <img src="kanlurangbukal.png" width="30" />
                    <b>E-BIPMS</b>
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="index">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="index#announce">Announcement</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="jobs.php">Jobs</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="officials.php">Officials</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="contact">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-mdb-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="userlogin"><i class="fa fa-user"></i> Login as
                                        User</a></li>
                                <li><a class="dropdown-item" href="adminlogin"><i class="fa fa-user"></i> Login as
                                        Admin</a></li>
                                <li><a class="dropdown-item" href="lgulogin"><i class="fa fa-user"></i> Login as LGU</a>
                                </li>
                                <li><a class="dropdown-item" href="bhwlogin"><i class="fa fa-user"></i> Login as BHW</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <main class="mt-5">
        <div class="container">
            <section class="mb-1">
                <h1 class="mb-3 text-center text-warning"><strong>JOBS</strong></h1>
                <div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
                    <div class="d-flex justify-content-center flex-wrap row g-4 mb-3 gx-1">
                        <?php
                        include 'conn.php';
                        $query = "SELECT * FROM jobs WHERE isFeatured = 1 LIMIT 5 ";
                        $query_run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($items = mysqli_fetch_array($query_run)) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">'; // Responsive grid column
                                echo '<a href="jobdetails.php?job_id=' . $items['hash_id'] . '" style="text-decoration: none; color: inherit;">'; // Start of <a> tag
                                echo '<div class="card text-dark animate__animated animate__fadeInUp">';
                                echo '<div class="card-header">';
                                echo 'Featured'; // Added quotes around Featured
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title" style="text-transform: uppercase;">' . $items['jobtitle'] . '</h5>';
                                echo '<p class="card-text" style="margin-top:-5px"><b>' . $items['companyname'] . '</b>'. " " . '<span class="badge badge-success">'. $items['applicants'] . " applicants" .'</span>' . '<br>' . $items['city'] . ", " . $items['region'] . '</p>';
                                echo '<p class="card-text"><b>Job Requirements</b><br><hr style="margin-top: -15px;"></p>';
                                echo '<p class="card-text" style="margin-top: -10px">' . substr($items['jobrequirements'], 0, 200) . '...</p>'; // Shorten the job requirements text
                                echo '</div>';
                                echo '<div class="card-footer">';
                                echo '<div class="text-center mb-3">';
                                if ($items['status'] != '0') {
                                    echo '<a href="' . $items['joblink'] . '" target="_blank" class="btn btn-warning me-2 col-5"><i class="bi bi-box-arrow-up-right"></i> Apply</a>'; // Added "Apply" button
                                }
                                echo '<a href="jobdetails.php?job_id=' . $items['hash_id'] . '" class="btn btn-warning col-5"><i class="bi bi-arrow-right-circle"></i> Read More</a>'; // Added "Read More" button
                                echo '</div>';
                                echo '<small class="text-muted">Posted on ' . date('F d, Y', strtotime($items['date_posted'])) . '</small>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>'; // End of <a> tag
                                echo '</div>';
                            }

                        }
                        ?>
                    </div>
                </div>
            </section>
            <div class="table-responsive mb-5 mt-0">
                <div class="data_table">
                    <table id="myTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="fw-bold" scope="col">Job Title</th>
                                <th class="fw-bold" scope="col">Company Name</th>
                                <th class="fw-bold" scope="col">Location</th>
                                <th class="fw-bold" scope="col">Date Posted</th>
                                <th class="fw-bold" scope="col">Status</th>
                                <th class="fw-bold" scope="col">Action</th>
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
                                <tr style="cursor: pointer;"
                                    onclick="window.location='jobdetails.php?job_id=<?php echo $row['hash_id']; ?>'">
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
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo '<span class="badge bg-success">OPEN</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">CLOSED</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="jobdetails.php?job_id=<?php echo $row['hash_id']; ?>"
                                            class="btn btn-warning btn-sm"><i class="bi bi-arrow-right-circle"></i>
                                            Read More</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <!--Section: Content-->
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-light pt-1">

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h4 class="text-uppercase fw-bold mb-4">
                            E-BIPMS KANLURANG BUKAL
                        </h4>
                        <p class="text-justify">
                            A system that aims to provide a convenient way for the barangay officials to monitor the
                            residents of the
                            barangay and to provide a convenient way for the residents to request barangay services.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="index" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="#announce" class="text-reset">Announcement</a>
                        </p>
                        <p>
                            <a href="jobs.php" class="text-reset">Jobs</a>
                        </p>
                        <p>
                            <a href="officials.php" class="text-reset">Officials</a>
                        </p>
                        <p>
                            <a href="contact" class="text-reset">Contact</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p class="text-break"><i class="fas fa-home me-3"></i> Brgy. Kanlurang Bukal<br>Liliw, Laguna
                        </p>
                        <p class="text-break">
                            <i class="fas fa-envelope me-3"></i>
                            ebipmskanlurangbukal@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="DataTables/datatables.js">
    </script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new mdb.Dropdown(dropdownToggleEl)
            })
        })
    </script>
</body>

</html>