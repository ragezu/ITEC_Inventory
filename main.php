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

    @media print {
      body {
        color: #000;
        /* Set text color for print */
        background: #fff;
        /* Set background color for print */
        font-size: 16px;
        /* Adjust font size for print */
      }

      .table-title {
        display: none;
        /* Hide table title in print */
      }

      table.table tr th,
      table.table tr td {
        border-color: #000;
        /* Set border color for print */
        padding: 8px 10px;
        /* Adjust padding for print */
      }


    }
  </style>
  <script>
    function printTable() {
      // Create a copy of the table to avoid modifying the original
      var clonedTable = document.getElementById('myTable').cloneNode(true);

      // Get current date and time
      var currentDateTime = new Date().toLocaleString();

      // Add a footer to the cloned table
      var footerRow = clonedTable.insertRow(-1);
      var footerCell = footerRow.insertCell(0);
      footerCell.colSpan = clonedTable.rows[0].cells.length;
      footerCell.innerHTML = '<div class="print-footer">Printed on: ' + currentDateTime + '</div>';

      // Create a new window
      var printWindow = window.open('', '_blank');

      // Write the cloned table to the new window
      printWindow.document.write('</br>');
      printWindow.document.write('<html><head><title>Print Table</title></head><body>');
      printWindow.document.write('<style type="text/css">@media print{body{color:#000;background:#fff;font-size:16px;}.table-title{display:none;}table.table {width: 100%; border-collapse: collapse;}table.table tr th, table.table tr td {border: 1px solid #000;padding: 8px;text-align: left;}.table-title h2{margin-top: 0;}.print-footer {position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%);} table.table th i,table.table td:last-child i {display: none;}</style>');
      printWindow.document.write('<h2>Equipment Invenotry</h2>');
      printWindow.document.write(clonedTable.outerHTML);
      printWindow.document.write('</body></html>');

      // Close the document in the new window
      printWindow.document.close();

      // Print the new window
      printWindow.print();
    }
  </script>


  <script>
    $(document).ready(function() {
      // Activate tooltip
      $('[data-toggle="tooltip"]').tooltip();

      // Select/Deselect checkboxes
      var checkbox = $('table tbody input[type="checkbox"]');
      $("#selectAll").click(function() {
        if (this.checked) {
          checkbox.each(function() {
            this.checked = true;
          });
        } else {
          checkbox.each(function() {
            this.checked = false;
          });
        }
      });
      checkbox.click(function() {
        if (!this.checked) {
          $("#selectAll").prop("checked", false);
        }
      });
    });
  </script>

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
            <h5 class="card-title mb-4" style="font-size: 40px; color: #5D87FF;"><b>INVENTORY</b></h5>

            <div class="container-xl">
              <div class="table-responsive">
                <div class="table-wrapper">
                  <div style="border-radius: 10px;" class="table-title">
                    <div class="row">
                      <div class="col-md-6">
                        <h2 style="color: white;">MANAGE <b>EQUIPMENTS</b></h2>
                      </div>
                      <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <button style="border-radius: 10px;" type="button" class="btn btn-secondary" onclick="printTable()">Print Table</button> &nbsp;&nbsp;&nbsp;
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
                        <a style="border-radius: 10px;" href="#addEmployeeModal" class="btn btn-success ml-2" data-toggle="modal">
                          <i class="material-icons">&#xE147;</i> <span>Add New Equipment</span>
                        </a>
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


                  <table id="myTable" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Equipment Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th></th>

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
                            <td><?php echo $row['category']; ?> </td>
                            <td><?php echo $row['quantity']; ?> </td>
                            <td>
                              <a href="#editEmployeeModal" name="edt" type="submit" class="editbtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                              <a href="#deleteEmployeeModal" type="submit" name="dlt" class="deletebtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
            <!-- Add Modal HTML #################################################################################################################################################-->
            <div id="addEmployeeModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="insert.php" method="post">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Equipment</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input name="name" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Category</label></br>
                        <input class="form-group-input" type="radio" name="category" class="form-control" value="Consumables" required>
                        <label class="form-group-label">CONSUMABLES</label></br>
                        <input class="form-group-input" type="radio" name="category" class="form-control" value="Non-Consumables" required>
                        <label class="form-group-label">NON-CONSUMABLES</label>
                      </div>
                      <div class="form-group">
                        <label>Quantity</label>
                        <input name="quantity" type="number" class="form-control" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input style="border-radius: 12px;" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                      <input style="border-radius: 10px;" type="submit" class="btn btn-success" name="add" value="Add">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Edit Modal HTML ######################################################################################################################################################################-->
            <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Equipment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  </div>

                  <form action="update.php" method="POST">

                    <div class="modal-body">
                      <input name="id" type="hidden" id="id">
                      <div class="form-group">
                        <label>Name</label>
                        <input name="name" id="name" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-group-label">Category</label></br>
                        <input class="form-group-input" type="radio" name="category" id="category" class="form-control" value="Consumables" required>
                        <label class="form-group-label">Consumables</label></br>
                        <input class="form-group-input" type="radio" name="category" id="category" class="form-control" value="Non-Consumables" required>
                        <label class="form-group-label">Non-Consumables</label>
                      </div>
                      <div class="form-group">
                        <label>Quantity</label>
                        <input name="quantity" id="quantity" type="text" class="form-control" required>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button href="logins.php" type="button" id="close" class="btn btn-default" data-dismiss="modal">Cancel</button>



                      <button style="border-radius: 10px;" type="submit" name="update" class="btn btn-primary">Update Data</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- Delete Modal HTML ##########################################################################################################################################################################-->
            <div id="deleteEmployeeModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="delete.php" method="POST">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Equipment</h4>

                    </div>
                    <div class="modal-body">
                      <input name="Did" type="hidden" id="Did">
                      <p>Are you sure you want to delete these Records?</p>
                      <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                      <button style="border-radius: 10px;" type="submit" name="delete" class="btn btn-danger">Delete Data</button>
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

  <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="src/assets/js/sidebarmenu.js"></script>
  <script src="src/assets/js/app.min.js"></script>
  <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>

  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        console.log(data);
        $('#Did').val(data[0]);
      });

      $('.editbtn').on('click', function() {

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        console.log(data);
        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#description').val(data[2]);
        $('#category').val(data[3]);
        $('#quantity').val(data[4]);
      });
    });
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