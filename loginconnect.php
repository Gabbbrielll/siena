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

    if (isset($_POST['login'])) {
        $user = prepareInput($_POST['cust_email']);
        $pass = md5(prepareInput($_POST['cust_pass']));//kailangan naka md5 sa customer; no md5 sa admin

        ///////////////////////////////////////////////////
        // Check if the user is an admin
        $admin_query = "SELECT * FROM admin WHERE ad_email = '$user' AND ad_pass = '$pass';";
        $admin_result = $conn->query($admin_query);

        if($admin_result->num_rows > 0) {
            $row = $admin_result->fetch_assoc();
            $_SESSION['ad_uname'] = $row['ad_uname'];
            echo "<script>window.location.href = 'booking.php';</script>";
            exit();
        }

        // Check if the user is a customer
        $customer_query = "SELECT * FROM customer WHERE cust_email='$user' AND cust_pass='$pass';";
        $customer_result = $conn->query($customer_query);

        if($customer_result->num_rows > 0) {
            $row = $customer_result->fetch_assoc();
            $_SESSION['cust_uname'] = $row['cust_uname'];
            echo "<script>window.location.href = 'content.php';</script>";
            exit();
        }
        //////////////////////////////////////////////////

        // $sql = "SELECT * FROM customer WHERE cust_email='$user' AND cust_pass='$pass';";
        // $result = $conn->query($sql);

        // if ($result->num_rows != 1) {
        //     echo "<script>alert('Incorrect email or password! Please try again.');</script>";
        //     echo "<script>window.location.href = 'content.php';</script>";
        //     exit();
        // } else {
        //     $row = $result->fetch_assoc();
        //     $_SESSION['cust_uname'] = $row['cust_uname'];
        //     echo "<script>window.location.href = 'content.php';</script>";
        //     $conn->close();
        //     exit();
        // }
        
        // Handle invalid login
        echo "<script>alert('Incorrect email or password! Please try again.');</script>";
        echo "<script>window.location.href = 'content.php';</script>";
    }
    $conn->close();
?>