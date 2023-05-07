<!-- <?php 
session_start();
?> -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
        <link rel="stylesheet" href="admin.css">

    <title>Inquiry</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inquiry form</h4>
                    </div>
                    <div class="card-body">
                        <form action="submit_inquiry.php" method="POST">
                                    <div class="form-group">
                                      <label for="name">Name:</label>
                                      <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email address:</label>
                                      <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="subject">Subject:</label>
                                      <input type="text" class="form-control" id="subject" name="subject" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="description">Description:</label>
                                      <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                                    &nbsp;</div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</body>

</html>