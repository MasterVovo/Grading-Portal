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
                                                                                                            ?> required placeholder="Faculty ID" disabled />
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
                        <small><i>Note: Faculty's password is automatically generated</i></small>
                      </p>
                      <button type="button" class="btn btn-primary" id="importExcel">Bulk Add Excel</button>&nbsp<a href="#" onclick="showHelp()"><i class="fa fa-question-circle-o font-weight-bold" aria-hidden="true"></i></a>
                      <button type="submit" name="submit" class="btn btn-success">Add Faculty</button>
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


            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editFacultyModal">
                Launch demo modal
              </button> -->

            <!-- Modal -->
            <div class="modal fade" id="editFacultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Faculty Data</h5>
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





            <div class="card">
              <div class="card-header">
                <strong class="card-title">
                  <h2 align="center">All Faculty</h2>
                </strong>
              </div>
              <div class="card-body">
                <table id="faculty-table" class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Actions</th>
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

  <!-- Script for adding separate html -->
  <script>
    fetch("includes/leftnav.html")
      .then((response) => response.text())
      .then((data) => {
        document.querySelector("#left-panel").innerHTML = data;
      });
  </script>

  <!-- Script for adding faculty -->
  <script src="../scripts/addFaculty.js"></script>
  <!-- Script for sanitizing inputs -->
  <script src="../scripts/sanitation.js"></script>

  <!-- <script src="../scripts/viewFaculty.js"></script> -->

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

    // Populating the edit fields
    let assignmentDataTable = $("#assignment-table").DataTable();

    function populateEditFields() {
      event.preventDefault();
      const facultyID = event.currentTarget.getAttribute('data-id');

      const formData = new FormData();
      formData.append('method', 'getFct');
      formData.append('facultyID', facultyID);

      fetch('../../src/controller/getFctList.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          console.log(data[0]);
          document.querySelector('#edit-fct-id').value = data[0].facultyID;
          document.querySelector('#edit-fname').value = data[0].facultyFName;
          document.querySelector('#edit-mname').value = data[0].facultyMName;
          document.querySelector('#edit-lname').value = data[0].facultyLName;
          document.querySelector('#edit-email').value = data[0].facultyEmail;
          document.querySelector('#edit-pass').value = data[0].facultyPass;
        })
        .catch(error => console.error(error));


      fetch('../../src/controller/getAssignment.php', {
          method: 'POST',
          body: (() => {
            const formData = new FormData();
            formData.append('method', 'getAssignmentByFct');
            formData.append('facultyID', facultyID);
            return formData;
          })()
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
          assignmentDataTable.destroy();
          document.querySelector('#ass-table').innerHTML = '';
          data.forEach((item) => {
            document.querySelector('#ass-table').innerHTML += `
              <tr>
                <th>${item.sectionID}</th>
                <td>${item.courseID}</td>
                <td>
                    <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo']; ?>" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a>
                </td>
              </tr>
            `;
          });
          assignmentDataTable = $("#assignment-table").DataTable();
        })
        .catch(error => console.error(error));
    }

    // Filling in section selection
    const getAllSctId = new FormData();
    getAllSctId.append('method', 'getAllSctId')
    fetch('../../src/controller/getSctList.php', {
        method: 'POST',
        body: getAllSctId
      })
      .then(response => response.json())
      .then(data => {
        data.forEach(item => {
          document.querySelector('#sect').innerHTML += `<option value="${item.sectionID}">${item.sectionID}</option>`;
        })
      })
      .catch(error => console.error(error));

    // Filling in course selection
    const getAllCrsId = new FormData();
    getAllCrsId.append('method', 'getAllCrsId')
    fetch('../../src/controller/getCrsList.php', {
        method: 'POST',
        body: getAllCrsId
      })
      .then(response => response.json())
      .then(data => {
        data.forEach(item => {
          document.querySelector('#crs').innerHTML += `<option value="${item.courseCode}">${item.courseCode}</option>`;
        })
      })
      .catch(error => console.error(error));

    // Setting assignment of section and course
    function setAssignment() {
      event.preventDefault();

      const id = document.querySelector('#edit-fct-id').value;
      const sect = document.querySelector('#sect').value;
      const crs = document.querySelector('#crs').value;

      if (!(isValueEmpty([id, sect, crs]))) {
        const formData = new FormData();
        formData.append('id', id);
        formData.append('sect', sect);
        formData.append('crs', crs);

        fetch('../../src/controller/setAssignment.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.text())
          .then(data => alert(data))
          .catch(error => console.error(error));
      } else {
        alert("There's an empty field");
      }
    }
  </script>

  <script>
    function showHelp() {
      swal.fire({
        html: "<h5>Sample excel file</h5><br>" +
          "<img src='../images/sample excel.png'>" + "",

      });
    }
  </script>

  <script>
    $("#importExcel").on("click", function(e) {
      e.preventDefault();
      swal.fire({
        title: "Upload Excel File",
        input: "file",
        inputAttributes: {
          required: "required",
          accept: ".xls, .xlsx",
          "aria-label": "Upload your excel file"
        },
        showConfirmButton: true,
        confirmButtonText: "Upload",
        showCancelButton: true
      }).then((result) => {
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
      })
    });
  </script>
</body>

</html>