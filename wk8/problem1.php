<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errorMessages = [];
    $grossIncome = isset($_POST['grossIncome']) ? trim($_POST['grossIncome']) : '';
    $dependents = isset($_POST['dependents']) ? (int)$_POST['dependents'] : -1;

    if (empty($grossIncome) || !is_numeric($grossIncome) || $grossIncome <= 0) {
        $errorMessages[] = "Gross income input is invalid";
    }
    if ($dependents < 0) {
        $errorMessages[] = "must input number of dependents";
    }

    if (empty($errorMessages)) {
        switch ($dependents) {
            case 0:
                $taxRate = 0.30; 
                break;
            case 1:
                $taxRate = 0.22; 
                break;
            case 2:
                $taxRate = 0.18; 
                break;
            case 3:
                $taxRate = 0.15; 
                break;
            default:
                $taxRate = 0.10;
                break;
        }

        $taxes = $grossIncome * $taxRate;
        $netIncome = $grossIncome - $taxes;

        echo "<h3>Calculation Results:</h3>";
        echo "<p>Gross Income: $" . number_format($grossIncome, 2) . "</p>";
        echo "<p>Number of Dependents: $dependents</p>";
        echo "<p>Taxes: $" . number_format($taxes, 2) . "</p>";
        echo "<p>Income: $" . number_format($netIncome, 2) . "</p>";
    } else {
        foreach ($errorMessages as $errorMessage) {
            echo "<p>$errorMessage</p>";
        }
    }
}
?>

