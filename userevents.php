<?php
session_start();

include 'conn.php';
if (isset($_SESSION['user'])) {
    if (time() - $_SESSION["login_time_stamp"] > 600) {
        session_unset();
        session_destroy();
        header("Location: userlogin.php");
    } else {
        $_SESSION['login_time_stamp'] = time();
    }
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events | E-BIPMS</title>
    <link rel="icon" href="kanlurangbukal.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!--Load the AJAX API-->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- FullCalendar scripts -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js'></script>
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
        <button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    <?php
    include 'conn.php';
    $id = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT * FROM users where id='$id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);

    if ($row['profile_picture']) {
        // Display the profile picture
        $profile_picture = $row['profile_picture'];
    } else {
        // Use a default profile picture
        $profile_picture = 'default-profile-pic.jpg';
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-warning sidebar collapse">
                <div class="position-sticky pt-0 mt-2 sidebar-sticky bg-light">
                    <ul class="nav flex-column">
                        <a class="navbar-brand px-2 fs-6 bg-warning">
                            <img class="float-start rounded-circle border border-2 border-dark"
                                src="<?php echo $profile_picture ?>" width="60">
                            <span class="fs-4 px-2 text-dark"><b>WELCOME</b></span>
                            <br>
                            <span class="fs-6 px-2 text-dark" style="text-transform: uppercase;">
                                <?php echo $_SESSION['name']; ?>
                            </span>
                        </a>
                        <li class="nav-item fs-7">
                            <a class="nav-link" href="userhome">
                                <span data-feather="user" class="align-text-bottom feather-48"></span>
                                User Profile
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
                                        <div class="accordion-body" style="margin-right: -20px">
                                            <ul class="nav flex-column pt-4">
                                                <li class="nav-item fs-7" style="margin-left: -20px;">
                                                    <a class="nav-link bg-light" style="margin-top: -40px" href="userdocument">
                                                        <span data-feather="file" style="width: 28px; height: 28px;"
                                                            class="align-text-bottom"></span>
                                                        Barangay Clearance
                                                        <?php
                                                        include 'conn.php';
                                                        $uid = $_SESSION['uid'];
                                                        $query = "SELECT id FROM documents where userID='$uid' and status='1'";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);
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
                                                    <a class="nav-link bg-light" style="margin-top: -15px"
                                                        href="userindigency.php">
                                                        <span data-feather="file" style="width: 28px; height: 28px;"
                                                            class="align-text-bottom"></span>
                                                        Barangay Indigency
                                                    </a>
                                                </li>
                                                <li class="nav-item fs-7 pt-2" style="margin-left: -20px">
                                                    <a class="nav-link bg-light" style="margin-top: -15px"
                                                        href="userresidency.php">
                                                        <span data-feather="file" style="width: 28px; height: 28px;"
                                                            class="align-text-bottom"></span>
                                                        Barangay Residency
                                                    </a>
                                                </li>
                                                <li class="nav-item fs-7 pt-2" style="margin-left: -20px">
                                                    <a class="nav-link bg-light" style="margin-top: -15px"
                                                        href="userbusinesspermit.php">
                                                        <span data-feather="file" style="width: 28px; height: 28px;"
                                                            class="align-text-bottom"></span>
                                                        Business Permit
                                                    </a>
                                                </li>
                                                <li class="nav-item fs-7 pt-2" style="margin-left: -20px">
                                                    <a class="nav-link bg-light" style="margin-top: -15px; margin-bottom: -15px"
                                                        href="usercedula.php">
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
                            <a class="nav-link" href="reportincident">
                                <span data-feather="message-circle" class="align-text-bottom feather-48"></span>
                                Report Incident
                            </a>
                        </li>
                        <li class="nav-item fs-7">
                            <a class="nav-link bg-warning active shadow text-dark">
                                <span data-feather="calendar" class="align-text-bottom feather-48 rounded"></span>
                                Events
                            </a>
                        </li>
                        <hr class="mt-5 mb-0">
                        <li class="nav-item fs-7">
                            <a class="nav-link" href="useraccount.php">
                                <span data-feather="settings" class="align-text-bottom feather-48"></span>
                                Account Settings
                            </a>
                        </li>
                        <li class="nav-item fs-7">
                            <a class="nav-link" href="userlogout.php">
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
                    <h1 style="text-transform: uppercase;" class="h2">Events</h1>
                </div>
                <div class="mb-5" id='calendar'></div>
            </main>
        </div>
    </div>
    <?php
    include 'conn.php';
    $query = "SELECT eventName as title, CONCAT(eventDateStart, ' ', eventTimeStart) as start, CONCAT(eventDateEnd, ' ', eventTimeEnd) as end, eventColor as color FROM events";
    $query_run = mysqli_query($conn, $query);
    $events = array();
    while ($row = mysqli_fetch_assoc($query_run)) {
        $events[] = $row;
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: <?php echo json_encode($events); ?>,
                selectable: true,
                editable: false,
                nowIndicator: true,
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day',
                    list: 'List',
                    prev: 'Prev',
                    next: 'Next'
                },
                headerToolbar: {
                    start: 'title', // will normally be on the left. if RTL, will be on the right
                    center: '',
                    end: 'today,prev,next' // will normally be on the right. if RTL, will be on the left
                },
            });
            calendar.setOption('height', 600);
            calendar.setOption('aspectRatio', 1.8);
            calendar.render();
        });

    </script>
    <script>feather.replace()</script>
    <script src="js/bootstrap.bundle.min.js">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script>
</body>

</html>