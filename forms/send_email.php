


<?php
if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $to = "thunyaporng@gmail.com";
  $headers = "From: " . $email;

  mail($to, $subject, $message, $headers);

  echo "ส่งอีเมลเรียบร้อยแล้ว!";
}
?>