
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<?php
$products = [ [
'type' => 'electronics',
'name' => 'Audio Technica ATH-M50x',
'price' => 119.99,
'quantity' => 2 ],
[
'type' => 'electronics',
'name' => 'Sennheiser HD 202 II',
'price' => 24.50,
'quantity' => 5 ],
[
'type' => 'electronics',
'name' => 'GPX HM3817DTBK Micro System',
'price' => 135.99,
'quantity' => 1 ],
[
'type' => 'electronics',
'name' => 'Samsung MX-J630 2.0 Channel 230 Watt System',
'price' => 117.99,
'quantity' => 4 ],
[
'type' => 'electronics',
'name' => 'M-Audio Bass Traveler',
'price' => 29.00,
'quantity' => 9 ],

[
'type' => 'movies',
'name' => 'Finding Dory',
'price' => 19.99,
'quantity' => 4 ],

[
'type' => 'movies',
'name' => 'Terminator: Genisys',
'price' => 14.95,
'quantity' => 3 ],
[
'type' => 'movies',
'name' => 'Interstellar',
'price' => 12.00,
'quantity' => 4 ],
[
'type' => 'movies',
'name' => 'Transformers: Age of Extinction',
'price' => 9.95,
'quantity' => 7 ],
[
'type' => 'movies',
'name' => 'Eye in the Sky',
'price' => 14.95,
'quantity' => 6 ],
[
'type' => 'movies',
'name' => 'The spy who dumped me',
'price' => 29.00,
'quantity' => 8 ],
[
'type' => 'movies',
'name' => 'Mamma Mia, Here We Go Again',
'price' => 22.99,
'quantity' => 4 ],
[
'type' => 'electronics',
'name' => 'M-Audio Bass Traveler',
'price' => 29.00,
'quantity' => 5 ],
[
'type' => 'video-games',
'name' => 'Battlefield 1',
'price' => 59.99,
'quantity' => 3 ],
[
'type' => 'video-games',
'name' => 'Overwatch',
'price' => 40.00,
'quantity' => 1 ],
[
'type' => 'video-games',
'name' => 'Gears of War 4',
'price' => 59.99,
'quantity' => 8 ],
[
'type' => 'video-games',
'name' => 'Titanfall 2',
'price' => 59.99,
'quantity' => 7 ],
[
'type' => 'video-games',
'name' => 'Sid Meier\'s Civilization VI ',
'price' => 59.99,
'quantity' => 4 ],
[
'type' => 'video-games',
'name' => 'The Sims 4',
'price' => 39.99,
'quantity' => 2 ],
[
'type' => 'video-games',
'name' => 'Grand Theft Auto V',
'price' => 59.99,
'quantity' => 7 ] 
];



$newProducts = [
    [
'type' => 'video-games',
'name' => 'Nim',
'price' => 1.11,
'quantity' => 7 ],
[
'type' => 'movies',
'name' => 'The Room',
'price' => 99.99,
'quantity' => 1 ]
];


$products = array_merge( $products, $newProducts);


function typeFilter($products, $search){
    //return $filteredMovies = array_filter($products, function($product) use ($search) {
    //return $product['type'] === $search;});
    $fileredMovies = [];
    foreach($products as $product){
        if ($product['type'] === $search){
            $fileredMovies[] = $product;
        }
    }
    return $fileredMovies;
}

function greaterFilter($products, $search){
    return $filteredMovies = array_filter($products, function($product) use ($search) {
    return $product['price'] > $search;
});
}

function getRevenue($arr){
    foreach ($arr as &$product){
        $product['revenue'] = $product['price'] * $product['quantity'];
    }
    return $arr;
}



?>

<h2>2D Array Display</h2>

<?php

function totalRevenue($items){
$totalRevenue = 0;
foreach($items as $item){
    $totalRevenue += $item['revenue'];
}
return $totalRevenue;
}


function displayArray($array2D){

echo "<table>";

if (!empty($array2D)) {
    echo "<table>";
    
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
    echo "No data available.";
}
}



?>
<h2>    Display name, type, price</h2>

<?php
displayArray($products);
?>

<h2> Display if price more than 30</h2>
<?php
$arr1 = greaterFilter($products, 30);
displayArray($arr1);
?>

<h2>Electronics more than 30</h2>
<?php
$electronics = typeFilter($products, "electronics");
$electronics = greaterFilter($electronics, 30);
displayArray($electronics);
?>


<h2>Movies Revenue</h2>
<?php
$mymovies = typeFilter($products, "movies");
$mymovies = getRevenue($mymovies);
displayArray($mymovies);
echo "Movie Revenue: $".totalRevenue($mymovies);
?>

<h2>Games Revenue</h2>
<?php
$games = typeFilter($products, "video-games");
$games = getRevenue($games);
displayArray($games);
echo "Game Revenue: $".totalRevenue($games);
?>



</body>
</html>

