<?php 
    require_once "connect.php";
    class Keep extends Dbh{
        public function GetEvent(){
            $sql = "SELECT event.Event_Name , count(member.Subject) as count 
            FROM event Left JOIN member ON event.Event_Name = member.Subject GROUP BY event.Event_Name 
            ORDER BY count DESC" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        public function KeepEvent($Event_Name,$Count){
            $sql = "INSERT INTO passevent(Event_Name,Count) VALUES (?,?) " ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt -> execute([$Event_Name,$Count]);
            $sql = "DELETE FROM  member where Subject = ?" ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt -> execute([$Event_Name]);
            $sql = "DELETE FROM  event where Event_Name = ?" ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt -> execute([$Event_Name]);

        }
    }

?>