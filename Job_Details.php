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

$sql = "SELECT Req_ID, Agency, Job_Title, Region_Name, Last_Date, Job_Description FROM Job_Details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>Req_ID: </b>" . $row["Req_ID"]. "<br>". " <b>Job Title: </b>" . $row["Job_Title"]. "<br>". "<b>Last Date:</b> " . $row["Last_Date"]. "<br>". "<b>Job Description:</b> " . $row["Job_Description"].  "<br>";
        echo "<br>";
        echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>