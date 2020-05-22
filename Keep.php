<?php
session_start();
require_once "Keep.query.php";
if ($_SESSION['Status'] == 'Employee' || $_SESSION['Status'] == 'Admin') {



?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
        .ctext {
            text-align: center;
        }

        .curMove {
            cursor: pointer;
        }

        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <body class="hold-transition sidebar-mini">

        <div class="card card-teal">

            <div class="card-header" style="text-align: center">
                จัดเก็บกิจกรรม
            </div>
            <!-- /.card-header -->
            <div class="card-body " id='Showtable'>
                <?php
                $obj = new Keep;
                $data = $obj->GetEvent();
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                ?>


                <table id='example1' class='table table-bordered table-hover'>
                    <thead class='ctext'>
                        <tr>
                            <th>กิจกรรม</th>
                            <th>จำนวนผู้เข้าร่วม</th>
                            <th>จัดการ</th>
                            <th>excel</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        for ($i = 0; $i < sizeof($data); $i++) {
                            echo "<tr>";
                            echo "<th>{$data[$i]['Event_Name']}</th>";
                            echo "<th class='ctext'>{$data[$i]['count']}</th>";
                            echo "<th class='ctext'><button type='button' class='btn btn-primary SendKeep' id='{$data[$i]['count']}' data-event='{$data[$i]['Event_Name']}'>เก็บกิจกรรม</button></th>";
                            echo "<th class='ctext'><i class='far fa-file-excel fa-3x  curMove excel' data-event='{$data[$i]['Event_Name']}'></th>" ;
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot class='ctext'>
                        <tr>
                            <th>กิจกรรม</th>
                            <th>จำนวนผู้เข้าร่วม</th>
                            <th>จัดการ</th>
                            <th>excel</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>






        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="plugins/toastr/toastr.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- page script -->

    </body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
         var Toast = Swal.mixin({
                showConfirmButton: false,
                timer: 2000,

            });
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [
                    [1, "desc"]
                ],
                "lengthMenu": [5, 10, 25, 50, 75, 100]
            });


        });

        $(document).ready(function() {
       

            $('.SendKeep').each(function() {
                $(this).click(function() {
                    $.ajax({
                        url: "Keep.control.php",
                        method: "POST",
                        data: {
                            Event_Name: $(this).attr('data-event'),
                            Count: $(this).attr('id'),
                            action: 1
                        },
                        success: function(result) {
                            Toast.fire({
                                icon: 'success',
                                title: 'จัดเก็บกิจกรรมสำเร็จ',

                            })
                            setTimeout("location.href = 'index?re=2';", 2100);
                        }
                    })
                    // alert($(this).attr('data-event'))
                    // alert($(this).attr('id'))
                })

            })
            $('.excel').each(function() {
       
                $(this).click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'ดาวโหลดสำเร็จ',

                    })
                    window.open("Keep.control.php?action=2&Event_Name=" + $(this).attr('data-event'))
                })

            })
        })
    </script>

    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>

    </html>
<?php  } ?>