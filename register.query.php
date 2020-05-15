<?php
require_once "connect.php";
class register extends Dbh
{
    public function insertRegis($Pid, $Email, $Fname, $Lname, $Birthdate, $Home, $School, $Class, $Foot, $Tel, $Parent_tel, $salary, $Subject)
    {
        $sql = "select * from member where Member_PID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Pid]);
        $row = $stmt->fetchAll();
        if (!$row) {
            $sql = 'INSERT INTO `member`(`Member_PID`, `Email`, `Firstname`, `Lastname`, `Birthdate`, `Address`, `School`, `Class`, `Foot`, `Tel`, `Parent_Tel`, `Salary`,`Subject`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Pid, $Email, $Fname, $Lname, $Birthdate, $Home, $School, $Class, $Foot, $Tel, $Parent_tel, $salary, $Subject]);
            return true;
        } else {
            echo "มีข้อมูลนี้อยู่ในระบบแล้ว";
        }
    }
    public function getEvent()
    {
        $sql = "select * from Event ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $Event = $stmt->fetchAll();
        return $Event;
    }
    public function getMember($Pid)
    {
        $sql = "select * from member where Member_PID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Pid]);
        $member = $stmt->fetchAll();
        if (!$member) {
            return true;
        }
    }
    public function GenQR($PID)
    {
        $encode = base64_encode("{$PID}&1");
        $host = stristr(stristr($_SERVER['REQUEST_URI'], strrchr($_SERVER['REQUEST_URI'], '/'), true), strrchr(stristr($_SERVER['REQUEST_URI'], strrchr($_SERVER['REQUEST_URI'], '/'), true), '/'), true);
        $link = 'https://' . $_SERVER['HTTP_HOST'] . $host . "/verify?verify='{$encode}'";
        $qr = 'http://api.qrserver.com/v1/create-qr-code/?data=' . $link . '&size=300x300'; //gen QR
        $code = '<center><img src="' . $qr . '"  </center>';
        return $code;
    }
}
