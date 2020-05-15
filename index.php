<?php
require_once "connect.php";
require_once "thailand.inc.php";
require_once 'ShowMember.query.php';
// print_r(PDO::getAvailableDrivers());
session_start();
if ($_SESSION['Status'] == 'Employee' || $_SESSION['Status'] == 'Admin') {
?>
    <!DOCTYPE html>
    <html>


    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PYD COLOR</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <!-- daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    </head>
    <style>
        .curMove {
            cursor: pointer;
        }

        .se {
            text-align: center;
            text-align-last: center;
            -moz-text-align-last: center;
            width: 100%;
            border: none;
            font-size: 40px;

        }

        option {
            text-align: center;
        }

        .test {

            background: rgba(0, 123, 255, 1);
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        }

        .font {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <input type="hidden" name="refresh" id="refresh" value="<?php echo @$_GET['re']; ?>">

    <body class="hold-transition sidebar-mini navbar-dark navbar-gray-dark font">

        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto"></ul>

                <li class="nav-item d-none d-sm-inline-block">
                    <a style='color:#d4d6d7' class=""> <?php echo  $_SESSION['Firstname']; ?></a>
                </li>


            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4 navbar-dark navbar-gray-dark ">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">PYD COLOR</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar navbar-dark navbar-gray-dark">


                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview">
                                <a class="nav-link curMove">
                                    <i class="nav-icon fas fa-futbol"></i>
                                    <p>
                                        เจ้าหน้าที่
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item curMove ">
                                        <a id='addEvent' class="nav-link ">
                                            <i class="fas fa-futbol fa-circle nav-icon"></i>

                                            <p id=''>ระบบเพิ่มกิจกรรม</p>
                                        </a>
                                    </li>
                                    <li class="nav-item curMove">
                                        <a id='ShowMember' class="nav-link">
                                            <i class="fas fa-male fa-circle nav-icon"></i>
                                            <p>ระบบยืนยันตน</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <?php if ($_SESSION['Status'] == 'Admin') { ?>
                                <li class="nav-item has-treeview">
                                    <a class="nav-link curMove">
                                        <i class="nav-icon fas fa-futbol"></i>
                                        <p>
                                            Admin
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item curMove ">
                                            <a id='ControlEmployee' class="nav-link ">
                                                <i class="fas fa-futbol fa-circle nav-icon"></i>

                                                <p id=''>ข้อมูลพนักงาน</p>
                                            </a>
                                        </li>
                                        <li class="nav-item curMove">
                                            <a id='ShowMember' class="nav-link">
                                                <i class="fas fa-male fa-circle nav-icon"></i>
                                                <p>ระบบยืนยันตน</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            <?php } ?>
                            <li class="nav-item curMove">
                                <a id='logout' class="nav-link">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <p>ออกจากระบบ</p>
                                </a>
                            </li>

                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                            </div>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid" id='ShowData'>
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <!-- general form elements -->
                                <div class="card card-primary" id=''>
                                    <div class='row'>
                                        <div class=' col-6'>
                                            <div class='info-box'>
                                                <span class='info-box-icon bg-info col-3'><i class='fas fa-user'></i></span>

                                                <div class='info-box-content'>
                                                    <span class='info-box-text'>จำนวนผู้สมัครทั้งหมด</span>
                                                    <span class='info-box-number'>3000000</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <div class=' col-6'>
                                            <div class='info-box'>
                                                <span class='info-box-icon bg-info col-3'><i class="fas fa-calendar-week"></i></span>

                                                <div class='info-box-content'>
                                                    <span class='info-box-text'>จำนวนกิจกรรมทั้งหมด</span>
                                                    <span class='info-box-number'>150000</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                    </div>
                                    <?php

                                    $obj = new ShowMember;
                                    $EventName = $obj->getEventName();
                                    $countSubject = new ShowMember;

                                    for ($i = 0; $i < sizeof($EventName); $i += 2) {

                                        echo " <div class='row'>";
                                        // echo $EventName[$i]['Event_Name'];

                                        for ($j = 0; $j < 1; $j++) {

                                            @$Count = $countSubject->EventCount($EventName[$i]['Event_Name']);
                                            @$Count2 = $countSubject->EventCount($EventName[$i + 1]['Event_Name']);
                                            // echo "<pre>";
                                            // echo print_r($Count);
                                            // echo "</pre>";
                                    ?>

                                            <div class=' col-6'>
                                                <div class='info-box'>
                                                    <span class='info-box-icon bg-info col-3'><i class='fas fa-user-plus'></i></span>

                                                    <div class='info-box-content'>
                                                        <span class='info-box-text'><?php echo $EventName[$i]['Event_Name']; ?></span>
                                                        <span class='info-box-number'><?php echo "จำนวนผู้สมัคร " . $Count[$j]['count'] . " คน"; ?></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                            <?php if (@$EventName[$i + 1]['Event_Name'] != "") { ?>
                                                <div class=' col-6'>
                                                    <div class='info-box'>
                                                        <span class='info-box-icon bg-info col-3'><i class="fas fa-registered"></i></span>

                                                        <div class='info-box-content'>
                                                            <span class='info-box-text'><?php echo @$EventName[$i + 1]['Event_Name']; ?></span>
                                                            <span class='info-box-number'><?php echo "จำนวนผู้สมัคร " . @$Count2[$j]['count'] . " คน"; ?></span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                            <?php  } ?>

                                </div>
                                <!-- /.row -->


                        <?php     }
                                    }

                        ?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer navbar-dark navbar-gray-dark">
            <div class="float-right d-none d-sm-block">
                <strong>Copyright &copy; 2020 <a href='#'>Sirky</a>.</strong>
            </div>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- ./wrapper -->
        <!-- InputMask -->
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script src="form-validator/jquery.form-validator.js"></script>
        <script>
            $(function() {
                // setup validate
                $.validate();
            });
            $(function() {
                $('#reservationdate').datetimepicker({
                    // format: 'L'
                    format: 'DD/MM/YYYY'
                });
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#logout').click(function() {
                    window.location.href = 'logout'
                })
                if ($('#refresh').val() != "") {
                    if ($('#refresh').val() == "1") {
                        $.ajax({
                            url: 'Employee.php',
                            method: 'POST',
                            success: function(result) {
                                $('#ShowData').html(result)
                            }
                        })
                    }
                }
                bsCustomFileInput.init();
                $('#ControlEmployee').click(function() {
                    $.ajax({
                        url: 'Employee.php',
                        method: 'POST',
                        success: function(result) {
                            $('#ShowData').html(result)
                        }
                    })

                })
                $('#addEvent').click(function() {
                    $.ajax({
                        url: 'subject.php',
                        method: 'POST',
                        success: function(result) {
                            $('#ShowData').html(result)
                        }
                    })

                });
                $('#ShowMember').click(function() {
                    $.ajax({
                        url: "ShowMember.php",
                        success: function(result) {
                            $('#ShowData').html(result)
                            // console.log(result)
                        }
                    });
                });
            });
        </script>

    </body>
    <!-- Modal -->
    <div class="modal fade font" id="DataModal" tabindex="-1" role="dialog" aria-labelledby="DataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DataModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id='ShowOutput' align='center'>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    </html>

<?php } else {
    header('location:login');
} ?>