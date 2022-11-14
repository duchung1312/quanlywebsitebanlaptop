<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mthoi0406011@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Katy2609'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('mthoi0406011@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('manhthoi04062001@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Thông Tin Liên Hệ';
    $mail->Body = "<h3>Tên : $name <br>Email: $email <br>Thông Tin : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Thông tin đã được gửi! Cảm ơn bạn đã liên hệ với chúng tôi.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
