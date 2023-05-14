<?php 
session_start();
$conn=mysqli_connect("localhost","root","","tat");

if(isset($_POST['save_package']))
{
    $tour_name=$_POST['tour_name'];
    $tour_location=$_POST['tour_location'];
    $cost=$_POST['cost'];
    $image=$_FILES['image']['name'];
    $description = $_POST['description'];
$description = mysqli_real_escape_string($conn, $description); // escape single quotes

    $tour_status=$_POST['tour_status'];
    $date_added=date("Y-m-d H:i:s");
    $date_updated=date("Y-m-d H:i:s");
    $tour_status = $_POST['tour_status'];

    if ($tour_status == 'active') {
        $status = 1;
    } else {
        $status = 0;
    }
    

    $allowed_extension = array('gif','png','jpg','jpeg');
    $filename = $_FILES['image']['name'];
    $file_extension= pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        $_SESSION['status'] = "Please upload jpeg, jpg, gif or png image.";
        header('location: create.php');
        exit;
    } else {
        if (file_exists("package/" . $filename)) {
            $_SESSION['status'] = "Image already exists: " . $filename;
            header('location: create.php');
            exit;
        } else {
            $query = "INSERT INTO packages (title, tour_location, cost, image, description, status, date_created) 
          VALUES ('$tour_name', '$tour_location', '$cost', '$image', '$description', '$status', '$date_added')";

            $query_run=mysqli_query($conn,$query);

            if($query_run) {
                move_uploaded_file($_FILES["image"]["tmp_name"],"package/".$_FILES["image"]["name"]);

                $_SESSION['status']="Package added successfully";
                header("location: index.php");
                exit;
            } else {
                $_SESSION['status']="Unable to add package";
                header("location: index.php");
                exit;
            }
        }
    }
}


if(isset($_POST['update_package'])){
    $id = $_POST['package_id'];
    $tour_name=$_POST['tour_name'];
    $tour_location=$_POST['tour_location'];
    $cost=$_POST['cost'];
    $image=$_POST['image'];
    $new_image = $_FILES['new_image']['name'];

    if($new_image!=''){
        $update_filename=$_FILES['new_image']['name'];
    }else{
        $update_filename=$image;
    }

    $description=$_POST['description'];
    $tour_status=$_POST['tour_status'];
    $date_added=date("Y-m-d H:i:s");
    $date_updated=date("Y-m-d H:i:s");
    $tour_status = $_POST['tour_status'];
    if ($tour_status == 'active') {
        $status = 1;
    } else {
        $status = 0;
    }

    if ($_FILES['new_image']['name']!='') {
        if (file_exists("package/" . $_FILES['new_image']['name'])) {
            $_SESSION['status'] = "Image already exists: " . $_FILES['new_image']['name'];
            header('location: index.php');
            exit;
        }
    }

    
    $query="UPDATE packages SET title='$tour_name',tour_location = '$tour_location',cost= '$cost',image = '$update_filename',description = '$description',status='$status', date_updated = NOW() WHERE package_id='$id'";
    $query_run = mysqli_query($conn,$query);
    

    if($query_run){
        if($_FILES['new_image']['name']!=''){
            move_uploaded_file($_FILES["new_image"]["tmp_name"],"package/".$update_filename);
    
            if($image!='' && $image != $update_filename){
                unlink("package/".$image);
            }
    
            $_SESSION['status']="Package not updated .";
            header('location: index.php');
            exit;
    
        } else {
            $_SESSION['status']= "Package updated successfully.";
            header('location: index.php');
            exit;
        }
    }
    
}





if(isset($_POST['delete_package'])){
    $id=$_POST['delet_package_id'];
    $image=$_POST['delete_image'];

    $query="DELETE FROM packages WHERE package_id='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        unlink("image/".$image);
        $_SESSION['status']="Package deleted successfully";
        header('location: index.php');
    }else{
        $_SESSION['status']="Unable to delete package.";
        header('location: index.php');
    }
}


?>