<?php
session_start();
$contentadminconn = mysqli_connect("localhost", "root", "", "sienas_events_place");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_SESSION['ad_uname'])) {
  $username = $_SESSION['ad_uname'];

} else {
  $username = ''; // Set username to empty if user is not logged in
}

$error_message = ""; // Check if there's an error message
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  if ($error === 'empty_fields') {
    $error_message = "Please fill out all the required fields.";
  }
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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      width: 100%;
      background: #50262f;
    }

    header {
      position: absolute;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 10;
      padding: 0 10px;
      margin-top: 20px;
    }

    h2 {
      width: 100%;
      color: #fff;
      max-width: 3000px;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h4 {
      width: 100%;
      color: #fff;
      max-width: 3000px;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .navbar {
      display: flex;
      padding: 22px 0;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      justify-content: space-between;
    }

    .navbar .hamburger-btn {
      display: none;
      color: #fff;
      cursor: pointer;
      font-size: 1.5rem;
    }

    .navbar .logo {
      gap: 10px;
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .navbar .logo img {
      width: 120px;
    }


    .navbar .links {
      display: flex;
      gap: 35px;
      list-style: none;
      align-items: center;
    }

    .navbar .close-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      display: none;
      color: #000;
      cursor: pointer;
    }

    .navbar .links a {
      color: #fff;
      font-size: 1.1rem;
      font-weight: 500;
      text-decoration: none;
      transition: 0.1s ease;
    }

    .navbar .links a:hover {
      color: #f1d6a5;
    }

    .navbar .login-btn {
      border: none;
      outline: none;
      background: #fff;
      color: black;
      font-size: 1rem;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 3px;
      cursor: pointer;
      transition: 0.15s ease;
    }

    .navbar .login-btn:hover {
      background: #ddd;
    }

    .form-popup {
      position: fixed;
      top: 50%;
      left: 50%;
      z-index: 10;
      width: 100%;
      opacity: 0;
      pointer-events: none;
      max-width: 720px;
      background: #fff;
      border: 2px solid #fff;
      transform: translate(-50%, -70%);
    }

    .show-popup .form-popup {
      opacity: 1;
      pointer-events: auto;
      transform: translate(-50%, -50%);
      transition: transform 0.3s ease, opacity 0.1s;
    }

    .form-popup .close-btn {
      position: absolute;
      top: 12px;
      right: 12px;
      color: #f1d6a5;
      cursor: pointer;
    }

    .blur-bg-overlay {
      position: fixed;
      top: 0;
      left: 0;
      z-index: 10;
      height: 100%;
      width: 100%;
      opacity: 0;
      pointer-events: none;
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      transition: 0.1s ease;
    }

    .show-popup .blur-bg-overlay {
      opacity: 1;
      pointer-events: auto;
    }

    .form-popup .form-box {
      display: flex;
    }

    .form-box .form-details {
      width: 100%;
      color: #fff;
      max-width: 330px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .login .form-details {
      padding: 0 40px;
      background: url("1.png");
      background-position: center;
      background-size: cover;
    }

    .signup .form-details {
      padding: 0 20px;
      background: url("1.png");
      background-position: center;
      background-size: cover;
    }

    .form-box .form-content {
      width: 100%;
      padding: 35px;
    }

    .form-box h2 {
      text-align: center;
      margin-bottom: 29px;
    }

    form .input-field {
      position: relative;
      height: 50px;
      width: 100%;
      margin-top: 20px;
    }

    .input-field input {
      height: 100%;
      width: 100%;
      background: none;
      outline: none;
      font-size: 0.95rem;
      padding: 0 15px;
      border: 1px solid #f1d6a5;
      border-radius: 3px;
    }

    .input-field input:focus {
      border: 1px solid #50262f;
    }

    .input-field label {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #50262f;
      pointer-events: none;
      transition: 0.2s ease;
    }

    .input-field input:is(:focus, :valid) {
      padding: 16px 15px 0;
    }

    .input-field input:is(:focus, :valid)~label {
      transform: translateY(-120%);
      color: #50262f;
      font-size: 0.75rem;
    }

    .form-box a {
      color: #50262f;
      text-decoration: none;
    }

    .form-box a:hover {
      text-decoration: underline;
    }

    form :where(.forgot-pass-link, .policy-text) {
      display: inline-flex;
      margin-top: 13px;
      font-size: 0.95rem;
    }

    form button {
      width: 100%;
      color: #fff;
      border: none;
      outline: none;
      padding: 14px 0;
      font-size: 1rem;
      font-weight: 500;
      border-radius: 3px;
      cursor: pointer;
      margin: 25px 0;
      background: #50262f;
      transition: 0.2s ease;
    }

    form button:hover {
      background: #f1d6a5;
    }

    .form-content .bottom-link {
      text-align: center;
    }

    .form-popup .signup,
    .form-popup.show-signup .login {
      display: none;
    }

    .form-popup.show-signup .signup {
      display: flex;
    }

    .signup .policy-text {
      display: flex;
      margin-top: 14px;
      align-items: center;
    }

    .signup .policy-text input {
      width: 14px;
      height: 14px;
      margin-right: 7px;
    }

    @media (max-width: 950px) {
      .navbar :is(.hamburger-btn, .close-btn) {
        display: block;
      }

      .navbar {
        padding: 15px 0;
      }

      .navbar .logo img {
        display: none;
      }

      .navbar .logo h2 {
        font-size: 1.4rem;
      }

      .navbar .links {
        position: fixed;
        top: 0;
        z-index: 10;
        left: -100%;
        display: block;
        height: 100vh;
        width: 100%;
        padding-top: 60px;
        text-align: center;
        background: #fff;
        transition: 0.2s ease;
      }

      .navbar .links.show-menu {
        left: 0;
      }

      .navbar .links a {
        display: inline-flex;
        margin: 20px 0;
        font-size: 1.2rem;
        color: #000;
      }

      .navbar .links a:hover {
        color: #f1d6a5;
      }

      .navbar .login-btn {
        font-size: 0.9rem;
        padding: 7px 10px;
      }
    }

    @media (max-width: 760px) {
      .form-popup {
        width: 95%;
      }

      .form-box .form-details {
        display: none;
      }

      .form-box .form-content {
        padding: 30px 20px;
      }
    }

    .main {
      border-radius: 2rem;
      margin-top: 50px;
      height: 90vh;
      width: 93%;
    }

    .wrapper,
    .slide {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .slide {
      overflow: hidden;
    }

    .slide::before {
      content: "";
      position: absolute;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 10;
    }

    .slide .image {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }

    .slide .image-data {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      width: 100%;
      z-index: 100;
    }

    .image-data span.text {
      font-size: 14px;
      font-weight: 400;
      color: #fff;
    }

    .image-data h2 {
      font-size: 45px;
      font-weight: 600;
      color: #fff;
    }

    a.button {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 25px;
      color: #333;
      background: #fff;
      text-decoration: none;
      margin-top: 25px;
      transition: all 0.3s ease;
    }

    a.button:hover {
      color: #fff;
      background-color: #c87e4f;
    }

    .nav-btn:hover {
      background: rgba(255, 255, 255, 0.4);
    }

    .swiper-button-next {
      right: 50px;
    }

    .swiper-button-prev {
      left: 50px;
    }

    .nav-btn::before,
    .nav-btn::after {
      font-size: 25px;
      color: #fff;
    }

    .swiper-pagination-bullet {
      opacity: 1;
      height: 12px;
      width: 12px;
      background-color: #fff;
      visibility: hidden;
    }

    .swiper-pagination-bullet-active {
      border: 2px solid #fff;
      background-color: #c87e4f;
    }

    @media screen and (max-width: 768px) {
      .nav-btn {
        visibility: hidden;
      }

      .swiper-pagination-bullet {
        visibility: visible;
      }
    }

    footer {
      width: 100%;
      position: relative;
      bottom: 0;
      left: 0;
      background: #111;
    }

    footer .content {
      max-width: 1350px;
      margin: auto;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    footer .content p,
    a {
      color: #fff;
    }

    footer .content .box {
      width: 33%;
      transition: all 0.4s ease;
    }

    footer .content .topic {
      font-size: 22px;
      font-weight: 600;
      color: #fff;
      margin-bottom: 16px;
    }

    footer .content p {
      text-align: justify;
    }

    footer .content .lower .topic {
      margin: 24px 0 5px 0;
    }

    footer .content .lower i {
      padding-right: 16px;
    }

    footer .content .middle {
      padding-left: 80px;
    }

    footer .content .middle a {
      line-height: 32px;
    }

    footer .content .right input[type="text"] {
      height: 45px;
      width: 100%;
      outline: none;
      color: #d9d9d9;
      background: #000;
      border-radius: 5px;
      padding-left: 10px;
      font-size: 17px;
      border: 2px solid #222222;
    }

    footer .content .right input[type="submit"] {
      height: 42px;
      width: 100%;
      font-size: 18px;
      color: #d9d9d9;
      background: #50262f;
      outline: none;
      border-radius: 5px;
      letter-spacing: 1px;
      cursor: pointer;
      margin-top: 12px;
      border: 2px solid #50262f;
      transition: all 0.3s ease-in-out;
    }

    .content .right input[type="submit"]:hover {
      background: none;
      color: #f1d6a5;
    }

    footer .content .media-icons a {
      font-size: 16px;
      height: 45px;
      width: 45px;
      display: inline-block;
      text-align: center;
      line-height: 43px;
      border-radius: 5px;
      border: 2px solid #222222;
      margin: 30px 5px 0 0;
      transition: all 0.3s ease;
    }

    .content .media-icons a:hover {
      border-color: #f1d6a5;
    }

    footer .bottom {
      width: 100%;
      text-align: right;
      color: #d9d9d9;
      padding: 0 40px 5px 0;
    }

    footer .bottom a {
      color: #f1d6a5;
    }

    footer a {
      transition: all 0.3s ease;
    }

    footer a:hover {
      color: #f1d6a5;
    }

    @media (max-width:1100px) {
      footer .content .middle {
        padding-left: 50px;
      }
    }

    @media (max-width:950px) {
      footer .content .box {
        width: 50%;
      }

      .content .right {
        margin-top: 40px;
      }
    }

    @media (max-width:560px) {
      footer {
        position: relative;
      }

      footer .content .box {
        width: 100%;
        margin-top: 30px;
      }

      footer .content .middle {
        padding-left: 0;
      }
    }


    /* booking */
    :root {
      margin-top: 50px;
      --primary-color: #50262f;
      --primary-color-dark: #50262f;
      --text-dark: #333333;
      --text-light: #767268;
      --extra-light: #f3f4f6;
      --white: #ffffff;
      --max-width: 1450px;
    }

    .section__container {

      max-width: var(--max-width);
      margin: auto;
      padding: 5rem 1rem;
    }

    .section__header {

      font-size: 2rem;
      font-weight: 600;
      color: var(--text-dark);
      text-align: center;
    }

    a {
      text-decoration: none;
    }

    img {
      width: 100%;
      display: flex;
    }

    body {
      font-family: "Poppins", sans-serif;
    }

    nav {

      max-width: var(--max-width);
      margin: auto;
      padding: 2rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav__logo {

      font-size: 1.5rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    .nav__links {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 2rem;
    }

    .link a {
      font-weight: 500;
      color: var(--text-light);
      transition: 0.3s;
    }

    .link a:hover {
      color: var(--primary-color);
    }

    .header__container {
      padding: 1rem 1rem 5rem 1rem;
    }

    .header__image__container {
      position: relative;
      min-height: 500px;
      background-image: linear-gradient(to right,
          rgba(80, 38, 47, 0.9),
          rgba(100, 125, 187, 0.1)),
        url("1.png");
      background-position: center center;
      background-size: cover;
      background-repeat: no-repeat;
      border-radius: 2rem;
    }

    .header__content {
      max-width: 600px;
      padding: 5rem 2rem;
    }

    .header__content h1 {
      margin-bottom: 1rem;
      font-size: 3.5rem;
      line-height: 4rem;
      font-weight: 600;
      color: var(--white);
    }

    .header__content p {
      color: var(--extra-light);
    }

    .booking__container {
      position: absolute;
      bottom: -5rem;
      left: 50%;
      transform: translateX(-50%);
      width: calc(100% - 6rem);
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 3rem 2rem;
      border-radius: 2rem;
      background-color: rgba(255, 255, 255, 0.7);
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }

    .booking__container form {
      width: 100%;
      flex: 1;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }

    .booking__container .input__group {
      width: 100%;
      position: relative;
    }

    .booking__container label {
      position: absolute;
      top: 50%;
      left: 0;
      transform: translateY(-50%);
      font-size: 1.2rem;
      font-weight: 500;
      color: var(--text-dark);
      pointer-events: none;
      transition: 0.3s;
    }

    .booking__container input {
      width: 100%;
      padding: 10px 0;
      font-size: 1rem;
      outline: none;
      border: none;
      background-color: transparent;
      border-bottom: 1px solid var(--primary-color);
      color: var(--text-dark);
    }

    .booking__container input:focus~label {
      font-size: 0.8rem;
      top: 0;
    }

    .booking__container .form__group p {
      margin-top: 0.5rem;
      font-size: 0.8rem;
      color: var(--text-light);
    }

    .booking__container .btn {
      padding: 1rem;
      outline: none;
      border: none;
      font-size: 1.5rem;
      color: var(--white);
      background-color: var(--primary-color);
      border-radius: 100%;
      width: 60px;
      height: 60px;
      cursor: pointer;
      transition: 0.3s;
    }

    .booking__container .btn:hover {
      background-color: var(--primary-color-dark);
      border-radius: 100%;
    }

    /* -------NEW----1/28----- */
    .before-admin-bg {
      width: 100%;
      background-color: var(--extra-light);

    }

    .admin-bg {
      width: 90%;
      height: 100%;
      margin-top: 50px;
      background-color: var(--extra-light);
      margin: auto;
      color: #000;
    }

    .btnE {
      background-color: #04AA6D;
      color: white;
      padding: 2px;
      border-radius: 3px;
    }

    .btnE:hover {
      color: white;
      background-color: gray;
    }

    .btnD {
      background-color: red;
      color: white;
      padding: 2px;
      border-radius: 3px;

    }

    .btnD:hover {
      color: white;
      background-color: gray;
    }

    table {
      margin: auto;
      font-size: 20px;
      width: 93%;
      border-collapse: collapse;
      border: none;
      text-align: center;
      border-bottom: 1px solid #ddd;

    }

    td {
      height: 50px;
      padding: 10px;
    }

    th {
      background-color: #50262f;
      color: white;
      top: 0px;
      position: sticky;
    }

    .twrapper {
      overflow-y: scroll;
      overflow-x: auto;
      max-height: 90vh;
    }

    .space {
      width: 100%;
      height: 50px;
      background-color: var(--extra-light);
    }



    /* -------NEW----1/28----- LOCAL*/
  </style>
</head>
<br>

<header>
  <nav class="navbar">
    
    <a class="logo">
      <img src="Siena_s_Events_Place-removebg-preview.png" alt="logo">
    </a>

    <?php if (!empty($username)) { ?>
      <h2 style='color: #fff; font-weight: bold; margin-right:500px; white-space: nowrap;'>Welcome!
        <?php echo $username; ?>
      </h2>
      <ul class="links">
        <span class="close-btn material-symbols-rounded">close</span>
        <li><a href="admin-booking.php"><span class="home">Manage Booking</span></a></li>
        <li><a href="admin-content.php"><span class="booking">Manage Content</span></a></li>
        <a href="logout.php" class="logout-btn">LOG OUT</a>
      </ul>
    <?php } else { ?>
      <ul class="links">
        <script>window.location.href = 'content.php';</script>";
      <?php } ?>
  </nav>
</header>

</br>

<!-- --------NEW---Feb24 ------>
<div class="before-admin-bg">
  <div class="admin-bg">
    <br>
    <div>
      <div class="contform">
      <form id="contentForm" method="POST" enctype="multipart/form-data" action="contentadminadd.php" onsubmit="return validateForm()">
        <label>Image: </label><input type="file" name="Image" required>
        <label>Title: </label><input type="text" name="Title" required>
        <label>Capacity: </label><input type="text" name="Capacity" required>
        <label>Price: </label><input type="text" name="Price" required>
        <label>Description: </label><input type="text" name="Description" required>
        <input type="submit" name="Submit">
      </form>
      </div>
      <br>
      <div class="twrapper">
        <table border="1">
          <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            include('contentadminconn.php');
            $query = mysqli_query($contentadminconn, "select * from `contenttable`");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><img src="../siena-main/<?php echo $row['Image']; ?>" width="auto" height="100"> </td>
                <td>
                  <?php echo $row['Title']; ?>
                </td>
                <td>
                  <?php echo $row['Capacity']; ?>
                </td>
                <td>
                  <?php echo $row['Price']; ?>
                </td>
                <td>
                  <?php echo $row['Description']; ?>
                </td>
                <td><a class="btnE" href="contentadminedit.php?id=<?php echo $row['Content_ID']; ?>">Edit</a>
              </td>
              <td><a class="btnD" href="#" onclick="confirmDeleteContent(<?php echo $row['Content_ID']; ?>)">Delete</a>
              </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
        <br>
      </div>
      

    <div>
      <br><br>
      <div class="contform2">
      <form id="contentForm2" method="POST" enctype="multipart/form-data" action="packageadminadd.php" onsubmit="return validatePackageForm()">
        <label>Image: </label><input type="file" name="PackageImage" required>
        <label>Title: </label><input type="text" name="PackageTitle" required>
        <label>Type: </label><input type="text" name="PackageType" required>
        <label>Price: </label><input type="text" name="PackagePrice" required>
        <label>Description: </label><input type="text" name="PackageDescription" required>
        <input type="submit" name="Submit">
      </form>
      </div>
      <br>
      <div class="twrapper">
        <table border="1">
          <thead>
            <th>Package Image</th>
            <th>Package Title</th>
            <th>Package Type</th>
            <th>Package Price</th>
            <th>Package Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            include('packageadminconn.php');
            $query = mysqli_query($packageadminconn, "select * from `packagetable`");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><img src="../siena-main/<?php echo $row['PackageImage']; ?>" width="auto" height="100"> </td>
                <td>
                  <?php echo $row['PackageTitle']; ?>
                </td>
                <td>
                  <?php echo $row['PackageType']; ?>
                </td>
                <td>
                  <?php echo $row['PackagePrice']; ?>
                </td>
                <td>
                  <?php echo $row['PackageDescription']; ?>
                </td>
                <td><a class="btnE" href="packageadminedit.php?id=<?php echo $row['Package_ID']; ?>">Edit</a>
              </td>
              <td><a class="btnD" href="#" onclick="confirmDeletePackage(<?php echo $row['Package_ID']; ?>)">Delete</a>
              </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Error message display -->
       <!-- pwedeng wala na toh -->
      <?php if (!empty($error_message)): ?>
        <div class="error-message">
          <?php echo $error_message; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="space">

</div>
<!-- --------NEW--------->
<script>
    function validateForm() {
      var form = document.getElementById("contentForm");
      var title = form.elements["Title"].value;
      var capacity = form.elements["Capacity"].value;
      var price = form.elements["Price"].value;
      var description = form.elements["Description"].value;

      // Check if any required field is empty
      if (title.trim() === '' || capacity.trim() === '' || price.trim() === '' || description.trim() === '') {
        alert("Please fill out all the required fields.");
        return false; // Prevent form submission
      }
      return true; // Allow form submission
    }

    function validatePackageForm() {
      var form = document.getElementById("contentForm2");
      var title = form.elements["PackageTitle"].value;
      var type = form.elements["PackageType"].value;
      var price = form.elements["PackagePrice"].value;
      var description = form.elements["PackageDescription"].value;

      // Check if any required field is empty
      if (title.trim() === '' || type.trim() === '' || price.trim() === '' || description.trim() === '') {
        alert("Please fill out all the required fields.");
        return false; // Prevent form submission
      }
      return true; // Allow form submission
    }

    function confirmDeleteContent(id) {
    if (confirm("Are you sure you want to delete this content?")) {
      window.location.href = 'contentadmindelete.php?id=' + id;
    }
  }

  function confirmDeletePackage(id) {
    if (confirm("Are you sure you want to delete this package?")) {
      window.location.href = 'packageadmindelete.php?id=' + id;
    }
  }

  </script>

</body>

</html>