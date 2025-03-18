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

// Prepared statement to fetch job details
$stmt = $conn->prepare("SELECT * FROM Job_Details WHERE Req_ID = ?");
$stmt->bind_param("i", $reqId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $job = $result->fetch_assoc();
} else {
    die("Job not found.");
}

// Fetch skills
$skills = [];
$skillsSql = "SELECT Skills FROM Job_Skills WHERE Req_ID = ?";
$skillsStmt = $conn->prepare($skillsSql);
$skillsStmt->bind_param("i", $reqId);
$skillsStmt->execute();
$skillsResult = $skillsStmt->get_result();

if ($skillsResult->num_rows > 0) {
    while ($skillRow = $skillsResult->fetch_assoc()) {
        $skills[] = $skillRow['Skills'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Job Description - Req_ID: <?php echo htmlspecialchars($reqId); ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #0a2a66; margin: 0; padding: 40px; }
        .button-container {
            display: flex;
            justify-content: space-between; /* Distributes space between buttons */
            margin-bottom: 20px;
        }
        .back-button, .apply-button {
            background-color: #0a2a66;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .back-button:hover, .apply-button:hover {
            background-color: #ffffff;
            color: #0a2a66;
            border: 1px solid #0a2a66;
        }
        .job-description { border: 1px solid #0a2a66; padding: 20px; border-radius: 8px; background-color: #f9f9f9; }
        .job-description h2 { margin-top: 0; }
    </style>
</head>
<body>

<div class="button-container">
    <a href="nothing.php" class="back-button">← Back to Job Openings</a>
    <a href="apply.php?req_id=<?php echo $reqId; ?>" class="apply-button">Apply</a>
</div>

<div class="job-description">
    <h2><?php echo htmlspecialchars($job['Job_Title']); ?></h2>
    <p><strong>Req_ID:</strong> <?php echo htmlspecialchars($job['Req_ID']); ?></p>
    <p><strong>Last Date to Apply:</strong> <?php echo htmlspecialchars($job['Last_Date']); ?></p>

    <?php
    $descriptionParts = [
        $job['Job_Description'],
        $job['Additional_Job_Description1'],
        $job['Additional_Job_Description2']
    ];
    $description = implode(' ', array_filter($descriptionParts));
    ?>

    <p><strong>Job Description:</strong></p>
    <p><?php echo nl2br(htmlspecialchars($description)); ?></p>

    <p><strong>Skills Required:</strong></p>
    <?php if (!empty($skills)) : ?>
        <ul>
            <?php foreach ($skills as $skill): ?>
                <li>
                    <?php
                    $skillText = trim($skill); // Remove extra spaces

                    // Check if the last character is NOT a period
                    if (substr($skillText, -1) !== '.') {
                        $skillText .= '.';
                    }

                    echo htmlspecialchars($skillText);
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No specific skills listed.</p>
    <?php endif; ?>
</div>

</body>
</html>