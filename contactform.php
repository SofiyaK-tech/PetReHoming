<?php
// Check if the form is submitted and form fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["FullName"]) && isset($_POST["Email"]) && isset($_POST["Message"])) {
    // Define database connection parameters
    $servername = "localhost:3307"; // Change this to your database server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "project"; // Change this to your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO contactus (FullName, Email, Message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $FullName, $Email, $Message);

    // Set parameters and execute the statement
    $FullName = $_POST["FullName"];
    $Email = $_POST["Email"];
    $Message = $_POST["Message"];
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
