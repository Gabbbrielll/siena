<header>
    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a class="logo">
            <img src="Siena_s_Events_Place-removebg-preview.png" alt="logo">
        </a>

        <?php if (!empty($username)) { ?>
            <h2>Welcome!
                <?php echo $username; ?>
            </h2>
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
                    <label>Email/Username</label>
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
                    <input type="text" name="cust_uname" required>
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