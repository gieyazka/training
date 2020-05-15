<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<?php

require_once 'ShowMember.query.php';
if ($_POST['action']  == '2' && isset($_POST["Pid"])) {
    $verify = new ShowMember;
    $query = $verify->VerifyUser($_POST['Pid']);
}
if (@$_POST['action'] == '1') {
    echo "<input type='hidden' id='hidden' value='{$_POST['EventName']}'>";
    // print_r($_POST);
    $Obj = new ShowMember;
    $Member = $Obj->getEventData($_POST['EventName']);
    // print_r($Member);
    echo "<table id='example1' class='table table-bordered table-hover'>";

    echo "   <thead>
    <tr>
        <th>หมายเลขบัตรประชาชน</th>
        <th>ชื่อ - นามสกุล</th>
        <th>วันเกิด</th>
        <th>ที่อยู่</th>
        <th>โรงเรียน</th>
        <th>ยืนยันตัว</th>
        
    </tr>
</thead><tbody id =''>";
    for ($i = 0; $i < sizeof($Member); $i++) {

        echo "<tr><th>{$Member[$i]['Member_PID']}</th>
        <th>{$Member[$i]['Firstname']} {$Member[$i]['Lastname']}</th>
        <th>{$Member[$i]['Birthdate']}</th><th>{$Member[$i]['Address']}</th>
        <th>{$Member[$i]['School']}</th> ";
        if ($Member[$i]['Active'] == 'No') {
            echo "<th><input type='button' class ='btn btn-warning swalDefaultSuccess varify_user'name='' value ='ยังไม้่ได้ยืนยันตัว' id='{$Member[$i]['Member_PID']}'></th>";
        } else if ($Member[$i]['Active'] == 'Yes') {
            echo "<th><input type='button' class ='btn btn-success'name='' value ='ยืนยันตัวแล้ว' '></th>";
        }
        // echo "<th><input type='button' class ='btn btn-info'name='' value ='แก้ไขข้อมูล' id=''></th></tr>";
    }
    echo " </tbody><tfoot>
        <tr>
            <th>หมายเลขบัตรประชาชน</th>
            <th>ชื่อ - นามสกุล</th>
            <th>วันเกิด</th>
            <th>ที่อยู่</th>
            <th>โรงเรียน</th>
            <th>ยืนยันตัว</th>
            
            
        </tr>
    </tfoot>";
}

?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript">
    $(function() {

    });
</script>
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
        const Toast = Swal.mixin({
            showConfirmButton: false,
            timer: 2000
        });

      
        $('.varify_user').each(function() {
            $(this).click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'ยืนยันตัวผู้เข้าร่วมงานสำเร็จ'
                })

                $.ajax({
                    url: 'ShowMember.control.php',
                    method: "POST",
                    data: {
                        EventName: $('#hidden').val(),
                        action: 2,
                        Pid: $(this).attr("id")
                    },
                    success: function(result) {


                    }

                })
                // console.log($(this).attr("id"));
                $(this).removeClass("btn-warning").addClass("btn-success")
                $(this).val("ยืนยันตัวแล้ว")
            });

        });
    });
</script>