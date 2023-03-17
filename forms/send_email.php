<?php
// ต้องรวมไฟล์ PHPMailer ก่อนการใช้งาน
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// ตั้งค่าการส่งอีเมล
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'thunyah.service@gmail.com'; // อีเมลของคุณ
$mail->Password = 'service1234!'; // รหัสผ่านของคุณ
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// ตั้งค่าผู้รับและหัวข้ออีเมล
$mail->setFrom('thunyah.servicegmail.com', 'Your Name');
$mail->addAddress('thunyaporng@gmail.com', 'Recipient Name');
$mail->Subject = 'Subject of the email';

// เนื้อหาของอีเมล
$mail->Body = 'Message body';

// ส่งอีเมล
if ($mail->send()) {
  echo "อีเมลถูกส่งเรียบร้อยแล้ว!";
} else {
  echo "เกิดข้อผิดพลาดขณะส่งอีเมล: " . $mail->ErrorInfo;
}
?>