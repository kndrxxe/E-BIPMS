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
                <a class="navbar-brand nav-link">
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
                            <a class="nav-link font-weight-bold" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="officials.php">Officials</a>
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
                    $query = "SELECT * FROM officials WHERE position='Barangay Chairman'";
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
                        echo '<div class="card" style="width: 22rem;">';
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
                        echo '<h5 class="text-center mt-0" style="text-transform: uppercase;">'. '<strong>' . $items['termStartYear'] . ' - '  . $items['termEndYear'] . '</strong>' .'</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="d-flex flex-wrap mb-3 row g-3 justify-content-center">
                    <?php
                    include 'conn.php';
                    $query = "SELECT * FROM officials WHERE position='Barangay Councilor'";
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
                        echo '<div class="card" style="width: 22rem;">';
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
                        echo '<h5 class="text-center mt-0" style="text-transform: uppercase;">'. '<strong>' . $items['termStartYear'] . ' - '  . $items['termEndYear'] . '</strong>' .'</h5>';
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
                        echo '<div class="card" style="width: 22rem;">';
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

    <!--Footer-->
    <footer class="bg-warning text-lg-start">
        <!-- Copyright -->
        <div class="text-center text-light p-3">
            © 2023 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>