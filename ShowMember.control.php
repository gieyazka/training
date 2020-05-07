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
<?php

require_once 'ShowMember.query.php';
if (@$_POST['action'] == '1') {
    // print_r($_POST);
    $Obj = new ShowMember;
    $Member = $Obj->getEventData($_POST['EventName']);
    // print_r($Member);
    echo "<table id='example1' class='table table-bordered table-striped'>";

    echo "   <thead>
    <tr>
        <th>หมายเลขบัตรประชาชน</th>
        <th>ชื่อ - นามสกุล</th>
        <th>วันเกิด</th>
        <th>ที่อยู่</th>
        <th>โรงเรียน</th>
        <th>ยืนยันตัว</th>
        <th>แก้ไขข้อมูล</th>
    </tr>
</thead>";
    for ($i = 0; $i < sizeof($Member); $i++) {

        echo "<tr><th>{$Member[$i]['Member_PID']}</th>
        <th>{$Member[$i]['Firstname']} {$Member[$i]['Lastname']}</th>
        <th>{$Member[$i]['Birthdate']}</th><th>{$Member[$i]['Address']}</th>
        <th>{$Member[$i]['School']}</th>
        <th><input type='button' class ='btn btn-success'name='' value ='ยืนยันตัว' id=''></th>
        <th><input type='button' class ='btn btn-info'name='' value ='แก้ไขข้อมูล' id=''></th></tr>";
    }
    echo " <tfoot>
        <tr>
            <th>หมายเลขบัตรประชาชน</th>
            <th>ชื่อ - นามสกุล</th>
            <th>วันเกิด</th>
            <th>ที่อยู่</th>
            <th>โรงเรียน</th>
            <th>ยืนยันตัว</th>
            <th>แก้ไขข้อมูล</th>
            
        </tr>
    </tfoot>";
}
?>
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