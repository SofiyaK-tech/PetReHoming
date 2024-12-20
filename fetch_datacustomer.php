<?php
$con = mysqli_connect("localhost:3307", "root", "", "project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Function to delete a customer record
function deleteCustomer($con, $userId) {
    $sql = "DELETE FROM reg WHERE UserId = $userId";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

// Check if delete button is clicked
if (isset($_POST['delete_customer'])) {
    $userIdToDelete = $_POST['delete_customer'];
    deleteCustomer($con, $userIdToDelete);
}

// Fetch customer information from the database
$sql = "SELECT UserId, FullName, PhoneNumber, Email, Address FROM reg";
$result = mysqli_query($con, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['UserId'] . "</td>";
        echo "<td>" . $row['FullName'] . "</td>";
        echo "<td>" . $row['PhoneNumber'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td><form method='post' action='edit_customer.php'><button type='submit' name='edit_customer' value='" . $row['UserId'] . "'>Edit</button></form></td>";
        echo "<td>
                <form method='post' action=''>
                    <input type='hidden' name='delete_customer' value='" . $row['UserId'] . "'>
                    <button type='submit'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>