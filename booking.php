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
                <li><a href="booking.php"><span class="home">Booking</span></a></li>
                <li><a href="content.php">Content</a></li>
                <button class="login-btn">LOG IN</button>
            </ul>
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
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Email</label>
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
                <form action="#">
                    <div class="input-field">
                        <input type="text" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" required>
                        <label>Create password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy">
                            I agree the
                            <a href="#" class="option">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account? 
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
        <h1>Book now</h1>
        <p>Create a memorable experience with Siena's</p>
      </div>
      <div class="booking__container">
        <form>
          <div class="form__group">
            <div class="input__group">
              <input type="text" />
              <label>Venue </label>
            </div>
            <p>Select a venue</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="text" />
              <label>Date</label>
            </div>
            <p>Add date</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="text" />
              <label>Time</label>
            </div>
            <p>Add Time</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="text" />
              <label>Package</label>
            </div>
            <p>Select a Package</p>
          </div>
        </form>
        
        <button class="btn"><p> Submit</p></button>
       
      
      </div>
    </div>
    </div>

  </br> </br>

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