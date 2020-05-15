<?php 
   require_once "login.query.php";
   session_start();
//    session_destroy();
   if(isset($_POST['username']) && isset($_POST['password']) && $_POST['action'] == '1'){
    $obj = new login();
    $user = $obj->checklogin($_POST['username'],$_POST['password']);

    if($user){
        // print_r($user);
        echo $user['Firstname'];
        $_SESSION['Username'] = $user['Username'];
        $_SESSION['Firstname'] = $user['Firstname'];
       $_SESSION['Status'] = $user['Status'];
    }
   }
