<?php
$packageadminconn = mysqli_connect("localhost","root","","sienas_events_place");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>