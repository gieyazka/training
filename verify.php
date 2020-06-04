<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYDColor</title>
</head>

</html>
<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

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
<style>
    body {
        font-family: 'Kanit', sans-serif;
        size: 20px;
    }

    .centext {

        text-align: center;
    }
</style>

<body>


    <?php
    session_start();
    require_once "verify.control.php";


    if (isset($_GET['verify']) && isset($_SESSION['Status'])) {

        $decode = base64_decode($_GET['verify']);

        $PID = substr($decode, 0, strpos($decode, '&'));
        $action = substr($decode, strpos($decode, '&') + 1);
        if ($action == '1') {
    ?>
            <input type="hidden" id='Pid' name='Pid' value="<?php echo $PID; ?>">
            <div class="card card-teal" id='CheckMember'>
                <div class="card-header">
                    <label class="card-title" style="text-align: center;">ยืนยันตัว</label>
                </div>
                <?php $obj = new verify;
                $row = $obj->VerifyUser($PID) ?>
                <div class="card-body">
                    <table class="table " style="text-align: center;">
                        <tr style="text-align: center;">

                            <th>เลขบัตรประชาชน</th>
                            <th><?php echo $row['Member_PID']; ?></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th><?php echo $row['Email']; ?></th>
                        </tr>
                        <tr>
                            <th>ชื่อ </th>
                            <th><?php echo $row['Firstname'] . " " . $row['Lastname']; ?></th>
                        </tr>
                        <tr>
                            <th>วันเกิด </th>
                            <th><?php echo $row['Birthdate']; ?></th>
                        </tr>
                    </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer" id='footFinish'>
                    <button type="button" id='confirm' style="width:100%" class="btn navbar-teal">ยืนยันตัวผู้เข้าร่วมกิจกรรม</button>
                </div>

            </div>
            <!-- /.card -->
    <?

        }
    }
    ?>
</body>
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
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="form-validator/jquery.form-validator.js"></script>
<script>
    const Toast = Swal.mixin({
        showConfirmButton: false,
        timer: 2000,

    });
    $('#confirm').click(function() {

        $.ajax({
            url: 'verify.control.php',
            method: 'POST',
            data: {
                Pid: $('#Pid').val(),
                action: 1
            },
            success: function(result) {
                Toast.fire({
                    icon: 'success',
                    title: 'ยืนยันตัวผู้เข้าร่วมงานสำเร็จ',
                })
                setTimeout("location.href = 'index';", 2100);

            }
        })
    })
</script>