<?php
require_once "connect.php";
require_once "thailand.inc.php";
require_once "register.query.php";
require_once 'ShowMember.query.php';
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
            font-size: 30px;

        }

        option {
            text-align: center;
        }

        .test {
            border: none !important;
            border-color: transparent !important;
            background: rgba(32, 201, 151, 1);
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        }

        .font {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <body class="">
        <div class="wrapper">



            <!-- Content Wrapper. Contains page content -->

            <!-- Main content -->
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
                                                echo "<option value='{$row[$i]['Event_Name']}'>{$row[$i]['Event_Name']}</option>";
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
                                            <input type="email" class="Name form-control" id="Email" name='Email' data-validation="email" placeholder="Email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" id='Name' name='Fname' class="form-control col-3 Name" data-validation="required" placeholder="ชื่อ (ภาษาไทย)">
                                            <input type="text" id='Name' name='Lname' class="form-control col-3 Name" data-validation="required" placeholder="นามสกุล (ภาษาไทย)">
                                            <input type="text" name='Birthdate' id="reservationdate" placeholder="วันเดือนปีเกิด" class="Name form-control datetimepicker-input " data-target="#reservationdate" />
                                            <div class="input-group-append" id="reservationdate" data-validation="date" data-validation-format="dd/mm/yyyy" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" id='Name' name='Lname' class="form-control col-3 Name" data-validation="required" placeholder="อายุ">

                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" id='EName' name='EFname' class="form-control col-3 Name" data-validation="required" placeholder="ชื่อ (ภาษาอังกฤษ)">
                                            <input type="text" id='EName' name='ELname' class="form-control col-3 Name" data-validation="required" placeholder="นามสกุล (ภาษาอังกฤษ)">
                                            <input type="text" id='EName' name='Age' class="form-control col-3 Name" data-validation="required" placeholder="ชื่อเล่น">
                                            <input type="text" id='EName' name='Nickname' class="form-control col-3 Name" data-validation="required" placeholder="ส่วนสูง">
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

                                            <input type="text" name='Tel' class="Tel form-control col-3" placeholder="เบอร์โทร">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-futbol"></i></span>
                                            </div>

                                            <input type="text" name='Tel' class="Tel form-control col-6" placeholder="สังกัดทีม/สโมสร (ถ้ามี)">
                                            <input type="text" name='Parent_tel' data-validation="required" class="Name form-control col-3" placeholder="ตำแหน่งที่ถนัด ">

                                            <span class="input-group-text"><i class="fas fa-shoe-prints"></i></span>
                                            <select id='foot' name='Foot' data-validation="required" class="form-control select2 col-3" style="width: 100%;">
                                                <option value="" selected="selected">เท้าที่ถนัด</option>
                                                <option value="ซ้าย">ซ้าย</option>
                                                <option value="ขวา">ขวา</option>
                                                <option value="ทั้งสองข้าง">ทั้งสองข้าง</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                           
                                        <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" name='Pname' class="Tel form-control col-4" placeholder="ชื่อผู้ปกครอง">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name='Parent_tel' data-validation="required" class="Tel form-control col-4" placeholder="เบอร์โทรผู้ปกครอง">
                                            <span class="input-group-text"><i class="fab fa-bitcoin"></i></span>
                                            <input type="text" name='salary' data-validation="required" class="Name form-control col-4" placeholder="รายได้ครอบครัว">
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
         
                $('#reservationdate').datetimepicker({
                    // format: 'L'
                    // format: 'DD/MM/YYYY'
                });
           

            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test($email);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                bsCustomFileInput.init();
                var SendData = $('#SendData')
                var PIDobj = $('#Pid')
                var EmailObj = $('#Email')
                var NameObj = $('.Name')
                var ZipcodeObj = $('#Zipcode')
                NameObj.each(function() {
                    $(this).on('blur', function() {
                        if ($(this).val() == '' || $(this).val() == "null") {
                            $(this).removeClass("is-valid").addClass("is-invalid");
                        } else {
                            $(this).removeClass("is-invalid").addClass("is-valid");
                        }
                    });
                });
                $('.Tel').each(function() {
                    $(this).keyup(function() {

                        if ($(this).val().length == 10 || $(this).val() == '-') {

                            $(this).removeClass("is-invalid").addClass("is-valid");

                        } else {
                            $(this).removeClass("is-valid").addClass("is-invalid");
                        }
                    })
                })
                ZipcodeObj.keyup(function() {
                    if (ZipcodeObj.val().length != 5) {
                        ZipcodeObj.removeClass("is-valid").addClass("is-invalid");
                    } else {
                        ZipcodeObj.removeClass("is-invalid").addClass("is-valid");
                    }
                });
                SendData.click(function() {
                    // $('#Form_Register').submit()
                    $.ajax({
                        url: 'register.control.php',
                        method: "POST",
                        data: $('#Form_Register').serialize() + "&action=1",
                        success: function(result) {
                            // alert(result)
                            if (result == "") {
                                $("#ShowOutput").html("ลงทะเบียนสำเร็จ")
                                $('#Finish').show()
                                $('#Failed').hide()
                                $.ajax({
                                    url: 'register.control.php',
                                    method: "POST",
                                    data: {
                                        Pid: $('#Pid').val(),
                                        action: 2
                                    },
                                    success: function(data) {
                                        $("#ShowOutput").append(data)
                                    }
                                });
                            } else {
                                $("#ShowOutput").html(result)
                                $('#Finish').hide()
                                $('#Failed').show()
                            }
                        }
                    });
                    // console.log($('#Form_Register').serialize());
                });
                PIDobj.keyup(function() {

                    if (PIDobj.val().length != 13) {
                        PIDobj.removeClass("is-valid").addClass("is-invalid");
                    } else {
                        for (i = 0, sum = 0; i < 12; i++) {
                            sum += parseFloat(PIDobj.val().charAt(i)) * (13 - i);
                        }
                        // console.log(sum)
                        if ((11 - sum % 11) % 10 != parseFloat(PIDobj.val().charAt(12))) {

                            PIDobj.removeClass("is-valid").addClass("is-invalid");
                        } else {
                            PIDobj.removeClass("is-invalid").addClass("is-valid");

                        }
                    }
                });
                EmailObj.keyup(function() {
                    if (!validateEmail(EmailObj.val()) || $(this).val() == "") {
                        EmailObj.removeClass("is-valid").addClass("is-invalid");
                    } else {
                        EmailObj.removeClass("is-invalid").addClass("is-valid");
                    }
                });
                $('#province').change(function() {
                    $('#amphure').html('<option selected="selected" value="">เลือกอำเภอ</option>');
                    $('#amphure').val() == 0
                    $('#district').html('<option selected="selected"  value="">เลือกตำบล</option>');
                    // console.log($("#province").val())
                    // console.log($(this).children(":selected").attr("id"))
                    if ($("#province").val() == "") {
                        $("#province").removeClass("is-valid").addClass("is-invalid");
                        $("#amphure").prop('disabled', true);

                    } else {

                        $("#province").removeClass("is-invalid").addClass("is-valid");
                        $.ajax({
                            url: 'register.control.php',
                            method: 'POST',
                            data: {
                                province_id: $(this).children(":selected").attr("id")
                            },
                            success: function(result) {
                                var data = JSON.parse(result);
                                console.log(data)
                                $.each(data, function(index, item) {
                                    $('#amphure').append(
                                        $('<option></option>').val(item.name_th).html(item.name_th).attr('id', item.id)

                                    );
                                });

                            }
                        });
                        $("#amphure").prop('disabled', false);
                    }
                });
                $('#Finish').click(function() {

                    $('#footFinish').html("")
                    $.ajax({
                        url: 'register.control.php',
                        method: "POST",
                        data: {
                            Pid: $('#Pid').val(),
                            action: 2
                        },
                        success: function(data) {
                            $("#ShowQR").html(data)
                        }
                    });

                });
                $('#amphure').change(function() {
                    if ($('#amphure').val() == "" || $('#amphure').val() == "0") {
                        $('#district').html('<option selected="selected"  value="">เลือกตำบล</option>');

                        console.log($(this).children(":selected").attr("id"))
                        console.log($(this).children(":selected").attr("value"))
                    }
                    $("#district").prop('disabled', false)
                    $.ajax({
                        url: 'register.control.php',
                        method: "POST",
                        data: {
                            amphure_id: $(this).children(":selected").attr("id")
                        },
                        success: function(result) {
                            var data = JSON.parse(result);
                            $.each(data, function(index, item) {
                                $('#district').append(
                                    $('<option></option>').val(item.name_th).html(item.name_th).attr('id', item.id)

                                );
                            });
                            console.log(data)

                        }


                    });
                    // if($('#province').val()=="0"){

                    // }
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
                    <button type="button" id='Failed' class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id='Finish' data-dismiss="modal" class="btn btn-secondary">Close</button>
                </div>
            </div>
        </div>
    </div>

    </html>
<?php } else {
    header('Location: UserMenu');
} ?>
