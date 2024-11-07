<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'inventory');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($con === false) {
    die("Error: Could not connect." . mysqli_connect_error());
}

if (isset($_POST['empUpdate'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $query = "UPDATE employee SET fname='$fname',email='$email',position = '$position', sex='$sex', age='$age', password='$password' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo '<script> alert ("Data Updated"); window.location.href = "empDashboard.php"; </script>';
    } else {
        echo '<script> alert ("Data Not Updated"); </script>';
    }
}
mysqli_close($con);
?>