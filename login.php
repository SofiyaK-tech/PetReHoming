<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["UserName"], $_POST["Password"])) {
        $UserName = $_POST["UserName"];
        $password = $_POST["Password"];

        $conn = mysqli_connect('localhost:3307', 'root', '', 'project');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            $checkQuery = "SELECT UserId, UserName, Password FROM reg WHERE UserName = ? AND Password = ?";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bind_param("ss", $UserName, $password);
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                $checkStmt->bind_result($userId, $dbUserName, $dbPassword);
                $checkStmt->fetch();

                $_SESSION['UserId'] = $userId;
                $_SESSION['UserName'] = $dbUserName;

                if ($UserName === "Admin" && $password === "12345678") {
                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: loginuser.php");
                    exit();
                }
            } else {
                echo "Invalid username or password.";
            }

            $checkStmt->close();
            $conn->close();
        }
    } else {
        echo "Please fill in all the required fields.";
    }
} else {
    echo "Form not submitted.";
}
?>
