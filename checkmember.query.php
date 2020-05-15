<?php 
    require_once "connect.php";
    require_once "register.query.php" ; 
    class Member extends Dbh {
        public function getMember($Pid){
            $sql = "select * from member where Member_PID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Pid]);
            $Member = $stmt->fetch();
            return $Member;
        }
    }
?>