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
        $pass = md5(prepareInput($_POST['cust_pass']));

        $sql = "SELECT * FROM customer WHERE cust_email='$user' AND cust_pass='$pass';";
        $result = $conn->query($sql);

        if ($result->num_rows != 1) {
            echo "<script>alert('Incorrect email or password! Please try again.');</script>";
            echo "<script>window.location.href = 'content.php';</script>";
            exit();
        } else {
            $row = $result->fetch_assoc();
            $_SESSION['cust_uname'] = $row['cust_uname'];
            echo "<script>window.location.href = 'content.php';</script>";
            $conn->close();
            exit();
        }
    }
?>