<?php
session_start();
require_once "Employee.query.php";
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

  <body class="hold-transition sidebar-mini">

    <div class="card card-teal">

      <div class="card-header" style="text-align: center">
        ข้อมูลพนักงาน
      </div>
      <!-- /.card-header -->
      <div class="card-body " id='Showtable'>
        <a class="btn btn-app col-12 " data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-users"></i> เพิ่มพนักงาน
        </a>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Tel</th>

            </tr>
          </thead>
          <?php
          $obj = new Employee;
          $row = $obj->GetEmployee();
          ?>
          <tbody>

            <?php
            for ($i = 0; $i < sizeof($row); $i++) {
              echo '<tr>';
              echo "<td>{$row[$i]['Username']}</td>";
              echo "<td>{$row[$i]['Firstname']} {$row[$i]['Lastname']}</td>";
              echo "<td>{$row[$i]['Email']}</td>";
              echo "<td>{$row[$i]['Tel']}</td>";
            }
            ?>



            </tr>

          </tbody>
          <tfoot>
            <tr>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Tel</th>
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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function() {

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
  </body>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มพนักงาน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frmdata">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" class="Name form-control" id="Email" name='Email' data-validation="email" placeholder="Email">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="Username form-control" id="Username" name='Username' data-validation="email" placeholder="Username">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" class="Username form-control" id="Password" name='Password' data-validation="email" placeholder="Password">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-signature"></i></span>
              </div>
              <input type="text" id='Name' name='Fname' class="Name form-control col6" data-validation="required" placeholder="ชื่อ">
              <input type="text" id='Name' name='Lname' class="Name form-control col-6" data-validation="required" placeholder="นามสกุล">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>

              <input type="text" id='Tel' name='Tel' class="form-control " placeholder="เบอร์โทร">
            </div>
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id='submit' data-dismiss="modal" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      const Toast = Swal.mixin({
        showConfirmButton: false,
        timer: 2000,

      });

      function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
      }


      var EmailObj = $('#Email');
      var NameObj = $('.Name')
      var TelObj = $('#Tel')
      $('.Username').each(function() {
        $(this).keyup(function() {
          var str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^0123456789"
          var val = $(this).val()
          var valOK = true;

          for (i = 0; i < val.length & valOK; i++) {
            valOK = (str.indexOf(val.charAt(i)) != -1)
          }

          if (!valOK || $(this).val() == '' || $(this).val() == "null" || $(this).val().length < 8) {
            $(this).removeClass("is-valid").addClass("is-invalid");
          } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
          }

        })
      })
      TelObj.keyup(function() {
        if (TelObj.val().length != 10) {
          TelObj.removeClass("is-valid").addClass("is-invalid");
        } else {
          TelObj.removeClass("is-invalid").addClass("is-valid");
        }
      });

      NameObj.each(function() {
        $(this).keyup(function() {
          if ($(this).val() == '' || $(this).val() == "null") {
            $(this).removeClass("is-valid").addClass("is-invalid");
          } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
          }
        });
      });
      EmailObj.keyup(function() {
        if (!validateEmail(EmailObj.val()) || $(this).val() == "") {
          EmailObj.removeClass("is-valid").addClass("is-invalid");
        } else {
          EmailObj.removeClass("is-invalid").addClass("is-valid");
        }
      });
      $('#submit').click(function() {
        $.ajax({
          url: "Employee.control.php",
          method: "POST",
          data: $('#frmdata').serialize() + "&action=1",
          success: function(result) {
            
            if (result == 'true') {
              Toast.fire({
                icon: 'success',
                title: 'เพิ่มข้อมูลพนักงานสำเร็จ',

              })
              setTimeout("location.href = 'index?re=1';", 2100);
            } else {
              Toast.fire({
                icon: 'error',
                title: 'เพิ่มข้อมูลพนักงานไม่สำเร็จ',
                html:  result 
              })
            }
          }

        })
      })
    })
  </script>
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>

  </html>
<?php  } ?>