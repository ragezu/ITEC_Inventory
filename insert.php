<?php
      define('DB_SERVER','localhost');
      define('DB_USERNAME','root');
      define('DB_PASSWORD','');
      define('DB_NAME','inventory');

      $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      if($con === false ){
        die("Error: Could not connect.".mysqli_connect_error());
      }

      if (isset($_POST['add'])){

        $name = mysqli_real_escape_string($con, $_REQUEST['name']);
              $description = mysqli_real_escape_string($con, $_REQUEST['description']);
              $category = mysqli_real_escape_string($con, $_REQUEST['category']); 
              $quantity = mysqli_real_escape_string($con, $_REQUEST['quantity']); 
              
              $sql = "INSERT INTO product (name,description,category,quantity)
              VALUES ('$name','$description','$category','$quantity')";
              
              if(mysqli_query($con,$sql)){
                header("Location: main.php");
                exit();
              }else{
                echo "error". mysqli_error($con);
        
              }
             
        
        }
         mysqli_close($con);

      ?>