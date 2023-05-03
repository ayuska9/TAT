<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>

	<!-- <div class="navbar">
        
        <a href="#">Login</a>
        <a href="#">Issues</a>
        <a href="#">Clients</a>
        <a href="#">Bookings</a>
        <a href="#">Packages</a>
		<a href="#">Dashboard</a>
	</div> -->
	<header>
		<h1>Tours and Travels</h1>
		<nav>
			<ul>
			<li><a href="dashboard">Dashboard</a></li>
			<li><a href="packages">Packages</a></li>
			<li><a href="bookings">Bookings</a></li>
			<li><a href="#clients">Clients</a></li>
			<li><a href="#issues">Issues</a></li>
			<li><a href="#login">Login</a></li>	
			</ul>
		</nav>
	</header>

	<div class="content">
		<div class="box blue">
			<h1>Total Bookings</h1>
			<?php
				// Connect to database
				$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				// Query to retrieve total bookings
				$sql = "SELECT COUNT(*) as total_bookings FROM bookings";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // Output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<p>" . $row["total_bookings"] . "</p>";
				    }
				} else {
				    echo "<p>No bookings found.</p>";
				}

				$conn->close();
			?>
		</div>

		<div class="box green">
			<h1>Total Users</h1>
			<?php
				// Connect to database
				$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				// Query to retrieve total users
				$sql = "SELECT COUNT(*) as total_users FROM users";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // Output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<p>" . $row["total_users"] . "</p>";
				    }
				} else {
				    echo "<p>No users found.</p>";
				}

				$conn->close();
			?>
		</div>

		<div class="box purple">
			<h1>Total Issues</h1>
			<?php
				// Connect to database
				$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tat";

				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				// Query to retrieve total issues
				$sql = "SELECT COUNT(*) as total_issues FROM issues";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // Output data of each row
				    while($row = $result->fetch_assoc()){
                        echo "<p>" . $row["total_issues"] . "</p>";
			    }
			} else {
			    echo "<p>No issues found.</p>";
			}

			$conn->close();
		?>
	</div>
	</div>
	<div class ="container">
	<div class="box orange">
	<h1>Total Packages</h1>
	<?php
		// Connect to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tat";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query to retrieve total packages
		$sql = "SELECT COUNT(*) as total_packages FROM packages";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<p>" . $row["total_packages"] . "</p>";
			}
		} else {
			echo "<p>No packages found.</p>";
		}

		$conn->close();
	?>
</div>

<div class="box red">
    <h1>Total Ratings</h1>
    <?php
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tat"; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve total ratings for packages
        $sql = "SELECT COUNT(*) as total_ratings FROM ratings WHERE package_id IN (SELECT id FROM packages)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<p>" . $row["total_ratings"] . "</p>";
            }
        } else {
            echo "<p>No ratings found.</p>";
        }

        $conn->close();
    ?>
</div>
	</div>

</body>
</html>