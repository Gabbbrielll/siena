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

<div>
  <section class="main swiper mySwiperr">
    <div class="wrapper swiper-wrapper">
      <div class="slide swiper-slide">
        <img src="start.png" alt="" class="image" />
        <div class="image-data">
          </br>
        </div>
      </div>
  </section>
</div>

</br></br>

<div>
  <section class="main swiper mySwiper">
    <div class="wrapper swiper-wrapper">
      <div class="slide swiper-slide">
        <img src="joaquin.png" alt="" class="image" />
        <div class="image-data">
          <h2>
            Joaquin's Hall
          </h2>
          <span class="text"> Elevate your events in a larger setting, perfect for creating memorable moments with a
            touch of grandeur. <br> Versatile and inviting, Joaquin's Hall is the ideal canvas for your unique
            celebrations. </span>
          </br>
          <a href="booking.php" class="button">Book now</a>
        </div>
      </div>
      <div class="slide swiper-slide">
        <img src="rica.png" alt="" class="image" />
        <div class="image-data">
          <h2>
            Rica's Hall
          </h2>
          <span class="text"> An Intimate indoor elegance. Ideal for creating magical moments in a cozy setting perfect
            for all your special occasions at Siena’s Events Place, Rica’s Hall. </span>
          </br>
          <a href="booking.php" class="button">Book now</a>
        </div>
      </div>
      <div class="slide swiper-slide">
        <img src="garden.png" alt="" class="image" />
        <div class="image-data">
          <h2>
            The Garden
          </h2>
          <span class="text"> Siena’s Events Place Grandest outdoor venue, The Garden. Perfect for rustic themed events
            and set-ups with lush greenery and elegant designs</span>
          </br>
          <a href="booking.php" class="button">Book now</a>
        </div>
      </div>
    </div>

    <div class="swiper-button-next nav-btn"></div>
    <div class="swiper-button-prev nav-btn"></div>
    <div class="swiper-pagination"></div>
  </section>
</div>

<script src="swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
</br></br>

<?php
include('contentadminconn.php');
$query = mysqli_query($contentadminconn, "SELECT * FROM contenttable");

if ($query) {
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="before-admin-bg">
            <div class="admin-bg">
                <section class="image-section">
                    <?php if (!empty($row["Image"])) { ?>
                        <img src="<?php echo $row["Image"]; ?>" alt="Image description">
                    <?php } ?>
                    <h1><?php echo $row["Title"]; ?></h1>
                    <p><?php echo $row["Capacity"]; ?></p>
                    <br>
                    <?php
                    echo "<h2>Prices:</h2>";
                    $prices = explode("|", $row["Price"]);
                    foreach ($prices as $price) {
                        echo "<h2>" . str_replace("\t", " - ", $price) . "</h2>";
                    }
                    ?>
                    <br>
                    <p>Inclusions and Amenities:<?php
                    if (!empty($row["Description"])) {
                        echo "<ul>";
                        $bullet_points = explode(",", $row["Description"]);
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