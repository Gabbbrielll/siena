<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sienas_events_place");

if (isset($_SESSION['cust_uname'])) {
  $username = $_SESSION['cust_uname'];
  /* echo "<p style='color: #f1d6a5; font-weight: bold;'>Welcome, $username!</p>"; */
} else {
  $username = ''; // Set username to empty if user is not logged in
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
  </style>

</head>


<?php include 'header.php'; ?>


<div>
  <section class="main swiper mySwiper">
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

<?php include 'footer.php'; ?>

</body>

</html>