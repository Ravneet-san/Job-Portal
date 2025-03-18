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

$sql = "SELECT Req_ID, Job_Title, Last_Date, Job_Description FROM Job_Details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Job Openings - PreetSystems</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #0a2a66;
        }

        header {
            background-color: #0a2a66;
            color: #ffffff;
            padding: 20px 60px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 48px;
        }

        .back-button {
            background-color: #ffffff;
            color: #0a2a66;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid #0a2a66;
            display: inline-block;
            margin: 20px 0;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-button:hover {
            background-color: #0a2a66;
            color: #ffffff;
        }

        .container {
            padding: 20px 60px;
        }

        .job-box {
            border: 2px solid #0a2a66;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            position: relative;
        }

        .job-content h2 {
            margin-top: 0;
            color: #0a2a66;
        }

        .job-content p {
            margin: 8px 0;
            line-height: 1.5;
        }

        /* Button Wrapper */
        .button-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }

        .view-button {
            background-color: #0a2a66;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            white-space: nowrap;
        }

        .view-button:hover {
            background-color: #041c47;
        }

        @media (max-width: 768px) {
            .button-wrapper {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Job Openings</h1>
</header>

<div class="container">
    <a href="index.html" class="back-button">← Back to Home</a>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="job-box">
                <div class="job-content">
                    <h2><?php echo htmlspecialchars($row['Job_Title']); ?></h2>
                    <p><strong>Req ID:</strong> <?php echo htmlspecialchars($row['Req_ID']); ?></p>
                    <p><strong>Last Date to Apply:</strong> <?php echo htmlspecialchars($row['Last_Date']); ?></p>
                    <p><strong>Description:</strong><br>
                        <?php echo nl2br(htmlspecialchars($row['Job_Description'])); ?>
                    </p>
                </div>

                <div class="button-wrapper">
                    <a class="view-button" href="display.php?req_id=<?php echo urlencode($row['Req_ID']); ?>">
                        View Details
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No job openings found.</p>
    <?php endif; ?>

</div>

<?php $conn->close(); ?>

</body>
</html>
