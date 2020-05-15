<?php
require_once "Employee.query.php";
// print_r($_POST);
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_POST['action'] == '1') {
    $str = "";
    if (empty($_POST["Email"])) {
        $str .= "กรุณากรอก Email" . "<br>";
    } else {
        $Email = test_input($_POST["Email"]);
        // check if e-mail address is well-formed
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $str .= "รูปแบบ Email ไม่ถูกต้อง" . "<br>";
        }
    }
    if (empty($_POST['Username'])) {
        $str .= "กรุณากรอก Username" . "<br>";
    } else  if (strlen($_POST['Username']) < 8) {
        $str .=  "Username ต้องมีมากกว่า 8 ตัว" . "<br>";
    }
    if (empty($_POST['Password'])) {
        $str .= "กรุณากรอก Password" . "<br>";
    } else if (strlen($_POST['Password']) < 8) {
        $str .=  "Password ต้องมีมากกว่า 8 ตัว" . "<br>";
    }
    if (empty($_POST['Fname'])) {
        $str .= "กรุณากรอกชื่อ" . "<br>";
    }
    if (empty($_POST['Lname'])) {
        $str .= "กรุณากรอกนามกสกุล" . "<br>";
    }
    if (empty($_POST['Tel'])) {
        $str .= "กรุณากรอกเบอร์โทรศัพท์" . "<br>";
    }


    if ($str == "") {
        $Obj = new Employee;
        $AddEm = $Obj->InsertEmployee($_POST['Username'], $_POST['Password'], $_POST['Fname'], $_POST['Lname'], $_POST['Tel'], $_POST['Email']);
        echo var_export($AddEm, TRUE);
    } else {
        echo $str;
    }
}
