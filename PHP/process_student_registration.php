<?php
// Database configuration
$host = 'localhost'; // MySQL host
$dbname = 'your_database_name'; // Database name
$username = 'your_database_username'; // Database username
$password = 'your_database_password'; // Database password

// Retrieve form data
$name = $_POST['name'];
$reg_no = $_POST['reg_no'];
$email = $_POST['email'];
$programme = $_POST['programme'];
$semester = $_POST['semester'];
$subjects = isset($_POST['subjects']) ? implode(', ', $_POST['subjects']) : '';

// File upload handling
$photo_dir = 'uploads/'; // Directory to store uploaded photos
$photo_path = $photo_dir . basename($_FILES['photo']['name']);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
    // File uploaded successfully, proceed with database insertion
    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to insert data into students table
        $stmt = $pdo->prepare("INSERT INTO students (name, reg_no, email, programme, semester, subjects, photo) 
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        // Bind parameters and execute the statement
        $stmt->execute([$name, $reg_no, $email, $programme, $semester, $subjects, $photo_path]);

        // Registration successful, redirect to a confirmation page
        header('Location: registration_confirmation.php');
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        die("Error: " . $e->getMessage());
    }
} else {
    // File upload failed
    echo "Sorry, there was an error uploading your photo.";
}
?>
