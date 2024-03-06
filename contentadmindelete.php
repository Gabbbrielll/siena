<?php
	$id=$_GET['id'];
	include('contentadminconn.php');
	mysqli_query($contentadminconn,"delete from `contenttable` where Content_ID='$id'");
	header('location:admin-content.php');
?>