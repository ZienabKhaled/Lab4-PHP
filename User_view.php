<?php
require 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Record</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>View Record
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h1>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['user_id'])) {
                            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                            $query = "SELECT * FROM Users WHERE user_id='$user_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $user = mysqli_fetch_array($query_run);
                        ?>

                                <div class="mb-3">
                                    <h3><label>Name</label></h3>
                                    <p class="form-control">
                                        <?= $user['name']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h3><label>Email</label></h3>
                                    <p class="form-control">
                                        <?= $user['email']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h3><label>Gender</label></h3>
                                    <p class="form-control">
                                        <?= $user['gender']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h3><label>Will You recieve email from us?</label></h3>
                                    <p class="form-control">
                                        <?= $user['send_emails']; ?>
                                        <!-- <?php $value == "yes" ? "<p>We Will send you email</p>" : "<p> We will not send you email</p>"; ?> -->
                                    </p>
                                </div>

                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>