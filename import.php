<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the Composer autoload file to load PhpSpreadsheet
require 'vendor/autoload.php';

// Import necessary classes from PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection details
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
$dbname = "PreetSystems"; // The database you created

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Load the Excel file
$spreadsheet = IOFactory::load('Data.xlsx'); // Make sure the file is in the same folder
$worksheet = $spreadsheet->getActiveSheet(); // Get the active sheet

// Convert the sheet to an array
$data = $worksheet->toArray();

// Loop through the data and insert it into the database
foreach ($data as $index => $row) {
    // Skip the header row if needed
    if ($index === 0) {
        continue;
    }

    // Assuming your Excel file has columns in the order: 'name', 'age', 'id'
    $name = $row[0];    // Name in the first column
    $age = $row[1];     // Age in the second column
    $id = $row[2];      // ID in the third column

    // Insert data into the database (including the ID)
    $sql = "INSERT INTO idd (id, name, age) VALUES ($id, '$name', $age)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully with ID: $id<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
