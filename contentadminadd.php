<?php
include('contentadminconn.php');

$Image = mysqli_real_escape_string($contentadminconn, $_POST['Image']);
$Title = mysqli_real_escape_string($contentadminconn, $_POST['Title']);
$Description = mysqli_real_escape_string($contentadminconn, $_POST['Description']);

mysqli_query($contentadminconn, "INSERT INTO `contenttable` (Image, Title, Description) VALUES ('$Image', '$Title', '$Description')");
header('location:admin-content.php');

?>
