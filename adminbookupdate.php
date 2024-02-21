<?php
	include('adminbookconn.php');
	$id=$_GET['id'];
	
	$Venue=$_POST['Venue'];
	$Date=$_POST['Date'];
	$Time=$_POST['Time'];
	$Package=$_POST['Package'];
	$Status=$_POST['Status'];
	
	mysqli_query($adminbookconn,"update `bookingtable` set Venue='$Venue', Date='$Date', Time='$Time', Package='$Package', Status='$Status' where Booking_ID='$id'");

	header('location:admin-booking.php');
?>