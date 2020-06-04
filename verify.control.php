<?php
require_once 'connect.php';
class verify extends Dbh{
    public function VerifyUser($Pid){
        $sql = "select * from member where Member_PID = ?" ;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Pid]) ;
        $row = $stmt->fetch();
        return $row ;
    }
    public function UpdateUser($Pid){
        $sql = "UPDATE `member` SET `Active`= 'Yes' WHERE Member_PID = ?" ;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Pid]) ;
    }
}
if($_POST['action'] == '1'){
    $obj = new verify;
    $update = $obj->UpdateUser($_POST['Pid']);
}
?>