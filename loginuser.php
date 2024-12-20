<?php
session_start();

if (!isset($_SESSION['UserId'])) {
    header("Location: login.html");
    exit();
}

$userId = $_SESSION['UserId'];
$UserName = $_SESSION['UserName'];

$conn = mysqli_connect('localhost:3307', 'root', '', 'project');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 

// Fetch adoption history for the current user
$adoptionQuery = "SELECT a.AdoptionId, r.FullName, a.Pet, a.PetName, a.AdoptionDate, a.Status 
                  FROM adoptionhistory a
                  INNER JOIN reg r ON a.User = r.UserId
                  WHERE r.UserId = ?";
$adoptionStmt = $conn->prepare($adoptionQuery);
$adoptionStmt->bind_param("i", $userId);
$adoptionStmt->execute();
$adoptionResult = $adoptionStmt->get_result();

$adoptionRows = [];
if ($adoptionResult->num_rows > 0) {
    while ($row = $adoptionResult->fetch_assoc()) {
        $adoptionRows[] = $row;
    }
}

// Fetch donation history for the current user
$donationQuery = "SELECT donation.DonationId, reg.UserName, reg.Email, reg.Address, donation.DonationAmount, donation.DonationMethod, donation.DonationDate
                  FROM donation
                  INNER JOIN reg ON donation.FullName = reg.FullName
                  WHERE reg.UserId = ?";
$donationStmt = $conn->prepare($donationQuery);
$donationStmt->bind_param("i", $userId);
$donationStmt->execute();
$donationResult = $donationStmt->get_result();

$donationRows = [];
if ($donationResult->num_rows > 0) {
    while ($row = $donationResult->fetch_assoc()) {
        $donationRows[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back!</title>
    <link rel="stylesheet" href="admin.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
<div class="header">
    <a href="logout.php" class="logout-btn">Logout</a>
    <div>Welcome Back, <?php echo htmlspecialchars($UserName); ?>!</div>
</div>
<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="lab la-admin"></span><span>Login Page</span></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="admin.php" class="active"><span class="las la-igloo"></span>
                <span>Dashboard</span></a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>
            Welcome Back!
        </h2>
        <div class="user-wrapper">
            <a href="newfront.html" class="logout-btn">Logout</a>
        </div>
    </header>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Adoption History</h3>
                </div>
                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Adoption ID</td>
                                <td>User Name</td>
                                <td>Pet Id</td>
                                <td>Pet Name</td>
                                <td>Adoption Date</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($adoptionRows)) {
                            foreach ($adoptionRows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["AdoptionId"] . "</td>";
                                echo "<td>" . $row["FullName"] . "</td>";
                                echo "<td>" . $row["Pet"] . "</td>";
                                echo "<td>" . $row["PetName"] . "</td>";
                                echo "<td>" . $row["AdoptionDate"] . "</td>";
                                echo "<td>" . $row["Status"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No adoption history found for this user.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Donation History</h3>
                </div>
                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Donation ID</td>
                                <td>User Name</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td>Donation Amount</td>
                                <td>Donation Method</td>
                                <td>Donation Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($donationRows)) {
                                foreach ($donationRows as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row["DonationId"] . "</td>";
                                    echo "<td>" . $row["UserName"] . "</td>";
                                    echo "<td>" . $row["Email"] . "</td>";
                                    echo "<td>" . $row["Address"] . "</td>";
                                    echo "<td>" . $row["DonationAmount"] . "</td>";
                                    echo "<td>" . $row["DonationMethod"] . "</td>";
                                    echo "<td>" . $row["DonationDate"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No donation history found for this user.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
