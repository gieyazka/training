<?php
require_once "connect.php";
require_once "PHPMailer/PHPMailerAutoload.php";
class forgot extends Dbh
{
    public function checkEmail($Email)
    {
        $sql = "select * from user where Email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Email]);
        $data = $stmt->fetch();
        return $data;
    }
}
if ($_POST['action'] == '1') {
    $obj = new forgot;
    $data = $obj->checkEmail($_POST["Email"]);
    // print_r($data);
    if ($data['Email'] == "") {
        echo "ไม่มี Email นี้ในระบบ";
    } else {
        $body = "กรุณาคลิกที่ลิ้งค์เพื่อสร้างรหัสผ่านใหม่</b><br>
       {$_SERVER['HTTP_HOST']}/resetEmail?verify=".base64_encode(base64_encode($data['Email'])) ;
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com"; // ถ้าใช้ smtp ของ server เป็นอยู่ในรูปแบบนี้ mail.domainyour.com
        $mail->Port = 587;
        $mail->isHTML();
        $mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
        $mail->Username = "pokket.1@gmail.com"; //กรอก Email Gmail หรือ เมลล์ที่สร้างบน server ของคุณเ
        $mail->Password = "#Gie54321"; // ใส่รหัสผ่าน email ของคุณ
        $mail->SetFrom = ('pokket.1@gmail.com'); //กำหนด email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง
        $mail->FromName = "PYDCOLOR"; //ชื่อที่ใช้ในการส่ง
        $mail->Subject = "ระบบกู้คืนรหัสผ่าน";  //หัวเรื่อง emal ที่ส่ง
        $mail->Body = "{$body}"; //รายละเอียดที่ส่ง
        $mail->AddAddress("{$data['Email']}", 'Recive Name'); //อีเมล์และชื่อผู้รับ

        //ส่วนของการแนบไฟล์ รองรับ .rar , .jpg , png
        // $mail->AddAttachment("files/1.rar");
        // $mail->AddAttachment("files/1.png");

        //ตรวจสอบว่าส่งผ่านหรือไม่
        if ($mail->Send()) {
            echo "Success";
        } else {
            echo "Failed". $mail->ErrorInfo;
        }
    }
}
