<?php
    session_start();

    $conn = new  mysqli("localhost", "root", "", "sienas_events_place");
    
    function prepareInput($input) {
        global $conn;
        
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        $input = $conn->real_escape_string($input);

        return $input;
    } 

    function decryptPassword($encrypted_password, $secret_key_hex) {
        // Extract the initialization vector (IV) from the encrypted password
        $iv_size = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr(base64_decode($encrypted_password), 0, $iv_size);

        // Extract the encrypted password without the IV
        $encrypted = substr(base64_decode($encrypted_password), $iv_size);

        // Decrypt the password using AES 256-bit encryption in CBC mode
        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $secret_key_hex, 0, $iv);

        // Return the decrypted password
        return $decrypted;
    }

    if (isset($_POST['login'])) {
        $user = prepareInput($_POST['cust_email']);
        $pass_input = prepareInput($_POST['cust_pass']); // Plain text password input from user
    
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Check if the user is an admin
        $admin_query = "SELECT * FROM admin WHERE ad_email = '$user' AND ad_pass = '$pass_input';";
        $admin_result = $conn->query($admin_query);
    
        if ($admin_result->num_rows > 0) {
            $row = $admin_result->fetch_assoc();
            $_SESSION['ad_uname'] = $row['ad_uname'];
            echo "<script>window.location.href = 'admin-booking.php';</script>";
            exit();
        }
    
        // Check if the user is a customer
        $customer_query = "SELECT * FROM customer WHERE cust_email='$user';";
        $customer_result = $conn->query($customer_query);
    
        if ($customer_result->num_rows > 0) {
            $row = $customer_result->fetch_assoc();
            // Decrypt the customer password for comparison
            $cust_pass_decrypted = decryptPassword($row['cust_pass'], $row['secret_key']);
            if ($cust_pass_decrypted == $pass_input) {
                $_SESSION['cust_uname'] = $row['cust_uname'];
                echo "<script>window.location.href = 'content.php';</script>";
                exit();
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Handle invalid login
        echo "<script>alert('Incorrect email or password! Please try again.');</script>";
        echo "<script>window.location.href = 'content.php';</script>";
    }
    $conn->close();
?>