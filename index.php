<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <link rel="icon" href="kanlurangbukal.png" type="image/x-icon" />
  <title>Home | EBIPMS</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- FullCalendar scripts -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.8/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js'></script>
</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
      /* Carousel styling */
      #introCarousel,
      .carousel-inner,
      .carousel-item,
      .carousel-item.active {
        height: 100vh;
      }

      .carousel-item:nth-child(1) {
        background-image: url("https://live.staticflickr.com/2235/2046800661_c0c9a9608a_b.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      .carousel-item:nth-child(2) {
        background-image: url("https://upload.wikimedia.org/wikipedia/commons/b/bc/Kanlurang_Bukal%2C_Liliw%2C_Laguna.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #introCarousel {
          margin-top: -58.59px;
        }
      }

      .text-justify {
        text-align: justify;
      }

      .navbar .nav-link {
        color: #fff !important;
      }

      .dropdown-menu {
        display: ;
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
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="index">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="#announce">Announcement</a>
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown"
                aria-expanded="false">
                Login
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                <li><a class="dropdown-item" href="adminlogin"><i class="fa fa-user"></i> Login as Admin</a></li>
                <li><a class="dropdown-item" href="lgulogin"><i class="fa fa-user"></i> Login as LGU</a></li>
                <li><a class="dropdown-item" href="bhwlogin"><i class="fa fa-user"></i> Login as BHW</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Carousel wrapper -->
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
      </ol>

      <!-- Inner -->
      <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-2 display-1">E-BIPMS KANLURANG BUKAL</h1>
                <h5 class="mb-4">
                  Electronic Barangay Integrated Profiling and Monitoring
                  System
                </h5>
                <a class="btn btn-outline-light btn-lg m-2" href="userlogin.php">Login</a>
                <a class="btn btn-outline-light btn-lg m-2" href="userregister.php">Register</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask"
            style="background: linear-gradient(45deg, rgba(29, 236, 197, 0.7),rgba(91, 14, 214, 0.7) 100%);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1>GET TO KNOW MORE ABOUT OUR BARANGAY</h2>
                  <a class="btn btn-outline-light btn-lg m-2" href="about.php" role="button">About</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Inner -->

      <!-- Controls -->
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Carousel wrapper -->
  </header>
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center mb-5">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple pt-5 pb-2" data-mdb-ripple-color="light">
                <i class="fa-sharp fa-solid fa-rocket fa-5x" style="color: #e4a11b;"></i>
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
              <div class="card-body">
                <h3 class="card-title">MISSION</h3>
                <p class="card-text">
                  "Empower Brgy. Kanlurang Bukal with EBIPMS: Seamless integration, efficient profiling, real-time
                  monitoring, fostering community engagement, and ensuring data security for sustainable development."
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple pt-5 pb-2" data-mdb-ripple-color="light">
                <i class="fa-sharp fa-regular fa-eye fa-5x" style="color: #e4a11b;"></i>
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
              <div class="card-body">
                <h3 class="card-title">VISION</h3>
                <p class="card-text">
                  "EBIPMS envisions a digitally connected Brgy. Kanlurang Bukal, fostering transparency, citizen
                  well-being, and sustainable development through advanced profiling and monitoring systems."
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple pt-5 pb-2" data-mdb-ripple-color="light">
                <i class="fa-sharp fa-regular fa-gem fa-5x" style="color: #e4a11b;"></i>
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
              <div class="card-body">
                <h3 class="card-title">GOALS</h3>
                <p class="card-text">
                  "Achieve seamless integration, enhance governance, promote community engagement, ensure data security,
                  and propel sustainable development for Brgy. Kanlurang Bukal."
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <hr class="my-5" />
      <h1 class="mb-5 text-warning text-center" id="announce"><strong>BARANGAY UPDATES</strong></h1>
      <section class="text-center">
        <div class="row justify-content-center mb-4">
          <?php
          include 'conn.php';
          $query = "SELECT * FROM jobs WHERE isFeatured = 1";
          $query_run = mysqli_query($conn, $query);
          if (mysqli_num_rows($query_run) > 0) {
            while ($items = mysqli_fetch_array($query_run)) {
              echo '<div class="col-lg-4 col-md-6 mb-4">'; // Responsive grid column
              echo '<a href="#" style="text-decoration: none; color: inherit;">'; // Start of <a> tag
              echo '<div class="card text-dark">';
              echo '<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">';
              echo '<img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />';
              echo '<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>';
              echo '</div>';
              echo '<div class="card-body">';
              echo '<h4 class="card-title mb-4" style="text-transform: uppercase;">' . $items['jobtitle'] . '</h4>';
              echo '<a href="#!" class="btn btn-warning">Read More</a>';
              echo '</div>';
              echo '</div>';
              echo '</a>'; // End of <a> tag
              echo '</div>';
            }
          }
          ?>
        </div>
        <a href="#!" class="btn btn-warning">See More Updates</a>
      </section>
      <!--Section: Content-->
      <hr class="my-5" />
      <h1 class="mb-5 text-warning text-center" id="announce"><strong>BARANGAY ANNOUNCEMENTS</strong></h1>
      <div class="mb-5" id='calendar'></div>
      <hr class="my-5" />
      <!--Section: Content-->
      <section class="mb-5">
        <h1 class="mb-5 text-center text-warning"><strong>MAP OF KANLURANG BUKAL</strong></h1>

        <div class="row d-flex justify-content-center">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13078.742123652546!2d121.42939898272549!3d14.12363560630453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd50a9a2e7edb9%3A0x320f60fa0f0f6293!2sKanlurang%20Bukal%2C%20Liliw%2C%20Laguna!5e1!3m2!1sen!2sph!4v1687621070135!5m2!1sen!2sph"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
              A system that aims to provide a convenient way for the barangay officials to monitor the residents of the
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
            <p class="text-break"><i class="fas fa-home me-3"></i> Brgy. Kanlurang Bukal<br>Liliw, Laguna</p>
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
          start: 'dayGridMonth', // will normally be on the left. if RTL, will be on the right
          center: 'title',
          end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
        },
      });
      calendar.setOption('height', 600);
      calendar.setOption('aspectRatio', 1.8);
      calendar.render();
    });
  </script>
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