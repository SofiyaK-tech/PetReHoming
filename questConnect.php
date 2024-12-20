<?php


// Create connection
$conn = mysqli_connect('localhost:3307', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the questionnaire answers, eligibility status, and adoption id from the form
    $QuestionnaireAnswers = $conn->real_escape_string($_POST["QuestionnaireAnswers"]);
    $QuestionnaireEligibility = calculateEligibility($_POST);
    $RequestId = $conn->real_escape_string($_POST["RequestId"]);
    $FullName = $conn->real_escape_string($_POST["full_name"]); // Add this line to get full name
    $Email = $conn->real_escape_string($_POST["email"]); // Add this line to get email
    
    $validValues = ["Eligible", "Not Eligible"]; // Replace with your actual enumerated values
    if (!in_array($QuestionnaireEligibility, $validValues)) {
        echo "Error: Invalid value for QuestionnaireEligibility.";
        exit;
    
}
// Get the current date
$RequestDate = date("Y-m-d H:i:s");

    // Insert data into the database
    $sql = "INSERT INTO adoptionrequest (RequestId, QuestionnaireAnswers, QuestionnaireEligibility, RequestDate, FullName, Email) 
        VALUES ('$RequestId', '$QuestionnaireAnswers', '$QuestionnaireEligibility', '$RequestDate', '$FullName', '$Email')";
    if ($conn->query($sql) === TRUE) {
        echo "Your record have been saved successfully,We will response soon.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

// Function to calculate eligibility based on form inputs
function calculateEligibility($formData) {
    // Perform your eligibility calculation here based on form inputs
    // For example, you can calculate based on the score
    $score = calculateScore($formData);
    if ($score > 9) {
        return "Eligible";
    } else {
        return "Not Eligible";
    }
}

// Function to calculate score based on form inputs
function calculateScore($formData) {
    $score = 0;
    // Calculate the score based on form inputs
    $score += intval($formData["question1"]);
    $score += intval($formData["question2"]);
    $score += intval($formData["question3"]);
    $score += intval($formData["question4"]);
    $score += intval($formData["question5"]);
    $score += intval($formData["question6"]);
    $score += intval($formData["question7"]);
    $score += intval($formData["question8"]);
    $score += intval($formData["question9"]);
    $score += intval($formData["question10"]);
    $score += intval($formData["question11"]);
    $score += intval($formData["question12"]);
    
    return $score;
}
?>