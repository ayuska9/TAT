<?php
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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Validate contact field
    if (!ctype_digit($contact)) {
        echo "<script>alert('Contact number must be an integer. Please try again.')</script>";
    } else {
        // Get current date and time
        $dateadded = date("Y-m-d H:i:s");

        // Check if email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // Insert data into database
            $sql = "INSERT INTO user (firstname, lastname, username, email, password, address, contact, date_added) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$address', '$contact', '$dateadded')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('User added successfully!')</script>";
                header("Location: login.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
        } else {
            echo "<script>alert('Invalid email. Please try again.')</script>";
        }
    }
}


// Function to clean input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign up | Tours and Travels</title>
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
				<h2>Sign up</h2>
				
				<form action ="signup.php" method="post">
                    <label for="firstname">First name</label>
					<input type="firstname" id="firstname" name="firstname" required>

                    <label for="lastname">Last name</label>
					<input type="lastname" id="lastname" name="lastname" required>

					<label for="username">Username</label>
					<input type="username" id="username" name="username" required>

					<label for="email">E-mail</label>
					<input type="email" id="email" name="email" required>

					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>

                    <label for="address">Address</label>
					<input type="address" id="address" name="address" required>
                    <label for="contact">Contact no:</label>
<input type="text" id="contact" name="contact" pattern="[^0-9]+" required>
<small>Only non-numeric characters are allowed.</small>
					<center> <a href="login.php"> Already have an account ? </a> </center>
                    

					<button type="submit" name="submit">Sign up</button>
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