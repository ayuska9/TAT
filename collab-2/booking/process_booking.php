<?php
// establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind statement
$stmt = $conn->prepare("INSERT INTO bookings (user_id, package_id, num_people, total_cost, payment_method) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiiis", $user_id, $package_id, $num_people, $total_cost, $payment_method);

// get values from form
$user_id = $_POST["user_id"];
$package_id = $_POST["package_id"];
$num_people = $_POST["num_people"];
$total_cost = $_POST["total_cost"];
$payment_method = $_POST["payment_method"];

// execute statement
if ($stmt->execute()) {
    echo "Booking added successfully.";
} else {
    echo "Error adding booking: " . $stmt->error;
}

// close statement and connection
$stmt->close();
$conn->close();
?>
