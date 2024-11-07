<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','inventory');

$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if($con === false ){
  die("Error: Could not connect.".mysqli_connect_error());
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE product SET name='$name',description='$description',category = '$category', quantity='$quantity' WHERE id='$id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        echo '<script> alert ("Data Updated");</script>';
        header("location: main.php");
    }else{
        echo'<script> alert ("Data Not Updated");</script>';
    }

} 
mysqli_close($con);

?>