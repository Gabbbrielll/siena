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
                  <li><a href="content.php"><span class="home">Home</span></a></li>
                  <li><a href="booking.php">Booking</a></li>
                  <a href="logout.php" class="logout-btn">LOG OUT</a>
              </ul>
          <?php } else { ?>
            <ul class="links">
                  <span class="close-btn material-symbols-rounded">close</span>
                  <li><a href="content.php"><span class="home">Home</span></a></li>
                  <li><a href="booking.php">Booking</a></li>
                  <button class="login-btn">LOG IN</button>
              </ul>
          <?php } ?>
        </nav>    
    </header>