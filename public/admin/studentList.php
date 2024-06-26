<?php
require_once "../includes/dbconn.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Students - Admin</title>
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
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css" />
  <link rel="stylesheet" href="../styles/style2.css" />
  <link rel="shortcut icon" href="../images/KLD LOGO.png" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Modal for bulk adding faculty -->
  <div class="modal fade" id="bulk-add-student-modal" tabindex="-1" role="dialog" aria-labelledby="bulk-add-student-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bulk-add-student-modal-label">Bulk Upload Student with Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="file" id="input-bulk-std" onchange="getExcelFile(event)" accept=".xlsx" class="d-block">

          <div class="card shadow-lg">
            <div class="card-header">
              <h2 align="center" class="h5" id="bulk-tbl-title">New Students</h2>
            </div>
            <div class="card-body" style="overflow: auto">
              <table id="bulk-std-table" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Year Level</th>
                    <th>Section</th>
                  </tr>
                </thead>
                <tbody id="bulk-std-tbody">

                </tbody>
                <script src="../scripts/reqAssignment.js"></script>
              </table>
            </div>
          </div>

          <button type="button" id="bulk-upload" onclick="uploadStdExcel()" class="btn btn-success" disabled>Upload</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel"></aside>
  <!-- /#left-panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
    </header>

    <script src="../assets/js/main.js"></script>

    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h2 align="center">Add New Student</h2>
                </strong>
              </div>
              <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                  <div class="card-body">
                    <div class="" role="alert"></div>
                    <form method="POST" action="#" id="add-student">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="std-id" class="control-label mb-1">Student ID</label>
                            <input id="std-id" name="stdID" type="text" class="form-control cc-exp" value=<?php
                              $currentYear = date('y'); // Get current year
                              $query = "SELECT COUNT(*) AS count FROM student WHERE studentID LIKE 'KLD-$currentYear-%'"; // Count rows with IDs in current year
                              $result = mysqli_query($conn, $query);
                              $row = mysqli_fetch_assoc($result);
                              $count = $row['count'];
                              $paddedCount = str_pad($count + 1, 6, '0', STR_PAD_LEFT);
                              $value = "KLD-$currentYear-$paddedCount";
                              echo $value;
                            ?> required disabled/>
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="fname" class="control-label mb-1">First name <span class="red">*</span></label>
                          <input id="fname" name="fname" type="text" class="form-control cc-cvc" value="" required placeholder="First name" />
                        </div>
                      </div>
                      <div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="mname" class="control-label mb-1">Middle name</label>
                              <input id="mname" name="mname" type="text" class="form-control cc-exp" value="" placeholder="Middle name" />
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="lname" class="control-label mb-1">Last name <span class="red">*</span></label>
                              <input id="lname" name="lname" type="text" class="form-control cc-exp" value="" required placeholder="Last name" />
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="email" class="control-label mb-1">Email <span class="red">*</span></label>
                              <input id="email" name="email" type="email" class="form-control cc-exp" value="" required placeholder="Email" />
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="sect" class="control-label mb-1">Section <span class="red">*</span></label>
                              <select required id="sect" name="sect" class="custom-select form-control">
                                <option value="" disabled selected>--Select Section--</option>
                              </select>
<!-- 
                              <input list="section" id="sect" name="sect" type="text" class="form-control" required placeholder="Section" />
                              <datalist id="section">
                              </datalist> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <input id="pass" name="pass" type="text" class="form-control cc-exp" value=<?php
                        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $passArray = array();
                        $charLen = strlen($characters) - 1;

                        for ($i = 0; $i < 8; $i++) {
                          $char = $characters[rand(0, $charLen)];
                          $passArray[] = $char;
                        }

                        $password = implode($passArray);
                        $tempPass = "12345";

                        echo "$tempPass";
                        ?> disabled hidden/>
                      <p>
                        <small><i>Note: Student's password is automatically generated</i></small>
                      </p>

                      <div class="row">
                          <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-success" onclick="addStudent()">
                              Add New Student
                            </button>
                          </div>
                          <div class="col-6">
                            <button class="btn btn-primary" onclick="event.preventDefault()" data-toggle="modal" data-target="#bulk-add-student-modal">Bulk Add Excel</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- .card -->
          </div>
          <!--/.col-->

          <br /><br />
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h2 align="center">All Student</h2>
                </strong>
              </div>
              <div class="card-body">
                <table id="student-table" class="table table-hover table-striped table-bordered" width="100%">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Section</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="std-list-tbody">

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

  <!-- Script for sanitation of data -->
  <script src="../scripts/sanitation.js"></script>
  <!-- Script for this page -->
  <script src="../scripts/admin/studentList.js"></script>

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
  </script>
</body>

</html>