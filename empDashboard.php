<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'inventory');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($con === false) {
    die("Error: Could not connect." . mysqli_connect_error());
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INVENTORY</title>
    <link rel="shortcut icon" type="image/png" href="src\assets\images\jeepney.png" />
    <link rel="stylesheet" href="src/assets/css/styles.min.css" />
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #5e8cc4;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }



        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>


</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>

                </br>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="main.php" class="text-nowrap logo-img d-flex align-items-center">
                        <img src="src\assets\images\jeepney.png" width="60" alt="" />
                        <span class="ml-2" style="font-size: 25px; font-family:'Varela Round', sans-serif; "><b style="color: #1a3ea3;">MINE</b><b>KANIKO</b></span>
                    </a>

                </div>
                </br>
                </br>
                </br>

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="empRequest.php" aria-expanded="false">
                                <span>
                                    <img src="src\assets\images\service.png" alt="Dashboard Icon" width="30" height="30">
                                </span>
                                <span class="hide-menu">Request Equipment</span>
                            </a>
                        </li>
                        </br>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="logout.php" aria-expanded="false">
                                <span>
                                    <img src="src\assets\images\logout1.png" alt="Employee Icon" width="30" height="30">
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>

        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper    -->
        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="font-size: 40px; color: #5D87FF;"><b>EMPLOYEE DASHBOARD</b></h5></br></br>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT * FROM employee WHERE id = $user_id";
                            $query_run = mysqli_query($con, $query);
                        ?>
                            <?php

                            if ($query_run) {
                                foreach ($query_run as $row) {
                            ?>
                                    <main>
                                        <div class="main-box top">
                                            <div class="top">
                                                <p style="font-size: 30px;"><strong>Hello</strong> <?php echo $row['fname']; ?> ,Welcome</p>

                                            </div>

                                        </div>

                            <?php
                                }
                            } else {
                                echo 'no record found';
                            }
                        } else {


                            exit();
                        }
                            ?>

                                    </main></br></br>

                                    <button style="font-size: 25px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewProfileModal">
                                        View Profile
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="viewProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewProfileModalLabel">Employee Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php

                                                // Check if the user is logged in
                                                if (isset($_SESSION['user_id'])) {
                                                    $user_id = $_SESSION['user_id'];

                                                    // Modify your SQL query to retrieve the profile information of the logged-in user
                                                    $query = "SELECT * FROM employee WHERE id = $user_id";
                                                    $query_run = mysqli_query($con, $query);
                                                ?>
                                                    <?php

                                                    if ($query_run) {
                                                        foreach ($query_run as $row) {
                                                    ?>
                                                            <div class="modal-body">
                                                                <div id="employeeInfo">
                                                                    <img src="profile_images/<?php echo $row['image_path']; ?>" alt="Employee Image" width="100" height="100">
                                                                    </br></br>
                                                                    <p><strong>Name:</strong> <?php echo $row['fname']; ?> </p>
                                                                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                                                    <p><strong>Position:</strong> <?php echo $row['position']; ?></p>
                                                                    <p><strong>Sex:</strong> <?php echo $row['sex']; ?></p>
                                                                    <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
                                                                    <p><strong>Password:</strong> <?php echo $row['password']; ?></p>

                                                                    <div id="employeeImageContainer"></div>
                                                                    <!-- Add more fields as needed -->
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button href="#editEmployeeModal" name="edt" type="button" id="close" class="btn btn-warning editbtn" data-toggle="modal">Edit My Profile</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            </div>
                                                <?php
                                                        }
                                                    } else {
                                                        echo 'no record found';
                                                    }
                                                } else {
                                                    // Redirect to the login page or handle the case where the user is not logged in

                                                    exit();
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal HTML -->
                                    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Edit My Profile </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                </div>
                                                <?php
                                                if (isset($_POST['empUpdate'])) {
                                                    $id = $_SESSION['user_id']; // Assuming the user_id is stored in a session
                                                    $fname = $_POST['fname'];
                                                    $email = $_POST['email'];
                                                    $position = $_POST['position'];
                                                    $sex = $_POST['sex'];
                                                    $age = $_POST['age'];
                                                    $password = $_POST['password'];

                                                    $sql = "UPDATE employee SET fname='$fname',email='$email',position='$position',sex='$sex',age='$age',password='$password' WHERE id='$id'";
                                                    $sql = mysqli_query($con, $sql);

                                                    if ($sql) {
                                                        echo '<script>window.location.href = "empDashboard.php";</script>';
                                                    } else {
                                                        echo '<script> alert ("Data Not Updated"); </script>';
                                                    }
                                                }
                                                mysqli_close($con);
                                                ?>
                                                <form action="" method="POST">

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="exampleInputtext1" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="fname" aria-describedby="textHelp" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputSelect" class="form-label">Select Position</label>
                                                            <select name="position" class="form-control" id="sel1" >
                                                                <option value="Chief Mechanic">Chief Mechanic</option>
                                                                <option value="Auto body Mechanic">Auto body Mechanic</option>
                                                                <option value="General Mechanic">General Mechanic</option>
                                                                <option value="Diagnostic Technicians">Diagnostic Technicians</option>
                                                                <option value="Engine Mechanic">Engine Mechanic</option>
                                                                <option value="Tire Technicians">Tire Technicians</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="form-label">Age</label>
                                                            <input type="number" class="form-control" name="age" aria-describedby="emailHelp" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                                            <input type="password" class="form-control" name="password" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sex</label></br>
                                                            <input class="form-group-input" type="radio" name="sex" class="form-control" value="Male" required>
                                                            <label class="form-group-label">Male</label></br>
                                                            <input class="form-group-input" type="radio" name="sex" class="form-control" value="Female" required>
                                                            <label class="form-group-label">Female</label>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cancel</button>



                                                        <button style="border-radius: 10px;" type="submit" name="empUpdate" class="btn btn-primary">Update Data</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/js/sidebarmenu.js"></script>
    <script src="src/assets/js/app.min.js"></script>
    <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>