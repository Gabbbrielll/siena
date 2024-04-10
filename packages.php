<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sienas_events_place");

if (isset($_SESSION['cust_uname'])) {
  $username = $_SESSION['cust_uname'];
} else {
  $username = ''; // Set username to empty if user is not logged in
}
if(isset($_GET['message'])) {
  $message = $_GET['message'];
  echo "<script>alert(\"$message\");</script>";
  echo "<script>window.location.href = 'content.php';</script>";
}
?>
<!DOCTYPE html>
<br lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siena's Events Place</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="script.js" defer></script>

  <style>
    .home {
      text-decoration: underline;
    }

    /* new 2/24 */
  .before-admin-bg{
    width: 100%;
    height: auto;
    background-color: transparent;

  }
  .admin-bg{
    width: 90%;
    height: 100%;
    margin-top: 50px;
    background-color: var(--extra-light);
    margin: auto;
    color: #000;
  }
  .image-section {
  display: flex;
  flex-direction: column;
  margin: 20px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.image-section img {
  width: 100%;
  max-height: auto;
  object-fit: cover;
  margin-bottom: 10px;
}

.image-section h2 {
  font-size: 1.2em;
  margin: 0;
}

.image-section p {
  font-size: 0.9em;
  color: #777;
}
  </style>

</head>


<?php include 'header.php'; ?>
<body>

<br>
<br>

<?php
include('packageadminconn.php');
$query = mysqli_query($packageadminconn, "SELECT * FROM packagetable");

if ($query) {
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="before-admin-bg">
            <div class="admin-bg">
                <section class="image-section">
                    <?php if (!empty($row["PackageImage"])) { ?>
                        <img src="<?php echo $row["PackageImage"]; ?>" alt="Image description">
                    <?php } ?>
                    <h1><?php echo $row["PackageTitle"]; ?></h1>
                    <p><?php echo $row["PackageType"]; ?></p>
                    <br>
                    <?php
                    echo "<h2>Prices:</h2>";
                    $prices = explode("|", $row["PackagePrice"]);
                    foreach ($prices as $PackagePrice) {
                        echo "<h2>" . str_replace("\t", " - ", $PackagePrice) . "</h2>";
                    }
                    ?>
                    <br>
                    <p>Package and Catering Inclusions:<?php
                    if (!empty($row["PackageDescription"])) {
                        echo "<ul>";
                        $bullet_points = explode(",", $row["PackageDescription"]);
                        foreach ($bullet_points as $bullet_point) {
                            echo "<li>$bullet_point</li>";
                        }
                        echo "</ul>";
                    }
                    ?></p>
                </section>
            </div>
        </div>
        <?php
    }
} else {
    // Handle query error here
    echo "Error executing query: " . mysqli_error($contentadminconn);
}
?>



<?php include 'footer.php'; ?>

</body>

</html>