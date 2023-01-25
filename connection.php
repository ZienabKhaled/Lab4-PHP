<?php
//Open Connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'users'; //phpMyAdmin
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//Add User in Form
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $sendMail = mysqli_real_escape_string($conn, $_POST['sendMail']);
    $value = "";
    if (isset($_POST["sendMail"])) {
        $value = "yes";
    } else {
        $value = "no";
    }
    $query = "INSERT INTO users (name , email , gender , send_emails) 
values ('$name' , '$email' , '$gender' , '$value' )";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        header("Location:Users.php");
        exit(0);
    }
}

//Edit Record
$value = "";
$gender = "";
if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $sendMail = mysqli_real_escape_string($conn, $_POST['sendMail']);
    if (isset($_POST["sendMail"])) {
        $value = "yes";
    } else {
        $value = "no";
    }
    $query = "UPDATE Users SET name='$name', email='$email', gender='$gender', send_emails='$value' WHERE user_id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: index.php");
        exit(0);
    }
}

//Delete Record
if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['delete_user']);
    $query = "DELETE FROM Users WHERE user_id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: index.php");
        exit(0);
    }
}
