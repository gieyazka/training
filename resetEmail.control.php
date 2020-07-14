<?php 
require_once 'connect.php';
class resetPassword extends Dbh {
    public function rePass($pass,$Email){
        $sql = "UPDATE `user` SET `Password`= ? WHERE Email = ?" ;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([md5($pass),$Email]) ;
    }
}
if($_POST['action'] == '1'){
    if(strlen($_POST['Password'])<8) {
        echo "รหัสผ่านต้องมี 8 ตัวขึ้นไป" ;
    }else{
    $obj = new resetPassword;
    $reset = $obj->rePass($_POST['Password'],$_POST['Email']);
    }
}

?>