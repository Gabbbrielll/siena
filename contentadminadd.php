<?php
include('contentadminconn.php');

$Image = mysqli_real_escape_string($contentadminconn, $_POST['Image']);
$Title = mysqli_real_escape_string($contentadminconn, $_POST['Title']);
$Capacity = mysqli_real_escape_string($contentadminconn, $_POST['Capacity']);
$Price = mysqli_real_escape_string($contentadminconn, $_POST['Price']);
$Description = mysqli_real_escape_string($contentadminconn, $_POST['Description']);

mysqli_query($contentadminconn, "INSERT INTO `contenttable` (Image, Title, Capacity, Price, Description) 
                VALUES ('$Image', '$Title', '$Capacity', '$Price', '$Description')");
header('location:admin-content.php');

?>
