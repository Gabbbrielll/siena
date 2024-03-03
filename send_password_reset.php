<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$conn = new mysqli("localhost", "root", "", "sienas_events_place");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['validate_code']) && !isset($_POST['reset_password']) && !isset($_POST['done'])) {
    // Retrieve the submitted email
    $email = $_POST['email'];

    // Query to check if the email exists in the database
    $sql = "SELECT * FROM customer WHERE cust_email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if there's a match
    if (mysqli_num_rows($result) > 0) {
        $row = $result -> fetch_assoc();
        // Email exists, set session variable to show verification code field
        $_SESSION['show_verification_code'] = true;
        $_SESSION['cust_email'] = $row['cust_email'];
        $_SESSION['verification_code'] = rand(100000, 999999);
        $code = $_SESSION['verification_code'];

        // Send email with verification code
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sienaseventsplace@gmail.com';
            $mail->Password = 'jcvr qkqi upxh ayos';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('sienaseventsplace@gmail.com', 'Siena\'s Events Place');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Verification Code for Password Reset";
            $mail->Body = "Greetings $email,<br><br>"
                . "We've received a request to reset the password for your account. Don't worry, it's easy to get back into your account.<br><br>"
                . "To reset your password, please use the verification code below:<br><br>"
                . "Verification Code: $code<br><br>"
                . "Please enter this code on the provided text field to complete the verification process.<br><br>"
                . "If you didn't request this, you can safely ignore this email. Your password won't be changed until you confirm your request using the code above.<br><br>"
                . "If you need assistance, please don't hesitate to contact our support team.<br><br>"
                . "Thank you for trusting us with your account. We look forward to serving you.<br><br>"
                . "Thank you,<br>"
                . "Siena's Events Place<br>"
                . "315 Buliran Rd., Sitio Bayugo, Antipolo, Philippines, 1870<br>"
                . "+631234567890";

            $mail->send();
            echo "<script>alert('Verification code has been sent to $email');</script>";
            echo "<script>window.location.href = 'forgot_password.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Failed to send verification code. Error: {$mail->ErrorInfo}');</script>";
            echo "<script>window.location.href = 'forgot_password.php';</script>";
        }
    } else {
        // Email not found in the database
        // You can redirect the user back to the forgot password page with an error message
        
        echo "<script>alert('Email not found. Please try again.');</script>";
        echo "<script>window.location.href = 'forgot_password.php';</script>";
    }
}
// Check if the validation code is submitted
if (isset($_POST['validate_code'])) {
    $entered_code = $_POST['verification_code'];

    // Compare the entered code with the generated code
    if ($entered_code == $_SESSION['verification_code']) {
        // Code is correct, set session variable to show new password fields
        $_SESSION['show_new_password_fields'] = true;
        
        // Redirect the user or display a success message
        echo "<script>alert('Verification code is correct. Please enter a new password.');</script>";
        echo "<script>window.location.href = 'forgot_password.php';</script>";
    } else {
        // Code is incorrect, display an error message
        echo "<script>alert('Incorrect verification code. Please try again.');</script>";
        echo "<script>window.location.href = 'forgot_password.php';</script>";
    }
}

// Check if the new password is submitted
if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the new password
    if (!validatePassword($new_password)) {
        // Password does not meet requirements
        echo "<script>alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.');</script>";
        echo "<script>window.location.href = 'forgot_password.php';</script>";
        exit;
    }

    // Generate a random secret key for encryption
    $secret_key = openssl_random_pseudo_bytes(32);
    $secret_key_hex = bin2hex($secret_key);

    // Encrypt the new password
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted_password = openssl_encrypt($new_password, 'aes-256-cbc', $secret_key_hex, 0, $iv);
    $encrypted_password_base64 = base64_encode($iv . $encrypted_password);

    // Check if the new password and confirm password match
    if ($new_password == $confirm_password) {
        // Passwords match, update the encrypted password and secret key in the database
        $sql = "UPDATE customer SET cust_pass = '$encrypted_password_base64', secret_key = '$secret_key_hex' WHERE cust_email = '$_SESSION[cust_email]'";
        mysqli_query($conn, $sql);

        // Redirect the user to the login page
        $_SESSION['mySession'] = false;
        $_SESSION['done'] = true;
        echo "<script>alert('Password has been reset. Please log in.');</script>";
        echo "<script>window.location.href = 'content.php';</script>";
    } else {
        // Passwords do not match, display an error message
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        echo "<script>window.location.href = 'forgot_password.php';</script>";
    }
}

// Function to validate the password
function validatePassword($password) {
    // Minimum password length (NIST recommends at least 8 characters)
    $minLength = 8;
    // Maximum password length (NIST recommends no more than 64 characters)
    $maxLength = 64;
    // Regular expressions for character types
    $uppercaseRegex = '/[A-Z]/';
    $lowercaseRegex = '/[a-z]/';
    $digitRegex = '/\d/';
    $specialCharRegex = '/[!@#$%^&*()_+[\]{};\'"\\|,.<>\/?]/';

    // Check if password meets length requirements
    if (strlen($password) < $minLength || strlen($password) > $maxLength) {
        return false;
    }
    // Check if password contains at least one uppercase letter
    if (!preg_match($uppercaseRegex, $password)) {
        return false;
    }
    // Check if password contains at least one lowercase letter
    if (!preg_match($lowercaseRegex, $password)) {
        return false;
    }
    // Check if password contains at least one digit
    if (!preg_match($digitRegex, $password)) {
        return false;
    }
    // Check if password contains at least one special character
    if (!preg_match($specialCharRegex, $password)) {
        return false;
    }
    // Password meets all requirements
    return true;
}
?>