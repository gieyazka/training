<?php
session_start();
if (@$_SESSION['Status'] == 'Employee' || @$_SESSION['Status'] == 'Admin') {
    require_once "connect.php";
    require_once "manageEvent.query.php";
    // print_r(PDO::getAvailableDrivers());

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
        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    </head>
    <style>
        .se {
            text-align: center;
            text-align-last: center;
            -moz-text-align-last: center;
            width: 100%;
            border: none;
            font-size: 40px;

        }

        .cen {
            text-align: center;
        }

        .test {

            background: rgba(0, 123, 255, 1);
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        }

        select {
            text-align: center;
        }

        .font {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <!-- general form elements -->

    <body class="hold-transition sidebar-mini">

        <!-- /.card-header -->
        <!-- form start -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form id='CloseField'>
                    <div class="card card-teal">
                        <div class="card-header">
                            <h3 class="card-title">จัดการกิจกรรม</h3>
                        </div>
                        <div class="card-body" id=''>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
                                <select name='Event' class="Name form-control col-12" id="salary">
                                    <option selected='selected' value="">เลือกกิจกรรม</option>
                                    <?php
                                    $obj = new manageEvent;
                                    $row = $obj->getEvent();
                                    for ($i = 0; $i < sizeof($row); $i++) {
                                        echo "<option value='{$row[$i]['Event_ID']}'>{$row[$i]['Event_Name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class='form-group cen'>
                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                    <input type="radio" value="1" id="radioPrimary1" name="Field">
                                    <label for="radioPrimary1">สนามสามอ่าวสเตเดี้ยม</label>
                                </div>



                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                    <input type="radio" value="2" id="radioPrimary2" name="Field">
                                    <label for="radioPrimary2">สนามเทศบาลจังหวัดเชียงใหม่</label>
                                </div>



                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                    <input type="radio" value="3" id="radioPrimary3" name="Field">
                                    <label for="radioPrimary3">สนามทุ่งบูรพา</label>
                                </div>



                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                    <input type="radio" value="4" id="radioPrimary4" name="Field">
                                    <label for="radioPrimary4">สนามม.กรุงเทพธน</label>
                                </div>
                            </div>


                            <div class="input-group mb-3">
                                <div class='form-control cen'>
                                    <i class="fas fa-map-marker-alt"></i>
                                    สถานะสนาม
                                    <div class="icheck-primary d-inline col-3">
                                        <input type="radio" value="Yes" id="Status1" name="Status">
                                        <label for="Status1">เปิด</label>
                                    </div>

                                    <div class="icheck-primary d-inline col-3">
                                        <input type="radio" value="No" id="Status2" name="Status">
                                        <label for="Status2">ปิด</label>
                                    </div>
                                </div>
                            </div>

                            <?php


                            ?>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id='SendData' style="width:100%" class="btn navbar-teal">Submit</button>
                        </div>
                </form>
            </div>
            <div class="card card-teal" id='CheckMember'>
                <div class="card-header">
                    <h3 class="card-title">ข้อมูล</h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="text-align: center;">
                    <?php
                    $obj = new manageEvent;
                    $row = $obj->getEvent();
                    // print_r($row);
                    ?>
                </div>
                <table id='example1' class='table table-bordered table-hover'>
                    <thead class='cen'>
                        <tr>
                            <th>กิจกรรม</th>
                            <th>สนามสามอ่าวสเตเดี้ยม</th>
                            <th>สนามเทศบาลจังหวัดเชียงใหม่</th>
                            <th>สนามทุ่งบูรพา</th>
                            <th>สนามม.กรุงเทพธน</th>
                        </tr>
                    </thead>
                    <tbody class='cen'>

                        <?php
                        for ($i = 0; $i < sizeof($row); $i++) {
                            echo "<tr><th style='text-align:left;'>{$row[$i]['Event_Name']}</th>";
                            if ($row[$i]['Field1'] == 'Yes') {
                                echo "<th><button class='btn btn-success ShowField' value='1' id='{$row[$i]['Event_ID']}' >แสดง</button></th>";
                            } else {
                                echo "<th><button class='btn btn-danger UnShowField' value='1' id='{$row[$i]['Event_ID']}'>ไม่แสดง</button></th>";
                            }
                            if ($row[$i]['Field2'] == 'Yes') {
                                echo "<th><button class='btn btn-success ShowField'  value='2' id='{$row[$i]['Event_ID']}'>แสดง</button></th>";
                            } else {
                                echo "<th><button class='btn btn-danger UnShowField' value='2' id='{$row[$i]['Event_ID']}' >ไม่แสดง</button></th>";
                            }
                            if ($row[$i]['Field3'] == 'Yes') {
                                echo "<th><button class='btn btn-success ShowField'  value='3' id='{$row[$i]['Event_ID']}'>แสดง</button></th>";
                            } else {
                                echo "<th><button class='btn btn-danger UnShowField' value='3' id='{$row[$i]['Event_ID']}'>ไม่แสดง</button></th>";
                            }
                            if ($row[$i]['Field4'] == 'Yes') {
                                echo "<th><button class='btn btn-success ShowField'  value='4' id='{$row[$i]['Event_ID']}'>แสดง</button></th></tr>";
                            } else {
                                echo "<th><button class='btn btn-danger UnShowField' value='4' id='{$row[$i]['Event_ID']}' >ไม่แสดง</button></th></tr>";
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot class='ctext'>
                        <tr>
                            <th>กิจกรรม</th>
                            <th>สนามสามอ่าวสเตเดี้ยม</th>
                            <th>สนามเทศบาลจังหวัดเชียงใหม่</th>
                            <th>สนามทุ่งบูรพา</th>
                            <th>สนามม.กรุงเทพธน</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
    </body>
    <!-- /.card -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- ./wrapper -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthMenu": [5, 10, 25, 50, 75, 100],
                "autoWidth": true
            });


        });
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
        var Toast = Swal.mixin({
            showConfirmButton: false,
            timer: 2000,

        });
        $('.ShowField').each(function() {
            $(this).click(function() {
                $(this).removeClass('btn btn-success')
                $(this).addClass('btn btn-danger')
                $(this).html("ไม่แสดง")
                $.ajax({
                    url: "manageEvent.control.php",
                    method: "POST",
                    data: {
                        Field_ID: $(this).val(),
                        Event_ID: $(this).attr("id"),
                        action: 2
                    },
                    success: function(result) {
                        Toast.fire({
                            icon: 'success',
                            title: 'แก้ไขข้อมูลสำเร็จ',

                        })
                    }
                })
            })
        })
        $('.UnShowField').each(function() {
            $(this).click(function() {
                $(this).removeClass('btn btn-danger')
                $(this).addClass('btn btn-success')

                $(this).html("แสดง")
                $.ajax({
                    url: "manageEvent.control.php",
                    method: "POST",
                    data: {
                        Field_ID: $(this).val(),
                        Event_ID: $(this).attr("id"),
                        action: 3
                    },
                    success: function(result) {
                        Toast.fire({
                            icon: 'success',
                            title: 'แก้ไขข้อมูลสำเร็จ',

                        })
                    }
                })
            })
        })
        $(document).ready(function() {


            bsCustomFileInput.init();
            $('#SendData').click(function() {
                $.ajax({
                    url: "manageEvent.control.php",
                    method: "POST",
                    data: $('#CloseField').serialize() + "&action=1",
                    success: function(result) {
                        Toast.fire({
                            icon: 'success',
                            title: 'แก้ไขข้อมูลสำเร็จ',

                        })
                        setTimeout("location.href = 'index?re=3';", 2100);
                    }
                })
            })
        });
    </script>

    </body>
    <!-- Modal -->


    </html>

<?php } ?>