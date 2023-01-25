<?php
require("connection.php");
?>
<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Users</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-4 ">User Regesteration Form
                            <a href="index.php" class="btn btn-danger float-end">View Responds</a>

                        </h2>
                        <h5>Please fill this form and submit to add user record to the database </h5>
                    </div>
                    <div class="card-body">
                        <form action="connection.php" method="POST">
                            <div class="mb-3">
                                <h3><label>Name</label></h3>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <h3><label>Email</label></h3>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <h3><label>Gender</label></h3>
                                <div class="form-check">
                                    <input class="form-check-input" name="gender" type="radio" name="flexRadioDefault" value="male">
                                    <label class="form-check-label" value="Male" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="gender" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="female" checked>
                                    <label class="form-check-label" value="Female" for="flexRadioDefault2">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div>
                                <input class="form-check-input " name="sendMail" value="<?php $value ?>" type="checkbox" checked> Receive E-mails From Us
                            </div>
                            <div class="mb-3 mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Sumbit</button>
                                <button type="submit" name="cancel" class="btn btn-outline-secondary"> <a href=" <?php $_SERVER['PHP_SELF'] ?>"> Cancel</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>