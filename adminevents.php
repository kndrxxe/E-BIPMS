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
    <title>E-BIPMS</title>
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
    <!-- FullCalendar scripts -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script>
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
                            <a class="nav-link bg-warning active shadow text-dark">
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
                    <h1 style="text-transform: uppercase;" class="h2">Events</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-md btn-warning" data-bs-toggle="modal"
                                data-bs-target="#addEventModal"><i class="bi bi-plus-circle">
                                </i>Add New Event
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="forms needs-validation" method="POST" action="handle_event.php" novalidate="">
                                        <div class="mb-3">
                                            <label for="eventName" class="form-label">Event Name</label>
                                            <input type="text" class="form-control" name="eventName" id="eventName"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="eventDateStart" class="form-label">Event Date Start</label>
                                            <input type="date" class="form-control" max="9999-12-31" name="eventDateStart"
                                                id="eventDateStart" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="eventDateEnd" class="form-label">Event Date End</label>
                                            <input type="date" class="form-control" max="9999-12-31" name="eventDateEnd"
                                                id="eventDateEnd" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="eventTimeStart" class="form-label">Event Time Start</label>
                                            <input type="time" class="form-control" name="eventTimeStart"
                                                id="eventTimeStart" required>
                                        </div><div class="mb-3">
                                            <label for="eventTimeEnd" class="form-label">Event Time End</label>
                                            <input type="time" class="form-control" name="eventTimeEnd"
                                                id="eventTimeEnd" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="eventLocation" class="form-label">Event Location</label>
                                            <input type="text" class="form-control" name="eventLocation"
                                                id="eventLocation" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="eventDescription" class="form-label">Event Description</label>
                                            <textarea class="form-control" name="eventDescription" id="eventDescription"
                                                rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="eventColor" class="form-label">Event Color</label>
                                            <input type="color" class="form-control" name="eventColor"
                                                id="eventColor" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['eventError'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                        <?= $_SESSION['eventError']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['eventError']);
                }
                ?>
                <?php
                if (isset($_SESSION['eventSuccess'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                        <?= $_SESSION['eventSuccess']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['eventSuccess']);
                }
                ?>
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
                    start: 'dayGridMonth,listWeek,timeGridWeek', // will normally be on the left. if RTL, will be on the right
                    center: 'title',
                    end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
                },
            });
            calendar.setOption('height', 600);
            calendar.setOption('aspectRatio', 1.8);
            calendar.render();
        });

    </script>
    <script>feather.replace()</script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script>
    <script src="dashboard.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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
</body>

</html>