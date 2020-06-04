<?php
require_once "connect.php";
    class thailand extends Dbh{
        public function getprovince(){
            $sql = "select * from province ORDER BY PROVINCE_NAME ASC";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $provinces = $stmt->fetchAll();
            return $provinces ;
        }

        public function getamphures($province_id){
            $sql = "select * from amphur where province_id =  ? ORDER BY AMPHUR_NAME ASC  ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$province_id]);
            $amphures = $stmt->fetchAll();
            return $amphures ;
        }
        public function getZipcode($Zipcode){
            $sql = "select * from amphur where AMPHUR_ID = ?  ORDER BY AMPHUR_NAME ASC ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Zipcode]);
            $Zipcode = $stmt->fetchAll();
            return $Zipcode ;
        }
        public function getdistrict($amphure_id){
            // echo $amphure_id ;
            $sql = "select * from district where amphur_id = ?  ORDER BY DISTRICT_NAME ASC " ;
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute([$amphure_id]);
            $distrcts = $stmt->fetchAll();
            return $distrcts ;
        }
    }
