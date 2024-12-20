<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            text-align: left;
            padding: 0 20px; /* Added padding */
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"], input[type="number"], textarea, select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto; /* Center the button */
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Update Customer Information</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if form fields are set
        if (isset($_POST['UserID'], $_POST['FullName'], $_POST['PhoneNumber'], $_POST['Email'], $_POST['Address'])) {
            $userId = $_POST['UserID'];
            $userName = $_POST['FullName'];
            $phonenumber = $_POST['PhoneNumber'];
            $email = $_POST['Email'];
            $address = $_POST['Address'];

            // Connect to the database
            $con = mysqli_connect("localhost:3307", "root", "", "project");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Construct SQL query
            $sql = "UPDATE reg SET FullName='$userName', PhoneNumber='$phonenumber', Email='$email', Address='$address' WHERE UserId=$userId";

            // Execute SQL query
            if (mysqli_query($con, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }

            // Close connection
            mysqli_close($con);
        } else {
            // Form fields are not set
            echo "Form fields are not set.";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="userid">Customer ID:</label>
        <input type="number" id="user_id" name="UserID" required><br>
        
        <label for="full_name">Customer Name:</label>
        <input type="text" id="full_name" name="FullName" value="" required><br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="PhoneNumber" value="" required><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="Email" value="" required><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="Address" rows="4" required></textarea><br>
        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
