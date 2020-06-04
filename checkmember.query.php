<?php 
    require_once "connect.php";
   
    class Member extends Dbh {
        public function getMember($Pid){
            $sql = "select * from member where Member_PID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Pid]);
            $Member = $stmt->fetch();
            return $Member;
        }
        public function getField($Event_Name)
    {
        $sql = "select * from event where Event_Name = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Event_Name]);
        $Event = $stmt->fetch();
        return $Event;
    }
        public function editMember($Pid,$Fname,$Lname,$EFname,$ELname,$Nickname,$sex, $Height, $Birthdate, $Age, $Address, $School, $Class, $Foot, $Tel, $Parent_tel, $salary, $club, $Position, $Field, $Pname){
            $sql = "
            UPDATE `member` SET `Firstname`= ?,`Lastname`= ?,`Firstname_EN`=?,`Lastname_EN`=?,`Nickname`=?,`Sex`=?,`Height`=?,
            `Birthdate`=?,`Age`=?,`Address`=?,`School`=?,`Class`=?,`Foot`=?,`Tel`=?,`Parent_Tel`=?,`Salary`=?
            ,`Club`=?,`Position`=?,`Field`=?,`Pname`=?  WHERE Member_PID = ?
            ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Fname,$Lname,$EFname,$ELname,$Nickname,$sex, $Height, $Birthdate, $Age, $Address, $School, $Class, $Foot, $Tel, $Parent_tel, $salary, $club, $Position, $Field, $Pname,$Pid]) ;
        }
    }
?>