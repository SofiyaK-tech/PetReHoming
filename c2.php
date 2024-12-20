<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted

    // Check if the required fields are set
    if (isset($_POST["UserName"], $_POST["FullName"], $_POST["Password"], $_POST["PhoneNumber"], $_POST["Email"], $_POST["Address"])) {
        $UserName = $_POST["UserName"];
        $FullName = $_POST["FullName"];
        $password = $_POST["Password"];
        $PhoneNumber = $_POST["PhoneNumber"];
        $Email = $_POST["Email"];
        $Address = $_POST["Address"];

        if (!preg_match("/^[a-zA-Z\s]+$/", $FullName)) {
            echo "Please enter a valid Full Name without numbers or special characters.";
            exit;
        }
        if (!ctype_digit($PhoneNumber) || strlen($PhoneNumber) !== 10) {
            echo "Please enter a valid 10-digit phone number with only digits.";
            exit;
        }
        
        if (strlen($password) < 8) {
            echo "Password should be at least 8 characters long.";
            exit;
        }

        $conn = mysqli_connect('localhost:3307', 'root', '', 'project');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            // Check if the username already exists
            $checkQuery = "SELECT * FROM reg WHERE UserName = ?";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bind_param("s", $UserName);
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                echo "Username is already taken. Please choose a different one.";
            } else {
                // Proceed with inserting data into the database
                $insertQuery = "INSERT INTO reg (UserName, FullName, Password, PhoneNumber, Email, Address) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("sssiss", $UserName, $FullName, $password, $PhoneNumber, $Email, $Address);
                
                if ($stmt->execute()) {
                    echo "Registration done successfully...";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            }

            $conn->close();
        }
    } else {
        echo "Please fill in all the required fields.";
    }
} else {
    echo "Form not submitted.";
}
?>
