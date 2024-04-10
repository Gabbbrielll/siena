<?php
include('packageadminconn.php');

/* -------NEW----2/9----- */
if(empty($_POST['PackageTitle']) || empty($_POST['PackageType']) || empty($_POST['PackagePrice']) || empty($_POST['PackageDescription'])) {
    header('location:admin-content.php?error=empty_fields');
    exit(); 
}
/* -------validation para hindi mag duplciate----- */

$PackageImage = mysqli_real_escape_string($packageadminconn, $_POST['PackageImage']);
$PackageTitle = mysqli_real_escape_string($packageadminconn, $_POST['PackageTitle']);
$PackageType = mysqli_real_escape_string($packageadminconn, $_POST['PackageType']);
$PackagePrice = mysqli_real_escape_string($packageadminconn, $_POST['PackagePrice']);
$PackageDescription = mysqli_real_escape_string($packageadminconn, $_POST['PackageDescription']);

mysqli_query($packageadminconn, "INSERT INTO `packagetable` (PackageImage, PackageTitle, PackageType, PackagePrice, PackageDescription) 
                VALUES ('$PackageImage', '$PackageTitle', '$PackageType', '$PackagePrice', '$PackageDescription')");
header('location:admin-content.php');

?>
