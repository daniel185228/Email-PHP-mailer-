<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  $mail = new PHPMailer(true);
  try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'testmemail2003@gmail.com';
        $mail->Password = 'hsxwmbptncvzqmhf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('testemail2003@gmail.com', 'MIAMARK');
        $mail->addAddress($_POST['email']);

        // Check for file upload errors
        if(isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
        }
        // } else {
        //     die('File upload failed with error code ' . $_FILES['file']['error']);
        // }

        //Content
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['body'];

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception) {
        echo "Message could not be sent.";
    }

?>
