<?php
$products = [];
$filename = 'products.txt';

if (file_exists($filename)) {
    $file = fopen($filename, 'r');

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
} else {
    echo "File not found.";
    exit;
}

function inventoryFilter($products, $searchCol, $searchValue) {
    $filtered = [];
    foreach ($products as $product) {
        if ($product[$searchCol] == $searchValue) {
            array_push($filtered, $product);
        }
    }
    return $filtered;
}

function displayTable($array) {
    echo "<table>";
    
    if (!empty($array) && is_array($array[0])) { 
        echo "<tr>";
        foreach (array_keys($array[0]) as $key) {
            echo "<th>" . htmlspecialchars(ucfirst($key)) . "</th>";
        }
        echo "</tr>";

        foreach ($array as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td>Everything is in stock!</td></tr>";
    }
    
    echo "</table>"; 
}

$missingProducts = inventoryFilter($products, 'inventory', 0);

if (!empty($missingProducts)) {
    echo "<h2>Out of Stock Products</h2>";
    displayTable($missingProducts);
} else {
    echo "<h2>Everything is in stock!</h2>";
}
?>
