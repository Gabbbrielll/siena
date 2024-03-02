<?php
session_start();

// Establishing a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sienas_events_place";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Checking if the user is logged in
if (isset($_SESSION['cust_uname'])) {
  $username = $_SESSION['cust_uname'];
  $cust_id = $_SESSION['cust_id'];
} else {
  $username = ''; // Set username to empty if user is not logged in
}

// Redirect to login page if user is not logged in
if (empty($username)) {
  echo "<script>alert('Please login first.');</script>";
  echo "<script>window.location.href = 'content.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siena's Events Place</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="script.js" defer></script>

  <style>
    .booking {
      text-decoration: underline;
    }
  </style>

</head>

<body>

  <?php include 'header.php'; ?>

  <br>
  <br>

  <div class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
      </div>
      <div class="booking__container">
        <form method="POST" action="adminbookadd.php">
          <div class="form__group">
            <div class="input__group">
              <div class="under">
                <select id="venue" name="Venue">
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
                <select id="package" name="Package">
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
              <input type="date" id="date" name="Date" value="<?php echo date('m-d-Y'); ?>">
            </div>
            <p>Date</p>
          </div>

          <div class="form__group">
            <div class="input__group">
              <input type="time" id="time" name="Time" value="00:00">
            </div>
            <p>Time</p>
          </div>

          <input type="text" id="status" name="Status" value="to confirm" style="display:none;">
          <input type="text" id="cust_id" name="cust_id" value="<?php echo $cust_id; ?>" style="display:none;">

          <button type="submit" class="btn">
            <p class="button">Book</p>
          </button>

        </form>
      </div>
    </div>
  </div>

  <br>

  <?php include 'footer.php'; ?>

</body>

</html>