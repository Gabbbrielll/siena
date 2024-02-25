<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload.php file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to_email = $_POST['email'];
    $verificationCode = mt_rand(100000, 999999);
    $subject = "Verification Code";
    $message = "Your verification code is: " . $verificationCode;

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'sienaseventsplace@gmail.com';                 // SMTP username
        $mail->Password = 'jnot lmaf pngr gleb';                           // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('noreply@sienasep.com', 'Siena\'s Events Place');
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