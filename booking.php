<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sienas_events_place");

if (isset($_SESSION['cust_uname'])) {
  $username = $_SESSION['cust_uname'];
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
  <script src="Script.js" defer></script>

  <style>
    .home {
      text-decoration: underline;
    }
  </style>

</head>

<?php include 'header.php'; ?>
<br>

<div class="section__container header__container">
  <div class="header__image__container">
    <div class="header__content">
    </div>
    <div class="booking__container">


      <div class="dropdown">
        <div class="select">
          <span class="selected"> Venue </span>
          <div class="caret"></div>
        </div>
        <ul class="menu">
          <li class="active"> Venue </li>
          <li value="garden"> The garden </li>
          <li value="rica"> Rica's hall </li>
          <li value="joaquin"> Joaquin's hall </li>
        </ul>
      </div>

      <div class="dropdown">
        <div class="select">
          <span class="selected"> Package </span>
          <div class="caret"></div>
        </div>
        <ul class="menu">
          <li class="active"> Package</li>
          <li value=""> bongga! </li>
          <li value=""> pwede na </li>
          <li value=""> tagtipid </li>
        </ul>
      </div>

      <div class="dropdown">
        <div class="select">
          <span class="selected"> Date </span>
          <div class="caret"></div>
        </div>
        <ul class="menu">
          <input type="date">
        </ul>
      </div>

      <div class="dropdown">
        <div class="select">
          <span class="selected"> Time </span>
          <div class="caret"></div>
        </div>
        <ul class="menu">
          <input type="time">
        </ul>
      </div>

      <button class="btn">
        <p> Submit</p>
      </button>

    </div>
  </div>
</div>

</br> </br></br> </br></br> </br>

<?php include 'footer.php'; ?>

</body>

</html>