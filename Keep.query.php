<?php
require_once "connect.php";
class Keep extends Dbh
{
    public function GetEvent()
    {
        $sql = "SELECT event.Event_Name , count(member.Subject) as count 
            FROM event Left JOIN member ON event.Event_Name = member.Subject GROUP BY event.Event_Name 
            ORDER BY count DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function KeepEvent($Event_Name, $Count)
    {
        $sql = "select * from member where Subject = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Event_Name]);
        $row = $stmt->fetchAll();
        // print_r($row);
        for ($i = 0; $i < sizeof($row); $i++) {
            $sql = "INSERT INTO `allmember`(`Member_PID`, `Email`, `Firstname`, `Lastname`, `Firstname_EN`, 
                `Lastname_EN`, `Nickname`, `Sex`, `Height`, `Birthdate`
                , `Age`, `Address`, `School`, `Class`, `Foot`,
                 `Tel`, `Parent_Tel`, `Salary`, `Subject`, `Club`, 
                 `Position`, `Field`, `Pname`, `Info`, `Active`) 
                VALUES (?,?,?,?,?
                ,?,?,?,?,?
                ,?,?,?,?,?
                ,?,?,?,?,?
                ,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $row[$i]['Member_PID'],  $row[$i]['Email'],  $row[$i]['Firstname'],  $row[$i]['Lastname'], $row[$i]['Firstname_EN'],
                $row[$i]['Lastname_EN'], $row[$i]['Nickname'], $row[$i]['Sex'], $row[$i]['Height'], $row[$i]['Birthdate'],
                $row[$i]['Age'], $row[$i]['Address'], $row[$i]['School'], $row[$i]['Class'], $row[$i]['Foot'],
                $row[$i]['Tel'], $row[$i]['Parent_Tel'], $row[$i]['Salary'], $row[$i]['Subject'], $row[$i]['Club'], $row[$i]['Position'], $row[$i]['Field'], $row[$i]['Pname'], $row[$i]['Info'], $row[$i]['Active']
            ]);
        }
        $sql = "INSERT INTO passevent(Event_Name,Count) VALUES (?,?) ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Event_Name, $Count]);
        $sql = "DELETE FROM  member where Subject = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Event_Name]);
        $sql = "DELETE FROM  event where Event_Name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Event_Name]);
    }
    public function getData($Event_Name)
    {
        $sql = "select * from member where Subject = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Event_Name]);
        $row = $stmt->fetchAll();
        return $row;
    }
}
