<?php
session.start();
// Database configuration
$servername = "localhost:3307";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "project"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging output - check user session
echo "User ID: " . $_SESSION['user_id'] . "<br>";

// Fetch adoption history for the current user
$userId = $_SESSION['user_id'];
$sql = "SELECT a.AdoptionId, p.PetName, a.AdoptionDate, a.Status 
        FROM adoptionhistory a
        INNER JOIN reg r ON a.User = r.UserId
        INNER JOIN pet p ON a.Pet = p.PetId
        WHERE r.UserId = $userId";

echo "SQL Query: $sql<br>"; // Debugging output - check SQL query

$result = $conn->query($sql);

// Check if adoption history exists for the user
if ($result === false) {
    echo "Error executing query: " . $conn->error;
} elseif ($result->num_rows > 0) {
    // Output adoption history data
    while ($row = $result->fetch_assoc()) {
        echo "<p>Adoption ID: " . $row["AdoptionId"] . "</p>";
        echo "<p>Pet Name: " . $row["PetName"] . "</p>";
        echo "<p>Adoption Date: " . $row["AdoptionDate"] . "</p>";
        echo "<p>Status: " . $row["Status"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No adoption history found for this user.";
}

// Close the database connection
$conn->close();
?>
