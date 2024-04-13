<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['status'])) {
    $status = $_GET['status'];

    switch ($status) {
        case 'approved':
            header('Location: approved_students.php');
            exit();
        case 'rejected':
            header('Location: rejected_students.php');
            exit();
        case 'pending':
            header('Location: pending_students.php');
            exit();
        case 'all':
            header('Location: all_students.php');
            exit();
        default:
            // Invalid status
            header('Location: admin_dashboard.html');
            exit();
    }
} else {
    // Invalid request
    header('Location: admin_dashboard.html');
    exit();
}
?>
