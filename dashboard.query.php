<?php
    require_once "connect.php";
    class dashboard extends Dbh{
        public function getPastRegis(){
            $sql = "select count(*) as count from allmember " ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt->execute([]);
            $row = $stmt->fetch();
            return $row ;
        }
        public function getRegis(){
            $sql = "select count(*) as count from member " ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt->execute([]);
            $row = $stmt->fetch();
            return $row ;
        }
        public function getEvent(){
            $sql = "select count(*) as count from event " ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt->execute([]);
            $row = $stmt->fetch();
            return $row ;
        }
        public function getPastEvent(){
            $sql = "select count(*) as count from passevent " ;
            $stmt = $this->connect()->prepare($sql) ;
            $stmt->execute([]);
            $row = $stmt->fetch();
            return $row ;
        }
    }
    ?>
