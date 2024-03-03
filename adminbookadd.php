<?php
session_start();

// Include database connection
include('adminbookconn.php');

// Get form inputs
$Venue = $_POST['Venue'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$Package = $_POST['Package'];
$Status = $_POST['Status'];
$cust_id = $_POST['cust_id'];
$is_admin = $_SESSION['is_admin'];

// Check for duplicate booking
$sqlCheckDuplicate = "SELECT * FROM bookings WHERE date = '$Date' AND time_slot = '$Time' AND venue_id = '$Venue'";
$resultDuplicate = mysqli_query($adminbookconn, $sqlCheckDuplicate);

if (mysqli_num_rows($resultDuplicate) > 0) {
    // Duplicate booking found
    echo "<script>alert('Selected booking is already booked. Please choose a different date, time, or venue.');</script>";
    echo "<script>window.location.href = 'booking.php';</script>";
    exit;
} else {
    // No duplicate booking found, proceed with insertion
    mysqli_query($adminbookconn, "INSERT INTO `bookingtable` (Venue, Date, Time, Package, Status, cust_id) VALUES ('$Venue','$Date','$Time','$Package','$Status','$cust_id')");
    mysqli_query($adminbookconn, "INSERT INTO `bookings` (date, time_slot, venue_id, package_id) VALUES ('$Date','$Time','$Venue','$Package')");

    // Check if the user is an admin or customer and redirect accordingly
    if ($is_admin == '1') {
        header('location:admin-booking.php');
    } else {
        echo "<script>alert('Booking is placed.\\nPlease wait for an admin to contact you for your payment details.');</script>";
        header('location:content.php?message=' . urlencode("Booking is placed.\\nPlease wait for an admin to contact you for your payment details."));
    }
}

// Close connection
mysqli_close($adminbookconn);
?>
