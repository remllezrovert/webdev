
<?php
$message = "  marry jones lives in santa cruz, california at 22 ocean drive.";
echo strlen($message);
echo "\n";
echo strtoupper($message);
echo "\n";
echo substr($message, 23, 10);
echo "\n";
echo str_replace("santa cruz", "Los Altos", $message);
echo "\n";
?>