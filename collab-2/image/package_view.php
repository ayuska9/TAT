<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="style.css">
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
session_start();
?>
<header>
    <h1 style="color:white;">Tours and Travels</h1>
    <  <nav>
    <ul>
        <li><a href="../index.php#about" >About Us</a></li>
        <li><a href="../image/package_view.php">Tours</a></li>
        <li><a href="../index.php#contact">Contact Us</a></li>
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
                    echo '<li><a href="../#guest">' . $resul['username'] . '</a></li>';
                    echo '<li><a href="../login.php">Logout</a></li>';
                    echo '<li><a href="../mybooking.php?id=' . $resul['id'] . '">My bookings</a></li>';

                }
            }
        } else {
            echo '<li><a href="../login.php">Login</a></li>';
            echo '<li><a href="../signup.php">Signup</a></li>';
        }
        
        ?>
    </ul>
</nav>
</header>


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

// Retrieve package data
$sql = "SELECT * FROM packages WHERE status = 1";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="row">
        <?php
        // Loop through package data and display in cards
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4">
                <div class="card">
                <img src="<?php echo "package/".$row['image']; ?>" width="400px" alt="<?php echo $row['title']; ?>">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><strong>Price: $</strong> <?php echo $row['cost']; ?></p>
                        <a href="../view_package.php?id=<?php echo $row['package_id']; ?>" class="btn btn-primary">View</a>

                    </div>
                </div>
            </div>
        <?php
        }
        mysqli_close($conn);
        ?>
    </div>
</div>
<?php include('../footer.php') ?>
<style>a.btn-primary {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin: 0 auto;
}</style?
