<?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tat';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check for errors
if (!$conn) {
  die('Error connecting to the database: ' . mysqli_connect_error());
}

// Get the form data
$booking_id = $_POST['booking_id'];
$status = $_POST['state'];


// Update the booking status
$sql = "UPDATE bookings SET state='$status' WHERE id=$booking_id";
echo "SQL: " . $sql . "<br>";
$result = mysqli_query($conn, $sql);
echo "Result: " . $result . "<br>";

// Check for errors
if (!$result) {
  echo 'Error updating booking status: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the admin view
header('Location: bookings.php');
exit;

?>
