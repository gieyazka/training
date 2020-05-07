<?php 
require_once "connect.php";
    class register extends Dbh{
        public function insertRegis($Pid,$Email,$Fname,$Lname,$Birthdate,$Home,$School,$Class,$Foot,$Tel,$Parent_tel,$salary,$Subject){
            $sql = 'INSERT INTO `member`(`Member_PID`, `Email`, `Firstname`, `Lastname`, `Birthdate`, `Address`, `School`, `Class`, `Foot`, `Tel`, `Parent_Tel`, `Salary`,`Subject`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)' ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Pid,$Email,$Fname,$Lname,$Birthdate,$Home,$School,$Class,$Foot,$Tel,$Parent_tel,$salary,$Subject]);
        }
        public function getEvent(){
            $sql = "select * from Event ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $Event = $stmt->fetchAll();
            return $Event ;
        }
    }

?>