<?php
// Autoload composer
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
$filePath = 'Book1.xlsx'; // Make sure the path is correct
$spreadsheet = IOFactory::load($filePath);

function displaySheetData($sheetName) {
    global $spreadsheet;
    $sheet = $spreadsheet->getSheetByName($sheetName);
    if (!$sheet) {
        echo "<p>Sheet '$sheetName' not found!</p>";
        return;
    }

    $rows = $sheet->toArray(null, true, true, true);
    echo "<h2>Data from $sheetName</h2>";
    echo "<table border='1' cellpadding='10'>";
    foreach ($rows as $index => $row) {
        if ($index == 1) { continue; } // Skip headers
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}

// Call the function to display 'Job Details' sheet
displaySheetData('Job Details');
?>
