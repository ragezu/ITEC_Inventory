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

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
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
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper    -->
        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="font-size: 40px; color: #5D87FF;"><b>INVENTORY</b></h5>

                        <div class="container-xl">
                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <div style="border-radius: 10px;" class="table-title">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h2 style="color: white;">REQUEST <b>EQUIPMENTS</b></h2>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                                <div class="form-group mb-0">
                                                    <div class="input-group">
                                                        <select style="color: white; border-radius: 10px;" class="form-control" id="categoryFilter" onchange="filterTable()">
                                                            <option style="color: #000;">Filter by Category</option>
                                                            <option style="color: #000;" value="all">All</option>
                                                            <option style="color: #000;" value="Consumables">Consumables</option>
                                                            <option style="color: #000;" value="Non-Consumables">Non-Consumables</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <?php
                                    define('DB_SERVER', 'localhost');
                                    define('DB_USERNAME', 'root');
                                    define('DB_PASSWORD', '');
                                    define('DB_NAME', 'inventory');

                                    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                    if ($con === false) {
                                        die("Error: Could not connect." . mysqli_connect_error());
                                    }
                                    $query = "SELECT * FROM product";
                                    $query_run = mysqli_query($con, $query);
                                    ?>


                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Equipment Name</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Quantity</th>

                                            </tr>
                                        </thead>
                                        <?php

                                        if ($query_run) {
                                            foreach ($query_run as $row) {
                                        ?>
                                                <tbody>
                                                    <tr>

                                                        <td><?php echo $row['id']; ?> </td>
                                                        <td><?php echo $row['name']; ?> </td>
                                                        <td><?php echo $row['description']; ?> </td>
                                                        <td><?php echo $row['category']; ?> </td>
                                                        <td><?php echo $row['quantity']; ?> </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary" onclick="requestItem(<?php echo $row['id']; ?>)">Request</button>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                        <?php
                                            }
                                        } else {
                                            echo 'no record found';
                                        }

                                        ?>

                                    </table>

                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/js/sidebarmenu.js"></script>
    <script src="src/assets/js/app.min.js"></script>
    <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>

    <script>
        function requestItem(itemId) {
            // Send AJAX request to the server to log the request and update quantity
            $.ajax({
                url: 'request_item.php',
                method: 'POST',
                data: {
                    itemId: itemId
                },
                success: function(response) {
                    // Handle the response if needed
                    window.location.href = "empRequest.php";
                    console.log(response);
                    // You can update the UI or show a confirmation message
                },
                error: function(error) {
                    console.error('Error requesting item:', error);
                }
            });
        }
    </script>
    <script>
        function filterTable() {
            console.log('Filtering table...');
            var selectedCategory = document.getElementById("categoryFilter").value;
            var table = document.querySelector('table');
            var headerRow = table.querySelector('thead tr');
            var columnIndex = -1;

            // Loop through the headers to find the index of the "Category" column
            for (var i = 0; i < headerRow.cells.length; i++) {
                if (headerRow.cells[i].textContent.trim() === 'Category') {
                    columnIndex = i;
                    break;
                }
            }

            if (columnIndex === -1) {
                console.error('Column with header "Category" not found.');
                return;
            }

            var rows = document.querySelectorAll('table tbody tr');

            rows.forEach(function(row) {
                var categoryCell = row.cells[columnIndex].textContent.trim();
                if (selectedCategory === 'all' || categoryCell === selectedCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>