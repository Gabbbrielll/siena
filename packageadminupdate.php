<?php
session_start();
include('packageadminconn.php');

$id = $_POST['id'];
$PackageTitle = $_POST['PackageTitle'];
$PackageType = $_POST['PackageType'];
$PackagePrice = $_POST['PackagePrice'];
$PackageDescription = $_POST['PackageDescription'];

// Check if a new image is uploaded
if(isset($_FILES['PackageImage']) && $_FILES['PackageImage']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['PackageImage']['tmp_name'];
    $fileName = $_FILES['PackageImage']['name'];
    $fileSize = $_FILES['PackageImage']['size'];
    $fileType = $_FILES['PackageImage']['type'];

    // Define the directory where the image will be stored
    $uploadDirectory = '../SIENA-MAIN/';

    // Generate a unique name for the uploaded file
    $newFileName = $fileName;
    $uploadPath = $uploadDirectory . $newFileName;

    // Move the uploaded file to the specified directory
    if(move_uploaded_file($fileTmpPath, $uploadPath)) {
        // Update database with new image path
        $query = "UPDATE `packagetable` SET `PackageImage`=?, `PackageTitle`=?, `PackageType`=?, `PackagePrice`=?, `PackageDescription`=? WHERE `Package_ID`=?";
        $stmt = $packageadminconn->prepare($query);
        $stmt->bind_param("sssssi", $uploadPath, $PackageTitle, $PackageType, $PackagePrice, $PackageDescription, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }
} else {
    // If no new image is uploaded, update other fields only
    $query = "UPDATE `packagetable` SET `PackageTitle`=?, `PackageType`=?, `PackagePrice`=?, `PackageDescription`=? WHERE `Package_ID`=?";
    $stmt = $packageadminconn->prepare($query);
    $stmt->bind_param("ssssi", $PackageTitle, $PackageType, $PackagePrice, $PackageDescription, $id);
    $stmt->execute();
    $stmt->close();
}

header('location:admin-content.php');
?>
