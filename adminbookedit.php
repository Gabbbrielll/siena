<?php
	include('adminbookconn.php');
	$id=$_GET['id'];
	$query=mysqli_query($adminbookconn,"select * from `bookingtable` where Booking_ID='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="adminbookupdate.php?id=<?php echo $id; ?>">
		<label>Venue:</label><input type="text" value="<?php echo $row['Venue']; ?>" name="Venue">
		<label>Date:</label><input type="text" value="<?php echo $row['Date']; ?>" name="Date">
		<label>Time:</label><input type="text" value="<?php echo $row['Time']; ?>" name="Time">
		<label>Package:</label><input type="text" value="<?php echo $row['Package']; ?>" name="Package">
		<label>Status:</label><input type="text" value="<?php echo $row['Status']; ?>" name="Status">
		<input type="submit" name="submit">
		<a href="admin-booking.php">Back</a>
	</form>
</body>
</html>