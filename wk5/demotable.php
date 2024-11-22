<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2D Array in HTML Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>2D Array Display</h2>

<?php
// Define a 2D array
$array2D = [
    ["Name", "Age", "City"],
    ["Alice", 30, "New York"],
    ["Bob", 25, "Los Angeles"],
    ["Charlie", 35, "Chicago"]
];

// Start the table
echo "<table>";
foreach ($array2D as $row) {
    echo "<tr>"; // Start a new row
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>"; // Output each cell
    }
    echo "</tr>"; // End the row
}
echo "</table>"; // End the table
?>

</body>
</html>