<?php 
    require_once "connect.php";
    class manageEvent extends Dbh{
        public function getEvent(){
            $sql = 'select * from event' ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row ;
        }
        public function setField($field,$Event_ID){
            $test = "Field{$field}";
            $status = "No" ;
            // echo $test ;
            $sql = "UPDATE `event` SET {$test}  = '{$status}' WHERE Event_ID = ? " ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Event_ID]);
           
        }
        public function setField2($field,$Event_ID){
            $test = "Field{$field}";
            $status = "Yes" ;
            // echo $test ;
            $sql = "UPDATE `event` SET {$test}  = '{$status}' WHERE Event_ID = ? " ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Event_ID]);
           
        }
        public function EditField($field,$status,$Event_ID){
            $test = "Field{$field}";
        
        $sql = "UPDATE `event` SET {$test} = ? WHERE Event_ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status,$Event_ID]);
        

        }
    }
