<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result - Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../styles/cs-skin-elastic.css">
    <link rel="stylesheet" href="../styles/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style2.css">
    <link rel="shortcut icon" href="../images/KLD LOGO.png" type="image/x-icon" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script>
        function showValues(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxCall2.php?fid=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
    </aside>

    <!-- /#left-panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
        </header>
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
                                    <li><a href="#">Result</a></li>
                                    <li class="active">My Result</li>
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
                                    <h3 align="center">Grades</h3>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="x_card_code" class="control-label mb-1">Semester</label>
                                            <select required name="semester" class="custom-select form-control">
                                                <option value="1">1st Semester</option>
                                                <option value="2">2nd Semester</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="x_card_code" class="control-label mb-1">Year</label>
                                            <select required name="year" class="custom-select form-control">
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                                <option value="3">3rd Year</option>
                                                <option value="4">4th Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Teacher</th>
                                            <th>Midterm</th>
                                            <th>Final</th>
                                            <th>Semestral</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ABC123</td>
                                            <td>Sample Course 1</td>
                                            <td>Sample Teacher 1</td>
                                            <td>1.00</td>
                                            <td>1.00</td>
                                            <td>1.00</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>123ABC</td>
                                            <td>Sample Course 2</td>
                                            <td>Sample Teacher 2</td>
                                            <td>1.25</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                        </tr>
                                        <tr>
                                            <td>DEF456</td>
                                            <td>Sample Course 3</td>
                                            <td>Sample Teacher 3</td>
                                            <td>1.75</td>
                                            <td>1.25</td>
                                            <td>1.50</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>456DEF</td>
                                            <td>Sample Course 4</td>
                                            <td>Sample Teacher 4</td>
                                            <td>3.00</td>
                                            <td>3.00</td>
                                            <td>3.00</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>GHI789</td>
                                            <td>Sample Course 5</td>
                                            <td>Sample Teacher 5</td>
                                            <td>1.25</td>
                                            <td>1.25</td>
                                            <td>1.25</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>789GHI</td>
                                            <td>Sample Course 6</td>
                                            <td>Sample Teacher 6</td>
                                            <td bgcolor="red">5.00</td>
                                            <td bgcolor="red">5.00</td>
                                            <td bgcolor="red">5.00</td>
                                            <td bgcolor="red">Failed</td>
                                        </tr>
                                        <tr>
                                            <td>JKL000</td>
                                            <td>Sample Course 7</td>
                                            <td>Sample Teacher 7</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-------------------------- FROM THE FINAL RESULT TABLE --------------------------->
                                <!-- <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>Total Course Unit</th>
                    <th>Total Grade Point</th>
                    <th>GPA</th>
                    <th>Class of Diploma</th>
                </tr>
            </thead>
            <tbody>
        <tr>
        <td bgcolor="#F9D342"></td>
        <td bgcolor="#F9D342"></td>
        <td bgcolor="#F9D342"></td>
        <td bgcolor="#F9D342"></td>
        </tr>                                                         
                    </tbody>
                </table> -->
                                <div class="row">
                                    <div class="col-6">
                                        <a href="studentPrintResult.php?semesterId=<?php echo $semesterId; ?>&matricNo=<?php echo $matricNo; ?>&levelId=<?php echo $levelId; ?>&sessionId=<?php echo $sessionId; ?>" class="btn btn-danger">Print Result</a>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="font-weight-bold pr-5 pt-2" align="right">GWA: --</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of datatable -->

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2024 Student Grading System
                    </div>
                    <div class="col-sm-6 text-right">
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div><!-- /#right-panel -->

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
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });

        // Menu Trigger
        $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();
            if (windowWidth < 1010) {
                $('body').removeClass('open');
                if (windowWidth < 760) {
                    $('#left-panel').slideToggle();
                } else {
                    $('#left-panel').toggleClass('open-menu');
                }
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');
            }

        });
    </script>

</body>

</html>