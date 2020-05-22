<?
require_once('PHPMailer/PHPMailerAutoload.php');
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
	$mail->SetFrom = ('6106021410040@fitm.kmutnb.com'); //กำหนด email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง
	$mail->FromName = "Sender Person"; //ชื่อที่ใช้ในการส่ง
	$mail->Subject = "ทดสอบการส่งอีเมล์";  //หัวเรื่อง emal ที่ส่ง
	$mail->Body = "ทดสอบส่งเมลล์ในส่วนของรายละเอียดเนื้อหา</b>"."<br>ทดลองอีกครั้ง"; //รายละเอียดที่ส่ง
	$mail->AddAddress('pokket.1@gmail.com','Recive Name'); //อีเมล์และชื่อผู้รับ
	
	//ส่วนของการแนบไฟล์ รองรับ .rar , .jpg , png
	// $mail->AddAttachment("files/1.rar");
	// $mail->AddAttachment("files/1.png");
	
	//ตรวจสอบว่าส่งผ่านหรือไม่
	if ($mail->Send()){
	echo "Success";
	}else{
	echo "Failed";
	}
?>