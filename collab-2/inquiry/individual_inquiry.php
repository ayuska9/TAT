<?php
include('../admin/header.php');
?>
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

// Retrieve inquiry data based on the provided id
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM inquiry WHERE inquiry_id = '$id'";
$result = mysqli_query($conn, $sql);

// Display inquiry data
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container mt-4">
        <h2 class="mb-3"><?php echo $row['subject']; ?></h2>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                <p><strong>Description:</strong></p>
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
    </div><div class="text-center">
    <a href="javascript:history.back()" class="back-button">Back to Inquiries</a>

        </div></div>
    <?php
} else {
    echo "Inquiry not found.";
}

mysqli_close($conn);

include('../admin/footer.php');
?>

<style>
  .container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 50vh;
}


.card {
  max-width: 600px;
  width: 100%;
  margin: 20px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
}
.back-button {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.back-button:hover {
  background-color: #0062cc;
}




</style>