<?php
require_once "connect.php";

class Event extends Dbh
{
    public function AddEvent($EventName)
    {
        $sql = "INSERT INTO `event`(`Event_Name`) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$EventName]);
    }
    public function CheckEvent($EventName)
    {
        $sql = 'select * from event where Event_Name = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$EventName]);
        $Event = $stmt->fetchAll();
        if($Event){
        return true ;
        }else{
            return false ;
        }
    }
}
