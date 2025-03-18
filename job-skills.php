<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Load the Excel file
$spreadsheet = IOFactory::load('Book1.xlsx');

// Get the worksheet with the correct name (use exact match)
$worksheet = $spreadsheet->getSheetByName('Job Skills');

// Convert worksheet data to an array
$data = $worksheet->toArray();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Skills</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f8f8f8;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen p-10">
<div class="mb-4">
    <a href="test/index.php" class="text-blue-500 hover:underline">&larr; Back to Home</a>
</div>

<h1 class="text-2xl text-center mb-6 font-bold">Job Skills</h1>

<table>
    <thead>
    <tr>
        <?php foreach ($data[0] as $heading): ?>
            <th><?= htmlspecialchars($heading); ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 1; $i < count($data); $i++): ?>
        <tr>
            <?php foreach ($data[$i] as $cell): ?>
                <td><?= htmlspecialchars($cell); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>
</body>
</html>
