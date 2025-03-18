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

$sql = "SELECT Req_ID, Skills,Required, Amount, Of_Experience FROM Job_Skills";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Req_ID: " . $row["Req_ID"]. "Skills: " . $row["Skills"]. "Required:" . $row["Required"]. "Amount" . $row["Amount"]. "Of Experience" . $row["Of_Experience"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>