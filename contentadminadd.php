<?php
include('contentadminconn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is uploaded without errors
    if ($_FILES['Image']['error'] === UPLOAD_ERR_OK) {
        // Get file name
        $filename = $_FILES['Image']['name'];
        // Move the uploaded file to desired location
        $upload_directory = "../siena-main/"; // Change this to your desired upload directory
        $target_path = $upload_directory . basename($filename);
        if (move_uploaded_file($_FILES['Image']['tmp_name'], $target_path)) {
            // File uploaded successfully, now insert data into database
            $title = $_POST['Title'];
            $capacity = $_POST['Capacity'];
            $price = $_POST['Price'];
            $description = $_POST['Description'];
            
            // Insert data into database
            $query = "INSERT INTO contenttable (Image, Title, Capacity, Price, Description) VALUES ('$filename', '$title', '$capacity', '$price', '$description')";
            if (mysqli_query($contentadminconn, $query)) {
                // Redirect back to admin-content.php
                header("Location: admin-content.php");
                exit(); // Make sure no other output is sent
                
            } else {
                // Error inserting data
                echo "Error: " . $query . "<br>" . mysqli_error($contentadminconn);
            }
        } else {
            // Error moving uploaded file
            echo "Error uploading file.";
        }
    } else {
        // Error uploading file
        echo "Error uploading file: " . $_FILES['Image']['error'];
    }
}
?>
