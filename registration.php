<?php
      define('DB_SERVER','localhost');
      define('DB_USERNAME','root');
      define('DB_PASSWORD','');
      define('DB_NAME','inventory');

      $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      if($con === false ){
        die("Error: Could not connect.".mysqli_connect_error());
      }else{
        echo "";
      }

      $full_name = mysqli_real_escape_string($con, $_REQUEST['full_name']);
      $email = mysqli_real_escape_string($con, $_REQUEST['email']);
      $password = mysqli_real_escape_string($con, $_REQUEST['password']); 
     

      $sql = "INSERT INTO user (full_name,email,password)
      VALUES ('$full_name','$email','$password')";
      
      if(mysqli_query($con,$sql)){
        header("Location: logins.php");
        exit();
      }else{
        echo "error". mysqli_error($con);

      }
      mysqli_close($con);
    ?>