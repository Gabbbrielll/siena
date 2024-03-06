<?php
$contentadminconn = mysqli_connect("localhost","root","","content");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>