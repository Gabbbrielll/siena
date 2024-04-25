<?php
    session_start();

    $conn = new mysqli("localhost", "root", "", "sienas_events_place");
    
    function prepareInput($input) {
        global $conn;
        
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        $input = $conn->real_escape_string($input);

        return $input;
    } 

    function encryptPassword($password) {
        // Generate a random secret key
        $secret_key = openssl_random_pseudo_bytes(32); // 32 bytes for AES 256-bit encryption

        // Convert the binary key to a hexadecimal representation
        $secret_key_hex = bin2hex($secret_key);

        // Encrypt the password using AES 256-bit encryption in CBC mode
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($password, 'aes-256-cbc', $secret_key_hex, 0, $iv);

        // Return the encrypted password along with the initialization vector and the secret key
        return array(
            'password' => base64_encode($iv . $encrypted),
            'secret_key' => $secret_key_hex
        );
    }

    function checkDuplicateUsername($cust_email) {
        global $conn;

        $qry1 = "SELECT cust_email FROM customer WHERE cust_email = ?";
        $stmt = $conn->prepare($qry1);
        $stmt->bind_param("s", $cust_email);
        $stmt->execute();
        $stmt->store_result();

        return ($stmt->num_rows() > 0);
    }

    function registerUser($cust_email, $cust_uname, $cust_lname, $cust_contact, $cust_address, $encrypted_password, $secret_key_hex) {
        global $conn;

        $qry2 = "INSERT INTO customer (cust_email, cust_uname, cust_lname, cust_contact, cust_address, cust_pass, secret_key) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($qry2);
        $stmt2->bind_param("sssssss", $cust_email, $cust_uname, $cust_lname, $cust_contact, $cust_address, $encrypted_password, $secret_key_hex);
        $stmt2->execute();

        return $stmt2->affected_rows > 0; // Return true if registration was successful
    }

    if (isset($_POST['register'])) {
        $cust_email           = prepareInput($_POST['cust_email']);
        $cust_uname           = prepareInput($_POST['cust_uname']);

        $cust_lname           = prepareInput($_POST['cust_lname']);
        $cust_contact           = prepareInput($_POST['cust_contact']);
        $cust_address           = prepareInput($_POST['cust_address']);

        $cust_pass            = prepareInput($_POST['cust_pass']);
        $confirm_password     = prepareInput($_POST['confirmPassword']);

        // Check if passwords match
        if ($cust_pass != $confirm_password) {
            echo "<script>alert('Password must be identical! Please try again.');</script>";
            echo "<script>window.location.href = 'content.php';</script>";
            exit();
        }

        // Check if email is already registered
        if (checkDuplicateUsername($cust_email)) {
            echo "<script>alert('Email has already been taken! Please login to your account');</script>";
            echo "<script>window.location.href = 'content.php';</script>";
            exit();
        }

        // Encrypt the password and retrieve the encrypted password and secret key
        $encryption_result = encryptPassword($cust_pass);
        $encrypted_password = $encryption_result['password'];
        $secret_key_hex = $encryption_result['secret_key'];

        // Register the user with the encrypted password and secret key
        if (registerUser($cust_email, $cust_uname, $cust_lname, $cust_contact, $cust_address, $encrypted_password, $secret_key_hex)) {
            echo "<script>alert('Account created! Please login to your account');</script>";
            echo "<script>window.location.href = 'content.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to create account. Please try again.');</script>";
            echo "<script>window.location.href = 'content.php';</script>";
            exit();
        }
    }
    $conn->close();
?>
