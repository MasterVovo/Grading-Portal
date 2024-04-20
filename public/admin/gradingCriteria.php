<?php
session_start();
require_once '../includes/dbconn.php';
if (isset($_POST['submit'])) {
  $gradeMin = $_POST['gradeMin'];
  $gradeEquivs = $_SESSION['gradeEquivs'];
  for($x = 0; $x < count($gradeMin); $x++) {
    $value = $gradeMin[$x];
    $key = $gradeEquivs[$x];
    $sqlUpdate = "UPDATE gradecriteria SET gradeMin='$value' WHERE gradeEquivalent='$key'";
    $conn->query($sqlUpdate);
  }
  echo "<script>alert(Data Updated Successfully);</script>";
}

?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Grading Criteria - Student</title>
  <meta name="description" content="Ela Admin - HTML5 Admin Template" />
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
  <link rel="stylesheet" href="../styles/lib/datatable/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="../styles/style2.css" />
  <link rel="shortcut icon" href="../images/KLD LOGO.png" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel"></aside>
  <!-- /#left panel -->

  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="./">Student Grading System</a>
          <a class="navbar-brand hidden" href="./">Student Grading System</a>
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
                <img class="user-avatar rounded-circle" src="../assets/img/user2.png" alt="User Avatar" />
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
    <!-- /Header-->

    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card"></div>
            <!-- .card -->
          </div>
          <!--/.col-->

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h3 align="center">GRADING CRITERIA</h3>
                </strong>
              </div>
              <div class="card-body">
                <!-------------------------- FROM THE FINAL RESULT TABLE --------------------------->
                <form method="POST" action="">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Grade</th>
                      <th>Grade Point Equivalent</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $grades = array();
                    $gradeEquivs = array();
                    $sql = "SELECT * FROM gradecriteria";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                        $grades[] = $row['gradeMin'];
                        $gradeEquivs[] = $row['gradeEquivalent'];
                        echo "<tr><td><input type='text' maxlength='5' size='5' name='gradeMin[]' value='" . $row['gradeMin'] . "'></td><td>" . $row['gradeEquivalent'] . "</td></tr>";
                      }
                    } else {
                      echo "0 results";
                    }
                    $conn->close(); //Close the database connection
                    // Now you can use the arrays $grades and $gradeEquivs in your form processing script
                    $_SESSION['gradeEquivs'] = $gradeEquivs;
                    ?>
                </table>
                <a href="printGradingCriteria.php" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>
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
    <!-- /Footer -->
  </div>
  <!-- /#right-panel -->

  <!-- Right Panel -->

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="../assets/js/main.js"></script>

  <script src="../assets/js/lib/data-table/datatables.min.js"></script>
  <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
  <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
  <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
  <script src="../assets/js/lib/data-table/jszip.min.js"></script>
  <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
  <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
  <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
  <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
  <script src="../assets/js/init/datatables-init.js"></script>

  <!-- Script for adding separate html -->
  <script>
    fetch("includes/leftnav.html")
      .then((response) => response.text())
      .then((data) => {
        document.querySelector("#left-panel").innerHTML = data;
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#bootstrap-data-table-export").DataTable();
    });

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
  </script>
</body>

</html>