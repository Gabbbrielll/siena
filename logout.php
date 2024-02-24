<?php
	session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('Logged out succesfully');</script>";
    echo "<script>window.location.href = 'content.php';</script>";
?>