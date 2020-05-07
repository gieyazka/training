<?php
require_once "connect.php";
require_once "thailand.inc.php";
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
        $str .= "กรุณากรอกชื่อ" . "<br>";
    } else {
        $Fname = test_input($_POST["Fname"]);
        if (!preg_match("/^[a-zA-Zก-์ ะ-ู เ-แ ]*$/", $Fname)) {
            $str .= "กรุณากรอกชื่อให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Lname"])) {
        $str .= "กรุณากรอกนามสกุล" . "<br>";
    } else {
        $Lname = test_input($_POST["Lname"]);
        if (!preg_match("/^[a-zA-Zก-์ ะ-ู เ-แ ]*$/", $Lname)) {
            $str .= "กรุณากรอกนามสกุลให้ถูกต้อง" . "<br>";
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
    @$Subject = $_POST['subject'];
    @$Foot = $_POST['Foot'];
    @$district = $_POST['district'];
    @$Province = $_POST['Province'];
    @$Amphure = $_POST['amphure'];
    @$Birthdate = $_POST['Birthdate'];
    @$Tel = $_POST['Tel'];
    @$Parent_tel = $_POST['Parent_tel'];
    @$salary = $_POST['salary'];
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
    if (empty($_POST["Tel"])) {
        $str .= "กรุณากรอกเบอร์ศัพท์" . "<br>";
    }
    if (empty($_POST["Parent_tel"])) {
        $str .= "กรุณากรอกเบอร์โทรผู้ปกครอง" . "<br>";
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
        if (!preg_match("/^[0-9a-zA-Zก-์ ะ-ู เ-แ.\/ ]*$/", $School) ) {
            $str .= "กรุณาโรงเรียนให้ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST["Class"])) {
        $str .= "กรุณากรอกระดับชั้น" . "<br>";
    } else {
        $Class = test_input($_POST["Class"]);
        if (!preg_match("/^[0-9a-zA-Zก-์ ะ-ู เ-แ.\/ ]*$/", $Class) ) {
            $str .= "กรุณาระดับชั้นให้ถูกต้อง" . "<br>";
        }
    }
    echo $str;
    if($str == ""){
        require_once "register.query.php";
        $Home = $Address." ".$Amphure." ".$district." ".$Province." ".$Zipcode ;
        $obj = new register;
        $query = $obj->insertRegis($Pid,$Email,$Fname,$Lname,$Birthdate,$Home,$School,$Class,$Foot,$Tel,$Parent_tel,$salary,$Subject);
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
