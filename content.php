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
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="home.php">Home</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="content.php"><span class="home"> Content</span></a></li>
                <button class="login-btn">LOG IN</button>
            </ul>
        </nav>    
    </header>
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Email/Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit">Log In</button>
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
                <form action="POST" action="registerconnect.php">
                <?php 
                        $errorMsg = "";

                        if (isset($_GET['error'])) {
                            switch ($_GET['regerror']) {
                                case 1:
                                    $errorMsg = "Email has already been taken! Please try again.";
                                    break;
                                case 2:
                                    $errorMsg = "Password must be identical! Please try again.";
                            }

                            echo '<li class="alert alert-danger fw-bold">'.$errorMsg.'</li>';
                        } else if (isset($_GET['success'])) {
                          echo '<li class="alert alert-success fw-bold">Account created! Please login to your account</li>';
                      }
                    ?>
                    <div class="input-field">
                        <input type="text" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="text" required>
                        <label>Enter your Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required>
                        <label>Create password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required>
                        <label>Confirm password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    <div>
        <section class="main swiper mySwiper">
            <div class="wrapper swiper-wrapper">
              <div class="slide swiper-slide">
                <img src="1.png" alt="" class="image" />
                <div class="image-data">
                  <h2>
                    Joaquin's Hall
                  </h2>
                  <span class="text"> Elevate your events in a larger setting, perfect for creating memorable moments with a touch of grandeur. <br> Versatile and inviting, Joaquin's Hall is the ideal canvas for your unique celebrations. </span>
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
                  <span class="text"> An Intimate indoor elegance. Ideal for creating magical moments in a cozy setting perfect for all your special occasions at Siena’s Events Place, Rica’s Hall. </span>
                </br>
                  <a href="booking.php" class="button">Book now</a>
                </div>
              </div>
              <div class="slide swiper-slide">
                <img src="3.png" alt="" class="image" />
                <div class="image-data">
                  <h2>
                    The Garden
                  </h2>
                  <span class="text"> Siena’s Events Place Grandest outdoor venue, The Garden. Perfect for rustic themed events and set-ups with lush greenery and elegant designs</span>
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
                <a><i class="fas fa-phone-volume"></i>+631234567890</a>
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