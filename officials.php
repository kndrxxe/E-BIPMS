<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon" />
    <title>Officials | EBIPMS</title>
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
                <a class="navbar-brand nav-link" href="index.php">
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
                <h1 class="mb-5 text-center text-warning"><strong>BARANGAY OFFICIALS</strong></h1>

                <div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
                    <?php
                    include 'conn.php';
                    $query = "SELECT * FROM officials WHERE position='Barangay Chairperson'";
                    $query_run = mysqli_query($conn, $query);
                    while ($items = mysqli_fetch_array($query_run)) {
                        if ($items['picture']) {
                            // Display the profile picture
                            $picture = $items['picture'];
                        } else {
                            // Use a default profile picture
                            $picture = 'default-profile-pic.jpg';
                        }
                        echo '<div class="col-auto">';
                        echo '<div class="card" style="width: 21rem;">';
                        echo '<div class="card-body">';
                        echo '<div class="col text-center">';
                        if (!empty($picture)) {
                            echo '<img class="rounded-circle border border-warning mb-2" src="' . $picture . '" alt="Profile Picture" width="150">';
                        } else {
                            echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
                        }
                        $id = $items['id'];
                        echo '</div>';
                        echo '<h3 class="text-center" style="text-transform: uppercase;">' . '<strong>' . $items['firstName'] . ' ' . $items['middleName'] . '<br>' . $items['lastName'] . '</strong>' . '</h3>';
                        echo '<h4 class="text-center mt-0" style="text-transform: uppercase;">' . $items['position'] . '</h4>';
                        echo '<h5 class="text-center mt-0" style="text-transform: uppercase;">' . '<strong>' . $items['termStartYear'] . ' - ' . $items['termEndYear'] . '</strong>' . '</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
                    <?php
                    include 'conn.php';
                    $query = "SELECT * FROM officials WHERE position='Barangay Councilor' OR position='SK Chairperson'";
                    $query_run = mysqli_query($conn, $query);
                    while ($items = mysqli_fetch_array($query_run)) {
                        if ($items['picture']) {
                            // Display the profile picture
                            $picture = $items['picture'];
                        } else {
                            // Use a default profile picture
                            $picture = 'default-profile-pic.jpg';
                        }
                        echo '<div class="col-auto">';
                        echo '<div class="card" style="width: 21rem;">';
                        echo '<div class="card-body">';
                        echo '<div class="col text-center">';
                        if (!empty($picture)) {
                            echo '<img class="rounded-circle border border-warning mb-2" src="' . $picture . '" alt="Picture" width="150">';
                        } else {
                            echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
                        }
                        $id = $items['id'];
                        echo '</div>';
                        echo '<h4 class="text-center" style="text-transform: uppercase;">' . '<strong>' . $items['firstName'] . ' ' . $items['middleName'] . '<br>' . $items['lastName'] . '</strong>' . '</h4>';
                        echo '<h4 class="text-center mt-0 text-secondary" style="text-transform: uppercase;">' . $items['position'] . '</h4>';
                        echo '<h5 class="text-center mt-0" style="text-transform: uppercase;">' . '<strong>' . $items['termStartYear'] . ' - ' . $items['termEndYear'] . '</strong>' . '</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
                    <?php
                    include 'conn.php';
                    $query = "SELECT * FROM officials WHERE position='Barangay Secretary' OR position='Barangay Treasurer'";
                    $query_run = mysqli_query($conn, $query);
                    while ($items = mysqli_fetch_array($query_run)) {
                        if ($items['picture']) {
                            // Display the profile picture
                            $picture = $items['picture'];
                        } else {
                            // Use a default profile picture
                            $picture = 'default-profile-pic.jpg';
                        }
                        echo '<div class="col-auto">';
                        echo '<div class="card" style="width: 21rem;">';
                        echo '<div class="card-body">';
                        echo '<div class="col text-center">';
                        if (!empty($picture)) {
                            echo '<img class="rounded-circle border border-warning mb-2" src="' . $picture . '" alt="Profile Picture" width="150">';
                        } else {
                            echo '<img class="rounded-circle border border-warning mb-2" src="default-profile-pic.jpg" alt="Profile Picture" width="150">';
                        }
                        $id = $items['id'];
                        echo '</div>';
                        echo '<h4 class="text-center" style="text-transform: uppercase;">' . '<strong>' . $items['firstName'] . ' ' . $items['middleName'] . '<br>' . $items['lastName'] . '</strong>' . '</h4>';
                        echo '<h5 class="text-center text-secondary" style="text-transform: uppercase;">' . $items['committee'] . '</h5>';
                        echo '<h4 class="text-center mt-0" style="text-transform: uppercase;">' . $items['position'] . '</h4>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
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