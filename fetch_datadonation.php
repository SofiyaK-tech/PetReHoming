<?php
$con=mysqli_connect("localhost:3307","root","","project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch pet information from the database
$sql = "SELECT  DonationId,FullName,Email,Address,DonationAmount,DonationMethod,DonationDate from donation";
$result = mysqli_query($con, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['DonationId'] . "</td>";
        echo "<td>" . $row['FullName'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['DonationAmount'] . "</td>";
        echo "<td>" . $row['DonationMethod'] . "</td>";
        echo "<td>" . $row['DonationDate'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>
