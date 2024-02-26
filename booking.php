
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="script.js"></script>

  <style>
    .booking {
      text-decoration: underline;
    }

   
  </style>

</head>

<?php include 'header.php'; ?>
<br>

<body>

<div class="section__container header__container">
  <div class="header__image__container">
    <div class="header__content">
    </div>
    <div class="booking__container">


    <form>
    <div class="form__group">
  <div class="input__group">
    <div class="under">
    <select id="mySelect">
      <option value="">Select Venue</option>
      <option value="joaquin">Joaquin's Hall</option>
      <option value="rica">Rica's Hall</option>
      <option value="garden">The Garden</option>
    </select>
  </div>
  </div>
  <p>Venue</p>
</div>

            
<div class="form__group">
  <div class="input__group">
    <div class="under">
    <select id="mySelect">
      <option value="">Select Package</option>
      <option value="option1">Option 1</option>
      <option value="option2">Option 2</option>
      <option value="option3">Option 3</option>
    </select>
  </div>
  </div>
  <p>Package</p>
</div>

            <div class="form__group">
              <div class="input__group">
                <input type="Date">
              </div>
              <p>Date</p>
            </div>

            <div class="form__group">
              <div class="input__group">
                <input type="Time">
              </div>
              <p>Time</p>
            </div>
            
          </form>
          
          <button class="btn">
          <p class="button"> Book</p>
          </button>
        </div>

  </div>
</div>

</br> </br></br> </br></br> </br>

<?php include 'footer.php'; ?>

</body>

</html>