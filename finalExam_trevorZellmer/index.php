<?php
require_once 'pdo_connect.php';

try {
    $subjects_query = "SELECT DISTINCT subject FROM uww_schedule ORDER BY subject";
    $stmt = $db->prepare($subjects_query);
    $stmt->execute();
    $subjects = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    echo "Error fetching subjects: " . $e->getMessage();
    die();
}

function getClassesBySubject($subject) {
    global $db;
    try {
        $sql = "SELECT * FROM uww_schedule WHERE subject LIKE :subject ORDER BY number, subject";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':subject', $subject, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching classes: " . $e->getMessage());
    }
}

function getClassesByDays() {
    global $db;
    try {
        $sql = "SELECT * FROM uww_schedule WHERE days LIKE '%M%' OR days LIKE '%W%' ORDER BY number, subject";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching classes: " . $e->getMessage());
    }
}

function getClassesAfternoon() {
    global $db;
    try {
        $sql = "SELECT * FROM uww_schedule WHERE SUBSTRING_INDEX(time, ' ', 1) >= '12:00' ORDER BY number, subject";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching classes: " . $e->getMessage());
    }
}

if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
    $classes = getClassesBySubject($subject);
    if ($classes) {
        echo "<ul>";
        foreach ($classes as $class) {
            echo "<li>Course: {$class['subject']}{$class['number']} - {$class['days']} {$class['time']} - {$class['location']} - {$class['instructor']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No classes found for the selected subject.";
    }
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'getClassesByDays') {
    $classes = getClassesByDays();
    if ($classes) {
        echo "<ul>";
        foreach ($classes as $class) {
            echo "<li>Course: {$class['subject']}{$class['number']} - {$class['days']} {$class['time']} - {$class['location']} - {$class['instructor']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No classes found for Monday or Wednesday.";
    }
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'getClassesAfternoon') {
    $classes = getClassesAfternoon();
    if ($classes) {
        echo "<ul>";
        foreach ($classes as $class) {
            echo "<li>Course: {$class['subject']}{$class['number']} - {$class['days']} {$class['time']} - {$class['location']} - {$class['instructor']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No afternoon classes found.";
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduled Classes</title>
    <script>
        function fetchClasses(subject) {
            fetch('?subject=' + encodeURIComponent(subject))
                .then(response => response.text())
                .then(data => {
                    document.getElementById('classes').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching classes:', error);
                });
        }

        function fetchClassesByDays() {
            fetch('?action=getClassesByDays')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('classes').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching classes:', error);
                });
        }

        function fetchClassesAfternoon() {
            fetch('?action=getClassesAfternoon')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('classes').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching classes:', error);
                });
        }
    </script>
</head>
<body>
    <h1>Select a Subject</h1>
    <div id="subjects">
        <?php foreach ($subjects as $subject): ?>
            <a href="#" onclick="fetchClasses('<?php echo htmlspecialchars($subject); ?>'); return false;">
                <?php echo htmlspecialchars($subject); ?>
            </a><br>
        <?php endforeach; ?>
    </div>
    <hr>
    <h1>Monday or Wednesday Classes</h1>
    <a href="#" onclick="fetchClassesByDays(); return false;">View Monday or Wednesday Classes</a>
    <hr>
    <h1>Classes in the Afternoon (Starting After 12:00)</h1>
    <a href="#" onclick="fetchClassesAfternoon(); return false;">View Afternoon Classes</a>
    <hr>
    <h2>Scheduled Classes</h2>
    <div id="classes">Select a subject.</div>
</body>
</html>
