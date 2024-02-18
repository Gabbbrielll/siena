<?php
    /* session_start();
    $conn = new  mysqli("localhost", "root", "", "sienas_events_place");

    if(isset($_SESSION['cust_uname'])) {
      $username = $_SESSION['cust_uname'];
  } else {
      $username = ''; // Set username to empty if user is not logged in
  } */
?>
<!DOCTYPE html>
<br lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siena's Events Place</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>
    <script src="script.js" defer></script>
</head>
<br>

    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a class="logo">
                <img src="Siena_s_Events_Place-removebg-preview.png" alt="logo">
            </a>

            <?php if(!empty($username)) { ?>
              <h2>Welcome! <?php echo $username; ?></h2>
              <ul class="links">
                  <span class="close-btn material-symbols-rounded">close</span>
                  <li><a href="content.php">Home</a></li>
                  <li><a href="booking.php">Booking</a></li>
                  <a href="logout.php" class="logout-btn">LOG OUT</a>
              </ul>
          <?php } else { ?>
            <ul class="links">
                  <span class="close-btn material-symbols-rounded">close</span>
                  <li><a href="content.php">Home</a></li>
                  <li><a href="booking.php">Booking</a></li>
                  <button class="login-btn">LOG IN</button>
              </ul>
          <?php } ?>
        </nav>    
    </header>
    
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back!</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form method="POST" action="loginconnect.php">
                    <div class="input-field">
                        <input type="text" name="cust_email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="cust_pass" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit" name="login">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form method="POST" action="registerconnect.php">
                    <div class="input-field">
                        <input type="text" name="cust_email" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="cust_uname"required>
                        <label>Enter your Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="cust_pass" required>
                        <label>Create password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="confirmPassword" required>
                        <label>Confirm password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy" required name="checkbox" value="check" id="agree">
                        <label for="policy">
                            I agree the
                            <a href="#" class="option">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit" name="register">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account? 
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


</body>
</html>