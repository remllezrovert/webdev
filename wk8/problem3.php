<?php

$type = isset($_POST['category']) ? $_POST['category'] : '';

function displayArray($array2D) {
    echo "<table>";

    if (!empty($array2D)) {
        echo "<tr>";
        foreach (array_keys($array2D[0]) as $key) {
            echo "<th>" . htmlspecialchars($key) . "</th>";
        }
        echo "</tr>";
        
        foreach ($array2D as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>"; 
    } else {
        echo "<tr><td>No data available.</td></tr>";
    }
}

$products = [];
$textfile = 'products.txt';

if (file_exists($textfile)) {
    $file = fopen($textfile, 'r');
    
    while (($line = fgets($file)) !== false) {
        $data = explode(',', trim($line));
        if (count($data) == 5) {
            $products[] = [
                'id' => $data[0],
                'type' => $data[1],
                'name' => $data[2],
                'price' => floatval($data[3]),
                'inventory' => intval($data[4])
            ];
        }
    }
    fclose($file);
}

function typeFilter($products, $search) {
    $filtered = [];
    foreach ($products as $product) {
        if ($product['type'] === $search) {
            $filtered[] = $product;
        }
    }
    return $filtered;
}

usort($products, function($a, $b) {
    return $a['price'] <=> $b['price'];
});

$filtered = typeFilter($products, $type);

echo "<h2>Displaying all " . htmlspecialchars($type) . "s</h2>";
displayArray($filtered);
?>
