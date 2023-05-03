<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	<link rel="stylesheet" href="user.css">
</head>
<body>
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

  <?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tat';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Handle delete action if requested
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $query = "DELETE FROM signup WHERE id=$id";
  mysqli_query($conn, $query);
}

// Query the database for user data
$query = 'SELECT * FROM signup';
$result = mysqli_query($conn, $query);

// Generate the HTML for the table
$html = '<div class="user-list">
<h2>User List</h2>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Username</th>
      <th>E-mail</th>
      <th>Password</th>
      <th>Address</th>
      <th>Added date</th>
      <th>update date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>';

// Loop through query result and output user data in table rows
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['id'];
  $html .= "<tr>";
  $html .= "<td>" . $id . "</td>";
  $html .= "<td>" . $row['firstname'] . "</td>";
  $html .= "<td>" . $row['lastname'] . "</td>";
  $html .= "<td>" . $row['username'] . "</td>";
  $html .= "<td>" . $row['email'] . "</td>";
  $html .= "<td>" . $row['password'] . "</td>";
  $html .= "<td>" . $row['address'] . "</td>";
  $html .= "<td>" . $row['dateadded'] . "</td>";
  $html .= "<td>" . $row['dateupdated'] . "</td>";
  $html .= '<td><a href="edit.php?id=' . $id . '">Edit</a> | <a href="?delete=' . $id . '">Delete</a></td>';
  $html .= "</tr>";
}

$html .= '</tbody>
</table>
</div>';

// Display the HTML
echo $html;

// Close the database connection
mysqli_close($conn);
?>



</body>
</html>