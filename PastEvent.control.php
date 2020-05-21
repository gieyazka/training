<?php
require_once "PastEvent.query.php";
// print_r($_REQUEST);
if ($_REQUEST['action'] == '1') {
    $name = $_POST['Event_Name'];

    header('Content-Type: text/html; charset=tis620');
    header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
    header("Content-Disposition: attachment; filename={$_REQUEST['Event_Name']}.xls"); //กำหนดชื่อไฟล์
    header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . filesize("myexcel.xls"));

    @readfile($filename);
?>
    <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">

    <html>
    <?php

    $obj = new PastEvent;
    $data = $obj->getData($_REQUEST['Event_Name']);
    ?>

    <body>
        <table>
            <tr>
                <td>ลำดับ</td>
                <td>กิจกรรมที่ลงสมัคร</td>
                <td>เลขบัตรประชาชน</td>
                <td>Email</td>
                <td>ชื่อภาษาไทย</td>
                <td>นามสกุลภาษาไทย</td>
                <td>ชื่อภาษาอังกฤษ</td>
                <td>นามสกุลภาษาอังกฤษ</td>
                <td>ชื่อเล่น</td>
                <td>เพศ</td>
                <td>ส่วนสูง</td>
                <td>วันเกิด</td>
                <td>อายุ</td>
                <td>ที่อยู่</td>
                <td>โรงเรียน</td>
                <td>ระดับชั้น</td>
                <td>เท้าที่ถนัด</td>
                <td>เบอร์โทรศัพท์</td>
                <td>ชื่อผู้ปกครอง</td>
                <td>เบอร์โทรศัพท์ผู้ปกครอง</td>
                <td>เงินเดือนผู้ปกครอง</td>

                <td>สังกัดทีม/สโมสร</td>
                <td>ตำแหน่งที่ถนัด</td>
                <td>สนาม</td>
                <td>แหล่งข่าวสารที่ได้รับ</td>

            </tr>
            <?php
            for ($i = 0; $i < sizeof($data); $i++) {
                $a = $i + 1;
                echo " <tr>
            <td>{$a}</td>
            <td>{$data[$i]['Subject']}</td>
            <td>{$data[$i]['Member_PID']}</td>
            <td>{$data[$i]['Email']}</td>
            <td>{$data[$i]['Firstname']}</td>
            <td>{$data[$i]['Lastname']}</td>
            <td>{$data[$i]['Firstname_EN']}</td>
            <td>{$data[$i]['Lastname_EN']}</td>
            <td>{$data[$i]['Nickname']}</td>
            <td>{$data[$i]['Sex']}</td>
            <td>{$data[$i]['Height']}</td>
            <td>{$data[$i]['Birthdate']}</td>
            <td>{$data[$i]['Age']}</td>
            <td>{$data[$i]['Address']}</td>
            <td>{$data[$i]['School']}</td>
            <td>{$data[$i]['Class']}</td>
            <td>{$data[$i]['Foot']}</td>
            <td>'{$data[$i]['Tel']}</td>
            <td>{$data[$i]['Pname']}</td>
            <td>{$data[$i]['Parent_Tel']}</td>
            <td>{$data[$i]['Salary']}</td>
            <td>{$data[$i]['Club']}</td>
            <td>{$data[$i]['Position']}</td>
            <td>{$data[$i]['Field']}</td>
            <td>{$data[$i]['Info']}</td>

            </tr>";
            }

            ?>



        </table>
    </body>
<?php } ?>