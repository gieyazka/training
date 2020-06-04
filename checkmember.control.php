<?php
require_once "checkmember.query.php";
require_once "register.query.php";
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
                            $QRCode = $obj->GenQR($Member["Member_PID"]);
                            echo $QRCode; ?></th>
                    </tr>
                    <tr>
                        <th>เลขบัตรประชาชน</th>
                        <th><?php echo $Member['Member_PID']; ?></th>
                    </tr>
                    <tr>
                        <th>อีเมลล์</th>
                        <th><?php echo $Member['Email']; ?></th>
                    </tr>
                    <tr>
                        <th>ชื่อ</th>
                        <th><?php echo $Member['Firstname'] . " " . $Member['Lastname']; ?></th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <button type="text" data-toggle="modal" data-target="#modal-xl" id='SendData' style="width:100%" class="btn navbar-teal">แก้ไขข้อมูล</button>

                        </th>
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
if($_POST['action'] == '2'){
    header('Content-Type: application/json');
 
    // print_r($row);
   
    
    $obj = new Member();
    $Member = $obj->getMember($_POST['Pid']);
   
    $row = $obj->getField($Member['Subject']);
    // echo $Member['Subject'] ;
    // print_r($Member);
    // print_r($row);
    $data = array("Address" => $Member['Address'],"Pid" => $Member['Member_PID'],
    "Email" => $Member['Email'],"Firstname" => $Member['Firstname'],"Lastname" => $Member['Lastname'],
    "Firstname_EN" => $Member['Firstname_EN'],"Lastname_EN" => $Member['Lastname_EN'],"Nickname" => $Member['Nickname'],
    "Sex" => $Member['Sex'],"Height" => $Member['Height'],"Birthdate" => $Member['Birthdate'],"Age" => $Member['Age'],
    "School" => $Member['School'],"Class" => $Member['Class'],"Foot" => $Member['Foot'],"Tel" => $Member['Tel'],"Parent_Tel" => $Member['Parent_Tel'],
    "Salary" => $Member['Salary'], "Club" => $Member['Club'], "Position" => $Member['Position'], "Field" => $Member['Field'],"Pname" => $Member['Pname'],
    "Subject" => $Member['Subject'], "Field1" => $row['Field1'],"Field2" => $row['Field2'], "Field3" => $row['Field3'], "Field4" => $row['Field4']
);
echo json_encode($data);
}
if($_POST['action'] == '3'){
    
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $str = "";
    @$Subject = $_POST['subject'];
    @$Foot = $_POST['Foot'];
    @$district = $_POST['district'];
    @$Province = $_POST['Province'];
    @$Amphure = $_POST['amphure'];
    @$Birthdate = $_POST['Birthdate'];
    @$Tel = $_POST['Tel'];
    @$Parent_tel = $_POST['Parent_tel'];
    @$salary = $_POST['salary'];
    if (empty($_POST["Fname"])) {
        $str .= "กรุณากรอกชื่อภาษาไทย" . "<br>";
    } else {
        $Fname = test_input($_POST["Fname"]);
        if (!preg_match("/^[ก-์ ะ-ู เ-แ ]*$/", $Fname)) {
            $str .= "กรุณากรอกชื่อให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Age"])) {
        $str .= "กรุณากรอกอายุ" . "<br>";
    } else {
        $Age = test_input($_POST["Age"]);
        if (!preg_match("/^[0-9]*$/", $Age)) {
            $str .= "กรุณากรอกอายุให้ถูกต้อง" . "<br>";
        }
    }

    if (empty($_POST["Height"])) {
        $str .= "กรุณากรอกส่วนสูง" . "<br>";
    } else {
        $Height = test_input($_POST["Height"]);
        if (!preg_match("/^[0-9]*$/", $Height)) {
            $str .= "กรุณากรอกส่วนสูงให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["EFname"])) {
        $str .= "กรุณากรอกชื่อภาษาอังกฤษ" . "<br>";
    } else {
        $EFname = test_input($_POST["EFname"]);
        if (!preg_match("/^[a-zA-Z]*$/", $EFname)) {
            $str .= "กรุณากรอกชื่อภาษาอังกฤษให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Lname"])) {
        $str .= "กรุณากรอกนามสกุลภาษาไทย" . "<br>";
    } else {
        $Lname = test_input($_POST["Lname"]);
        if (!preg_match("/^[a-zA-Zก-์ ะ-ู เ-แ ]*$/", $Lname)) {
            $str .= "กรุณากรอกนามสกุลภาษาไทยให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Pname"])) {
        $str .= "กรุณากรอกชื่อผู้ปกครอง" . "<br>";
    } else {
        $Pname = test_input($_POST["Pname"]);
        if (!preg_match("/^[a-zA-Zก-์ ะ-ู เ-แ ]*$/", $Pname)) {
            $str .= "กรุณากรอกชื่อผู้ปกครองให้ถูกต้อง" . "<br>";
        }
    }

    if (empty($_POST["Position"])) {
        $str .= "กรุณากรอกตำแหน่งที่ถนัด" . "<br>";
    } else {
        $Position = test_input($_POST["Position"]);
        if (!preg_match("/^[a-zA-Zก-์ ะ-ู เ-แ -]*$/", $Position)) {
            $str .= "กรุณากรอกตำแหน่งให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Nickname"])) {
        $str .= "กรุณากรอกชื่อเล่น" . "<br>";
    } else {
        $Nickname = test_input($_POST["Nickname"]);
        if (!preg_match("/^[a-zA-Zก-์ ะ-ู เ-แ ]*$/", $Nickname)) {
            $str .= "กรุณากรอกชื่อเล่นให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["ELname"])) {
        $str .= "กรุณากรอกนามสกุลภาษาอังกฤษ" . "<br>";
    } else {
        $ELname = test_input($_POST["ELname"]);
        if (!preg_match("/^[a-zA-Z]*$/", $ELname)) {
            $str .= "กรุณากรอกนามสกุลภาษาอังกฤษให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Address"])) {
        $str .= "กรุณากรอกที่อยู่" . "<br>";
    } else {
        $Address = test_input($_POST["Address"]);
        if (!preg_match("/^[0-9a-zA-Zก-์ ะ-ู เ-แ.\/ ]*$/", $Address)) {
            $str .= "กรุณากรอกที่อยู่ให้ถูกต้อง" . "<br>";
        }
    }
   

    if (empty($_POST["Birthdate"])) {
        $str .= "กรุณาเลือกวันเกิด" . "<br>";
    }


 
    if (empty($_POST["Foot"])) {
        $str .= "กรุณาเลือกเท้าที่ถนัด" . "<br>";
    }
    if (empty($_POST["Field"])) {
        $str .= "กรุณาเลือกสนาม" . "<br>";
    }
    if (empty($_POST["Tel"])) {
        $str .= "กรุณากรอกเบอร์โทรศัพท์" . "<br>";
    } else {
        $Tel = test_input($_POST["Tel"]);
        if (!preg_match("/^[0-9]*$/", $Tel) || strlen($Tel) != 10) {
            $str .= "กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Parent_tel"])) {
        $str .= "กรุณากรอกเบอร์โทรผู้ปกครอง" . "<br>";
    } else {
        $Parent_tel = test_input($_POST["Parent_tel"]);
        if (!preg_match("/^[0-9]*$/", $Parent_tel) || strlen($Parent_tel) != 10) {
            $str .= "กรุณากรอกเบอร์โทรศัพท์ผู้ปกครองให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["salary"])) {
        $str .= "กรุณากรอกรายได้ครอบครัว" . "<br>";
    }
    $School = $_POST['School'];
    $Class = $_POST['Class'];
    if (empty($_POST["School"])) {
        $str .= "กรุณากรอกโรงเรียน" . "<br>";
    } else {
        $School = test_input($_POST["School"]);
        if (!preg_match("/^[0-9a-zA-Zก-์ ะ-ู เ-แ.\/ ]*$/", $School)) {
            $str .= "กรุณาโรงเรียนให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Class"])) {
        $str .= "กรุณากรอกระดับชั้น" . "<br>";
    } else {
        $Class = test_input($_POST["Class"]);
        if (!preg_match("/^[0-9a-zA-Zก-์ ะ-ู เ-แ.\/ ]*$/", $Class)) {
            $str .= "กรุณาระดับชั้นให้ถูกต้อง" . "<br>";
        }
    }
    echo $str;
    if ($str == "") {     
     
        // print_r($_POST['info']);
        // echo $info;
        $obj = new Member;
    //  print_r($_POST);
        $query = $obj->editMember($_POST['Pid'], $_POST['Fname'], $_POST['Lname'], $_POST['EFname'], $_POST['ELname'], $_POST['Nickname'], $_POST['sex'], $_POST['Height'], $_POST['Birthdate'], $_POST['Age'], $_POST['Address'], $_POST['School'], $_POST['Class'], $_POST['Foot'], $_POST['Tel'], $_POST['Parent_tel'], $_POST['salary'], $_POST['club'], $_POST['Position'], $_POST['Field'], $_POST['Pname']);
        
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>