
<?php

// Start the session
session_start();

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//   // Redirect to login page if not logged in
//   header('Location: login.php');
//   exit;
// }

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

// Get the user's booking requests
$user_id = $_GET['id'];
$sql = "SELECT * FROM bookings WHERE user_id = $user_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo 'Error retrieving booking requests: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tours and Travels</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">

</head>
<body>
<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<header>
    <h1 style="color:white;">Tours and Travels</h1>
    <  <nav>
    <ul>
        <li><a href="index.php#about" >About Us</a></li>
        <li><a href="image/package_view.php">Tours</a></li>
        <li><a href="index.php#contact">Contact Us</a></li>
        <?php
           if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $sel = "SELECT * FROM user WHERE email = '$email'";

            $query = mysqli_query($conn, $sel);
            if (!$query) {
                echo "Error: " . mysqli_error($conn);
            } else {
                $resul = mysqli_fetch_assoc($query);
                if ($resul) {
                    echo '<li><a href="#guest">' . $resul['username'] . '</a></li>';
                    echo '<li><a href="login.php">Logout</a></li>';
                    echo '<li><a href="mybooking.php?id=' . $resul['id'] . '">My bookings</a></li>';

                }
            }
        } else {
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="signup.php">Signup</a></li>';
        }
        
        ?>
    </ul>
</nav>
</header>
<body>
  <h1>My Booking</h1>
  <table>
    <thead>
      <tr>
        <th>Package Name</th>
        <th>Number of People</th>
        <th>Total Cost</th>
        <th>Status</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['package_id']; ?></td>
          <td><?php echo $row['num_people']; ?></td>
          <td><?php echo $row['total_cost']; ?></td>
          <td><?php echo $row['state']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
<style>table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 20px auto;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

h1 {
  text-align: center;
  margin-top: 50px;
}
</style>
<?php include('footer.php'); ?>