<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PreetSystems";

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

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $additionalInfo = mysqli_real_escape_string($conn, $_POST['additional_info']);

    $insertSql = "INSERT INTO Job_Applications (Req_ID, Name, Email, Phone, Additional_Info) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("issss", $reqId, $name, $email, $phone, $additionalInfo);

    if ($stmt->execute()) {
        // Redirect to the thank you page after successful submission
        header("Location: thankyou.php?req_id=$reqId&name=" . urlencode($name) . "&email=" . urlencode($email) . "&phone=" . urlencode($phone));
        exit(); // Ensures no further code is executed
    } else {
        $message = "❌ There was an error submitting your application.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Apply for Job - Req_ID: <?php echo htmlspecialchars($reqId); ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #0a2a66; margin: 0; padding: 40px; }
        .form-container { background-color: #f9f9f9; border: 1px solid #0a2a66; padding: 20px; border-radius: 8px; }
        .form-container h2 { margin-top: 0; }
        .form-container input, .form-container textarea { width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #0a2a66; }
        .form-container button { background-color: #0a2a66; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .form-container button:hover { background-color: #041c47; }
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #0a2a66;
            font-weight: bold;
        }
    </style>
</head>
<body>

<a href="nothing.php" class="back-button">← Back to Job Openings</a>

<div class="form-container">
    <h2>Apply for the Job: <?php echo htmlspecialchars($job['Job_Title']); ?></h2>

    <?php if (isset($message)): ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="apply.php?req_id=<?php echo $reqId; ?>" method="POST">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number</label>
        <input type="number" id="phone" name="phone" required>

        <label for="additional_info">Additional Information</label>
        <textarea id="additional_info" name="additional_info" rows="5" placeholder="Enter any additional details here..."></textarea>

        <button type="submit">Submit Application</button>
    </form>
</div>

</body>
</html>
