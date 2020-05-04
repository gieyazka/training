<?php
require_once "connect.php";
    class thailand extends Dbh{
        public function getprovince(){
            $sql = "select * from provinces";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $provinces = $stmt->fetchAll();
            return $provinces ;
        }

        public function getamphures($province_id){
            $sql = "select * from amphures where province_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$province_id]);
            $amphures = $stmt->fetchAll();
            return $amphures ;
        }
        public function getdistrict($amphure_id){
            $sql = "select * from districts where amphure_id = ?" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute([$amphure_id]);
            $distrcts = $stmt->fetchAll();
            return $distrcts ;
        }
    }
