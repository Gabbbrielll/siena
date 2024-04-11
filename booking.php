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
  $_SESSION['is_admin'];
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
  <link rel="stylesheet" href="Style.css">
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

<script>
  function hideButton(x)
{
    x.style.display = 'none';
}

  document.addEventListener("DOMContentLoaded", function() {
    // Get today's date
    var today = new Date().toISOString().split('T')[0];
    // Set the minimum date for the date input field
    document.getElementById("date").min = today;

    document.querySelector(".btn-check-availability").addEventListener("click", function() {
      // Get selected date and venue
      var date = document.getElementById("date").value;
      var venue = document.getElementById("venue").value;

      // Check if date and venue are selected
      if (date === "" || venue === "") {
        alert("Please select both date and venue.");
        return; // Prevent further execution
      }

      // Make AJAX request to check availability
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "checkavailability.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Parse JSON response
            var response = JSON.parse(xhr.responseText);
            // Update time slots dropdown
            var timeSlotsDropdown = document.getElementById("time");
            timeSlotsDropdown.innerHTML = "";
            response.timeSlots.forEach(function(timeSlot) {
              var option = document.createElement("option");
              option.text = timeSlot;
              option.value = timeSlot;
              timeSlotsDropdown.appendChild(option);
            });
            // Show time slots and book button
            document.getElementById("timeSlots").style.display = "block";
            document.getElementById("package").style.display = "block";
            document.querySelector(".btn-book").style.display = "block";
          } else {
            console.error("AJAX request failed with status: " + xhr.status);
          }
        }
      };
      // Send POST data
      var params = "date=" + encodeURIComponent(date) + "&venue=" + encodeURIComponent(venue);
      xhr.send(params);
    });
  });
</script>

<body>

  <?php include 'header.php'; ?>

  <br>
  <br>
  <br>

  <div class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
      </div>
      <div class="booking__container">
        <form method="POST" action="adminbookadd.php" id="bookingForm">
          <div class="form__group">
            <div class="input__group">
              <input type="date" id="date" name="Date" value="" required>
            </div>
            <p>Date</p>
          </div>

          <div class="form__group" id="venues">
            <div class="input__group">
              <div class="under">
              <select id="venue" name="Venue" required>
                  <option value="">Select Venue</option>
                  <?php
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

                  // Fetch venues from the database
                  $sqlVenues = "SELECT * FROM venues";
                  $resultVenues = $conn->query($sqlVenues);
                  if ($resultVenues->num_rows > 0) {
                    while ($row = $resultVenues->fetch_assoc()) {
                      echo "<option value='" . $row['id'] . "'>" . $row['venue_name'] . "</option>";
                    }
                  } else {
                    echo "<option value=''>No venues available</option>";
                  }
                  $conn->close();
                  ?>
                </select>
              </div>
            </div>
            <p>Venue</p>
          </div>

          <div class="form__group" id="timeSlots" style="display: none;">
            <div class="input__group">
              <div class="under">
                <select id="time" name="Time" required>
                  <!-- Options will be dynamically populated based on available time slots -->
                </select>
              </div>
            </div>
            <p>Time</p>
          </div>

          <div class="form__group" id="package" style="display: none;">
    <div class="input__group">
        <div class="under">
            <select id="package" name="Package" required>
                <option value="">Select Package</option>
                <?php
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

                // Fetch packages from the database
                $sqlPackages = "SELECT * FROM packages";
                $resultPackages = $conn->query($sqlPackages);
                if ($resultPackages->num_rows > 0) {
                    while ($row = $resultPackages->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['package_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No packages available</option>";
                }
                $conn->close();
                ?>
            </select>
        </div>
    </div>
    <p>Package</p>
</div>

          <button type="button" class="btn btn-check-availability" >
            <p class="button" >Check Availability</p>
          </button>

          <input type="text" id="status" name="Status" value="to confirm" style="display:none;">
          <input type="text" id="cust_id" name="cust_id" value="<?php echo $cust_id; ?>" style="display:none;">

          <button type="submit" class="btn btn-book" style="display:none;">
            <p class="button">Book Now</p>
          </button>
        </form>
      </div>
    </div>
  </div>

  <br><br><br>
  <div class="twrapper">
  <table class="table-box">
    <thead>
      <tr class="table-row table-head">
        <th class="table-cell first-cell">Customer Name</th>
        <th class="table-cell">Venue</th>
        <th class="table-cell">Date</th>
        <th class="table-cell">Time</th>
        <th class="table-cell fifth-cell">Package</th>
        <th class="table-cell last-cell">Status  </th> 
      </tr>
    </thead>
    <tbody>
      <?php
        include('adminbookconn.php');
        $query = mysqli_query($adminbookconn, "SELECT bookingtable.*, customer.cust_uname, venues.venue_name, packages.package_name
        FROM bookingtable 
        INNER JOIN customer ON bookingtable.cust_id = customer.cust_id
        INNER JOIN venues ON bookingtable.Venue = venues.id
        INNER JOIN packages ON bookingtable.Package = packages.id
        WHERE bookingtable.cust_id = $cust_id");
        while ($row = mysqli_fetch_array($query)) {
      ?>
      <tr class="table-row">
        <td class="table-cell first-cell"><?php echo htmlspecialchars($row['cust_uname']); ?></td>
        <td class="table-cell"><?php echo htmlspecialchars($row['venue_name']); ?></td>
        <td class="table-cell"><?php echo htmlspecialchars($row['Date']); ?></td>
        <td class="table-cell"><?php echo htmlspecialchars($row['Time']); ?></td>
        <td class="table-cell"><?php echo htmlspecialchars($row['package_name']); ?></td>
        <td class="table-cell last-cell"><?php echo htmlspecialchars($row['Status']); ?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
        <br>

  <?php include 'footer.php'; ?>

</body>

</html>