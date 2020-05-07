<?php
require_once 'ShowMember.query.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    .se {
        text-align: center;
        text-align-last: center;
        -moz-text-align-last: center;
        width: 100%;
        border: none;
        font-size: 20px;

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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>ระบบยืนยันตน</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                </div>
                <!-- /.card -->


                <div class="card card-primary">
                    <div class="card-header">
                        <select name="EventName" class="font test se" id="EventName">
                            <option value="" selected="selected">เลือกกิจกรรม</option>
                            <?php
                            $obj = new ShowMember;
                            $EventName = $obj->getEventName();
                            for ($i = 0; $i < sizeof($EventName); $i++) {
                                echo "<option value='{$EventName[$i]['Event_Name']}'>{$EventName[$i]['Event_Name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body "id='Showtable'>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>หมายเลขบัตรประชาชน</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>วันเกิด</th>
                                    <th>ที่อยู่</th>
                                    <th>โรงเรียน</th>
                                    <th>เพิ่มเติม</th>
                                </tr>
                            </thead>
                            <tbody id=''>
                               


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>หมายเลขบัตรประชาชน</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>วันเกิด</th>
                                    <th>ที่อยู่</th>
                                    <th>โรงเรียน</th>
                                    <th>เพิ่มเติม</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
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
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });

        });
    </script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#EventName').change(function() {
                $.ajax({
                    url: 'ShowMember.control.php',
                    method: "POST",
                    data: {
                        EventName: $('#EventName').val(),
                        action: '1'

                    },
                    success: function(result) {
                        $('#Showtable').html("")
                        $('#Showtable').html(result)
                    }
                });
            });
        });
    </script>
</body>

</html>