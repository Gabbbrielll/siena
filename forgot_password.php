<?php
session_start();

if (isset($_SESSION['cust_email'])){
    $email = $_SESSION['cust_email'];
    $code = $_SESSION['verification_code'];
} else{
    $email='';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <style>
@import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*,
*:before,
*:after {
	box-sizing: border-box;
}


body {
	line-height: 1.5;
	min-height: 100vh;
	font-family: 'Poppins', sans-serif;
	color: #50262f;
	background: url("bg.jpg");
    background-size: cover;
	position: relative;
}

h2{
    color: #f1d6a5;
}

button{
    color: #f1d6a5;
}

label{
    color: #f1d6a5;
}

input{
    color: #f1d6a5;
}






    </style>
</head>
<script>
    function disableEmail() {
        document.getElementById("email").disabled = true;
        document.getElementById("sendButton").disabled = true;
    }
    function disableCode() {
        document.getElementById("verification_code").disabled = true;
        document.getElementById("validate_code").disabled = true;
    }
    function disablePass() {
        document.getElementById("new_password").disabled = true;
        document.getElementById("confirm_password").disabled = true;
        document.getElementById("reset_password").disabled = true;
    }
    function validatePassword(newPassword) {
        // Minimum password length (NIST recommends at least 8 characters)
        var minLength = 8;
        // Maximum password length (NIST recommends no more than 64 characters)
        var maxLength = 64;
        // Regular expressions for character types
        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var digitRegex = /\d/;
        var specialCharRegex = /[!@#$%^&*()_+[\]{};':"\\|,.<>/?]/;

        // Check if password meets length requirements
        if (newPassword.length < minLength || newPassword.length > maxLength) {
            return false;
        }
        // Check if password contains at least one uppercase letter
        if (!uppercaseRegex.test(newPassword)) {
            return false;
        }
        // Check if password contains at least one lowercase letter
        if (!lowercaseRegex.test(newPassword)) {
            return false;
        }
        // Check if password contains at least one digit
        if (!digitRegex.test(newPassword)) {
            return false;
        }
        // Check if password contains at least one special character
        if (!specialCharRegex.test(newPassword)) {
            return false;
        }
        // Password meets all requirements
        return true;
    }

    function validateForm() {
        var newPassword = document.getElementById("new_password").value;
        var confirmNewPassword = document.getElementById("confirm_password").value;

        // Validate new password
        if (!validatePassword(newPassword)) {
            alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.");
            return false;
        }

        // Confirm passwords match
        if (newPassword !== confirmNewPassword) {
            alert("Passwords do not match.");
            return false;
        }

        return true;
    }
    </script>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    
       
        
        
        
        <center>
    <h2>Forgot Password</h2>
    <form method="post" action="send_password_reset.php">
        
        <label for="email">Email: <?php echo $email ?></label>
        <input type="email" name="email" id="email">
        <button type="submit" id="sendButton">Send</button>
        
        

        <br><br>

        <?php
        // Check if the verification code should be displayed
        if (isset($_SESSION['show_verification_code']) && $_SESSION['show_verification_code']) {
            echo '<script>disableEmail()</script>';
            echo '<label for="verification_code">Verification Code</label>';
            echo '<input type="text" name="verification_code" id="verification_code" required>';
            echo '<button type="submit" name="validate_code" id="validate_code">Validate Code</button>';
        }
?>
<br> <br>
        <?php
        // Check if the new password fields should be displayed
        if (isset($_SESSION['show_new_password_fields']) && $_SESSION['show_new_password_fields']) {
            echo '<script>disableEmail()</script>';
            echo '<script>disableCode()</script>';
            echo '<label for="new_password">New Password</label>';
            echo '<input type="password" name="new_password" id="new_password" required>';
            echo '<label for="confirm_password">Confirm Password</label>';
            echo '<input type="password" name="confirm_password" id="confirm_password" required>';
            echo '<button type="submit" name="reset_password" id="reset_password">Reset Password</button>';
            
        }

        if (isset($_SESSION['done']) && $_SESSION['done']) {
            echo '<script>disablePass()</script>';
            session_destroy();
        }
        
        ?>

    </form>
    </div>
    </center>
</body>
</html>
