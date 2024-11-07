<?php
session_start(); // Start the PHP session
require "login.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemId = mysqli_real_escape_string($con, $_POST['itemId']);
    $userId = $_SESSION["user_id"];

    // Insert the request into the request_log table
    $insertQuery = "INSERT INTO request_log (user_id, item_id, request_time) VALUES ('$userId', '$itemId', NOW())";
    $insertResult = mysqli_query($con, $insertQuery);

    // Update the quantity in the product table (assuming you have a column named 'quantity' in your product table)
    $updateQuery = "UPDATE product SET quantity = quantity - 1 WHERE id = '$itemId'";
    $updateResult = mysqli_query($con, $updateQuery);

    // Check if both queries were successful
    if ($insertResult && $updateResult) {
        // Redirect to the request_log page
        header("location: request_log.php");
        exit();
    } else {
        // Handle errors if needed
        echo "Error processing the request.";
    }
}
?>
