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
    .packages {
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

/* new april 25 */
.collapsible {
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  outline: none;
  font-size: 15px;
  border: 2px solid #f1d6a5;
  background-color: #50262f;
  border-radius: 5px;
  box-sizing: border-box;
  color: white;
  box-shadow: 0px 0px 5px currentcolor;
  position: relative; /* Added */
  
}

.active,
.collapsible:hover {
  background-color: #f1d6a5;
  color: #50262f;
}

.collapsible:after {
  content: '\25B8'; /* Unicode arrow character for right-pointing arrow */
  font-weight: bold;
  font-size: 50px; /* Adjust the font size to make the arrow bigger */
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
}

.collapsible:hover:after,
.active:after {
  color: #50262f; /* Change arrow color when hovered or active */
}

.active:after {
  content: "\25BE"; /* Unicode arrow character for down-pointing arrow */

}


.colcontent {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
  border-radius: 5px;

}
.col-div{
    margin: 50px;

}
.bullet-list{
    margin: 15px;
}
.image-button{
    padding:10px;
    margin-bottom: 10px;
    background-color:  #f1d6a5;
    color: #50262f;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size:12px;

}
.image-button:hover{
    background-color:  #50262f;
    color: #f1d6a5;

}
  </style>

</head>



<?php include 'header.php'; ?>
<body>

<br>
<br>
<!-- NEW April 25 -->
<div class="col-div">
<?php
include('packageadminconn.php');
$query = mysqli_query($packageadminconn, "SELECT * FROM packagetable");

if ($query) {
    while ($row = mysqli_fetch_array($query)) {
?>
        <button class="collapsible">
            <h1><?php echo $row["PackageTitle"]; ?></h1><p><?php echo $row["PackageType"]; ?></p>
        </button>
        <div class="colcontent">
            <br>
            <?php
            echo "<h2>Prices:</h2>";
            $prices = explode("|", $row["PackagePrice"]);
            foreach ($prices as $PackagePrice) {
                echo "<h2>" . str_replace("\t", " - ", $PackagePrice) . "</h2>";
            }
            ?>
            <br>
            <p>Package and Catering Inclusions:
                <?php
                if (!empty($row["PackageDescription"])) {
                    echo "<ul class='bullet-list'>";
                    $bullet_points = explode(",", $row["PackageDescription"]);
                    foreach ($bullet_points as $bullet_point) {
                        echo "<li>$bullet_point</li>";
                    }
                    echo "</ul>";
                }
                ?>
            </p>
            <button class="image-button" data-image="<?php echo $row["PackageImage"]; ?>">View Image</button>
        </div>
        <br>

<?php
    }
} else {
    // Handle query error here
    echo "Error executing query: " . mysqli_error($contentadminconn);
}
?>
</div>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            var isActive = this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (isActive) {
                // Open clicked section
                content.style.maxHeight = content.scrollHeight + "px";
                // Close other sections
                closeOtherSections(this);
            } else {
                // Close clicked section
                content.style.maxHeight = null;
            }
        });
    }

    function closeOtherSections(clickedElement) {
        for (i = 0; i < coll.length; i++) {
            var content = coll[i].nextElementSibling;
            if (coll[i] !== clickedElement && content.style.maxHeight) {
                // Close other sections
                coll[i].classList.remove("active");
                content.style.maxHeight = null;
            }
        }
    }
</script>
<script>
    var imageButtons = document.querySelectorAll(".image-button");
    imageButtons.forEach(function(button) {
      button.addEventListener("click", function() {
        var imageUrl = this.getAttribute("data-image");
        // Check if imageUrl is not empty
        if (imageUrl) {
          // Open a new window or tab to display the image
          window.open(imageUrl, "_blank");
        } else {
          alert("No image available for this package.");
        }
      });
    });
  </script>

<!-- hanggang dito new april 25--->

<!-- <?php

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
?> -->

<?php include 'footer.php'; ?>

</body>

</html>