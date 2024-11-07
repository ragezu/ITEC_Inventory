<?php
require "login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="shortcut icon" type="image/png" href="src\assets\images\jeepney.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
</head>

<body>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <?php
                session_start(); // Start the PHP session

                if (isset($_POST['login'])) {
                  $email = mysqli_real_escape_string($con, $_REQUEST['email']);
                  $password = mysqli_real_escape_string($con, $_REQUEST['password']);
                  $sql = "SELECT * FROM employee WHERE email='$email'";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    // Verify the password
                    if ($password == $row["password"]) {
                      // Store user information in session variables
                      $_SESSION["empLogin"] = true;
                      $_SESSION["user_id"] = $row["id"];
                      $_SESSION["empUser"] = $row["fname"];
                      $_SESSION["empEmail"] = $row["email"];
                      $_SESSION["empAge"] = $row["age"];

                      // Redirect to the employee dashboard
                      header("location: empDashboard.php");
                      exit();
                    } else {
                      echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                  } else {
                    echo "<div class='alert alert-danger'>Email does not match</div>";
                  }
                }
                ?>


                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100 align-items-center ">
                  <img src="src\assets\images\jeepney.png" width="60" alt="" />
                  <span class="ml-2" style="font-size: 25px; font-family:'Varela Round', sans-serif; margin-left: 5px; "><b style="color: #1a3ea3;">MINE</b><b>KANIKO</b></span>
                </a>
                <p class="text-center">Your Trusted Mekaniko in Town.</p>
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>

                  <div class="form-btn">
                    <input type="submit" value="Employee Login" name="login" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Minekaniko?</p>
                    <a class="text-primary fw-bold ms-2" href="empReg.php">Create an account</a>
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

</html>