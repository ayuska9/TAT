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
    
    // Get current date and time
    $signup_date = date("Y-m-d H:i:s");

    // Check if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Insert data into database
        $sql = "INSERT INTO signup (firstname, lastname, username, email, password, address, contact, dateadded) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$address', '$contact', '$dateadded')";
        if (mysqli_query($conn, $sql)) { 
            echo "<script>alert('User added successfully!')</script>";
            header("Location: index.php");
            exit();

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Invalid email. Please try again.')</script>";
    }
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign up | Tours and Travels</title>
	<link rel="stylesheet" href="signup.css">
</head>
<body>
	<header>
		
			<h1>Tours and Travels</h1>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php#tours">Tours</a></li>
					<li><a href="index.php#contact">Contact</a></li>
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
                    <label for="firstname">First name:</label>
					<input type="firstname" id="firstname" name="firstname" required>

                    <label for="lastname">Last name:</label>
					<input type="lastname" id="lastname" name="lastname" required>

					<label for="username">Username:</label>
					<input type="username" id="username" name="username" required>

					<label for="email">E-mail Address:</label>
					<input type="email" id="email" name="email" required>

					<label for="password">Password:</label>
					<input type="password" id="password" name="password" required>

                    <label for="address">Address:</label>
					<input type="address" id="address" name="address" required>
                    <label for="contact">Contact no:</label>
					<input type="contact" id="contact" name="contact" required>
                    

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




