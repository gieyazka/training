<?php 
require_once "connect.php";
@session_start();
if($_SESSION['Status'] == 'Admin'){
class Employee extends Dbh{
    public function GetEmployee(){
        $sql = "select * from user where Status = 'Employee'";
        $stmt = $this->connect()->prepare($sql);
        $stmt -> execute();
        $data = $stmt->fetchAll();
        return $data ;
    }
    public function InsertEmployee($Username,$Password,$Fname,$Lname,$Tel,$Email){
        $newpass = md5($Password);
        $sql = "select * from user where Username = ? or Email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Username,$Email]);
        $row = $stmt->fetchAll();
        if (!$row) {
        $sql ="INSERT INTO `user`(`Username`, `Password`, `Firstname`, `Lastname`, `Tel`, `Email`, `Status`) 
        VALUES (?,?,?,?,?,?,'Employee') " ;
        $stmt = $this->connect()->prepare($sql);
       return $stmt->execute([$Username,$newpass,$Fname,$Lname,$Tel,$Email]);
        
        }else{
            echo "มี Username หรือ Email  นี่แล้ว" ;
        }
    }
}
}
?>