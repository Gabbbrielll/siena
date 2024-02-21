<?php
	$id=$_GET['id'];
	include('adminbookconn.php');
	mysqli_query($adminbookconn,"delete from `bookingtable` where Booking_ID='$id'");
	header('location:admin-booking.php');
?>