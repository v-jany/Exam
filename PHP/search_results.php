<?php
// Check if search term is provided in the URL query string
if (isset($_GET['search'])) {
    // Sanitize and store the search term from URL query string
    $searchTerm = htmlspecialchars($_GET['search']);

    // Connect to your database (replace with your database credentials)
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query to fetch matching student records
    $stmt = $pdo->prepare("SELECT * FROM students WHERE name LIKE :searchTerm OR reg_no LIKE :searchTerm");
    $stmt->execute(['searchTerm' => "%$searchTerm%"]); // Use wildcard (%) for partial matches

    // Fetch and display search results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output search results
    if (count($results) > 0) {
        echo "<h2>Search Results:</h2>";
        foreach ($results as $result) {
            echo "<p>Name: {$result['name']} | Reg. No: {$result['reg_no']}</p>";
        }
    } else {
        echo "<p>No results found for '{$searchTerm}'</p>";
    }
}
?>
