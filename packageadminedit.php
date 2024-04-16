<?php
session_start();
include('packageadminconn.php');

if(isset($_POST['submit'])) {
    $id = $_GET['id'];
    $PackageTitle = $_POST['PackageTitle'];
    $PackageImage=$_POST['PackageImage'];
    $PackageType = $_POST['PackageType'];
    $PackagePrice = $_POST['PackagePrice'];
    $PackageDescription = $_POST['PackageDescription'];

    // Prepare the update statement
    $stmt = $packageadminconn->prepare("UPDATE `packagetable` SET `PackageTitle`=?, `PackageType`=?, `PackagePrice`=?, `PackageDescription`=? WHERE `Package_ID`=?");
    $stmt->bind_param("ssi", $PackageTitle, $PackageType, $PackagePrice, $PackageDescription, $id);

    // Execute the update statement
    if($stmt->execute()) {
        // Redirect after updating
        header("Location: admin-content.php");
        exit();
    } else {
        echo "Failed to update record.";
    }



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
            // Update database with new image path only if it's different from current image
            if($uploadPath !== $currentImage) {
                $query = "UPDATE `packagetable` SET `PackageImage`='$uploadPath', `PackageTitle`='$PackageTitle', `PackageType`='$PackageType', `PackagePrice`='$PackagePrice', `PackageDescription`='$PackageDescription' WHERE `Package_ID`='$id'";
                mysqli_query($packageadminconn, $query);
            } else {
                // If the uploaded image is the same as the current one, update other fields only
                $query = "UPDATE `packagetable` SET `PackageTitle`='$PackageTitle', `PackageType`='$PackageType', `PackagePrice`='$PackagePrice', `PackageDescription`='$PackageDescription' WHERE `Package_ID`='$id'";
                mysqli_query($packageadminconn, $query);
            }

            // Redirect after updating
            header("Location: admin-content.php");
            exit();
        } else {
            echo "Failed to upload image.";
        }
    } else {
        // If no new image is uploaded, update other fields only
        $query = "UPDATE `packagetable` SET `PackageTitle`='$PackageTitle', `PackageType`='$PackageType', `PackagePrice`='$PackagePrice', `PackageDescription`='$PackageDescription' WHERE `Package_ID`='$id'";
        mysqli_query($packageadminconn, $query);

        // Redirect after updating
        header("Location: admin-content.php");
        exit();
    }
}

// Fetch data for pre-filling form fields
$id = $_GET['id'];
$query = mysqli_query($packageadminconn, "SELECT * FROM `packagetable` WHERE `PACKAGE_ID`='$id'");
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
            background-image:url("borderlineflo.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: auto;
            color:#f1d6a5;
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
            margin-bottom: 10px;
            margin-top: 10px;
            border: 2px solid #f1d6a5;
            background-color: #50262f;
            border-radius: 5px;
            box-sizing: border-box;
            color:white;
            box-shadow: 0px 0px 5px currentcolor;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #f1d6a5;
            color: #50262f;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size:12px;
            margin: 5px;
        }
        input[type="submit"]:hover {
            background-color: rgb(219, 189, 138);
        }
        a {
            text-decoration: none;
            background-color: #f1d6a5;
            color: #50262f;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size:12px;
            margin: 5px;
        }
        a:hover{
            background-color: rgb(219, 189, 138);
        }
        label {
            font-weight: bold;
        }
        h2{
            padding: 5px 5px 5px 5px;
            border-radius:5px;
            background-color: #f1d6a5;
            color: #50262f ;
            text-align:center;
            border: 2px solid #f1d6a5;
            box-shadow: 0px 0px 8px #f1d6a5;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Edit Package</h2>
        <form method="POST" enctype="multipart/form-data" action="packageadminupdate.php">
            <label for="PackageImage">Package Image:</label>
            <input type="file" value="<?php echo htmlspecialchars($row['PackageImage']); ?>" name="PackageImage" id="PackageImage">
            <label for="PackageTitle">PackageTitle:</label>
            <input type="text" value="<?php echo htmlspecialchars($row['PackageTitle']); ?>" name="PackageTitle" id="PackageTitle">

            <label for="PackageType">Package Type:</label>
            <input type="text" value="<?php echo htmlspecialchars($row['PackageType']); ?>" name="PackageType" id="PackageType">
            <p>Use pipline (|) as separator if you have 2 or more prices</p>
            <label for="PackagePrice">Package Price:</label>
            <input type="text" value="<?php echo htmlspecialchars($row['PackagePrice']); ?>" name="PackagePrice" id="PackagePrice">

            <p>Use comma (,) as separator for each Package and Catering Inclusion</p>
            <label for="PackageDescription">Package Description:</label>
            <textarea name="PackageDescription" id="PackageDescription"><?php echo htmlspecialchars($row['PackageDescription']); ?></textarea>

            <input type="text" id="id" name="id" value="<?php echo $id; ?>" style="display:none;">


            <input type="submit" name="submit" value="Submit">
            <a href="admin-content.php">Back</a>
        </form>
    </div>
</body>
</html>

