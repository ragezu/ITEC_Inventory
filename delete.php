<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','inventory');

$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if($con === false ){
  die("Error: Could not connect.".mysqli_connect_error());
} 

if (isset($_POST['delete'])){
      $id=$_POST['Did'];
      $query = "DELETE FROM product WHERE  id='$id'";
      $query_run = mysqli_query($con,$query);

      if($query_run){
        echo '<script> alert ("Data Deleted");</script>';
        header("location: main.php");
    }else{
        echo'<script> alert ("Data Deleted");</script>';
    }

}
mysqli_close($con);

?>