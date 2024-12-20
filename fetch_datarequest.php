<?php

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$con = mysqli_connect("localhost:3307", "root", "", "project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function sendEmail($email, $status) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sofiya13feb@gmail.com'; // Your Gmail address
        $mail->Password   = 'ueohbolbdmkhrvkg';        // Your Gmail password or app-specific password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('sofiya13feb@gmail.com'); // Replace with your name and email
        $mail->addAddress($email);

        // Content
        if ($status === 'accept') {
            $subject = 'Adoption Request Accepted';
            $message = 'Dear Adopter,

We are pleased to inform you that your adoption request has been accepted. Congratulations on this significant milestone!
            
We appreciate the time and effort you have dedicated to ensuring a loving and supportive environment for your new family member. This decision reflects our confidence in your ability to provide a nurturing and caring home.
            
Our team is here to assist you throughout this journey and ensure a smooth transition.We will contact within the next 24 hrs to arrange a convenient time for you to pick up your pet.Please bring a valid ID.
            
Thank you for your commitment and for opening your heart and home. We look forward to supporting you in this exciting new chapter.
            
Warm regards,
            
AKS
Admin
Pet Re-homing
aks@gmail.com';
        } elseif ($status === 'reject') {
            $subject = 'Adoption Request Rejected';
            $message = 'Dear Adopter,

We regret to inform you that your adoption request has been rejected after careful consideration.
            
This decision was not made lightly, and we understand it may come as a disappointment. Our evaluation process is thorough and takes into account various factors to ensure the best possible outcome for all parties involved.
            
While we are unable to approve your request at this time, we encourage you to consider the other resources that may be available to you. Our team is available to discuss the specifics of this decision and provide guidance on potential next steps if you wish to reapply in the future.
            
We appreciate your understanding and thank you for your interest and efforts in the adoption process.
            
Sincerely,
            
AKS
Admin
Pet Re-homing
aks@gmail.com';
        }
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $email = $_POST['email'];
    $status = $_POST['status'];
    if (sendEmail($email, $status)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
}

// Fetch pet information from the database
$sql = "SELECT RequestId, QuestionnaireAnswers, QuestionnaireEligibility, RequestDate, FullName, Email FROM adoptionrequest";
$result = mysqli_query($con, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['RequestId'] . "</td>";
        echo "<td>" . $row['QuestionnaireAnswers'] . "</td>";
        echo "<td>" . $row['QuestionnaireEligibility'] . "</td>";
        echo "<td>" . $row['RequestDate'] . "</td>";
        echo "<td>" . $row['FullName'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>
        <form method='post' action='".$_SERVER['PHP_SELF']."'>
            <input type='hidden' name='email' value='" . $row['Email'] . "'>
            <input type='hidden' name='status' value='accept'>
            <button type='submit' name='action' value='accept'>Accept</button>
        </form>
      </td>";
        echo "<td>
        <form method='post' action='".$_SERVER['PHP_SELF']."'>
            <input type='hidden' name='email' value='" . $row['Email'] . "'>
            <input type='hidden' name='status' value='reject'>
            <button type='submit' name='action' value='reject'>Reject</button>
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
