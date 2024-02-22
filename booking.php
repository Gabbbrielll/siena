<?php
    session_start();
    $conn = new  mysqli("localhost", "root", "", "sienas_events_place");

    if(isset($_SESSION['cust_uname'])) {
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
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>
    <script src="Script.js" defer></script>

    <style>
      .home{
        text-decoration: underline;
      }
  </style>
  
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
                  <li><a href="booking.php"><span class="home">Booking</span></a></li>
                  <a href="logout.php" class="logout-btn">LOG OUT</a>
              </ul>
          <?php } else { ?>
            <ul class="links">
                  <span class="close-btn material-symbols-rounded">close</span>
                  <li><a href="content.php">Home</a></li>
                  <li><a href="booking.php"><span class="home">Booking</span></a></li>
                  <button class="login-btn">LOG IN</button>
              </ul>
          <?php } ?>
        </nav>    
    </header>

  </br>

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
                <form method="POST" action="registerconnect.php" onsubmit="return validateForm()">
                    <div class="input-field">
                        <input type="text" name="cust_email" id="email" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="cust_uname"required>
                        <label>Enter your Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="cust_pass" id="password" required>
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
  <script>
    function validateEmail(email) {
        // Regular expression for basic email validation
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function validatePassword(password) {
        // Minimum password length (NIST recommends at least 8 characters)
        var minLength = 8;
        // Maximum password length (NIST recommends no more than 64 characters)
        var maxLength = 64;
        // Regular expressions for character types
        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var digitRegex = /\d/;
        var specialCharRegex = /[!@#$%^&*()_+[\]{};':"\\|,.<>/?]/;

        // Check if password meets length requirements
        if (password.length < minLength || password.length > maxLength) {
            return false;
        }
        // Check if password contains at least one uppercase letter
        if (!uppercaseRegex.test(password)) {
            return false;
        }
        // Check if password contains at least one lowercase letter
        if (!lowercaseRegex.test(password)) {
            return false;
        }
        // Check if password contains at least one digit
        if (!digitRegex.test(password)) {
            return false;
        }
        // Check if password contains at least one special character
        if (!specialCharRegex.test(password)) {
            return false;
        }
        // Password meets all requirements
        return true;
    }

    function validateForm() {
        var emailInput = document.getElementById("email");
        var email = emailInput.value.trim();
        var passwordInput = document.getElementById("password");
        var password = passwordInput.value.trim();

        // Check if the email is valid
        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            emailInput.focus();
            return false;
        }

        // Check if the password is valid based on NIST standards
        if (!validatePassword(password)) {
            alert("Password must be at least 8 characters long and contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.");
            passwordInput.focus();
            return false;
        }

        return true;
    }
</script>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <div class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
        <h1>Book now</h1>
        <p>Create a memorable experience with Siena's</p>
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
        
        <button class="btn"><p> Submit</p></button>
       
      </div>
    </div>
    </div>

  </br> </br></br> </br></br> </br>

    <footer>
        <div class="content">
          <div class="left box">
            <div class="upper">
              <div class="topic">About us</div>
              <p>315 Buliran Rd., Sitio Bayugo, Antipolo, Philippines, 1870</p>
            </div>
            <div class="lower">
              <div class="topic">Contact us</div>
              <div class="phone">
                <a><i class="fas fa-phone-volume"></i>+630000000000</a>
              </div>
              <div class="email">
                <a><i class="fas fa-envelope"></i>info.sienasgathering@gmail.com</a>
              </div>
            </div>
          </div>
          <div class="middle box">
            <div class="topic">More From Siena's</div>
            <div><a href="#">FAQS </a></div>
            <div><a href="#">Terms of Service </a></div>
            <div><a href="#">Refund Policy</a></div>
            
            
          </div>
          <div class="right box">
            <div class="topic">Let's stay connected!</div>
            <form action="#">
              <input type="text" placeholder="Enter email address">
              <input type="submit" name="" value="Send">
              <div class="media-icons">
                <a href="https://www.facebook.com/sienaseventsplace"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/sienaseventsplace/"><i class="fab fa-instagram"></i></a>
              </div>
            </form>
          </div>
        </div>
        <div class="bottom">
          <p>Copyright © 2024 <a href="#">Siena's Events Place</a> All rights reserved</p>
        </div>
      </footer>

</body>
</html>