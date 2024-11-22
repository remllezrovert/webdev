<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numDays = isset($_POST['numDays']) ? intval($_POST['numDays']) : 0;
    $carType = isset($_POST['category']) ? $_POST['category'] : '';
    $covCheck = isset($_POST['coverage']) ? true : false;

    $carRates = [
        '39.99' => 'Car',
        '59.99' => 'SUV',
        '79.99' => 'Minivan'
    ];

    if ($numDays <= 0) {
        echo "<p>Please enter a positive number of days in the days box.</p>";
    } else {
        $ratePerDay = floatval($carType);
        $rentCost = $ratePerDay * $numDays;

        $crashFee = 0;
        if ($covCheck) {
            $crashFee = 30 * $numDays;
        }

        $totalCost = $rentCost + $crashFee;

        echo "<h3>Rental Charge Estimate</h3>";
        echo "<p>Vehicle Category: " . htmlspecialchars($carRates[$carType]) . "</p>";
        echo "<p>Number of Days: " . htmlspecialchars($numDays) . "</p>";
        
        if ($covCheck) {
            echo "<p>Collision Coverage Fee: $" . number_format($crashFee, 2) . "</p>";
        } else {
            echo "<p>Collision Coverage Fee: Not selected</p>";
        }

        echo "<p>Total Rental Charges: $" . number_format($totalCost, 2) . "</p>";
    }
} else {
    echo "<p>Invalid method.</p>";
}
?>
