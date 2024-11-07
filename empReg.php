<?php
require "login.php";

if (isset($_POST["submit"])) {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $position = $_POST['position'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $password = $_POST['password'];

  // Handle image upload
  if ($_FILES["image_path"]["error"] === 0) {
    $targetDirectory = "profile_images/";  // Specify your desired upload directory
    $targetFile = $targetDirectory . basename($_FILES["image_path"]["name"]);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $targetFile)) {
      $image_path = basename($_FILES["image_path"]["name"]);  // Save the image file name in the database
    } else {
      echo "Error uploading image.";
      exit();
    }
  } else {
    // Handle the case where no image was uploaded
    $image_path = "";  // Set a default value or handle as needed
  }

  // Insert data into the database
  $sql = "INSERT INTO employee (fname, email, position, sex, age, image_path, password)
            VALUES ('$fname', '$email', '$position', '$sex', '$age', '$image_path', '$password')";

  if (mysqli_query($con, $sql)) {
    header("Location: empLogin.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($con);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTER</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="shortcut icon" type="image/png" href="src\assets\images\jeepney.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-GLhlTQ8iM01NAP5L+8qFjcJ6pajsCKF6P5aFkG5LZB/OH21tQ6pBQakRJs0R8M" crossorigin="anonymous">

</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100 align-items-center ">
                  <img src="src\assets\images\jeepney.png" width="60" alt="" />
                  <span class="ml-2" style="font-size: 25px; font-family:'Varela Round', sans-serif; margin-left: 5px; "><b style="color: #1a3ea3;">MINE</b><b>KANIKO</b></span>
                </a>
                <p class="text-center">Your Trusted Mekaniko in Town.</p>

                <form action="" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="fname" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputSelect" class="form-label">Select Position</label>
                    <select name="position" class="form-control" id="sel1" required>
                      <option value="Chief Mechanic">Chief Mechanic</option>
                      <option value="Auto body Mechanic">Auto body Mechanic</option>
                      <option value="General Mechanic">General Mechanic</option>
                      <option value="Diagnostic Technicians">Diagnostic Technicians</option>
                      <option value="Engine Mechanic">Engine Mechanic</option>
                      <option value="Tire Technicians">Tire Technicians</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="mb-3">
                    <label>Sex</label></br>
                    <input class="form-group-input" type="radio" name="sex" class="form-control" value="Male" required>
                    <label class="form-group-label">Male</label></br>
                    <input class="form-group-input" type="radio" name="sex" class="form-control" value="Female" required>
                    <label class="form-group-label">Female</label>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputImage" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" name="image_path" accept="image/*" required>
                  </div>
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Empolyee Register" name="submit">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="empLogin.php">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>


</body>

</html>