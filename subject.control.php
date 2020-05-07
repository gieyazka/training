<?php 
require_once "subject.query.php";
// print_r($_POST);
    if($_POST['action'] == '1'){
        $obj = new Event ;
        $CheckEvent = $obj ->CheckEvent($_POST['Event']);
        if($_POST['Event'] == ""){
            echo "กรุณากรอกชื่อกิจกรรม";
        }else if ($CheckEvent == true){
            echo "มีชื่อกิจกรรมนี้อยู่แล้ว";
        }else{ 
        $AddEvent = $obj->AddEvent($_POST['Event']);
        echo "เพิ่มกิจกรรมสำเร็จ";
        }
    }
?>