<link rel="stylesheet" href="package.css">
<?php

include('header.php');
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tat";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    // Check if package ID is provided in the URL
    if (!isset($_GET['id'])) {
        // header("Location: booking/process_booking.php");
        exit();
    }
    // Get package details from database
    $id = $_GET['id'];
    $query = "SELECT * FROM packages WHERE package_id=$id";
    $result = mysqli_query($conn, $query);

    // Check if package exists
    if (mysqli_num_rows($result) == 0) {
        mysqli_close($conn);
        // header("Location: booking/process_booking.php");
        exit();
    }

    // Fetch package details
    $row = mysqli_fetch_assoc($result);
?>
<?php
    // Get package ID from URL
    $package_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Package - <?php echo $row['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-12 text-center">
                <h2><?php echo $row['title']; ?></h2>
                <h3><?php echo $row['tour_location']; ?></h3>
                <img src="<?php echo "image/package/".$row['image']; ?>" alt="<?php echo $row['title']; ?>">

                <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                <p><strong>Price:</strong> $<?php echo $row['cost']; ?></p>
                &nbsp;
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                <!-- <p><strong>Inclusions:</strong></p> -->
                <!-- <ul>
                    
                        // $inclusions = explode(",", $row['inclusions']);
                        // foreach ($inclusions as $item) {
                        //     echo "<li>$item</li>";
                        // }
                 
                </ul> -->
            </div>
        </div>
    </div>

    

    <form method="post" action="process_booking.php?user_id=<?php echo $user_id; ?>&package_id=<?php echo $package_id; ?>">
    <!-- ... -->
</form>
    <?php include('booking/booking.php'); ?>
</body>
</html>


<?php
    // Close database connection
    mysqli_close($conn);
    include('footer.php');
?>

