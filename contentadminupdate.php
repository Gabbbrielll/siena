<?php
session_start();
include('contentadminconn.php');
$id=$_POST['id'];
$Image=$_POST['Image'];
$Title=$_POST['Title'];
$capacity = $_POST['Capacity'];
$price = $_POST['Price'];
$Desc=$_POST['Description'];
	
mysqli_query($contentadminconn,"UPDATE `contenttable` set Image='$Image', Title='$Title', Capacity='$capacity', 
Price='$price', Description='$Desc' where Content_ID='$id'");

header('location:admin-content.php');
?>