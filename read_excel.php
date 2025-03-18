<?php
// Autoload composer
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Path to the Excel file
$filePath = 'data.xlsx';

// Load the spreadsheet
$spreadsheet = IOFactory::load($filePath);

// Get the active sheet (or specify a sheet index if needed)
$sheet = $spreadsheet->getActiveSheet();

// Fetch data from the sheet (start from row 2 if row 1 contains headers)
$rows = $sheet->toArray(null, true, true, true);

// Display the data in a table
echo "<table border='1' cellpadding='10'>";
//echo "<tr><th>Name</th><th>Age</th><th>ID</th></tr>";

foreach ($rows as $row) {
    // Skip the first row if it contains headers
    if ($row['A'] == 'ID') {
        continue;
    }
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['A']) . "</td>"; // ID column (Column A)
    echo "<td>" . htmlspecialchars($row['B']) . "</td>"; // Name column (Column B)
    echo "<td>" . htmlspecialchars($row['C']) . "</td>"; // Age column (Column C)
    echo "</tr>";
}

echo "</table>";
?>
