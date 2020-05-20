<?php
require_once "connect.php";
require_once "thailand.inc.php";
// print_r(PDO::getAvailableDrivers());
if(@$_POST['action'] == '1'){
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








<!-- general form elements -->


<!-- /.card-header -->
<!-- form start -->
<div class="row">
    <!-- left column -->
    <div class="col-md-2">
    </div>
    <div class="col-md-8" id='test'>

        <div class="card card-teal">
            <div class="card-header">
                <h3 class="card-title">ค้นหาข้อมูล</h3>
            </div>
            <div class="card-body" id='ShowQR'>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
                    </div>
                    <input type="text"  class="form-control" id="Pid" name='Pid' data-validation="required" placeholder="เลขบัตรประชาชน">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="text" id='SendData' style="width:100%" class="btn navbar-teal">Submit</button>
            </div>

        </div>
        <div class="card " id='CheckMember'>
           

        </div>
        <!-- /.card -->

    </div>

    <!-- /.card -->
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
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
            var SendData = $('#SendData')
            var EventObj = $('#Event')
            $("#CheckMember").hide();

            SendData.click(function() {
                // $('#Form_Register').submit()
                $.ajax({
                    url: 'checkmember.control.php',
                    method: "POST",
                    data: {
                        Pid: $('#Pid').val(),
                        action: 1
                    },
                    success: function(result) {
                        $("#CheckMember").show()
                        
                        $("#CheckMember").html(result)

                    }
                });
                // console.log($('#Form_Register').serialize());
            });
            EventObj.keyup(function() {

                if (EventObj.val() == "") {
                    EventObj.removeClass("is-valid").addClass("is-invalid");
                } else {
                    EventObj.removeClass("is-invalid").addClass("is-valid");
                }
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
    <?php }else {
        header('Location: UserMenu');
    } ?>