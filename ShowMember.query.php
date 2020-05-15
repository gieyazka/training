<?php 
    require_once "connect.php";
    class ShowMember extends Dbh{
        public function getEventName(){
            $sql = "Select * from event";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute();
            $EventName = $stmt->fetchAll();
            return $EventName ;
        }
        public function getEventData($EventName){
            $sql = "select * from member where subject = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute([$EventName]);
            $Data = $stmt->fetchAll();
            return $Data ;
        }
        public function VerifyUser($Pid)
        {
           $sql = "UPDATE `member` SET `Active`= 'Yes' WHERE `Member_PID` = ?" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute([$Pid]);
            return $stmt ;
        }
        public function EventCount($EventName){
            $sql = "select count(*) as count from member where subject = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute([$EventName]);
            $Data = $stmt->fetchAll();
            return $Data ;
        }
    }

?>