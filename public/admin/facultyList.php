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
  <!-- Modal for editing faculty -->
  <div class="modal fade" id="editFacultyModal" tabindex="-1" role="dialog" aria-labelledby="editFacultyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editFacultyModalLabel">Edit Faculty Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="Post" action="#" id="edit-faculty">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="edit-fct-id" class="control-label mb-1">Faculty ID <span class="red">*</span></label>
                  <input id="edit-fct-id" name="fct-id" type="text" class="form-control cc-exp" value="" required disabled placeholder="Faculty ID" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="edit-fname" class="control-label mb-1">First name <span class="red">*</span></label>
                  <input id="edit-fname" name="fname" type="text" class="form-control cc-exp" value="" required disabled placeholder="First name" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="edit-mname" class="control-label mb-1">Middle name</label>
                  <input id="edit-mname" name="mname" type="text" class="form-control cc-exp" value="" disabled placeholder="Middle name" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="edit-lname" class="control-label mb-1">Last name <span class="red">*</span></label>
                  <input id="edit-lname" name="lname" type="text" class="form-control cc-exp" value="" required disabled placeholder="Last name" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="edit-email" class="control-label mb-1">Email <span class="red">*</span></label>
                  <input id="edit-email" name="email" type="email" class="form-control cc-exp" value="" required disabled placeholder="Email" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="edit-pass" class="control-label mb-1">Password <span class="red">*</span></label>
                  <input id="edit-pass" name="pass" type="password" class="form-control cc-exp" value="" required disabled placeholder="Password" />
                </div>
              </div>
            </div>
          </form>

          <form action="" id="set-assign">
            <h2 class="h5 mt-2">Assign New Section and Course</h2>

            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="sect" class="control-label mb-1">Section</label>
                  <select required id="sect" name="sect" class="custom-select form-control">
                    <option value="" disabled selected>--Select Section--</option>
                  </select>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label for="crs" class="control-label mb-1">Course</label>
                  <select required id="crs" name="crs" class="custom-select form-control">
                    <option value="" disabled selected>--Select Course--</option>
                  </select>
                </div>
              </div>
            </div>

            <button type="submit" name="submit" class="btn btn-success" onclick="setAssignment()">Assign</button>
          </form>

          <div class="card shadow-lg">
            <div class="card-header">
              <h2 align="center" class="h5">Section & Subject Assignment</h2>
            </div>
            <div class="card-body">
              <table id="assignment-table" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Section</th>
                    <th>Course</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="ass-table">

                </tbody>
                <script src="../scripts/reqAssignment.js"></script>
              </table>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for bulk adding faculty -->
  <div class="modal fade" id="bulkAddFacultyModal" tabindex="-1" role="dialog" aria-labelledby="bulkAddFacultyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bulkAddFacultyModalLabel">Upload Faculty Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="file" id="input-bulk-fct" onchange="getExcelFile(event)" accept=".xlsx" class="d-block">

          <div class="card shadow-lg">
            <div class="card-header">
              <h2 align="center" class="h5">New Faculty List</h2>
            </div>
            <div class="card-body">
              <table id="bulk-fct-table" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Teacher ID</th>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody id="bulk-fct-tbody">

                </tbody>
                <script src="../scripts/reqAssignment.js"></script>
              </table>
            </div>
          </div>

          <button type="button" id="bulk-upload" onclick="uploadFctExcel()" class="btn btn-success" disabled>Upload</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
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
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="./">KLD Grading Portal</a>
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

    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h2 align="center">Add New Faculty</h2>
                </strong>
              </div>
              <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                  <div class="card-body">
                    <div class="" role="alert"></div>
                    <form method="Post" action="#" id="add-faculty">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="fct-id" class="control-label mb-1">Faculty ID</label>
                            <input id="fct-id" name="fct-id" type="text" class="form-control cc-exp" value=<?php
                              $currentYear = date('y'); // Get current year
                              $query = "SELECT COUNT(*) AS count FROM faculty WHERE facultyID LIKE 'KLD-$currentYear-%'"; // Count rows with IDs in current year
                              $result = mysqli_query($conn, $query);
                              $row = mysqli_fetch_assoc($result);
                              $count = $row['count'];
                              $paddedCount = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
                              $value = "KLD-$currentYear-$paddedCount";
                              echo $value;
                              ?> required disabled />
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="fname" class="control-label mb-1">First name <span class="red">*</span></label>
                            <input id="fname" name="fname" type="text" class="form-control cc-exp" value="" required placeholder="First name" />
                          </div>
                        </div>
                      </div>
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
                            <label for="fct-type" class="control-label mb-1">Faculty Type <span class="red">*</span></label>
                            <select required id="fct-type" name="fct-type" class="custom-select form-control">
                              <option selected disabled>
                                --Select Faculty Type--
                              </option>
                              <option value="1">Teacher</option>
                              <option value="2">Program Chair</option>
                              <option value="3">Dean</option>
                              <option value="4">Registrar</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <input id="pass" name="pass" type="text" value=<?php
                        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $passArray = array();
                        $charLen = strlen($characters) - 1;

                        for ($i = 0; $i < 8; $i++) {
                          $char = $characters[rand(0, $charLen)];
                          $passArray[] = $char;
                        }

                        $password = implode($passArray);

                        echo "$password";
                        ?> disabled hidden />
                      <p>
                        <small><i>Note: Faculty's password is automatically
                            generated</i></small>
                      </p>

                      <div class="row">
                        <div class="col-6">
                          <button type="submit" name="submit" class="btn btn-success" onclick="addFaculty()">Add Faculty</button>
                        </div>
                        <div class="col-6">
                        <button class="btn btn-primary" onclick="event.preventDefault()" data-toggle="modal" data-target="#bulkAddFacultyModal">Bulk Add Excel</button>&nbsp<a href="#" onclick="showHelp()"><i class="fa fa-question-circle-o font-weight-bold ml-2 fs-1" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- .card -->
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h2 align="center">All Faculty</h2>
                </strong>
              </div>
              <div class="card-body">
                <table id="faculty-table" class="table table-hover table-striped table-bordered" width="100%">
                  <thead>
                    <tr>
                      <th>Faculty ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="fct-list-tbl">
                    <script src="../scripts/reqFctList.js"></script>
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

  <!-- <script src="../assets/js/lib/data-table/datatables.min.js"></script>
  <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
  <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
  <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
  <script src="../assets/js/lib/data-table/jszip.min.js"></script>
  <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
  <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
  <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
  <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
  <script src="../assets/js/init/datatables-init.js"></script> -->
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
  </script>

  <script>
    $("#importExcel").on("click", function(e) {
      e.preventDefault();
      swal
        .fire({
          title: "Upload Excel File",
          input: "file",
          inputAttributes: {
            required: "required",
            accept: ".xls, .xlsx",
            "aria-label": "Upload your excel file",
          },
          showConfirmButton: true,
          confirmButtonText: "Upload",
          showCancelButton: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            // swal.fire({ // Loading
            //   title: "Uploading file...",
            //   html: 'Please wait...',
            //   allowOutsideClick: false,
            //   allowEscapeKey: false,
            //   didOpen: () => {
            //     swal.showLoading();
            //   },
            // });
          }
        });
    });
  </script>
</body>

</html>