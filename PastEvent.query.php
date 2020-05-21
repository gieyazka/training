<?php 
    require_once "connect.php";
    class PastEvent extends Dbh{
        public function getEvent(){
            $sql = "select * from passevent";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row ;
        }
        public function getData($Event_Name){
            $sql = "select * from allmember where Subject = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Event_Name]);
            $row = $stmt->fetchAll();
            return $row ;
        }
    }
