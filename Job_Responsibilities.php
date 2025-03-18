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

$sql = "SELECT State_Job_ID, Responsibilities FROM Job_Responsibilities";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "State_Job_ID: " . $row["State_Job_ID"]. " - Responsibilities: " . $row["Responsibilities"]. " " . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>