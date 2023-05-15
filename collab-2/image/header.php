<link rel="stylesheet" href="style.css">
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
<link rel="stylesheet" href="style.css">
<header>
    <h1>Tours and Travels</h1>
       <nav>
    <ul>
    <li><a href="../index.php">Home</a></li>
            <li><a href="image/package_view.php">Tours</a></li>
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
                        echo '<li><a href="#guest">' . $resul['email'] . '</a></li>';
                        echo '<li><a href="login.php">Logout</a></li>';
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
        </ul>
    </nav>
</header>