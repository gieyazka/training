<?php
require_once "thailand.inc.php";
    if(isset( $_POST['province_id'])){
        $obj = new thailand;
        $amphure = $obj -> getamphures($_POST['province_id']);
        echo json_encode($amphure);
    }
    if(isset($_POST['amphure_id'])){
 
        $obj = new thailand;
        $district = $obj -> getdistrict($_POST['amphure_id']);
        echo json_encode($district);
        
    }
    
?>

