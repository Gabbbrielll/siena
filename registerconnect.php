<?php
    $conn = new  mysqli("localhost", "root", "", "sienas_events_place");
    
    function prepareInput($input) {
        global $conn;
        
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        $input = $conn->real_escape_string($input);

        return $input;
    } 

    function checkDuplicateUsername($cust_email) : bool {//
        global $conn;

        $qry1 = "SELECT cust_email FROM customer WHERE cust_email = ?;";
        $stmt = $conn->prepare($qry1);
        $stmt->bind_param("s", $cust_email);//
        $stmt->execute();
        $stmt->store_result();

        return ($stmt->num_rows() > 0);
        
    }

    if (isset($_POST['register'])) {
        $cust_email           = prepareInput($_POST['cust_email']);//
        $cust_uname        = prepareInput($_POST['cust_uname']);
        $cust_pass           = md5(prepareInput($_POST['cust_pass']));
        $confirmPassword    = md5(prepareInput($_POST['confirmPassword']));

        if (checkDuplicateUsername($cust_email)) {//
            header("location: ../index.php?regerror=1");
            exit();
        } else if(strcmp($cust_pass, $confirmPassword) != 0) {
            header("location: ../index.php?regerror=2");
            exit();
        } else {
            $qry2 = "INSERT INTO customer (cust_email, cust_uname, cust_pass) VALUES (?, ?, ?)";
            $stmt2 = $conn->prepare($qry2);
            $stmt2->bind_param("sss", $cust_email, $cust_uname, $cust_pass);//
            $stmt2->execute();
            header("location: ../index.php?success=1"); // teka ayaw mag commit
            $conn->close();
            exit();
        }
    }
?>