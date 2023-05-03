<?php 
session_start();
$conn=mysqli_connect("localhost","root","","tat");

$query="SELECT * FROM packages";
$query_run = mysqli_query($conn,$query);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <title>packages</title>
</head>

<body>
    <h1>Welcome admin</h1>

    <div class="contatiner mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <?php 
                        if(isset($_SESSION['status']) && $_SESSION !=''){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Yo!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                        }
                        ?>
                        <h4>Available Packages</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Tour Location</th>
                                        <th>Cost</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Date_created</th>
                                        <th>Date_updated</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['package_id']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['tour_location']; ?></td>
                                        <td><?php echo $row['cost']; ?></td>
                                        <td><img src="<?php echo "package/".$row['image']; ?>" width = "100px" alt="<?php $filename ?>"></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['date_created']; ?></td>
                                        <td><?php echo $row['date_updated']; ?></td>
                                        <td>
                                        <a href="editpackage.php?package_id=<?php echo $row['package_id']; ?>" class="btn btn-info">EDIT</a>
                                        </td>
                                        <td>
                                          <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_package_id" value="<?php echo $row['package_id']; ?>">
                                            <input type="hidden" name="delete_image" value="<?php echo $row['image']; ?>">
                                            <button type="submit" name="delete_package" class="btn btn-danger">DELETE</button>
                                    </form>

                                          </td>
                                    </tr>
                                    <?php
                }
            } else {
            ?>
                                    <tr>
                                        <td colspan="11">No packages available</td>
                                    </tr>
                                    <?php
            }
            ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>