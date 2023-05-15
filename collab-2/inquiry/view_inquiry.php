<?php
include('../admin/header.php');
?>
<title>Inquiry</title>
<h1>Inquiries</h1>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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

// Retrieve all inquiry data
$sql = "SELECT * FROM inquiry ORDER BY date_submited DESC";
$result = mysqli_query($conn, $sql);

// Display inquiry data in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Date Submited</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['inquiry_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['subject'] . "</td>";
        echo "<td>" . $row['date_submited'] . "</td>";
        echo "<td><a href='individual_inquiry.php?id=" . $row['inquiry_id'] . "' class='btn btn-primary'>View</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No inquiries found.";
}

mysqli_close($conn);

?>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
include('../admin/footer.php');
?>