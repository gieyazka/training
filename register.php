<?php
require_once "connect.php";
require_once "thailand.inc.php";
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
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-futbol"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link">
                                        <i class="fas fa-futbol fa-circle nav-icon"></i>

                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index2.html" class="nav-link">
                                        <i class="fas fa-male fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
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
                            <h1>General Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">

                                    <select class='test font se ' id="cars">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="รหัสบัตรประชาชน">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control col-6" placeholder="ชื่อ">
                                            <input type="text" class="form-control col-6" placeholder="นามสกุล">
                                        </div>



                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">

                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                                        <textarea class="form-control " rows="3" placeholder="ที่อยู่"></textarea>
                                                    </div>
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                                        <input type="text" class="form-control " placeholder="รหัสไปรษณีย์">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <select id='province' class="form-control select2 col-12" style="width: 100%;">
                                                    <option value="0" selected="selected">เลือกจังหวัด</option>
                                                    <?php
                                                    $obj = new thailand;
                                                    $provinces = $obj->getprovince();
                                                    // print_r($provinces[0]["name_th"]);
                                                    for ($i = 0; $i < sizeof($provinces); $i++) {
                                                        echo  "<option id='{$provinces[$i]["id"]}' value='{$provinces[$i]["name_th"]}'>{$provinces[$i]["name_th"]}</option> ";
                                                    }
                                                    //// search select
                                                    ?>
                                                </select>
                                                <select id='amphure' class="form-control select2 col-12" disabled style="width: 100%;">
                                                    <option value="0" selected="selected">เลือกเขต/อำเภอ</option>

                                                </select>
                                                <select id='district' class="form-control select2 col-12" disabled style="width: 100%;">
                                                    <option selected="selected">เลือกแขวง/ตำบล</option>
                                                
                                                </select>



                                            </div>
                                        </div>





                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->




                            </form>
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
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
            $('#province').change(function() {
                // console.log($("#province").val())
                // console.log($(this).children(":selected").attr("id"))
                if ($("#province").val() == "0") {
                    $('#amphure').html('<option selected="selected" value="">เลือกอำเภอ</option>');
                    $('#amphure').val() == 0
                    $('#district').html('<option selected="selected"  value="">เลือกตำบล</option>');
                    $("#amphure").prop('disabled', true);

                } else {
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
                                    $('<option></option>').val(item.name_th).html(item.name_th).attr('id',item.id)

                                );
                            });
                            
                        }
                    });
                    $("#amphure").prop('disabled', false);
                }
            });
            $('#amphure').change(function() {
                $('#district').html('<option selected="selected"  value="">เลือกตำบล</option>');
                $("#district").prop('disabled', false)
                console.log($(this).children(":selected").attr("id"))
                console.log($(this).children(":selected").attr("value"))
                $.ajax({
                    url: 'register.control.php',
                    method: "POST", 
                    data : {
                        amphure_id : $(this).children(":selected").attr("id")
                    },success: function(result){
                        var data = JSON.parse(result);
                        $.each(data, function(index, item) {
                        $('#district').append(
                                    $('<option></option>').val(item.name_th).html(item.name_th).attr('id',item.id)

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

</html>