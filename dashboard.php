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


    <body class="hold-transition font">

        <div class="wrapper">
            <!-- Navbar -->


            <!-- Main Sidebar Container -->


            <!-- Content Wrapper. Contains page content -->
            <div class="">
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
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class='row'>
                                    <div class="col-lg-6 col-xs-12 col-md-6 col-12">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>3000000</h3>

                                                <p>จำนวนผู้สมัครทั้งหมด</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-12 col-md-6  col-12">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>3000000</h3>

                                                <p>จำนวนกิจกรรมที่กำลังดำเนินการ</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-calendar-week"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-12 col-md-6 col-12">
                                        <!-- small card -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>3000000</h3>

                                                <p>จำนวนกิจกรรมที่ผ่านมา</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-12 col-md-6 col-12">
                                        <!-- small card -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>3000000</h3>

                                                <p>จำนวนผู้สมัครที่ผ่านมาทั้งหมด</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-calendar-week"></i>
                                            </div>

                                        </div>
                                    </div>




                                </div>
                                <div class="card card-primary" id=''>

                                    <?php

                                    $obj = new ShowMember;
                                    $EventName = $obj->getEventName();
                                    $countSubject = new ShowMember;

                                    for ($i = 0; $i < sizeof($EventName); $i += 3) {

                                        echo " <div class='row'>";
                                        // echo $EventName[$i]['Event_Name'];

                                        for ($j = 0; $j < 1; $j++) {

                                            @$Count = $countSubject->EventCount($EventName[$i]['Event_Name']);
                                            @$Count2 = $countSubject->EventCount($EventName[$i + 1]['Event_Name']);
                                            @$Count3 = $countSubject->EventCount($EventName[$i + 2]['Event_Name']);

                                            // echo "<pre>";
                                            // echo print_r($Count);
                                            // echo "</pre>";
                                    ?>

                                            <div class='col-md-4'>
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
                                                <div class='col-md-4'>
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
                                            <?php if (@$EventName[$i + 2]['Event_Name'] != "") { ?>
                                                <div class='col-md-4'>
                                                    <div class='info-box'>
                                                        <span class='info-box-icon bg-info col-3'><i class="fas fa-registered"></i></span>

                                                        <div class='info-box-content'>
                                                            <span class='info-box-text'><?php echo @$EventName[$i + 2]['Event_Name']; ?></span>
                                                            <span class='info-box-number'><?php echo "จำนวนผู้สมัคร " . @$Count3[$j]['count'] . " คน"; ?></span>
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
                if ($('#refresh').val() == "2") {
                    $.ajax({
                        url: 'Keep.php',
                        method: 'POST',
                        success: function(result) {
                            $('#ShowData').html(result)
                        }
                    })
                }
            }
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


                bsCustomFileInput.init();




            });
        </script>

    </body>


    </html>

<?php } else {
    header('location:login');
} ?>