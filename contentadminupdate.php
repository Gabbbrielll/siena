<?php
	include('contentadminconn.php');
	$id=$_GET['id'];
	
	$Image=$_POST['Image'];
	$Title=$_POST['Title'];
	$Desc=$_POST['Description'];
	
	
	mysqli_query($contentadminconn,"update `contenttable` set Image='$Image', Title='$Title', Description='$Description' where Booking_ID='$id'");

	header('location:admin-booking.php');
?>