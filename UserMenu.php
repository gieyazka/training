<?php
require_once "thailand.inc.php";
require_once "register.query.php";
require_once 'ShowMember.query.php';


// print_r(PDO::getAvailableDrivers());

?>

<!DOCTYPE html>
<html>


<head>
    <input type="hidden" name="refresh" id="refresh" value="<?php echo @$_GET['re']; ?>">
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
        font-size: 30px;

    }

    option {
        text-align: center;
    }

    .cen {
        text-align: center;
    }

    .test {

        background: rgba(32, 201, 151, 1);
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    .font {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body id='body' class="hold-transition sidebar-mini navbar-dark navbar-gray-dark font">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item" id='sb'>
                    <a class="nav-link" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>



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
                            <a class="nav-link curMove ">
                                <i class="nav-icon fas fa-futbol"></i>
                                <p>
                                    ผู้เข้าร่วมกิจกรรม
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item curMove ">
                                    <a id='addEvent' class="nav-link ">
                                        <i class="fas fa-futbol fa-circle nav-icon"></i>

                                        <p id=''>สมัครเข้าร่วมกิจกรรม</p>
                                    </a>
                                </li>
                                <li class="nav-item curMove">
                                    <a id='ShowMember' class="nav-link">
                                        <i class="fas fa-male fa-circle nav-icon"></i>
                                        <p>ค้นหาข้อมูล</p>
                                    </a>
                                </li>

                            </ul>
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
            <!-- Main content -->

            <section class="content" id='ShowData'>
                <form id='Form_Register'>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <!-- general form elements -->
                                    <div class="card card-teal">
                                        <div class="card-header">
                                            <select class='test font se' id="subject" name='subject'>
                                                <option selected='selected' value="">กรุณาเลือกกิจกรรมที่จะสมัคร</option>
                                                <?php

                                                $obj = new ShowMember;
                                                $row = $obj->getEventName();

                                                for ($i = 0; $i <  sizeof($row); $i++) {
                                                    echo "<option data-id='{$row[$i]['Event_ID']}' value='{$row[$i]['Event_Name']}'>{$row[$i]['Event_Name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="card-body" id='ShowQR'>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="Pid" name='Pid' data-validation="length" data-validation-length="13" placeholder="รหัสบัตรประชาชน">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="Name form-control col-10" id="Email" name='Email' data-validation="email" placeholder="Email">
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
                                                <input type="text" class="Name form-control col-8" name='Address' data-validation="required" placeholder="ที่อยู่">
                                                <select id='province' name='Province' data-validation="required" class="form-control select2 col-4" style="width: 100%;">
                                                    <option value="" selected="selected">เลือกจังหวัด</option>
                                                    <?php
                                                    $obj = new thailand;
                                                    $provinces = $obj->getprovince();

                                                    for ($i = 0; $i < sizeof($provinces); $i++) {
                                                        echo  "<option id='{$provinces[$i]["id"]}' value='{$provinces[$i]["name_th"]}'>{$provinces[$i]["name_th"]}</option> ";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                                </div>

                                                <select id='amphure' name='amphure' data-validation="required" class="form-control select2 col-4" disabled style="width: 100%;">
                                                    <option value="" selected="selected">เลือกเขต/อำเภอ</option>

                                                </select>
                                                <select id='district' name='district' data-validation="required" class="form-control select2 col-4" disabled style="width: 100%;">
                                                    <option value="" selected="selected">เลือกแขวง/ตำบล</option>
                                                </select>
                                                <input type="text" id='Zipcode' class="form-control col-4" name='Zipcode' data-validation="number" placeholder="รหัสไปรษณีย์">

                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                                                </div>
                                                <input type="text" name='School' data-validation="required" class="Name form-control col-4" placeholder="โรงเรียน">
                                                <input type="text" name='Class' data-validation="required" class="Name form-control col-4" placeholder="ระดับชั้นที่ศึกษาอยู่">

                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>

                                                <input type="text" name='Tel' class="form-control col-3 Tel" placeholder="เบอร์โทร">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-futbol"></i></span>
                                                </div>

                                                <input type="text" name='club' class=form-control col-6" placeholder="สังกัดทีม/สโมสร (ถ้ามี)">
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
                                                    <input type="radio" value="สนามสามอ่าวสเตเดี้ยม" id="radioPrimary1" name="Field">
                                                    <label for="radioPrimary1">สนามสามอ่าวสเตเดี้ยม</label>
                                                </div>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" value="สนามเทศบาลจังหวัดเชียงใหม่" id="radioPrimary2" name="Field">
                                                    <label for="radioPrimary2">สนามเทศบาลจังหวัดเชียงใหม่</label>
                                                </div>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" value="สนามทุ่งบูรพา" id="radioPrimary3" name="Field">
                                                    <label for="radioPrimary3">สนามทุ่งบูรพา</label>
                                                </div>
                                                <div class="icheck-primary d-inline col-lg-6 col-xs-12 col-md-6 col-12">
                                                    <input type="radio" value="สนามม.กรุงเทพธน" id="radioPrimary4" name="Field">
                                                    <label for="radioPrimary4">สนามม.กรุงเทพธน</label>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                </div>
                                                <input type="text" name='Pname' class=" form-control col-4 " id='Pname' placeholder="ชื่อผู้ปกครอง">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name='Parent_tel' data-validation="required" class="Tel form-control col-4" placeholder="เบอร์โทรผู้ปกครอง">
                                                <span class="input-group-text"><i class="fab fa-bitcoin"></i></span>
                                                <select name='salary' class="Name form-control col-4" id="salary">
                                                    <option selected='selected' value="">รายได้ครอบครัว</option>
                                                    <option value="มากกว่า 20000">มากกว่า 20000</option>
                                                    <option value="น้อยกว่า 20000">น้อยกว่า 20000</option>
                                                </select>
                                            </div>
                                            <label>ได้รับข่าวสารจาก</label>
                                            <div class="input-group mb-3">

                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="Poster" name='info[]' class='check' value="Poster">
                                                    <label for="Poster">&nbspโปสเตอร์&nbsp</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="Facebook  " name='info[]' class='check' value="Facebook">
                                                    <label for="Facebook  ">&nbspFacebook&nbsp </label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="coach" name='info[]' class='check' value="โค๊ช/อาจารย์">
                                                    <label for="coach">&nbspโค้ช /อาจารย์&nbsp</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="sign" name='info[]' class='check' value="ป้ายประกาศ">
                                                    <label for="sign">&nbspป้ายประกาศ &nbsp</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="other">
                                                    <label for="other"></label>
                                                </div>
                                                <input type="text" class="form-control" name='info[]' id='txtother' placeholder="อื่น ๆ ระบุ" disabled>


                                            </div>



                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer" id='footFinish'>
                                            <button type="button" id='SendData' data-toggle="modal" data-target="#DataModal" style="width:100%" class="btn navbar-teal">Submit</button>
                                        </div>

                                    </div>





                </form>


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
    <div id="sidebar-overlay"></div>
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

</body>
<!-- Modal -->
<div class="modal fade font" id="DataModal" tabindex="-1" role="dialog" aria-labelledby="DataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DataModalLabel">Register</h5>
                <button type="button" class="close" id='close' data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id='ShowOutput' align='center'>

            </div>
            <div class="modal-footer">
                <button type="button" id='Failed' class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id='Finish' data-dismiss="modal" class="btn btn-secondary">Close</button>
            </div>
        </div>
    </div>
</div>


</html>
<script type="text/javascript" src="UserMenu.js"></script>