<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon" />
    <title>Contact | EBIPMS</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <style>
            .navbar .nav-link {
                color: #fff !important;
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
                <h1 class="mb-3 text-center text-warning"><strong>JOBS</strong></h1>
                <div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
                    <div class="d-flex justify-content-center flex-wrap row g-4 mb-3 gx-1">
                        <?php
                        include 'conn.php';
                        $query = "SELECT * FROM jobs WHERE isFeatured = 1";
                        $query_run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($items = mysqli_fetch_array($query_run)) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">'; // Responsive grid column
                                echo '<a href="jobdetails.php?id=' . $items['id'] . '" style="text-decoration: none; color: inherit;">'; // Start of <a> tag
                                echo '<div class="card text-dark animate__animated animate__fadeInUp">';
                                echo '<div class="card-header">';
                                echo 'Featured'; // Added quotes around Featured
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title" style="text-transform: uppercase;">' . $items['jobtitle'] . '</h5>';
                                echo '<p class="card-text" style="margin-top:-5px"><b>' . $items['companyname'] . '</b> <br>' . $items['joblocation'] . '</p>';
                                echo '<p class="card-text"><b>Job Requirements</b><br><hr style="margin-top: -15px;"></p>';
                                echo '<p class="card-text" style="margin-top: -10px">' . $items['jobrequirements'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>'; // End of <a> tag
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="card text-center">';
                            echo '<div class="card-body">';
                            echo '<h4>No jobs available at the moment.</h4>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
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
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img src="kanlurangbukal.png" width="50" />
                            E-BIPMS KANLURANG BUKAL
                        </h6>
                        <p class="text-justify">
                            A system that aims to provide a convenient way for the barangay officials to monitor the
                            residents of the barangay and to provide a convenient way for the residents to request
                            barangay services.
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
                            <a href="index#announce" class="text-reset">Announcement</a>
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
                        <p><i class="fas fa-home me-3"></i> Brgy. Kanlurang Bukal<br>Liliw, Laguna</p>
                        <p>
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