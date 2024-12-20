<?php
$con=mysqli_connect("localhost:3307","root","","project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch pet information from the database
$sql = "SELECT InquiryId,Method,InquiryDate,Result,SessionTalk,FullName FROM reg,inqquiry where reg.UserId=inqquiry.User";
$result = mysqli_query($con, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['InquiryId'] . "</td>";
        echo "<td>" . $row['Method'] . "</td>";
        echo "<td>" . $row['InquiryDate'] . "</td>";
        echo "<td>" . $row['Result'] . "</td>";
        echo "<td>" . $row['SessionTalk'] . "</td>";
        echo "<td>" . $row['FullName'] . "</td>";
        
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>
