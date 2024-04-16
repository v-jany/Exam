<?php
// Database configuration
require_once('db_config.php');

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to select approved students
    $stmt = $pdo->prepare("SELECT * FROM students WHERE status = 'Pending'");
    $stmt->execute();

    // Check if there are approved students
    if ($stmt->rowCount() > 0) {
        echo '<h2>Pending Students List</h2>';
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Registration Number</th><th>Email</th><th>Programme</th><th>Semester</th><th>Subjects</th><th><Actions></th></tr>';

        // Loop through the results and display each student
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['reg_no'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . ucfirst($row['programme']) . '</td>';
            echo '<td>' . $row['semester'] . '</td>';
            echo '<td>' . $row['subjects'] . '</td>';
            echo '<td>
                    <a href="delete_student.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Delete</a>
                    <a href="reject_student.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Reject</a>
                    <a href="approve_student.php?id=' . $row['id'] . '" class="btn btn-success btn-sm">Approve</a>
            </td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No Pending students found.</p>';
    }
} catch (PDOException $e) {
    // Handle database errors
    die("Error: " . $e->getMessage());
}
?>
