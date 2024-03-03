<?php
// checkavailability.php

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sienas_events_place";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get selected date and venue from the POST request
$date = $_POST['date'];
$venue = $_POST['venue'];

// Define available time range
$startTime = strtotime('9:00 AM');
$endTime = strtotime('10:00 PM');

// Prepare array to store available time slots
$availableTimeSlots = [];

// Get existing bookings for the selected date and venue from the database
$sqlExistingBookings = "SELECT time_slot FROM bookings WHERE date = ? AND venue_id = ?";
$stmtExistingBookings = $conn->prepare($sqlExistingBookings);
$stmtExistingBookings->bind_param("ss", $date, $venue);
$stmtExistingBookings->execute();
$resultExistingBookings = $stmtExistingBookings->get_result();
$existingTimeSlots = [];
while ($row = $resultExistingBookings->fetch_assoc()) {
    $existingTimeSlots[] = $row['time_slot'];
}

// Loop through time range to find available time slots
$current = $startTime;
while ($current <= $endTime) {
    $currentTimeSlot = date('h:i A', $current); // Format time as "HH:MM AM/PM"
    
    // Check if current time slot is available (not booked)
    if (!in_array($currentTimeSlot, $existingTimeSlots)) {
        $availableTimeSlots[] = $currentTimeSlot;
    }
    
    // Move to the next time slot (add 5 hours)
    $current = strtotime('+5 hour', $current); // Retained 5-hour interval
}

// Close the prepared statement
$stmtExistingBookings->close();

// Return JSON response
$response = [
    'timeSlots' => $availableTimeSlots
];

header('Content-Type: application/json');
echo json_encode($response);

// Close connection
$conn->close();
?>
