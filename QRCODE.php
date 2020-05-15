<?php


$host = stristr(stristr($_SERVER['REQUEST_URI'] , strrchr($_SERVER['REQUEST_URI'] ,'/'), true), strrchr(stristr($_SERVER['REQUEST_URI'] , strrchr($_SERVER['REQUEST_URI'] ,'/'), true) ,'/'), true);
$link = 'https://'.$_SERVER['HTTP_HOST'].$host."/?test='TEST'" ;
$qr = 'http://api.qrserver.com/v1/create-qr-code/?data='.$link.'&size=150x150'; //gen QR
$code = '<center><img src="'.$qr.'"  </center>';
echo $code;
?>