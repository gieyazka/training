<?php 
session_start();
if ($_SESSION['Status'] == 'Admin') {
    require_once "Keep.query.php";
    if($_POST['action'] == "1"){
       
        $obj = new Keep;
       
        $excute = $obj->KeepEvent($_POST['Event_Name'],$_POST['Count']);
    }
}
