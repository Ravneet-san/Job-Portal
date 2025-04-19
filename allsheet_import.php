<?php
ini_set('memory_limit', '1024M');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Preetsystem";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if (isset($_POST['submit'])) {
    if ($_FILES['excel_file']['error'] == 0) {
        $filePath = $_FILES['excel_file']['tmp_name'];

        if (!file_exists($filePath)) {
            die("File not found: " . $filePath);
        }

        // First sheet logic (Job Details)
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getSheet(0);
        $rows = $worksheet->toArray();

        $sql = "SELECT * FROM Job_Details ORDER BY Req_ID DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ID = $result->fetch_assoc();
            $Req_ID = $ID['Req_ID'];
        }

        $sql = "SELECT State_Job_ID FROM Job_Details";
        $result = $conn->query($sql);
        $stateId = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stateId[] = $row['State_Job_ID'];
            }
        }

        $conn->begin_transaction();
        try {
            foreach ($rows as $rowIndex => $row) {
                if ($rowIndex === 0) continue;

                $State_Job_ID = (int)$row[0];
                $value = false;
                for ($i = 0; $i < count($stateId); $i++) {
                    if ($State_Job_ID == $stateId[$i]) {
                        $value = true;
                        break;
                    }
                }

                if ($value) {
                    continue;
                }

                $Req_ID++;
                $Agency = $row[1];
                $Job_Title = $row[2];
                $Region_Name = $row[3];
                $creation_date = $row[4];
                $Last_Date = $row[5];
                $Job_Description = $row[6];
                $Additional_Job_Description1 = $row[7];
                $Additional_Job_Description2 = $row[8];

                if (empty($State_Job_ID)) {
                    continue;
                }

                $sql = "INSERT INTO Job_Details (Req_ID, State_Job_ID, Agency, Job_Title, Region_Name, Creation_Date, Last_Date, Job_Description, Additional_Job_Description1, Additional_Job_Description2) 
                    VALUES ('$Req_ID', '$State_Job_ID', '$Agency', '$Job_Title','$Region_Name','$creation_date', '$Last_Date','$Job_Description','$Additional_Job_Description1', '$Additional_Job_Description2')";

                if (!$conn->query($sql)) throw new Exception("Insert error: " . $conn->error);
            }
            $conn->commit();
            $message = "File uploaded and data imported successfully from the first sheet (Job Details)!";
        } catch (Exception $e) {
            $conn->rollback();
            $message = "Transaction failed (Sheet 1): " . $e->getMessage();
        }

        // Second sheet logic (Job Skills)
        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheetCount = $spreadsheet->getSheetCount();

            if ($sheetCount > 1) {
                $sheet = $spreadsheet->getSheet(1);
                $rows = $sheet->toArray();

                $conn->begin_transaction();

                foreach ($rows as $i => $row) {
                    if ($i === 0) continue;
                    $Req_ID = (int)$row[0];
                    $Skills = $row[1];
                    $required = $row[2];
                    $amt = (int) $row[3];
                    $exp = $row[4];

                    $checkReqId = $conn->query("SELECT 1 FROM Job_Details WHERE Req_ID = $Req_ID");
                    if ($checkReqId->num_rows === 0) {
                        //$message .= "<p style='color:orange;'>Row $i skipped: Req_ID $Req_ID not found in Job_Details.</p>";
                        continue;
                    }

                    // Validate Amount
                    if (empty($amt) || !is_numeric($amt)) {
                        $amt = 'NULL';
                    } else {
                        $amt = (int)$amt;
                    }
                    $sql = "INSERT INTO Job_Skills (Req_ID, Skills, Required, Amount, Of_Experience)
                            VALUES ('$Req_ID','$Skills','$required','$amt','$exp')";

                    if (!$conn->query($sql)) throw new Exception("Insert error: " . $conn->error);
                }

                $conn->commit();
                $message .= "<p style='color:green;'>Data inserted successfully from second sheet (Job Skills).</p>";
            } else {
                $message .= "<p style='color:orange;'>No second sheet found in Excel file.</p>";
            }

        } catch (Exception $e) {
            $conn->rollback();
            $message .= "<p style='color:red;'>Transaction failed (Sheet 2): " . $e->getMessage() . "</p>";
        }

        // Third sheet logic (Job Responsibilities)
        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheetCount = $spreadsheet->getSheetCount();

            if ($sheetCount > 2) {
                $sheet = $spreadsheet->getSheet(2);
                $rows = $sheet->toArray();

                $conn->begin_transaction();

                foreach ($rows as $i => $row) {
                    if ($i === 0) continue;
                    $State_Job_ID = (int)$row[0];
                    $responsibilities = $row[1];

                    if (empty($State_Job_ID) || empty($responsibilities)) {
                        continue;
                    }

                    $responsibilities = $conn->real_escape_string($responsibilities);

                    // Check if job ID exists
                    $check = $conn->query("SELECT 1 FROM Job_Details WHERE Req_ID = $State_Job_ID");
                    if ($check->num_rows === 0) {
                        $message .= "<p style='color:orange;'>Row $i skipped: Job ID $State_Job_ID not found in Job_Details.</p>";
                        continue;
                    }

                    $sql = "INSERT INTO Job_Responsibilities (State_Job_ID, Responsibilities)
                            VALUES ('$State_Job_ID', '$responsibilities')";

                    if (!$conn->query($sql)) throw new Exception("Insert error: " . $conn->error);
                }

                $conn->commit();
                $message .= "<p style='color:green;'>Data inserted successfully from third sheet (Job Responsibilities).</p>";
            } else {
                $message .= "<p style='color:orange;'>No third sheet found in Excel file.</p>";
            }

        } catch (Exception $e) {
            $conn->rollback();
            $message .= "<p style='color:red;'>Transaction failed (Sheet 3): " . $e->getMessage() . "</p>";
        }

    } else {
        $message = "File upload error: " . $_FILES['excel_file']['error'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Excel File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .message {
            font-size: 16px;
            margin-bottom: 10px;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Excel File</h2>
    <p class="message"><?= $message; ?></p>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="excel_file" accept=".xlsx, .xls" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</div>

</body>
</html>
