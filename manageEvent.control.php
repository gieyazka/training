<?php 
require_once "manageEvent.query.php";

if($_POST['action']=='1' &&   @$_POST['Event'] != ""){
print_r($_POST);
$obj = new manageEvent;
$edit = $obj->EditField($_POST['Field'],$_POST['Status'],$_POST['Event']);

}
if($_POST['action'] == '2'){
    // print_r($_POST);
    $obj = new manageEvent;
    $row = $obj->setField($_POST['Field_ID'],$_POST['Event_ID']);
   

}
if($_POST['action'] == '3'){
    // print_r($_POST);
    $obj = new manageEvent;
    $row = $obj->setField2($_POST['Field_ID'],$_POST['Event_ID']);
   

}
?>