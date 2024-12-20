<?php
$con=mysqli_connect("localhost:3307","root","","project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Function to delete a pet record
function deletePet($con, $petId) {
    $sql = "DELETE FROM pet WHERE PetId = $petId";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

// Check if delete button is clicked
if (isset($_POST['delete_pet'])) {
    $petIdToDelete = $_POST['delete_pet'];
    deletePet($con, $petIdToDelete);
}

// Fetch pet information from the database
$sql = "SELECT PetId, PetName, Gender, Type, Description, AvailabilityStatus FROM pet";
$result = mysqli_query($con, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['PetId'] . "</td>";
        echo "<td>" . $row['PetName'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "<td>" . $row['AvailabilityStatus'] . "</td>";
        echo "<td><form method='post' action='edit_pet.php'><button type='submit' name='edit_pet' value='" . $row['PetId'] . "'>Edit</button></form></td>";
        echo "<td><form method='post' action=''><button type='submit' name='delete_pet' value='" . $row['PetId'] . "'>Delete</button></form></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>
