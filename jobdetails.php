<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon" />
    <title>Job Details | EBIPMS</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MmUjv89qIO9qjsa6v+4L0K+4FSAF1h9OtbxM0vUSz8iZAD4C2B4ToAtE1wsIzOSF"
        crossorigin="anonymous"></script>
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
            <section class="mb-5">
                <a class="btn btn-warning btn-floating mb-4" href="jobs.php" role="button"><i
                        class="fas fa-arrow-left"></i></a>
                <?php
                include 'conn.php';
                $id = $_GET['job_id'];
                $query = mysqli_query($conn, "SELECT * FROM jobs where hash_id='$id'") or die(mysqli_error());
                $row = mysqli_fetch_array($query);
                ?>
                <div class="d-flex flex-wrap mb-3 row g-3">
                    <h1 class="text-start text-dark mb-0"><strong>
                            <?php echo $row['jobtitle'] ?>
                        </strong>
                    </h1>
                    <hr class="my-1" />
                    <p class="text-start text-dark mt-0"><strong>
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
                    <?php
                    if ($row['status'] != '0') {
                        echo '<a href="' . $row['joblink'] . '" target="_blank" class="btn btn-warning ms-2 col-4 col-sm-1"><i class="bi bi-box-arrow-up-right"></i> Apply</a>'; // Added "Apply" button
                    }
                    ?>
                    <h1 class="text-start text-dark mb-0"><strong>About the Job</strong></h1>
                    <hr class="my-1" />
                    <h6 class="text-start mt-0">
                        <?php echo $row['jobdescription'] ?>
                    </h6>
                    <h1 class="text-start text-dark mb-0"><strong>Job Requirements</strong></h1>
                    <hr class="my-1" />
                    <h6 class="text-start mt-0">
                        <?php echo $row['jobrequirements'] ?>
                    </h6>
                </div>

            </section>
            <!--Section: Content-->
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