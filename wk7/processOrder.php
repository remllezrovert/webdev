<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opSystem = $_POST['opSystem'];
    $name = trim($_POST['nameBox']);
    $email = trim($_POST['emailBox']);
    $comments = $_POST['comBox'];
    $errors = [];

    if (empty($opSystem) || $opSystem == '--select operating system--') {
        $errors[] = "You must select an operating system.";
    }

    if (empty($name)) {
        $errors[] = "Name cannot be empty.";
    }

    if (empty($email)) {
        $errors[] = "Email cannot be empty.";
    }

    if (empty($errors)) {
        $processorPrice = $_POST['processor'];
        $memoryPrice = isset($_POST['memory']) ? $_POST['memory'] : 0;
        $hdPrice = isset($_POST['hd']) ? $_POST['hd'] : 0;

        $accessoryPrices = [];
        foreach (['battery', 'webcam', 'mouse', 'headset', 'clicker'] as $accessory) {
            if (isset($_POST[$accessory])) {
                $accessoryPrices[$accessory] = $_POST[$accessory];
            }
        }
        $accessoryTotal = array_sum($accessoryPrices);

        $subtotal = round($processorPrice + $memoryPrice + $hdPrice + $accessoryTotal + 800, 2);
        $tax = round($subtotal * 0.05, 2);
        $total = round($subtotal + $tax, 2);

        // Display order summary
        echo "<h1>Client Info</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Comments: " . htmlspecialchars($comments) . "</p>";
        echo "<hr></hr>";
        echo "<h1>Receipt</h1>";
        echo "<p>Operating System: $opSystem</p>";
        echo "<p>Processor Price: $$processorPrice</p>";
        echo "<p>Memory Price: $$memoryPrice</p>";
        echo "<p>Hard Drive Price: $$hdPrice</p>"; 

        if (!empty($accessoryPrices)) {
            echo "<p>Accessories:</p><ul>";
            foreach ($accessoryPrices as $accessory => $price) {
                echo "<li>" . ucfirst($accessory) . ": $$price</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No accessories selected.</p>";
        }

        echo "<p>Accessory Total: $$accessoryTotal</p>";
        echo "<p>Subtotal: $$subtotal</p>";
        echo "<p>Tax: $$tax</p>";
        echo "<p><strong>Total: $$total</strong></p>";
    } else {
        echo '<div>';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '<p>Please go <a href="orderForm.html">back</a> and correct the errors.</p>';
        echo '</div>';
    }
}
?>
