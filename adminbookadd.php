<?php
	include('adminbookconn.php');
	
	$Venue=$_POST['Venue'];
	$Date=$_POST['Date'];
	$Time=$_POST['Time'];
	$Package=$_POST['Package'];
	$Status=$_POST['Status'];
	$cust_id=$_POST['cust_id'];
	$is_admin = $_SESSION['is_admin'];

	mysqli_query($adminbookconn,"insert into `bookingtable` (Venue,Date,Time,Package,Status,cust_id) values
	('$Venue','$Date','$Time','$Package','$Status','$cust_id')");
	
	// Check if the user is an admin or customer and redirect accordingly
	if ($is_admin) {
		header('location:admin-booking.php');
	} else {
		header('location:content.php?message=' . urlencode("Booking is placed. \n Please wait for an admin to contact you for your payment details."));
	}
	
?>