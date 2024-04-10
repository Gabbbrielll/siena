<?php
include('contentadminconn.php');

/* -------NEW----2/9----- */
if(empty($_POST['Title']) || empty($_POST['Capacity']) || empty($_POST['Price']) || empty($_POST['Description'])) {
    header('location:admin-content.php?error=empty_fields');
    exit(); 
}
/* -------validation para hindi mag duplciate----- */

$Image = mysqli_real_escape_string($contentadminconn, $_POST['Image']);
$Title = mysqli_real_escape_string($contentadminconn, $_POST['Title']);
$Capacity = mysqli_real_escape_string($contentadminconn, $_POST['Capacity']);
$Price = mysqli_real_escape_string($contentadminconn, $_POST['Price']);
$Description = mysqli_real_escape_string($contentadminconn, $_POST['Description']);

mysqli_query($contentadminconn, "INSERT INTO `contenttable` (Image, Title, Capacity, Price, Description) 
                VALUES ('$Image', '$Title', '$Capacity', '$Price', '$Description')");
header('location:admin-content.php');

?>
