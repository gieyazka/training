<?php
require_once "connect.php";
require_once "thailand.inc.php";
require_once "register.query.php";
if (isset($_POST['province_id'])) {
    $obj = new thailand;
    $amphure = $obj->getamphures($_POST['province_id']);
    echo json_encode($amphure);
}
if (isset($_POST['amphure_id'])) {

    $obj = new thailand;
    $district = $obj->getdistrict($_POST['amphure_id']);
    echo json_encode($district);
}
if (@$_POST['action'] == '1') {

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

    if (empty($Subject)) {
        $str .= "กรุณาเลือกกิจกรรม" . "<br>";
    }
    if (empty($_POST["Pid"])) {
        $str .= "กรุณากรอกรหัสบัตรประชาชน" . "<br>";
    } else {

        $Pid = test_input($_POST["Pid"]);
        if (!preg_match("/^[0-9]*$/", $Pid) || strlen($_POST['Pid']) != 13) {
            $str .= "รูปแบบรหัสบัตรประชาชนไม่ถูกต้อง" . "<br>";
        }
    }


    if (empty($_POST["Email"])) {
        $str .= "กรุณากรอก Email" . "<br>";
    } else {
        $Email = test_input($_POST["Email"]);
        // check if e-mail address is well-formed
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $str .= "รูปแบบ Email ไม่ถูกต้อง" . "<br>";
        }
    }
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
    if (empty($_POST["Zipcode"])) {
        $str .= "กรุณากรอกรหัสไปรษณีย์" . "<br>";
    } else {

        $Zipcode = test_input($_POST["Zipcode"]);
        if (!preg_match("/^[0-9]*$/", $Zipcode) || strlen($_POST['Zipcode']) != 5) {
            $str .= "กรุณารหัสไปรษณีย์ให้ถูกต้อง" . "<br>";
        }
    }

    if (empty($_POST["Birthdate"])) {
        $str .= "กรุณาเลือกวันเกิด" . "<br>";
    }
    if (empty($_POST["Province"])) {
        $str .= "กรุณาเลือกจังหวัด" . "<br>";
    }
    if (empty($_POST["district"])) {
        $str .= "กรุณาเลือกแขวง/ตำบล" . "<br>";
    }
    if (empty($_POST["amphure"])) {
        $str .= "กรุณาเลือกเขต/อำเภอ" . "<br>";
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
        $info ="" ;
        $Home = $Address . " " . $Amphure . " " . $district . " " . $Province . " " . $Zipcode;
        for($i = 0 ;$i<sizeof($_POST['info']);$i++){
            $info .= $_POST['info'][$i]." " ;
        }

        // print_r($_POST['info']);
        // echo $info;
        $obj = new register;
        $query = $obj->insertRegis($_POST['Pid'],$_POST['Email'],$_POST['Fname'],$_POST['Lname'],$_POST['EFname'],$_POST['ELname'],$_POST['Nickname'],$_POST['sex'],$_POST['Height'],$_POST['Birthdate'],$_POST['Age'],$Home,$_POST['School'],$_POST['Class'],$_POST['Foot'],$_POST['Tel'],$_POST['Parent_tel'],$_POST['salary'],$_POST['subject'],$_POST['club'],$_POST['Position'],$_POST['Field'],$_POST['Pname'],$info);
//    echo "({$_POST['Pid']}, {$_POST['Email']},{$_POST['Fname']},{$_POST['Lname']},{$_POST['EFname']},{$_POST['ELname']},
//        {$_POST['Nickname']},{$_POST['sex']},{$_POST['Height']},{$_POST['Birthdate']},{$_POST['Age']},{$Home},{$_POST['School']},{$_POST['Class']}
//        ,{$_POST['Foot']},{$_POST['Tel']},{$_POST['Parent_tel']},{$_POST['salary']},{$_POST['subject']},{$_POST['club']},{$_POST['Position']},{$_POST['Field']}
//        ,{$_POST['Pname']},{$info})";
  
        // echo $query;

    }
}
if (@$_POST['action'] == '2') {
    $Pid = $_POST['Pid'];
    $obj = new register;
    $checkmember = $obj->getMember($Pid);
    if (!$checkmember == TRUE) {
        $QRCode = $obj->GenQR($Pid);
        echo $QRCode . "<br><br>" . "กรุณานำ QR-CODE ไปสแกนเพื่อยืนยันตนหน้างาน";
    }
}
if (@$_POST['action'] == '3') {
    header('Content-Type: application/json');
    $obj = new register;
    $row = $obj->getField($_POST['Event_ID']);
    // print_r($row);
    $jsonobj = array(
        "Field1" => $row['Field1'],
        "Field2" => $row['Field2'],
        "Field3" => $row['Field3'],
        "Field4" => $row['Field4']
    );
    echo json_encode($jsonobj);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
