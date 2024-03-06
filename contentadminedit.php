<?php
include('contentadminconn.php');

if(isset($_POST['submit'])) {
    $id = $_GET['id'];
    $title = $_POST['Title'];
    $description = $_POST['Description'];

    // Prepare the update statement
    $stmt = $contentadminconn->prepare("UPDATE `contenttable` SET `Title`=?, `Description`=? WHERE `CONTENT_ID`=?");
    $stmt->bind_param("ssi", $title, $description, $id);

    // Execute the update statement
    if($stmt->execute()) {
        // Redirect after updating
        header("Location: admin-content.php");
        exit();
    } else {
        echo "Failed to update record.";
    }



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
            // Update database with new image path only if it's different from current image
            if($uploadPath !== $currentImage) {
                $query = "UPDATE `contenttable` SET `Image`='$uploadPath', `Title`='$title', `Description`='$description' WHERE `CONTENT_ID`='$id'";
                mysqli_query($contentadminconn, $query);
            } else {
                // If the uploaded image is the same as the current one, update other fields only
                $query = "UPDATE `contenttable` SET `Title`='$title', `Description`='$description' WHERE `CONTENT_ID`='$id'";
                mysqli_query($contentadminconn, $query);
            }

            // Redirect after updating
            header("Location: admin-content.php");
            exit();
        } else {
            echo "Failed to upload image.";
        }
    } else {
        // If no new image is uploaded, update other fields only
        $query = "UPDATE `contenttable` SET `Title`='$title', `Description`='$description' WHERE `CONTENT_ID`='$id'";
        mysqli_query($contentadminconn, $query);

        // Redirect after updating
        header("Location: admin-content.php");
        exit();
    }
}

// Fetch data for pre-filling form fields
$id = $_GET['id'];
$query = mysqli_query($contentadminconn, "SELECT * FROM `contenttable` WHERE `CONTENT_ID`='$id'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #333;
            margin-top: 10px;
            display: inline-block;
        }
        a:hover{
            color: red;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Content</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="image">Image:</label>
            <input type="file" name="Image" id="image">
            <label for="title">Title:</label>
            <input type="text" value="<?php echo htmlspecialchars($row['Title']); ?>" name="Title" id="title">
            <label for="description">Description:</label>
            <textarea name="Description" id="description"><?php echo htmlspecialchars($row['Description']); ?></textarea>
            <input type="submit" name="submit" value="Submit">
            <a href="admin-content.php">Back</a>
        </form>
    </div>
</body>
</html>

