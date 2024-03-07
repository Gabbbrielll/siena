<?php
	include('adminbookconn.php');
	$id=$_GET['id'];
	$query=mysqli_query($adminbookconn,"select * from `bookingtable` where Booking_ID='$id'");
	$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        input[type="file"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #333;
            margin-top: 10px;
            display: inline-block;
        }
        a:hover{
            color: red;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Content</h2>
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
    </div>
</body>
</html>

