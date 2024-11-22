<?php

$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost; dbname=moviestore';
try {
    $db = new PDO($dsn, $user, $pass); //create a new PDO object instance

    $dbname = $db->query('SELECT database()')->fetchColumn();
    //https://www.php.net/manual/en/pdostatement.fetchcolumn.php
    echo "Connected " . $dbname; //this output is for debuggind and testing purpose

    //query() return a PDO statement object that contains query result
    //https://www.php.net/manual/en/pdo.query.php

    //PDO::query — Prepares and executes an SQL statement without placeholders
    //PDOStatement::fetch — Fetches the next row from a result set
    //fetch() return an array that contains the data row
    //https://www.php.net/manual/en/pdostatement.fetch.php
    //var_dump($db->query('SELECT database()')->fetch());
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br>";
    die();
}
