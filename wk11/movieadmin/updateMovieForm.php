<?php
include_once("pdo_connect.php");

if (!$db) {
    echo "Could not connect to the database";
    exit();
}

$movieId = isset($_GET['movieId']) ? $_GET['movieId'] : null;

if ($movieId) {
    $sql = "SELECT `movieId`, `title`, `year`, `type` FROM `movies` WHERE `movieId` = :movieId";
    $parameterValues = array(":movieId" => $movieId);
    $movieData = getAll($sql, $db, $parameterValues);

    if (!empty($movieData)) {
        $movie = $movieData[0]; // Assuming only one movie is returned
        // Fetch distinct types of movies for the dropdown
        $typesSql = "SELECT DISTINCT `type` FROM `movies` ORDER BY `type`";
        $types = getAll($typesSql, $db);
    } else {
        echo "Movie not found.";
        exit();
    }
} else {
    echo "Movie ID not provided.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3>Update Movie: <?php echo htmlspecialchars($movie['title']); ?></h3>
        <form method="POST" action="index.php?mode=updateMovieSubmit">
            <input type="hidden" name="movieId" value="<?php echo htmlspecialchars($movie['movieId']); ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($movie['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year:</label>
         
