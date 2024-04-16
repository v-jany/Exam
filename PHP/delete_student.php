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

        // Prepare SQL statement to update registration status to 'Approved'
        $stmt = $pdo->prepare("DELETE FROM registrations WHERE id = ?");
        $stmt->execute([$registration_id]);

        if ($stmt->execute()) {
        // Registration deleted successfully
        echo "Student registration deleted successfully.";
    } else {
        // Error occurred while deleting registration
        echo "Error: " . $conn->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

        // Redirect to admin dashboard after successful approval
        header('Location: admin_dashboard.html');
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect to admin dashboard if accessed incorrectly
    header('Location: admin_dashboard.html');
    exit();
}
?>
