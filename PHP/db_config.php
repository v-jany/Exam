<?php
// Database configuration
$host = 'localhost'; // MySQL host (usually 'localhost')
$dbname = 'your_database_name'; // Database name
$username = 'your_username'; // Database username
$password = 'your_password'; // Database password

// Attempt to create a PDO instance for database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO attributes (optional)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error handling
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable prepared statement emulation
    // You can add more attributes as needed

    // Optionally, you can echo a success message for debugging
    // echo "Connected to the database successfully";
} catch (PDOException $e) {
    // Handle database connection errors
    die("Connection failed: " . $e->getMessage());
}
?>
