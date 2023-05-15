<?php

// Establish a database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user input to prevent SQL injection
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$dateSubmited = date('Y-m-d H:i:s');

// Insert inquiry data into the database
$sql = "INSERT INTO inquiry (name, email, subject, description, date_submited) VALUES ('$name', '$email', '$subject', '$description', '$dateSubmited')";

if (mysqli_query($conn, $sql)) {
    $message = "Your inquiry has been submitted. We will get back to you soon.";
    echo "<script>
            if (confirm('$message')) {
                window.location.href = '../index.php';
            } else {
                window.location.href = '../index.php';
            }
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);


?>
