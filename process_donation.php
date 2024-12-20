<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $donationAmount = $_POST["donationamount"];
    $donationMethod = $_POST["donationmethod"];
    $donationDate = $_POST["donationdate"];

    // Validate and sanitize the data if needed

    // Connect to your database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO donation (FullName, Email, Address, DonationAmount, DonationMethod, DonationDate) 
            VALUES ('$fullName', '$email', '$address', '$donationAmount', '$donationMethod', '$donationDate')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
