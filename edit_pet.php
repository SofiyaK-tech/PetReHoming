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
    <h2>Update Pet Information</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if form fields are set
        if (isset($_POST['PetID'], $_POST['PetName'], $_POST['Gender'], $_POST['Type'], $_POST['Description'], $_POST['AvailabilityStatus'])) {
            $petId = $_POST['PetID'];
            $petName = $_POST['PetName'];
            $gender = $_POST['Gender'];
            $type = $_POST['Type'];
            $description = $_POST['Description'];
            $availabilityStatus = $_POST['AvailabilityStatus'];

            $con = mysqli_connect("localhost:3307", "root", "", "project");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Construct SQL query
            $sql = "UPDATE pet SET PetName='$petName', Gender='$gender', Type='$type', Description='$description', AvailabilityStatus='$availabilityStatus' WHERE PetId=$petId";

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
    } else {
        // Form not submitted via POST method
        echo "Form not submitted.";
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="pet_id">Pet ID:</label>
        <input type="number" id="pet_id" name="PetID" required><br>
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="PetName" required><br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="Gender" required><br>
        <label for="type">Type:</label>
        <input type="text" id="type" name="Type" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="Description" rows="4" required></textarea><br>
        <label for="availability_status">Availability Status:</label>
        <select id="availability_status" name="AvailabilityStatus" required>
        <option value="Select">Select</option>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
