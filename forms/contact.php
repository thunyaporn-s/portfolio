<?
require("phpmailer/class.phpmailer.php"); // path to the PHPMailer class.
 
$fm = "thunyah.service@gmail.com"; // *** ต้องใช้อีเมล์ @gmail.com เท่านั้น ***
$to = "thunyaporng@gmail.com"; // อีเมล์ที่ใช้รับข้อมูลจากแบบฟอร์ม
$custemail = $_POST['email']; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม
 
$subj = $_POST['subject'];
 
/* ------------------------------------------------------------------------------------------------------------- */
$message.= "ชื่อ-นามสกุล: ".$_POST['name']."\n";
$message.= "อีเมล์: ".$_POST['email']."\n";
$message.= "หัวข้อ: ".$_POST['subject']."\n";
$message.= "รายละเอียด: ".$_POST['details']."\n";
/* ------------------------------------------------------------------------------------------------------------- */
 
/* หากต้องการรับข้อมูลจาก Form แบบไม่ระบุชื่อตัวแปร สามารถรับข้อมูลได้ไม่จำกัด ให้ลบบรรทัด 11-14 แล้วใช้ 19-22 แทน
     
foreach ($_POST as $key => $value) {
 //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
 $message.= "Field ".htmlspecialchars($key)." = ".htmlspecialchars($value)."\n";
}
 
*/
 
$mesg = $message;
 
$mail = new PHPMailer();
$mail->CharSet = "utf-8"; 
 
/* ------------------------------------------------------------------------------------------------------------- */
/* ตั้งค่าการส่งอีเมล์ โดยใช้ SMTP ของ Gmail */
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port = 587;                   // set the SMTP port for the GMAIL server
$mail->Username = "thunyah.service@gmail.com";  // Gmail username หรือหากท่านใช้ G-suite / WorkSpace ให้ใช้อีเมล์ @you@yourdomain แทน
$mail->Password = "service1234!";    // Gmail password
/* ------------------------------------------------------------------------------------------------------------- */
 
$mail->From = $fm;
$mail->AddAddress($to);
$mail->AddReplyTo($custemail);
$mail->Subject = $subj;
$mail->Body     = $mesg;
$mail->WordWrap = 50;  
//
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'ยังไม่สามารถส่งเมลล์ได้ในขณะนี้ ' . $mail->ErrorInfo;
exit;
} else {
echo 'ส่งเมลล์สำเร็จ';
}