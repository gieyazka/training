<?php
require_once "checkmember.query.php";
require_once "register.query.php" ;
if ($_POST['action'] == '1' && $_POST['Pid'] != "") {
    $obj = new Member();
    $Member = $obj->getMember($_POST['Pid']);
    // print_r($Member);

    // if ($Member[0]['Member_PID'] == $_POST['Pid']) {
    if (@$Member['Member_PID'] != "") {

?>
        <div class="card card-teal" id='CheckMember'>
            <div class="card-header">
                <h3 class="card-title">ค้นหาข้อมูล</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
            <table class="table " style="text-align: center;">
            <tr style="text-align: center;">
                      <th>QR-CODE</th>
                      <th><?php $obj = new register;
                        $QRCode = $obj->GenQR($Member["Member_PID"]) ; echo $QRCode ; ?></th>
                    </tr>
                    <tr  >
                      <th>เลขบัตรประชาชน</th>
                      <th><?php echo $Member['Member_PID'] ; ?></th>
                    </tr>
                    <tr  >
                      <th>อีเมลล์</th>
                      <th><?php echo $Member['Email'] ; ?></th>
                    </tr>
                    <tr  >
                      <th>ชื่อ</th>
                      <th><?php echo $Member['Firstname']." ".$Member['Lastname'] ; ?></th>
                    </tr>
             
                  
                 
                 
                </table>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    <?php
    } else { ?>
        <div class="card card-teal" id='CheckMember'>
            <div class="card-header">
                <h3 class="card-title">ค้นหาข้อมูล</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
          <div class="card-body" style="text-align: center;">
               ไม่พบข้อมูล 
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
<?php

    }
}
?>