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
                        <div class="btn-group me-1">
                            <button type="button" class="btn btn-md btn-warning addbtn" data-bs-toggle="modal"
                                data-bs-target="#addEventModal">
                                <i class="bi bi-calendar-plus"></i> Add New Event
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addEventModalLabel"><i class="bi bi-calendar-plus"></i>
                                        Add New Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="forms needs-validation" method="POST" action="handle_event.php"
                                        novalidate="">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="eventname" id="eventname"
                                                placeholder="Event Name" required>
                                            <label for="eventname" class="form-label">Event Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" max="9999-12-31"
                                                name="eventdatestart" id="eventdatestart" required>
                                            <label for="eventdatestart" class="form-label">Event Date Start</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" max="9999-12-31" name="eventdateend"
                                                id="eventdateend" required>
                                            <label for="eventdateend" class="form-label">Event Date End</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" name="eventtimestart"
                                                id="eventtimestart" required>
                                            <label for="eventtimestart" class="form-label">Event Time Start</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" name="eventtimeend"
                                                id="eventtimeend" required>
                                            <label for="eventtimeend" class="form-label">Event Time End</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="eventlocation"
                                                placeholder="Event Date End" id="eventlocation" required>
                                            <label for="eventlocation" class="form-label">Event Location</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" name="eventdescription" maxlength="150"
                                                placeholder="Event Description" id="eventdescription"
                                                required></textarea>
                                            <span class="text-secondary float-end" style="font-size: 10pt;"
                                                id="charCountModal">0</span>
                                            <label for="eventlocation" class="form-label">Event Description</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="color" class="form-control" name="eventcolor" id="eventcolor"
                                                required>
                                            <label for="eventcolor" class="form-label">Event Color</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-calendar-plus"></i>
                                        Add
                                        Event</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['eventerror'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                        <?= $_SESSION['eventerror']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['eventerror']);
                }
                ?>
                <?php
                if (isset($_SESSION['eventsuccess'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                        <?= $_SESSION['eventsuccess']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['eventsuccess']);
                }
                ?>
                <?php
                if (isset($_SESSION['deleteerror'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi bi-exclamation-triangle-fill" width="24" height="24"></i>
                        <?= $_SESSION['deleteerror']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['deleteerror']);
                }
                ?>
                <?php
                if (isset($_SESSION['deletesuccess'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                        <i class="bi bi-check-circle-fill" width="24" height="24"></i>
                        <?= $_SESSION['deletesuccess']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['deletesuccess']);
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
                <div class="mb-5" id='calendar'></div>

                <div class="table-responsive">
                    <table id="myTable" class="table table-md" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Start Date</th>
                                <th scope="col">Event End Date</th>
                                <th scope="col">Event Time Start</th>
                                <th scope="col">Event Time End</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Description</th>
                                <th scope="col">Event Color</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'conn.php';
                            $query = "SELECT * FROM events";
                            $query_run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $items['id']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventname']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventdatestart']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventdateend']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventtimestart']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventtimeend']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventlocation']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventdescription']; ?>
                                        </td>
                                        <td>
                                            <?= $items['eventcolor']; ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group me-2">
                                                <button type="button" class="btn btn-warning btn-sm editbtn"
                                                    data-bs-target="#editModal" style="width: 40px;"><i
                                                        class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm deletebtn"
                                                    style="width: 40px;"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEventModalLabel"><i
                                            class="bi bi-calendar-event"></i> Edit Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="forms needs-validation" method="POST" action="updateevent.php"
                                        novalidate="">
                                        <input type="hidden" name="update_id" id="update_id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="eventname" id="editEventName"
                                                required>
                                            <label for="eventname" class="form-label">Event Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" max="9999-12-31"
                                                name="eventdatestart" id="editDateStart" required>
                                            <label for="eventdatestart" class="form-label">Event Date Start</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" max="9999-12-31" name="eventdateend"
                                                id="editDateEnd" required>
                                            <label for="eventdateend" class="form-label">Event Date End</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" name="eventtimestart"
                                                id="editTimeStart" required>
                                            <label for="eventtimestart" class="form-label">Event Time Start</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" name="eventtimeend" id="editTimeEnd"
                                                required>
                                            <label for="eventtimeend" class="form-label">Event Time End</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="eventlocation"
                                                id="editLocation" required>
                                            <label for="eventlocation" class="form-label">Event Location</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" name="eventdescription" maxlength="150"
                                                id="editDescription" required></textarea>
                                            <label for="eventdescription" class="form-label">Event
                                                Description
                                            </label>
                                            <span class="text-secondary float-end" style="font-size: 10pt;"
                                                id="charCount">0</span>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="color" class="form-control" name="eventcolor" id="editColor"
                                                required>
                                            <label for="eventcolor" class="form-label">Event Color</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="updateevent" class="btn btn-warning"><i
                                            class="bi bi-calendar-event"></i> Update Event</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- DELETE Modal -->
                    <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                        <i class="bi bi-exclamation-triangle-fill text-danger" width="24"
                                            height="24"></i>
                                        Warning
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="dropevent.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" id="delete_id">
                                        <h5>Are you sure you want to delete this event?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="deletedata" class="btn btn-danger"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <?php
    include 'conn.php';
    $query = "SELECT eventname as title, CONCAT(eventdatestart, ' ', eventtimestart) as start, CONCAT(eventdateend, ' ', eventtimeend) as end, eventcolor as color FROM events";
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
                    start: 'dayGridMonth,timeGridWeek', // will normally be on the left. if RTL, will be on the right
                    center: 'title',
                    end: 'prev,next' // will normally be on the right. if RTL, will be on the left
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
        $(document).ready(function () {
            $('.deletebtn').on('click', function () {
                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.addbtn').on('click', function () {
                var charCount = $('#eventdescription').val().length;
                var charLeft = 150 - charCount;
                $('#charCountModal').text(charLeft + '/150');
            });
            $('.editbtn').on('click', function () {

                $('#editEventModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text().trim();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#editEventName').val(data[1]);
                $('#editDateStart').val(data[2]);
                $('#editDateEnd').val(data[3]);
                $('#editTimeStart').val(data[4]);
                $('#editTimeEnd').val(data[5]);
                $('#editLocation').val(data[6]);
                $('#editDescription').val(data[7]);
                $('#editColor').val(data[8]);

                var charCount = $('#editDescription').val().length;
                var charLeft = 150 - charCount;
                $('#charCount').text(charLeft + '/150');
            });
            $('#eventdescription').on('input', function () {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';

                var charCount = this.value.length;
                var charLeft = 150 - charCount;
                $('#charCountModal').text(charLeft + '/150');
            });
            $('#editDescription').on('input', function () {
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