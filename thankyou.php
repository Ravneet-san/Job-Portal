<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PreetSystems";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reqId = isset($_GET['req_id']) ? intval($_GET['req_id']) : 0;

if ($reqId <= 0) {
    die("Invalid Request ID.");
}

// Fetch job details for the title
$stmt = $conn->prepare("SELECT Job_Title FROM Job_Details WHERE Req_ID = ?");
$stmt->bind_param("i", $reqId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $job = $result->fetch_assoc();
} else {
    die("Job not found.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Thank You for Applying</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #0a2a66; margin: 0; padding: 40px; }
        .thank-you-container { background-color: #f9f9f9; border: 1px solid #0a2a66; padding: 20px; border-radius: 8px; }
        .thank-you-container h2 { margin-top: 0; }
        .home-button {
            display: inline-block;
            background-color: #0a2a66;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s, color 0.3s;
        }
        .home-button:hover {
            background-color: #ffffff;
            color: #0a2a66;
            border: 1px solid #0a2a66;
        }
    </style>
</head>
<body>

<div class="thank-you-container">
    <h2>Thank You for Applying!</h2>
    <p>We have received your application for the following job:</p>
    <p><strong>Job Title:</strong> <?php echo htmlspecialchars($job['Job_Title']); ?></p>
    <p><strong>Req_ID:</strong> <?php echo htmlspecialchars($reqId); ?></p>

    <h3>Your Application Details:</h3>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_GET['email']); ?></p>
    <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($_GET['phone']); ?></p>

    <p>You will hear back from us soon. Thank you!</p>

    <!-- Go to Home Page Button -->
    <a href="nothing.php" class="home-button">Go to Home Page</a>
</div>

</body>
</html>
