<?php
session_start();

    if(isset($_GET['verify']) && isset($_SESSION['Status'])){
       
        $decode = base64_decode($_GET['verify']);

        $PID = substr($decode,0,strpos($decode,'&'));
        $action = substr($decode,strpos($decode,'&')+1);
        if($action == '1'){
           echo 'aaaaa' ;
        }
        
    }
