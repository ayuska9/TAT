<?php 
session_start();
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Packages form</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Tour name</label>
                                <input type="text" name="tour_name" required class="form-control"
                                    placeholder="Tour name">
                            </div>
                            <div class="form-group">
                                <label for="">Tour Location</label>
                                <input type="text" required name="tour_location" class="form-control"
                                    placeholder="Tour location">
                            </div>
                            <div class="form-group">
                                <label for="">Tour Cost</label>
                                <input type="number" required name="cost" class="form-control" placeholder="Cost">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" required name="description" class="form-control"
                                    placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" required name="image" accept="image/*" class="form-control" placeholder="Image">
                            </div>
                            <div class="form-group">
                                <label for="">Tour status</label>
                                <select name="tour_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>&nbsp;
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save_package" class="btm btm-primary">Submit</button>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</body>

</html>