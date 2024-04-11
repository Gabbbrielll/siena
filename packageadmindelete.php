<?php
	$id=$_GET['id'];
	include('packageadminconn.php');
	mysqli_query($packageadminconn,"delete from `packagetable` where Package_ID='$id'");
	header('location:admin-content.php');
?>