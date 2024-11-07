<?php
// Connect to the MySQL database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'inventory');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($con === false) {
    die("Error: Could not connect." . mysqli_connect_error());
}

// Retrieve request log with request_time from the product and request_log tables
$sqlSelectLog = "SELECT  p.id,p.name,rl.request_time , e.fname,p.category
                 FROM product p 
                 JOIN request_log rl ON p.id = rl.item_id
                 JOIN employee e ON rl.user_id = e.id
                 WHERE p.request_count > 0";

$result = $con->query($sqlSelectLog);

$con->close();
?>

<!DOCTYPE html>
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

        .sidebar-nav ul .sidebar-item.selected>.sidebar-link,
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active,
        .sidebar-nav ul .sidebar-item>.sidebar-link.active {
            background-color: #9eb7ff;
            color: #fff;
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
            width: 90px;
        }


        table.table tr th:last-child {
            width: 160px;
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
    </style>

    <script>
        function filterTable() {
            console.log('Filtering table...');
            var selectedCategory = document.getElementById("categoryFilter").value.toLowerCase();
            var searchTerm = document.getElementById("searchText").value.toLowerCase();
            var table = document.querySelector('table');
            var headerRow = table.querySelector('thead tr');
            var productIndex = -1;
            var requesterIndex = -1;
            var requestTimeIndex = -1;

            // Loop through the headers to find the indices of the relevant columns
            for (var i = 0; i < headerRow.cells.length; i++) {
                var columnHeader = headerRow.cells[i].textContent.trim().toLowerCase();
                if (columnHeader === 'product name') {
                    productIndex = i;
                } else if (columnHeader === 'requester name') {
                    requesterIndex = i;
                } else if (columnHeader === 'request time') {
                    requestTimeIndex = i;
                }
            }

            var rows = document.querySelectorAll('table tbody tr');

            rows.forEach(function(row) {
                var productCell = productIndex !== -1 ? row.cells[productIndex].textContent.trim().toLowerCase() : '';
                var requesterCell = requesterIndex !== -1 ? row.cells[requesterIndex].textContent.trim().toLowerCase() : '';
                var requestTimeCell = requestTimeIndex !== -1 ? row.cells[requestTimeIndex].textContent.trim().toLowerCase() : '';

                if ((selectedCategory === 'all' || row.cells[3].textContent.trim().toLowerCase() === selectedCategory) &&
                    (searchTerm === '' ||
                        productCell.includes(searchTerm) ||
                        requesterCell.includes(searchTerm) ||
                        requestTimeCell.includes(searchTerm))) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

    <!-- ... Existing HTML code ... -->


</head>



<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            </br>
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="main.php" class="text-nowrap logo-img d-flex align-items-center">
                        <img src="src\assets\images\jeepney.png" width="60" alt="" />
                        <span class="ml-2" style="font-size: 25px; font-family:'Varela Round', sans-serif; "><b style="color: #1a3ea3;">MINE</b><b>KANIKO</b></span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                </br>
                </br>
                </br>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="main.php" aria-expanded="false">
                                <span>
                                    <img src="src\assets\images\management1.png" alt="Dashboard Icon" width="30" height="30">
                                </span>
                                <span class="hide-menu">Inventory</span>
                            </a>
                        </li>
                        </br>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="request_log.php" aria-expanded="false">
                                <span>
                                    <img src="src\assets\images\log.png" alt="Dashboard Icon" width="30" height="30">
                                </span>
                                <span class="hide-menu">Request Log</span>
                            </a>
                        </li>
                        </br>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="employee.php" aria-expanded="false">
                                <span>
                                    <img src="src\assets\images\employees1.png" alt="Employee Icon" width="30" height="30">
                                </span>
                                <span class="hide-menu">Employees</span>
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
                        <div class="container-xl">
                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <div style="border-radius: 10px;" class="table-title">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h2 style="color: white; font-size: 35px;"><b>REQUEST</br>INFORMATION</b></h2>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                                <div class="form-group mb-0">
                                                    <div class="input-group mt-3">
                                                        <input style="border-top-left-radius: 10px;border-bottom-left-radius: 10px; color: white;" type="text" id="searchText" class="form-control" placeholder="Search by Product, Requester, or Time" />
                                                        <button style="border-top-right-radius: 10px;border-bottom-right-radius: 10px;" class="btn btn-success" type="button" onclick="filterTable()">Search</button></br>
                                                    </div>
                                                    <select style="color: white; border-radius: 10px;" placeholder="Filter by Category" class="form-control" id="categoryFilter" onchange="filterTable()">
                                                        <option style="color: #000;" value="all">All</option>
                                                        <option style="color: #000;" value="Consumables">Consumables</option>
                                                        <option style="color: #000;" value="Non-Consumables">Non-Consumables</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Item ID</th>
                                                <th>Requester Name</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Request Time</th> <!-- Added column for request_time -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>{$row['id']}</td>";
                                                    echo "<td>{$row['fname']}</td>";
                                                    echo "<td>{$row['name']}</td>";
                                                    echo "<td>{$row['category']}</td>";
                                                    echo "<td>{$row['request_time']}</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>No requests yet.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include necessary scripts -->
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/js/sidebarmenu.js"></script>
    <script src="src/assets/js/app.min.js"></script>
    <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>