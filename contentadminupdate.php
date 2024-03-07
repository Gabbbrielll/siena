<?php
session_start();
include('contentadminconn.php');

$id = $_POST['id'];
$Title = $_POST['Title'];
$capacity = $_POST['Capacity'];
$price = $_POST['Price'];
$Desc = $_POST['Description'];

// Check if a new image is uploaded
if(isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['Image']['tmp_name'];
    $fileName = $_FILES['Image']['name'];
    $fileSize = $_FILES['Image']['size'];
    $fileType = $_FILES['Image']['type'];

    // Define the directory where the image will be stored
    $uploadDirectory = '../SIENA-MAIN/';

    // Generate a unique name for the uploaded file
    $newFileName = $fileName;
    $uploadPath = $uploadDirectory . $newFileName;

    // Move the uploaded file to the specified directory
    if(move_uploaded_file($fileTmpPath, $uploadPath)) {
        // Update database with new image path
        $query = "UPDATE `contenttable` SET `Image`=?, `Title`=?, `Capacity`=?, `Price`=?, `Description`=? WHERE `Content_ID`=?";
        $stmt = $contentadminconn->prepare($query);
        $stmt->bind_param("sssssi", $uploadPath, $Title, $capacity, $price, $Desc, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }
} else {
    // If no new image is uploaded, update other fields only
    $query = "UPDATE `contenttable` SET `Title`=?, `Capacity`=?, `Price`=?, `Description`=? WHERE `Content_ID`=?";
    $stmt = $contentadminconn->prepare($query);
    $stmt->bind_param("ssssi", $Title, $capacity, $price, $Desc, $id);
    $stmt->execute();
    $stmt->close();
}

header('location:admin-content.php');
?>
