<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = 2; // Set to 2 for debugging
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'localhost';
    $mail->Port = 587;
    $mail->Username = 'unlimitcard@gmail.com'; // Replace with your Gmail email address
    $mail->Password = '01154365122'; // Replace with your Gmail password or an App Password if you use two-factor authentication

    $mail->setFrom($email, $name);
    $mail->addAddress('ahmed.eldiary72@gmail.com'); // Replace with the recipient's email address
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $mail->send();
    echo "Thank you for your message. We will get back to you soon.";
  } catch (Exception $e) {
    echo "Oops! Something went wrong and we couldn't send your message. Error: " . $mail->ErrorInfo;
  }
}
?>
