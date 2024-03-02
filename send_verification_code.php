<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload.php file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to_email = $_POST['email'];
    $verificationCode = mt_rand(100000, 999999);
    $subject = "Verification Code for Account Activation";
    $message = "Greetings ". $to_email . ",<br><br>"
    . "Thank you for choosing Siena's Events Place. We are thrilled to have you onboard!<br><br>"
    . "To activate your account and unlock all the features, please use the verification code below:<br><br>"
    . "Verification Code: ". $verificationCode . "<br><br>"
    . "Please enter this code on the provided text field to complete the verification process.<br><br>"
    . "If you did not request this verification code, please ignore this email or contact our support team immediately.<br><br>"
    . "Thank you for trusting us with your account. We look forward to serving you.<br><br>"
    . "Thank you,<br>"
    . "Siena's Events Place<br>"
    . "315 Buliran Rd., Sitio Bayugo, Antipolo, Philippines, 1870<br>"
    . "+631234567890";

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'sienaseventsplace@gmail.com';                 // SMTP username
        $mail->Password = 'jcvr qkqi upxh ayos';                           // SMTP password //old pass: jnot lmaf pngr gleb
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('sienaseventsplace@gmail.com', 'Siena\'s Events Place');
        $mail->addAddress($to_email);                               // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        

        $mail->send();
        echo $verificationCode;
    } catch (Exception $e) {
        echo "Failed to send verification code. Error: {$mail->ErrorInfo}";
    }
}
?>