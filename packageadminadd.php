<?php
include('packageadminconn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is uploaded without errors
    if ($_FILES['PackageImage']['error'] === UPLOAD_ERR_OK) {
        // Get file name
        $filename = $_FILES['PackageImage']['name'];
        // Move the uploaded file to desired location
        $upload_directory = "../siena-main/"; // Change this to your desired upload directory
        $target_path = $upload_directory . basename($filename);
        if (move_uploaded_file($_FILES['PackageImage']['tmp_name'], $target_path)) {
            // File uploaded successfully, now insert data into database
            $PackageTitle = $_POST['PackageTitle'];
            $PackageType = $_POST['PackageType'];
            $PackagePrice = $_POST['PackagePrice'];
            $PackageDescription = $_POST['PackageDescription'];
            
            // Insert data into database
            $query = "INSERT INTO packagetable (PackageImage, PackageTitle, PackageType, PackagePrice, PackageDescription) VALUES ('$filename', '$PackageTitle', '$PackageType', '$PackagePrice', '$PackageDescription')";
            if (mysqli_query($packageadminconn, $query)) {
                // Redirect back to admin-content.php
                header("Location: admin-content.php");
                exit(); // Make sure no other output is sent
                
            } else {
                // Error inserting data
                echo "Error: " . $query . "<br>" . mysqli_error($packageadminconn);
            }
        } else {
            // Error moving uploaded file
            echo "Error uploading file.";
        }
    } else {
        // Error uploading file
        echo "Error uploading file: " . $_FILES['PackageImage']['error'];
    }
}
?>
