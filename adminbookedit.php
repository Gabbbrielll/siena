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
            background-image:url("borderlineflo.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: auto;
            color:#f1d6a5;
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
            margin-bottom: 10px;
            margin-top: 10px;
            border: 2px solid #f1d6a5;
            background-color: #50262f;
            border-radius: 5px;
            box-sizing: border-box;
            color:white;
            box-shadow: 0px 0px 5px currentcolor;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #f1d6a5;
            color: #50262f;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size:12px;
            margin: 5px;
        }
        input[type="submit"]:hover {
            background-color: rgb(219, 189, 138);
        }
        a {
            text-decoration: none;
            background-color: #f1d6a5;
            color: #50262f;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size:12px;
            margin: 5px;
        }
        a:hover{
            background-color: rgb(219, 189, 138);
        }
        label {
            font-weight: bold;
        }
        h2{
            padding: 5px 5px 5px 5px;
            border-radius:5px;
            background-color: #f1d6a5;
            color: #50262f ;
            text-align:center;
            border: 2px solid #f1d6a5;
            box-shadow: 0px 0px 8px #f1d6a5;

        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Booking</h2>
        <!-- <h2>Edit</h2> -->
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

