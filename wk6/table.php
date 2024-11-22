<?php

function typeFilter($classes, $col, $search) {
    $filtered = [];
    foreach ($classes as $class) {
        if (strtolower(trim($class[$col])) == strtolower(trim($search))) {
            array_push($filtered, $class);
        }
    }
    return $filtered;
}

function createArray() {
    $classes = [];
    $columnLabels = ["Number", "Department", "Course", "Section", "Time", "Instructor", "Location"];
    if (($handle = fopen('fall22schedule.txt', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $classes[] = array_combine($columnLabels, $data);
        }
        fclose($handle);
    }
    return $classes;
}

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
        echo "No data available.";
    }
}

$classes = createArray();

echo '<h2>Schedule of Classes</h2>';
echo 'Filter by Department: <a href="?tfilter=COMPSCI&column=Department">   COMPSCI   </a>';
echo '<a href="?tfilter=MATH&column=Department">    MATH   </a><br>';


echo 'Filter by Location: <a href="?tfilter=MG0115&column=Location"> MG0115 </a>';
echo '<a href="?tfilter=MG0125&column=Location">  MG0125  </a>';
echo '<a href="?tfilter=HY0210&column=Location">  HY0210  </a><br>';

if (isset($_GET['tfilter']) && isset($_GET['column'])) {
    $filterValue = $_GET['tfilter'];
    $column = $_GET['column'];
    
    $validColumns = ["Department", "Location", "Course", "Section", "Time", "Instructor"];
    if (in_array($column, $validColumns)) {
        $filteredClasses = typeFilter($classes, $column, $filterValue);
        displayArray($filteredClasses);
    } else {
        echo "Invalid column name.";
    }
}

?>
