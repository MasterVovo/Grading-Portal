<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png" />
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css"
    />
    <link rel="stylesheet" href="../styles/cs-skin-elastic.css" />
    <link rel="stylesheet" href="../styles/style2.css" />
    <link
      rel="shortcut icon"
      href="../images/KLD LOGO.png"
      type="image/x-icon"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css"
      rel="stylesheet"
    />

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

  <body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel"></aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
        <div class="top-left">
          <div class="navbar-header">
            <a class="navbar-brand" href="./">Student Grading System</a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
        <div class="top-right">
          <div class="header-menu">
            <div class="header-left">
              <div class="form-inline">
                <form class="search-form">
                  <input
                    class="form-control mr-sm-2"
                    type="text"
                    placeholder="Search ..."
                    aria-label="Search"
                  />
                  <button class="search-close" type="submit">
                    <i class="fa fa-close"></i>
                  </button>
                </form>
              </div>

              <div class="user-area dropdown float-right">
                <a
                  href="#"
                  class="dropdown-toggle active"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <img
                    class="user-avatar rounded-circle"
                    src="../assets/img/admin-icn.png"
                    alt="User Avatar"
                  />
                </a>

                <div class="user-menu dropdown-menu">
                  <a class="nav-link" href="updateProfile.php"
                    ><i class="fa fa-user"></i>My Profile</a
                  >
                  <a class="nav-link" href="logout.html"
                    ><i class="fa fa-power-off"></i>Logout</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
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
                      <span class="count" id="active-users">0</span>
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
                      <span class="count" id="total-users">0</span>
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
                      <span class="count" id="total-std">0</span>
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
                      <span class="count" id="total-fct">0</span>
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
                      <span class="count" id="total-fails">0</span>
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
    </script>

    <!--Local Stuff-->
    <script defer>
      const data = [
        { year: '1st', count: 1.50 },
        { year: '2nd', count: 2.00 },
        { year: '3rd', count: 1.75 },
        { year: '4th', count: 5.00 },
      ];
    
      new Chart(document.querySelector('#avg-grades-chart'), {
        type: 'bar',
        options: {
          scales: {
            y: {
              min: 1,
              max: 5
            }
          },
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              enabled: false
            },
            title: {
              display: true,
              text: 'Average Grades of Students Per Year Level'
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
        data: {
          labels: data.map(row => row.year),
          datasets: [
            {
              data: data.map(row => row.count),
              backgroundColor: [
                'hsla(207, 95%, 63%, 0.5)',
                'hsla(146, 87%, 44%, 0.5)',
                'hsla(37, 94%, 64%, 0.5)',
                'hsla(6, 92%, 62%, 0.5)'
              ]
            }
          ]
        }
      });

      new Chart(document.querySelector('#no-students-chart'), {
        type: 'bar',
        options: {
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              enabled: false
            },
            title: {
              display: true,
              text: 'Number of Students Per Year Level'
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
        data: {
          labels: ['1st', '2nd', '3rd', '4th'],
          datasets: [
            {
              data: [563, 231, 156, 101],
              backgroundColor: [
                'hsla(207, 95%, 63%, 0.5)',
                'hsla(146, 87%, 44%, 0.5)',
                'hsla(37, 94%, 64%, 0.5)',
                'hsla(6, 92%, 62%, 0.5)'
              ]
            }
          ]
        }
      });

      new Chart(document.querySelector('#performance-chart'), {
        type: 'line',
        options: {
          plugins: {
            legend: {
              display: true
            },
            tooltip: {
              enabled: true
            },
            title: {
              display: true,
              text: 'Performance of Student Throughout Grading Period'
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
        data: {
          labels: ['1Y1S', '1Y2S', '2Y1S', '2Y2S', '3Y1S', '3Y2S', '4Y1S', '4Y2S', ],
          datasets: [
            {
              label: '1st',
              data: [92, 95],
              fill: true,
              backgroundColor: 'hsla(207, 95%, 63%, 0.2)',
              borderColor: 'hsla(207, 95%, 63%)',
              tension: 0.2
            },
            {
              label: '2nd',
              data: [88, 87, 85, 90],
              fill: true,
              backgroundColor: 'hsla(146, 87%, 44%, 0.2)',
              borderColor: 'hsla(146, 87%, 44%)',
              tension: 0.2
            },
            {
            label: '3rd',
              data: [95, 96, 88, 85, 92, 92],
              fill: true,
              backgroundColor: 'hsla(37, 94%, 64%, 0.2)',
              borderColor: 'hsla(37, 94%, 64%)',
              tension: 0.2
            },
            {
              label: '4th',
              data: [88, 85, 90, 89, 94, 93, 96, 98],
              fill: true,
              backgroundColor: 'hsla(6, 92%, 62%, 0.2)',
              borderColor: 'hsla(6, 92%, 62%)',
              tension: 0.2
            }
        ]
        }
      });

      // Display active users
      fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
          const formData = new FormData();
          formData.append('method', 'getActiveUsers');
          return formData;
        })()
      })
      .then(response => response.json())
      .then(data => {
        document.querySelector('#active-users').innerHTML = data[0]['activeUsers'];
      })
      .catch(error => console.error(error));

      // Display total students
      fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
          const formData = new FormData();
          formData.append('method', 'getTotalStudent');
          return formData;
        })()
      })
      .then(response => response.json())
      .then(data => {
        document.querySelector('#total-std').innerHTML = data[0]['totalStd'];
      })
      .catch(error => console.error(error));

      // Display total faculty
      fetch('../../src/controller/getChartData.php', {
        method: 'POST',
        body: (() => {
          const formData = new FormData();
          formData.append('method', 'getTotalFaculty');
          return formData;
        })()
      })
      .then(response => response.json())
      .then(data => {
        document.querySelector('#total-fct').innerHTML = data[0]['totalFct'];
      })
      .catch(error => console.error(error));

      // Display total users
      document.querySelector('#total-users').innerHTML = document.querySelector('#total-std').value + document.querySelector('#total-fct').value;

      // Menu Trigger
      $("#menuToggle").on("click", function (event) {
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

      $(".menu-item-has-children.dropdown").each(function () {
        $(this).on("click", function () {
          var $temp_text = $(this).children(".dropdown-toggle").html();
          $(this)
            .children(".sub-menu")
            .prepend('<li class="subtitle">' + $temp_text + "</li>");
        });
      });
    </script>
  </body>
</html>
