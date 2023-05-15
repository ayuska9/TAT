<?php 
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit package</title>
    <style>
        /* style.css */

.container {
    max-width: 800px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 1.5rem;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
select {
    padding: 0.5rem;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    width: 100%;
}

input[type="file"] {
    display: block;
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-secondary {
    background-color: #6c757d;
    color: #fff;
}

.card {
    margin-bottom: 2rem;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.card-header {
    background-color: white;
    color: black;
    text-align: center;
    font-size: 24px;
}

.card-body {
    padding: 2rem;
}

img {
    display: block;
    margin: 1rem 0;
    max-width: 100%;
}
button{
        background-color: gray;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit package</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        $conn = mysqli_connect("localhost","root","","tat");
                        $id = $_GET['package_id'];
                        $query = "SELECT * FROM packages WHERE package_id ='$id'";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run)>0){
                            foreach($query_run as $row){
                                
                                ?>
<form action="code.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="package_id" value="<?php echo $row['package_id'];  ?>"/>
                            <div class="form-group">
                                <label for="">Tour name</label>
                                <input type="text" name="tour_name" value="<?php echo $row['title'];  ?>" required class="form-control"
                                    placeholder="Tour name">
                            </div>
                            <div class="form-group">
                                <label for="">Tour Location</label>
                                <input type="text" required name="tour_location" value="<?php echo $row['tour_location'];  ?>" class="form-control"
                                    placeholder="Tour location">
                            </div>
                            <div class="form-group">
                                <label for="">Tour Cost</label>
                                <input type="number" required name="cost" value="<?php echo $row['cost'];  ?>"  class="form-control" placeholder="Cost">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" required name="description" class="form-control" value="<?php echo $row['description'];  ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="new_image" accept="image/*" class="form-control" placeholder="Image">
                                <input type="hidden" name="image" value="<?php echo $row['image'];  ?>" >
                            </div>
                            <img src="<?php echo "package/".$row['image'];?>" width="100px">

                            <div class="form-group">
                                <label for="">Tour status</label>
                                <select name="tour_status" class="form-control">
                                <?php
                                    if ($row['status'] == 1) {
                                    echo '<option value="active" selected>Active</option>';
                                    echo '<option value="inactive">Inactive</option>';
                                    } else {
                                    echo '<option value="active">Active</option>';
                                    echo '<option value="inactive" selected>Inactive</option>';
                                    }
                                ?>
                                </select>&nbsp;
                            </div>

                            <div class="form-group">
                                <button type="submit" name="update_package" class="btn btn-primary">UPDATE</button>
                            </div>
                                <?php

                            }
                        }else{
                            echo "No package.";
                        }
                        ?>    


                        


                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>