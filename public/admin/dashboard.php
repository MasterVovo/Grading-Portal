<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Dashboard - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png" />
  <link rel="shortcut icon" href="../assets/img/student-grade.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css" />
  <link rel="stylesheet" href="../styles/cs-skin-elastic.css" />
  <link rel="stylesheet" href="../styles/style2.css" />
  <link rel="shortcut icon" href="../images/KLD LOGO.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

  <style>
    #weatherWidget .currentDesc {
      color: #ffffff !important;
    }

    .traffic-chart {
      min-height: 335px;
    }

    #flotPie1 {
      height: 150px;
    }

    #flotPie1 td {
      padding: 3px;
    }

    #flotPie1 table {
      top: 20px !important;
      right: -10px !important;
    }

    .chart-container {
      display: table;
      min-width: 270px;
      text-align: left;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    #flotLine5 {
      height: 105px;
    }

    #flotBarChart {
      height: 150px;
    }

    #cellPaiChart {
      height: 160px;
    }

    .h-300 {
      height: 300px;
    }

    .h-500 {
      height: 500px;
    }
  </style>
</head>

<body onload="loadContent()">
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel"></aside>
  <!-- /#left-panel -->
  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
    </header>

    <script src="../assets/js/main.js"></script>

    <!-- /#header -->
    <!-- Content -->
    <div class="content">
      <!-- Animated -->
      <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 align="center"><b>Admin Panel</b></h3>
              </div>
            </div>
          </div>
          <!-- /# column -->


          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-flat-color-2">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1"></span>
                    <span class="count" id="active-users"></span>
                  </h3>
                  <p class="text-light mt-1 m-0">Active Users</p>
                </div>
                <!-- /.card-left -->

                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-keypad"></i>
                </div>
                <!-- /.card-right -->
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-flat-color-3">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1"></span>
                    <span class="count" id="total-users"></span>
                  </h3>
                  <p class="text-light mt-1 m-0">Total Users</p>
                </div>
                <!-- /.card-left -->

                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-network"></i>
                </div>
                <!-- /.card-right -->
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-flat-color-5">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1"></span>
                    <span class="count" id="total-std"></span>
                  </h3>
                  <p class="text-light mt-1 m-0">Total Student</p>
                </div>
                <!-- /.card-left -->

                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-users"></i>
                </div>
                <!-- /.card-right -->
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-flat-color-1">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1"></span>
                    <span class="count" id="total-fct"></span>
                  </h3>
                  <p class="text-light mt-1 m-0">Total Faculty</p>
                </div>
                <!-- /.card-left -->

                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-notebook"></i>
                </div>
                <!-- /.card-right -->
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-secondary">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1"></span>
                    <span class="count" id="total-fails"></span>
                  </h3>
                  <p class="text-light mt-1 m-0">Total Failures</p>
                </div>
                <!-- /.card-left -->

                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-news-paper"></i>
                </div>
                <!-- /.card-right -->
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-danger">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1"></span>
                    <span class="count" id="pass-rate">98%</span>
                  </h3>
                  <p class="text-light mt-1 m-0">Passing Rate</p>
                </div>
                <!-- /.card-left -->

                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-culture"></i>
                </div>
                <!-- /.card-right -->
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-6">
            <div class="card text-white bg-white h-300">
              <div class="card-body">
                <canvas id="avg-grades-chart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-6">
            <div class="card text-white bg-white h-300">
              <div class="card-body">
                <canvas id="no-students-chart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-12">
            <div class="card text-white bg-white h-500">
              <div class="card-body">
                <canvas id="performance-chart"></canvas>
              </div>
            </div>
          </div>

        </div>
        <!-- /Widgets -->
        <!--  Traffic  -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 align="center">
                  <marquee direction="left">School Year: 2023 - 2024</marquee>
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    <footer class="site-footer">
      <div class="footer-inner bg-white">
        <div class="row">
          <div class="col-sm-6">&copy; 2024 Student Grading System</div>
          <div class="col-sm-6 text-right"></div>
        </div>
      </div>
    </footer>
    <!-- /.site-footer -->
  </div>
  <!-- /#right-panel -->

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="../assets/js/main.js"></script>

  <!--  Chart js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!--Chartist Chart-->
  <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
  <script src="../assets/js/init/weather-init.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
  <script src="../assets/js/init/fullcalendar-init.js"></script>

  <!-- Script for adding separate html -->
  <script>
    fetch("includes/leftnav.html")
      .then((response) => response.text())
      .then((data) => {
        document.querySelector("#left-panel").innerHTML = data;
      });

    fetch("includes/header.html")
      .then((response) => response.text())
      .then((data) => {
        document.querySelector("#header").innerHTML = data;
      });

      setTimeout(function() {
        fetch("../../src/model/fetchUserName.php")
          .then(response => response.json())
          .then(data => {
              if (data.facultyName) {
                  document.getElementById('userName').textContent = data.facultyName;
              } else {
                  console.error(data.error);
                  document.getElementById('userName').textContent = "User not found";
              }
          })
          .catch(error => console.error('Error:', error));
        }, 1000);
  </script>

  <!-- Script for this page -->
  <script src='../scripts/admin/dashboard.js'></script>

  <!--Local Stuff-->
  <script defer>
    // Menu Trigger
    $("#menuToggle").on("click", function(event) {
      var windowWidth = $(window).width();
      if (windowWidth < 1010) {
        $("body").removeClass("open");
        if (windowWidth < 760) {
          $("#left-panel").slideToggle();
        } else {
          $("#left-panel").toggleClass("open-menu");
        }
      } else {
        $("body").toggleClass("open");
        $("#left-panel").removeClass("open-menu");
      }
    });

    $(".menu-item-has-children.dropdown").each(function() {
      $(this).on("click", function() {
        var $temp_text = $(this).children(".dropdown-toggle").html();
        $(this)
          .children(".sub-menu")
          .prepend('<li class="subtitle">' + $temp_text + "</li>");
      });
    });
  </script>
</body>

</html>