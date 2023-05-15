<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password match with database
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User found
        if ($email == 'admin@admin.com' && $password == 'admin123') {
            // Admin user, start session and redirect to admin page
            $_SESSION['email'] = $email;
            header("Location: admin/admin.php");
            exit();
        } else {
            // Regular user, start session and redirect to dashboard
            $_SESSION['email'] = $email;
            echo "<script>alert('Login successful!')</script>";
            header("refresh:0;url=index.php");
            exit();
        }
    // Check if session variable is set and show popup message
    } else {
        // User not found, show error message
        echo "<script>alert('Invalid email or password. Please try again.')</script>";
    }
}



// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login | Tours and Travels</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h1>Tours and Travels</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#tours">Tours</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign up</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <div class="container1">
                <h2>Login</h2>
                <form action ="login.php" method="post">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <center> <a href="signup.php"> Don't have an account ? </a> </center>

                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 Tours and Travels</p>
        </div>
    </footer>
</body>
</html>