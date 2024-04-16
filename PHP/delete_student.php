<?php
// Database configuration
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Retrieve student registration ID from the URL parameter
    $registration_id = $_GET['id'];

    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to delete registration by ID
        $stmt = $pdo->prepare("DELETE FROM registrations WHERE id = ?");
        $stmt->execute([$registration_id]);

        // Check if deletion was successful
        if ($stmt->rowCount() > 0) {
            // Registration deleted successfully
            echo "Student registration deleted successfully.";
        } else {
            // No rows affected (registration not found)
            echo "Student registration not found or already deleted.";
        }

        // Close statement and database connection
        $stmt->closeCursor(); // Close cursor before closing statement
        $pdo = null; // Close connection

        // Redirect to admin dashboard after successful deletion
        header('Location: admin_dashboard.html');
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect to admin dashboard if accessed incorrectly or missing parameters
    header('Location: admin_dashboard.html');
    exit();
}
?>
