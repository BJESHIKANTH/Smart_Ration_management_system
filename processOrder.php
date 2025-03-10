<?php
session_start(); // Start the session

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page or perform other actions if not logged in
    header("location: customerregistration.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_SESSION['id']; // Assuming you have 'id' as the customer ID in the session
    $order_id = $_POST["order_id"];
    $rice = $_POST["rice"];
    $wheat = $_POST["wheat"];
    $sugar = $_POST["sugar"];
    $order_date = $_POST["order_date"];

    // Perform database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dbms";

    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert order into the orders table
    $sql = "INSERT INTO orders (customer_id,order_id, rice_kg, wheat_kg, sugar_kg,order_date) VALUES ('$customer_id','$order_id', '$rice', '$wheat', '$sugar','$order_date')";

    if (mysqli_query ($con, $sql)) {
        echo '<script>alert("Order placed successfully!");</script>';
        header("location: customer.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    // Redirect to an error page or handle the error accordingly
    header("location: error.php");
    exit();
}
?>
