<?php
require 'connection.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Update User Data
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
                                <form action="connection.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">

                                    <div class="mb-3">
                                        <h3><label>Name</label></h3>
                                        <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <h3><label>Email</label></h3>
                                        <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control">
                                    </div>


                                    <div class="mb-3">
                                        <h3><label>Gender</label></h3>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="Male" <?php if ($user['gender'] == "Male") echo " checked"; ?>>
                                            <label class="form-check-label" value="Male" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="female" <?php if ($user['gender'] == "Female") echo " checked"; ?>>
                                            <label class="form-check-label" value="Female" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input class="form-check-input " name="sendMail" value="<?php $value; ?>" type="checkbox" <?php if ($user['send_emails'] == "yes") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> Receive E-mails From Us
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" name="update_user" class="btn btn-success">
                                            Update user
                                        </button>
                                        <button type="submit" name="cancel" class="btn btn-outline-secondary"> <a href="index.php"> Cancel</a></button>

                                    </div>

                                </form>
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