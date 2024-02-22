<?php
	include('adminbookconn.php');
	
	$Venue=$_POST['Venue'];
	$Date=$_POST['Date'];
	$Time=$_POST['Time'];
	$Package=$_POST['Package'];
	$Status=$_POST['Status'];

	mysqli_query($adminbookconn,"insert into `bookingtable` (Venue,Date,Time,Package,Status) values
	('$Venue','$Date','$Time','$Package','$Status')");
	header('location:admin-booking.php');
	
?>