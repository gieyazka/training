<?php 
    require_once "connect.php" ;
    class login extends Dbh{
        public function checklogin($usernaem,$password){
            $sql = "select * from user where Username = ? and Password = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute([$usernaem,md5($password)]);
            $data = $stmt->fetch();
            return $data ;
        }
    }
?>