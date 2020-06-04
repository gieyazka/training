<?php
require_once "connect.php";
require_once "thailand.inc.php";
// print_r(PDO::getAvailableDrivers());
if (@$_POST['action'] == '1') {
?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PYD COLOR</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
                        <input type="text" class="form-control" id="Pid" name='Pid' data-validation="required" placeholder="เลขบัตรประชาชน">
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
        <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="plugins/toastr/toastr.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                bsCustomFileInput.init();
            });
        </script>

        </body>
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #20c997;">

                        <h4 class="modal-title">แก้ไขข้อมูล</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id='Form_Register'>
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <!-- general form elements -->



                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="Pid1" name='Pid' readonly placeholder="รหัสบัตรประชาชน">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="Name form-control col-10" readonly id="Email" name='Email' data-validation="email" placeholder="Email">
                                                <span id='test'><input type="checkbox" class='btswitch' checked data-label-text="เพศ" id='sexget' name='' checked data-test data-off-color="danger" data-on-color="primary">
                                                </span> <input type="hidden" id='sex' name='sex'>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                </div>
                                                <input type="text" id='FName' name='Fname' class="form-control col-3 ThName" data-validation="required" placeholder="ชื่อ (ภาษาไทย)">
                                                <input type="text" id='LName' name='Lname' class="form-control col-3 ThName" data-validation="required" placeholder="นามสกุล (ภาษาไทย)">
                                                <input type="text" name='Birthdate' id="reservationdate" placeholder="วันเดือนปีเกิด" class="Name form-control datetimepicker-input " data-target="#reservationdate" />
                                                <div class="input-group-append" id="reservationdate" data-validation="date" data-validation-format="dd/mm/yyyy" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="text" id='Age' name='Age' class="form-control col-3 " data-validation="required" placeholder="อายุ">

                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                </div>
                                                <input type="text" id='EFName' name='EFname' class="form-control col-3 EnName" data-validation="required" placeholder="ชื่อ (ภาษาอังกฤษ)">
                                                <input type="text" id='ELName' name='ELname' class="form-control col-3 EnName" data-validation="required" placeholder="นามสกุล (ภาษาอังกฤษ)">
                                                <input type="text" id='Nickname' name='Nickname' class="form-control col-3 " data-validation="required" placeholder="ชื่อเล่น">
                                                <input type="text" id='Height' name='Height' class="form-control col-3 Name" data-validation="required" placeholder="ส่วนสูง">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                                </div>
                                                <input type="text" id='Address' class="Name form-control col-12" name='Address' data-validation="required" placeholder="ที่อยู่">

                                            </div>


                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                                                </div>
                                                <input type="text" id='School' name='School' data-validation="required" class="Name form-control col-4" placeholder="โรงเรียน">
                                                <input type="text" id='Class' name='Class' data-validation="required" class="Name form-control col-4" placeholder="ระดับชั้นที่ศึกษาอยู่">

                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>

                                                <input type="text" id='Tel' name='Tel' class="form-control col-3 Tel" placeholder="เบอร์โทร">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-futbol"></i></span>
                                                </div>

                                                <input type="text" name='club' id='club' class="form-control col-6" placeholder="สังกัดทีม/สโมสร (ถ้ามี)">
                                                <input type="text" name='Position' id='Position' data-validation="required" class="form-control col-3" placeholder="ตำแหน่งที่ถนัด ">

                                                <span class="input-group-text"><i class="fas fa-shoe-prints"></i></span>
                                                <select id='foot' name='Foot' data-validation="required" class="form-control select2 col-3" style="width: 100%;">
                                                    <option value="" selected="selected">เท้าที่ถนัด</option>
                                                    <option value="ซ้าย">ซ้าย</option>
                                                    <option value="ขวา">ขวา</option>
                                                    <option value="ทั้งสองข้าง">ทั้งสองข้าง</option>
                                                </select>
                                            </div>
                                            <div class='form-group cen'>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" class='f' value="สนามสามอ่าวสเตเดี้ยม" id="radioPrimary1" name="Field">
                                                    <label for="radioPrimary1">สนามสามอ่าวสเตเดี้ยม</label>
                                                </div>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" class='f' value="สนามเทศบาลจังหวัดเชียงใหม่" id="radioPrimary2" name="Field">
                                                    <label for="radioPrimary2">สนามเทศบาลจังหวัดเชียงใหม่</label>
                                                </div>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" class='f' value="สนามทุ่งบูรพา" id="radioPrimary3" name="Field">
                                                    <label for="radioPrimary3">สนามทุ่งบูรพา</label>
                                                </div>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" class='f' value="สนามม.กรุงเทพธน" id="radioPrimary4" name="Field">
                                                    <label for="radioPrimary4">สนามม.กรุงเทพธน</label>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                </div>
                                                <input type="text" id='Pname' name='Pname' class=" form-control col-4 " id='Pname' placeholder="ชื่อผู้ปกครอง">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" id='Parent_Tel' name='Parent_tel' data-validation="required" class="Tel form-control col-4" placeholder="เบอร์โทรผู้ปกครอง">
                                                <span class="input-group-text"><i class="fab fa-bitcoin"></i></span>
                                                <select name='salary' id='salary' class="Name form-control col-4" id="salary">
                                                    <option selected='selected' value="">รายได้ครอบครัว</option>
                                                    <option value="มากกว่า 20000">มากกว่า 20000</option>
                                                    <option value="น้อยกว่า 20000">น้อยกว่า 20000</option>
                                                </select>
                                            </div>


                                            <button type="button" id='Updatedata'  style="width:100%" class="btn navbar-teal">Submit</button>

                        </form>

                    </div>
                    <div class="modal-footer justify-content-between">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </html>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="Editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id='Editdetail' style='text-align:center'>

                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
<?php } else {
    header('Location: UserMenu');
} ?>
<script type="text/javascript" src="checkmember.js"></script>