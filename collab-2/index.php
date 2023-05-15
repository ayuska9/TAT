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

<?php
// Close the connection
$conn->close();
?>



    <!-- <?php if (isset($_SESSION['email'])) { ?>
                <li class="email"><?php echo $_SESSION['email']; ?></li>
				<?php } else { ?>
                <li><a href="signup.php">Signup</a></li>


				<?php if (isset($_SESSION['email'])) { ?>
                <li class="email"><?php echo $_SESSION['email']; ?></li>
            <?php } else { ?>
                <li><a href="signup.php">Signup</a></li>
            <?php } ?>
			<?php if (isset($_SESSION['email'])) { ?>
    <li class="email"><?php echo $_SESSION['email']; ?></li>
<?php } else { ?>
    <li class="email">Email not available</li>
    <?php } ?>




            <?php } ?> -->


    <main>
        <section id="banner">
            <h2>Discover new places with us</h2>
            <p>Join our tours and explore the world</p>
            <a href="#tours" class="btn">View Tours</a>
        </section>

        <section id="about">
            <h2>About Us</h2>
            <p>Are you looking for an individualized and customized tour? With the ASA Tour Travel Generator can you
                easily create your own premium tour in Ecuador. Just put in your information and select the desired
                elements for your tour. You can choose from Acclimatization Tours, Glacier Tours, Technical Tours and
                Activities which will give you some relaxation. If you also like one of our travel packages, it's also
                possible to combine it with your customized tour. In the end please let us know how you want to stay in
                contact with us to make the planning process as comfortable as possible for you.</p>
        </section>

        <section id="tours">
            <h2>Tours</h2>

            <?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tat";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
					$sql = "SELECT * FROM packages WHERE status = 1 ORDER BY RAND() LIMIT 3";
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
                            <img class="card-body text-center" src="<?php echo "image/package/".$row['image']; ?>" width="300px"
                                alt="<?php echo $row['title']; ?>">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo substr($row['description'], 0, 50); ?>...</p>

                                <p class="card-text"><strong>Price: $</strong> <?php echo $row['cost']; ?></p>
                                <a href="view_package.php?id=<?php echo $row['package_id']; ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
        }
        mysqli_close($conn);
        ?>
                </div>
            </div>
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <?php include('inquiry/inquiry.php') ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Tours and Travels</p>
    </footer>
</body>

</html>