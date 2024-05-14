<?php
require_once "../includes/dbconn.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Faculty - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png" />
  <link rel="shortcut icon" href="../images/KLD LOGO.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css" />
  <link rel="stylesheet" href="../styles/cs-skin-elastic.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css" />
  <link rel="stylesheet" href="../styles/style2.css" />
  <link rel="shortcut icon" href="../images/KLD LOGO.png" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel"></aside>

  <!-- /#left-panel -->

  <!-- Left Panel -->

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
                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search" />
                <button class="search-close" type="submit">
                  <i class="fa fa-close"></i>
                </button>
              </form>
            </div>

            <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="../assets/img/admin-icn.png" alt="User Avatar" />
              </a>

              <div class="user-menu dropdown-menu">
                <a class="nav-link" href="updateProfile.php"><i class="fa fa-user"></i>My Profile</a>
                <a class="nav-link" href="logout.html"><i class="fa fa-power-off"></i>Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <script src="../assets/js/main.js"></script>
    <!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
        <div class="row m-0">
          <div class="col-sm-4">
            <div class="page-header float-left">
              <div class="page-title">
                <h1>Dashboard</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="#">Faculty</a></li>
                  <li class="active">Add Faculty</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h2 align="center">Archived Faculty</h2>
                </strong>
              </div>
              <div class="card-body">
                <table id="archive-faculty-table" class="table table-hover table-striped table-bordered" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT faculty.facultyID, CONCAT(faculty.facultyFName, ' ', faculty.facultyMName, ' ', faculty.facultyLName) AS fullname, faculty.facultyEmail, facultyType.facultyType FROM faculty INNER JOIN facultytype on facultytype.facultyTypeID = faculty.facultyType WHERE facultyStatus = 3";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                      echo "
                        <tr>
                          <td>" . $row['facultyID'] . "</td>
                          <td>" . $row['fullname'] . "</td>
                          <td>" . $row['facultyEmail'] . "</td>
                          <td>" . $row['facultyType'] . "</td>
                          <td><a href='#' onclick=\"restoreFaculty('" . $row['facultyID'] . "', '" . $row['fullname'] . "')\" title='Unarchive Faculty'><i class='fa fa-undo'></i></a></td>
                        </tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end of datatable -->
        </div>
      </div>
      <!-- .animated -->
    </div>
    <!-- .content -->

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

  <!-- Right Panel -->

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Script for this page -->
  <script src="../scripts/admin/facultyList.js"></script>

  <script type="text/javascript">
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

    $("#archive-faculty-table").DataTable({
      lengthMenu: [10, 25, 50, 100, {
        label: "All",
        value: -1
      }],
      columnDefs: [{
        targets: 4,
        orderable: false
      }]
    });

    function restoreFaculty(facultyID, fullname) {
      swal.fire({
          title: "<h3>Are you sure you want to restore this user?</h3><i><h5>" +
            facultyID +
            " - " +
            fullname +
            "</h5></i>",
          text: "Doing so will restore the user from the system",
          icon: "warning",
          showConfirmButton: true,
          showCancelButton: true,
          confirmButtonText: "Restore User",
        })

        .then((result) => {
          if (result.isConfirmed) {
            swal.fire({
              // Loading
              title: "Restoring User...",
              html: "Please wait...",
              allowOutsideClick: false,
              allowEscapeKey: false,
              didOpen: () => {
                swal.showLoading();
              },
            });
            fetch("../../src/model/restoreFaculty.php", {
                method: "POST",
                body: new URLSearchParams({
                  facultyID: facultyID
                }),
                headers: {
                  "Content-Type": "application/x-www-form-urlencoded",
                },
              })
              .then((response) => {
                if (response.ok) {
                  response.text().then((text) => {
                    // Display the echoed text from PHP
                    swal
                      .fire({
                        title: text,
                        icon: "success",
                        showConfirmButton: true,
                      })
                      .then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = "archiveFaculty.php";
                        }
                      });
                  });
                } else {
                  console.error("Error restoring faculty");
                }
              })
              .catch((error) => console.error(error));
          }
        });
    }
  </script>
</body>

</html>