<?php
$con=mysqli_connect("localhost:3307","root","","project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch pet information from the database
$sql = "SELECT AdoptionId,FullName,Pet,PetName,AdoptionDate,Status FROM reg,adoptionhistory where reg.UserId=adoptionhistory.User";
$result = mysqli_query($con, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['AdoptionId'] . "</td>";
        echo "<td>" . $row['FullName'] . "</td>";
        echo "<td>" . $row['Pet'] . "</td>";
        echo "<td>" . $row['PetName'] . "</td>";
        echo "<td>" . $row['AdoptionDate'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>
