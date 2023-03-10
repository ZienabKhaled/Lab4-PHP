<?php
require 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Users Info</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Details
                            <a href="Users.php" class="btn btn-success float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Send_mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $user) {
                                ?>
                                        <tr>
                                            <td><?= $user['user_id']; ?></td>
                                            <td><?= $user['name']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td><?= $user['gender']; ?></td>
                                            <td><?= $user['send_emails']; ?></td>
                                            <td>
                                                <a href="User_view.php?user_id=<?= $user['user_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="user_edit.php?user_id=<?= $user['user_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="connection.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_user" value="<?= $user['user_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                            </form>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>